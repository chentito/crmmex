<?php
/*
 * Verificacion y envio de campanias calendarizadas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Tareas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Mercadotecnia\Campanias AS Campania;
use App\Models\crmmex\Mercadotecnia\ListasContactos AS Contactos;
use App\Models\crmmex\Mercadotecnia\Piezas AS Pieza;

use App\Http\Controllers\crmmex\Sistema\PHPMailerController AS Mail;

class EjemploController extends Controller
{
    // Llamada al proceso de envio masivo de campanias
    public static function envioTest() {
      self::verificaCampaniaPendiente();
    }

    // Obtiene el detalle de la campania
    public static function verificaCampaniaPendiente() {
        $campanias = Campania::where( 'status' , 1 )
                              ->where( 'fechaEnvio' , date( 'Y-m-d H:i:00' ) )
                              ->get();

        foreach( $campanias AS $campania ) { // Verifica la campaña a ejecutar
            foreach( self::destinatarios( $campania->id_listado_destinatarios ) AS $destino ) { // Recorre el listado de destinatarios
              $destino[ 'campaniaID' ] = $campania->id;
              Mail::envioCalendarizado( $campania->id , $campania->subject , $campania->pieza , $campania->tracking , array( $destino[ 'email' ] ) , $destino );
            }

            $actualiza = Campania::find( $campania->id );
            $actualiza->enviado = 1;
            $actualiza->save();
        }
    }

    // Obtiene listado de contactos
    public static function destinatarios( $listaID ) {
        $lista     = array();
        $contactos = Contactos::where( 'audienciaID' , $listaID )
                              ->where( 'status' , 1 )
                              ->get();

        foreach( $contactos AS $contacto ) {
          $lista[] = array(
            'contactoID' => $contacto->idty,
            'nombre'     => $contacto->nombre,
            'telefono'   => $contacto->telefono,
            'email'      => $contacto->email,
            'empresa'    => $contacto->empresa
          );
        }

        return $lista;
    }

    // Obtiene la pieza de correo a enviar
    public static function pieza( $piezaID , $tracking , $datos=array() ) {
        $pieza = Pieza::find( $piezaID );
        return $pieza->pieza . $tracking;
    }

}
