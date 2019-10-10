<?php
/*
 * Controlador para la administración de la cuenta de envio de correos electronicos
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Sistema\PHPMailerController AS PHPMailerController;

use App\Models\crmmex\Configuraciones\SMTP AS SMTP;

class SMTPController extends Controller
{

  /* Metodo que obtiene la configuracion de la cuenta smtp */
  public function obtieneConfiguracion( $id="1" ) {
    $smtp = SMTP::find( $id );
    return response()->json( $smtp );
  }

  /* Metodo que actualiza la cuenta smtp */
  public function update( Request $request ) {
    $smtp = SMTP::find( 1 );
    $smtp->servidor      = $request[ 'conf_smtp_host' ];
    $smtp->usuario       = $request[ 'conf_smtp_usuario' ];
    $smtp->contrasena    = $request[ 'conf_smtp_passwd' ];
    $smtp->puerto        = $request[ 'conf_smtp_port' ];
    $smtp->seguridad     = $request[ 'conf_smtp_security' ];
    $smtp->test          = 0;
    $smtp->nombre        = $request[ 'conf_smtp_fromName' ];
    $smtp->copia         = $request[ 'conf_smtp_copy' ];
    $smtp->copiaNombre   = $request[ 'conf_smtp_copyName' ];
    $smtp->replyTo       = $request[ 'conf_smtp_replyTo' ];
    $smtp->replyToNombre = $request[ 'conf_smtp_replyToName' ];
    if( $smtp->save() ) {
        $msj = "Cuenta actualizada";
      } else {
        $msj = "Error al actualizar datos";
    }
    return response()->json( array( 'msj' => $msj ) );
  }

  /* Realiza la prueba de configuracion de cuenta smtp */
  public function testSMTP( Request $request ) {
    $datosConf = array (
      'nombre'    => "CRM Test",
      'host'      => $request->conf_smtp_host,
      'usuario'   => $request->conf_smtp_usuario,
      'password'  => $request->conf_smtp_passwd,
      'puerto'    => $request->conf_smtp_port,
      'seguridad' => $request->conf_smtp_security,
      'copia'     => '',
      'copiaN'    => '',
      'replyTo'   => '',
      'replyToN'  => ''
    );

    $envio = PHPMailerController::envioTest( 0 , 'Envio pruebas configuracion' , 'Correo de pruebas de envio' , array( $request->conf_smtp_destinatarioPrueba ) , '', array(), $datosConf);
    return response()->json( array( PHPMailerController::$status ) );
  }

}
