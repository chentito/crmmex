<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Configuraciones\SMTP AS SMTP;

use PHPMailer\PHPMailer;

class PHPMailerController extends Controller
{

    public $status = false;

    // Metodo para el envio de propuestas
    public function envioPropuesta( $propuestaID , $adjuntos=array() ) {
        $destinatarios = array( 'cvreyes@mexagon.net' );
        $this->envio( 'Propuesta Comercial :: CRM Mexagon' , 'Se enviará la propuesta con id '.$propuestaID , $destinatarios , $adjuntos );
    }

    // Proceso de envio de correo electronico
    private function envio( $subject , $text , $destinatarios , $adjuntos ) {
        $datos = $this->datosConexion();
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
              $this->status = true;
          } else {
              $this->status = false;
        }
    }

    // Obtiene los datos de la cuenta smtp configurada
    private function datosConexion() {
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

}
