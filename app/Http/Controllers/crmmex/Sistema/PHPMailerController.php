<?php
/*
 * Controlador para los envias de correo electronico
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Configuraciones\SMTP AS SMTP;
use App\Models\crmmex\Sistema\Templates As Templates;
use App\Models\crmmex\Mercadotecnia\Piezas AS Pieza;

use PHPMailer\PHPMailer;

class PHPMailerController extends Controller
{

    public static $status = false;

    // Metodo para el envio de propuestas
    public static function envioPropuesta( $propuestaID , $destinatarios , $reservadas=array() , $adjuntos=array() ) {
        $msj = self::piezaCorreo( 1 , $reservadas );
        self::envio( $msj[ 'Asunto' ] , $msj[ 'Body' ] , $destinatarios , $adjuntos );
    }

    // Metodo para el envio de Campanias
    public static function envioCalendarizado( $subject , $piezaMail , $tracking , $destinatario , $personalizacion=array() ) {
        $msj = self::piezaCorreoCampania( $piezaMail , $personalizacion , $tracking );
        self::envio( $subject , $msj , $destinatario );
    }

    // Proceso de envio de correo electronico
    private static function envio( $subject , $text , $destinatarios , $adjuntos=array() ) {
        $datos = self::datosConexion();
        $mail = new PHPMailer\PHPMailer();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPDebug  = 1;
        if( $datos[ 'host' ] != 'smtp.gmail.com' ){ $mail->isSMTP(); }
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = $datos[ 'seguridad' ];
        $mail->Host       = $datos[ 'host' ];
        $mail->Port       = $datos[ 'puerto' ];
        $mail->IsHTML(true);
        $mail->Username   = $datos[ 'usuario' ];
        $mail->Password   = $datos[ 'password' ];
        $mail->SetFrom( $datos[ 'usuario' ] , $datos[ 'nombre' ] );
        $mail->Subject    = $subject;
        $mail->Body       = $text;

        // Adjuntos
        foreach( $adjuntos AS $adjunto ) {
            $mail->AddStringAttachment( ( $adjunto[ 'archivo' ] ) , $adjunto[ 'nombre' ] , $adjunto[ 'encoding' ] , $adjunto[ 'mime' ] );
        }

        // Destinatarios
        foreach( $destinatarios AS $destinatario ){
            $mail->AddAddress( $destinatario );
        }

        if( $mail->Send() ) {
              self::$status = true;
          } else {
              self::$status = false;
        }
    }

    // Obtiene los datos de la cuenta smtp configurada
    private static function datosConexion() {
        $conexion = array();
        $smtp = SMTP::find( 1 );
        $conexion = array(
          'nombre'    => $smtp->nombre,
          'host'      => $smtp->servidor,
          'usuario'   => $smtp->usuario,
          'password'  => $smtp->contrasena,
          'puerto'    => $smtp->puerto,
          'seguridad' => $smtp->seguridad,
          'copia'     => $smtp->copia
        );
        return $conexion;
    }

    // Obtiene la pieza de correo a utilizar
    private static function piezaCorreo( $id , $reservadas ) {
        $template = Templates::find( $id );
        $body     = $template->cuerpo;

        foreach( $reservadas AS $reservada ){
            $busca[]     = '{'.$reservada[ 0 ].'}';
            $reemplaza[] = $reservada[ 1 ];
        }

        $body = str_replace( $busca , $reemplaza , $body );
        $datos = array(
          'Asunto' => $template->asunto,
          'Body'   => $body
        );

        return $datos;
    }

    // Obtiene la pieza de correo de la campaña
    private static function piezaCorreoCampania( $idPieza , $personalizacion , $tracking ) {
        $pieza = Pieza::find( $idPieza );
        $body  = $pieza->pieza . $tracking;
        $reservadas = array( 'contactoID' , 'nombre' , 'email' , 'telefono' , 'empresa' );

        foreach( $reservadas AS $reservada ){
            if( isset( $personalizacion[ $reservada ] ) ) {
                $busca[]     = '{'.$reservada.'}';
                $reemplaza[] = $personalizacion[ $reservada ];
            }
        }

        $body = str_replace( $busca , $reemplaza , $body );
        return $body;
    }

}
