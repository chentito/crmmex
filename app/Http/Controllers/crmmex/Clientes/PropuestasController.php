<?php
/*
 * Controlador para funciones de listado de propuestas
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Support\Facades\Auth;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Productos\Productos AS Productos;

use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

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
                'id'             => $propuesta->id,
                'ejecutivoID'    => Utils::nombreEjecutivo( $propuesta->ejecutivoID ),
                'clienteID'      => Utils::nombreCliente( $propuesta->clienteID ),
                'contactoID'     => Utils::nombreContacto( $propuesta->contactoID ),
                'categoria'      => $propuesta->categoria,
                'fechaEnvio'     => $propuesta->fechaEnvio,
                'observaciones'  => $propuesta->observaciones,
                'requerimientos' => $propuesta->requerimientos,
                'formaPago'      => $propuesta->formaPago,
                'monto'          => number_format( $propuesta->monto , 2 ),
                'descuento'      => $propuesta->descuento,
                'promocion'      => $propuesta->promocion,
                'status'         => $propuesta->status,
                'opciones'       => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Detalle Propuesta" onclick="contenidos(\'clientes_editapropuesta\',\''.$propuesta->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
            );
        }

        return response()->json( $datos );
     }

     /*
      * Metodo para el alta de una neuva propuesta
      */
      public function altaPropuesta( Request $request ) {
          $resp = array();
          $propuesta = new Propuestas();
          $propuesta->ejecutivoID    = Auth::user()->id;
          $propuesta->clienteID      = $request->clienteID;
          $propuesta->contactoID     = $request->propuesta_contactos;
          $propuesta->fechaCreacion  = date( 'Y-m-d H:i:s' );
          $propuesta->observaciones  = $request->propuesta_observaciones;
          $propuesta->requerimientos = $request->propuesta_requerimientos;
          $propuesta->categoria      = $request->catalogo_18;
          $propuesta->formaPago      = $request->catalogo_15;
          $propuesta->monto          = $request->propuesta_monto;
          $propuesta->descuento      = $request->propuesta_descuento;
          $propuesta->promocion      = $request->propuesta_promocion;
          $propuesta->status         = 1;

          if( $propuesta->save() ) {
              $resp[ 'msj' ] = "Propuesta agregada correctamente";
              $resp[ 'idty' ] = $propuesta->id;
          } else {
              $resp[ 'msj' ] = "Error al agregar propuesta";
          }

          return response()->json( $resp );
      }

      /*
       * Metodo para la actualizacion de registro de una propuesta
       */
       public function editaPropuesta( Request $request ) {
          $propuestaID = $request->pID;
          $propuesta   = Propuestas::find( $propuestaID );
          $propuesta->clienteID      = $request->clienteID;
          $propuesta->contactoID     = $request->propuesta_contactos;
          $propuesta->observaciones  = $request->propuesta_observaciones;
          $propuesta->requerimientos = $request->propuesta_requerimientos;
          $propuesta->categoria      = $request->catalogo_18;
          $propuesta->formaPago      = $request->catalogo_15;
          $propuesta->monto          = $request->propuesta_monto;
          $propuesta->descuento      = $request->propuesta_descuento;
          $propuesta->promocion      = $request->propuesta_promocion;

          if( $propuesta->save() ) {
              $resp[ 'msj' ] = "Propuesta actualizada correctamente";
              $resp[ 'idty' ] = $propuesta->id;
          } else {
              $resp[ 'msj' ] = "Error al actualizar propuesta";
          }

          return response()->json( $resp );
       }

       /*
        * Metodo que busca los datos de un registro en particular
        */
       public function datosPropuesta( $propuestaID ) {
          $datos     = array();
          $propuesta = Propuestas::find( $propuestaID );

          $datos = array (
              'id'             => $propuesta->id,
              'ejecutivo'      => $propuesta->ejecutivoID,
              'cliente'        => $propuesta->clienteID,
              'contacto'       => $propuesta->contactoID,
              'fechaEnvio'     => $propuesta->fechaEnvio,
              'observaciones'  => $propuesta->observaciones,
              'requerimientos' => $propuesta->requerimientos,
              'formaPago'      => $propuesta->formaPago,
              'categoria'      => $propuesta->categoria,
              'monto'          => $propuesta->monto,
              'descuento'      => $propuesta->descuento,
              'promocion'      => $propuesta->promocion,
              'status'         => $propuesta->status
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

        /*
         * Metodo que genera el PDF de la propuesta
         */
         public function generaPDF( $propuestaID ) {
           $nombre = "Mexagon SA de CV";
           $fecha  = date( 'Y-m-d H:i:s' );
           $pdf = \PDF::loadView( 'crmmex.pdf.ejemplo' , compact( 'nombre' , 'fecha' ) );
           return $pdf->download( 'PropuestaComercial.pdf' );
         }

}
