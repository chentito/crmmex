<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
      $smtp->nombre     = 'Principal';
      $smtp->servidor   = $request[ 'conf_smtp_host' ];
      $smtp->usuario    = $request[ 'conf_smtp_usuario' ];
      $smtp->contrasena = $request[ 'conf_smtp_passwd' ];
      $smtp->puerto     = $request[ 'conf_smtp_port' ];
      $smtp->seguridad  = $request[ 'conf_smtp_security' ];
      $smtp->test       = 0;
      $smtp->de         = $request[ 'conf_smtp_from' ];
      $smtp->copia      = $request[ 'conf_smtp_copy' ];

      if( $smtp->save() ) {
          return "Cuenta actualizada";
        } else {
          return "Error al actualizar datos";
      }

    }

}
