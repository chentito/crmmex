<?php
/*
 * Controlador para funciones de listado de propuestas
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Productos\Productos AS Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropuestasController extends Controller
{
    /*
     * Metodo que obtiene el listado de
     * propuestas de un cliente en particular
     */
     public function listadoPropuestas( $clienteID ) {
        $datos      = array();
        $propuestas = Propuestas::where( 'status' , 1 )->where( 'clienteID' , $clienteID )->get();

        foreach( $propuestas AS $propuesta ) {
            $datos[ 'propuestas' ][] = array (
                'id'            => $propuesta->id,
                'ejecutivo'     => $propuesta->ejecutivoID,
                'cliente'       => $propuesta->clienteID,
                'contacto'      => $propuesta->contactoID,
                'fechaEnvio'    => $propuesta->fechaEnvio,
                'observaciones' => $propuesta->observaciones,
                'monto'         => $propuesta->monto,
                'descuento'     => $propuesta->descuento,
                'promocion'     => $propuesta->promocion,
                'status'        => $propuesta->status,
                'opciones'      => ''
            );
        }

        return response()->json( $datos );
     }

     /*
      * Metodo para el alta de una neuva propuesta
      */
      public function altaPropuesta( Request $request ) {
          $propuesta = new Propuesta();
          $propuesta->ejecutivoID    = 1;
          $propuesta->clienteID      = $request->clienteID;
          $propuesta->contactoID     = $request->contactoID;
          $propuesta->fechaEnvio     = '';
          $propuesta->observaciones  = $request->propuesta_observaciones;
          $propuesta->requerimientos = $request->propuesta_requerimientos;
          $propuesta->monto          = $request->propuesta_monto;
          $propuesta->descuento      = $request->propuesta_descuento;
          $propuesta->promocion      = $request->propuesta_promocion;
          $propuesta->save();
      }

      /*
       * Metodo para la actualizacion de registro de una propuesta
       */
       public function editaPropuesta( Request $request ) {
          $propuestaID = $request->propuestaID;
          $propuesta   = Propuesta::find( $propuestaID );
          $propuesta->clienteID      = $request->clienteID;
          $propuesta->contactoID     = $request->contactoID;
          $propuesta->fechaEnvio     = "";
          $propuesta->observaciones  = $request->propuesta_observaciones;
          $propuesta->requerimientos = $request->propuesta_requerimientos;
          $propuesta->monto          = $request->propuesta_monto;
          $propuesta->descuento      = $request->propuesta_descuento;
          $propuesta->promocion      = $request->propuesta_promocion;
          $propuesta->save();
       }

       /*
        * Metodo que busca los datos de un registro en particular
        */
       public function datosPropuesta( $propuestaID ) {
          $datos     = array();
          $propuesta = Propuesta::where( 'id' , $propuestaID )->first();

          $datos = array (
              'ejecutivo'     => $propuesta->ejecutivoID,
              'cliente'       => $propuesta->clienteID,
              'contacto'      => $propuesta->contactoID,
              'fechaEnvio'    => $propuesta->fechaEnvio,
              'observaciones' => $propuesta->observaciones,
              'monto'         => $propuesta->monto,
              'descuento'     => $propuesta->descuento,
              'promocion'     => $propuesta->promocion,
              'status'        => $propuesta->status
          );

          return response()->json( $datos );
       }

       /*
        * Elimina un registro a traves de su ID
        */
        public function eliminaPropuesta( $propuestaID ) {
            $propuesta = Propuesta::find( $propuestaID );
            $propuesta->status = 3;
            $propuesta->save();
        }

}
