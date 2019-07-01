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
use App\Models\crmmex\Clientes\PropuestasDetalle AS PropuestasDetalle;

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
                'id'              => $propuesta->id,
                'propuestaIDTY'   => $propuesta->propuestaIDTY,
                'ejecutivoID'     => Utils::nombreEjecutivo( $propuesta->ejecutivoID ),
                'clienteID'       => Utils::nombreCliente( $propuesta->clienteID ),
                'contactoID'      => Utils::nombreContacto( $propuesta->contactoID ),
                'categoria'       => $propuesta->categoria,
                'fechaCreacion'   => $propuesta->fechaCreacion,
                'fechaVigencia'   => $propuesta->fechaVigencia,
                'fechaEnvio'      => $propuesta->fechaEnvio,
                'observaciones'   => $propuesta->observaciones,
                'requerimientos'  => $propuesta->requerimientos,
                'formaPago'       => $propuesta->formaPago,
                'monto'           => number_format( $propuesta->monto , 2 ),
                'total'           => number_format( $propuesta->total , 2 ),
                'descuento'       => $propuesta->descuento,
                'promocion'       => $propuesta->promocion,
                'estadoPropuesta' => ( ( $propuesta->estadoPropuesta == 0 ) ? 'Sin enviar' : 'Enviado'  ),
                'pagoPropuesta'   => ( ( $propuesta->pagoPropuesta == "0" ) ? 'No pagada' : ( (  $propuesta->pagoPropuesta == "1" ) ? 'Parcial' : 'Pagada' ) ),
                'status'          => ( ( $propuesta->status == 0 ) ? 'Deshabilitada' : 'Habilitada' ),
                'opciones'        => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Propuesta" onclick="contenidos(\'clientes_editapropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-edit fa-sm"></i></a>'
                                   . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Visualizar Propuesta" onclick="generaPDF(\''.$propuesta->id.'\',\''.$propuesta->propuestaIDTY.'.pdf\')" class="mr-2"><i class="fa fa-file-pdf fa-sm"></i></a>'
                                   . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Enviar Propuesta" onclick="contenidos(\'clientes_enviaPropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-paper-plane fa-sm"></i></a>'
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
          //$propuesta->propuestaIDTY   = $request->propuesta_identificador;
          $propuesta->propuestaIDTY   = '';
          $propuesta->ejecutivoID     = Auth::user()->id;
          $propuesta->clienteID       = $request->clienteID;
          $propuesta->contactoID      = $request->propuesta_contactos;
          $propuesta->fechaCreacion   = date( 'Y-m-d H:i:s' );
          $propuesta->fechaVigencia   = $request->propuesta_fechaVigencia;
          $propuesta->observaciones   = $request->propuesta_observaciones;
          $propuesta->requerimientos  = $request->propuesta_requerimientos;
          $propuesta->categoria       = $request->catalogo_18;
          //$propuesta->formaPago      = $request->catalogo_15;
          $propuesta->monto           = $request->propuesta_monto;
          $propuesta->total           = $request->propuesta_total;
          $propuesta->descuento       = $request->propuesta_descuento;
          $propuesta->promocion       = $request->propuesta_promocion;
          $propuesta->estadoPropuesta = 0;
          $propuesta->status          = 1;

          if( $propuesta->save() ) {
              $detalle = new PropuestasDetalle();
              $detalle->idPropuesta = $propuesta->id;
              $detalle->idProducto  = $request->productoID;
              $detalle->cantidad    = $request->propuesta_cantidad;
              $detalle->unitario    = $request->propuesta_precio;
              $detalle->comentarios = $request->propuesta_observaciones_producto;
              $detalle->descuento   = "0.00";
              $detalle->promocion   = "0";
              $detalle->status      = "1";
              $detalle->save();

              // Actualiza IDTY de la propuesta
              $propUpdate = Propuestas::find( $propuesta->id );
              $propUpdate->propuestaIDTY = str_replace( '{autoincremento}' , $propuesta->id , str_replace( '{valorcategoria}' , Utils::valorCatalogo( $request->catalogo_18 ) , $request->propuesta_identificador ) );
              $propUpdate->save();

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
          $propuesta->clienteID       = $request->clienteID;
          $propuesta->contactoID      = $request->propuesta_contactos;
          $propuesta->observaciones   = $request->propuesta_observaciones;
          $propuesta->requerimientos  = $request->propuesta_requerimientos;
          $propuesta->categoria       = $request->catalogo_18;
          //$propuesta->formaPago      = $request->catalogo_15;
          $propuesta->monto           = $request->propuesta_monto;
          $propuesta->total           = $request->propuesta_total;
          $propuesta->descuento       = $request->propuesta_descuento;
          $propuesta->promocion       = $request->propuesta_promocion;
          $propuesta->fechaVigencia   = $request->propuesta_fechaVigencia;
          //$propuesta->propuestaIDTY   = $request->propuesta_identificador;
          $propuesta->estadoPropuesta = 0;

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
       public function datosPropuesta( $propuestaID , $modo = '') {
          $datos     = array();
          $propuesta = Propuestas::find( $propuestaID );

          $datos = array (
              'id'             => $propuesta->id,
              'propuestaIDTY'  => $propuesta->propuestaIDTY,
              'ejecutivo'      => $propuesta->ejecutivoID,
              'ejecutivoTxt'   => Utils::nombreEjecutivo( $propuesta->ejecutivoID ),
              'cliente'        => $propuesta->clienteID,
              'contacto'       => $propuesta->contactoID,
              'contactoTxt'    => Utils::nombreContacto( $propuesta->contactoID ),
              'fechaCreacion'  => Utils::formatoFecha( $propuesta->fechaCreacion ),
              'fechaVigencia'  => Utils::formatoFecha( $propuesta->fechaVigencia ),
              'fechaEnvio'     => Utils::formatoFecha( $propuesta->fechaEnvio ),
              'observaciones'  => $propuesta->observaciones,
              'requerimientos' => $propuesta->requerimientos,
              'formaPago'      => $propuesta->formaPago,
              'categoria'      => $propuesta->categoria,
              'monto'          => $propuesta->monto,
              'total'          => $propuesta->total,
              'descuento'      => $propuesta->descuento,
              'promocion'      => $propuesta->promocion,
              'estado'         => ( ( $propuesta->estadoPropuesta == 0 ) ? 'Sin enviar' : 'Enviado'  ),
              'pagoPropuesta'  => ( ( $propuesta->pagoPropuesta == 0 ) ? 'No pagada' : (  $propuesta->pagoPropuesta == 1 ) ? 'Parcial' : 'Pagada'  ),
              'status'         => ( ( $propuesta->status == 0 ? 'Deshabilitada' : 'Habilitada' ) )
          );

          $productos = PropuestasDetalle::where( 'idPropuesta' , $propuesta->id )
                                        ->where( 'status' , '1' )
                                        ->get();

          foreach( $productos AS $producto ) {
              $productoDetalle = Utils::datosProducto( $producto->idProducto );
              $datos[ 'detalle' ][] = array(
                'productoID'  => $producto->idProducto,
                'productoTxt' => Utils::nombreProducto( $producto->idProducto ),
                'grupoID'     => $productoDetalle[ 'grupo' ],
                'comentarios' => $producto->comentarios,
                'cantidad'    => $producto->cantidad,
                'unitario'    => $producto->unitario,
                'descuento'   => $producto->descuento,
                'estatus'     => $producto->status,
                'promocion'   => $producto->promocion
              );
          }

          $datos[ 'condiciones' ] = Utils::detallePredefinido( 2 )->valor;

          if( $modo == 'arreglo' ) {
              return $datos;
          } else {
              return response()->json( $datos );
          }
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
           $datos  = $this->datosPropuesta( $propuestaID , 'arreglo' );
           $pdf = \PDF::loadView( 'crmmex.pdf.propuesta' , compact( 'datos' ) );
           return $pdf->download( 'PropuestaComercial.pdf' );
         }

         /*
          * Genera preview identificador de la propuesta
          */
          public function generaIdPropuesta() {
              $predefinido = Utils::detallePredefinido( 1 );
              $elementos = explode( '_' , $predefinido->valor );
              $val = '';

              switch( $elementos[ 1 ] ) {
                  case 'inicialesEjecutivo':
                    $name  = ucwords( Auth::user()->name );
                    $appat = ucwords( Auth::user()->apPat );
                    $apmat = ucwords( Auth::user()->apMat );
                    $val   = substr( $name , 0 , 1 ).substr( $appat , 0 , 1 ).substr( $apmat , 0 , 1 );
                  break;
                  case 'fechaCreacion'     :
                    $val = date( 'Ymd' );
                  break;
                  case 'categoria'         :
                    $val = '{valorcategoria}';
                  break;
              }

              return $elementos[ 0 ].'_'.$val.'_{autoincremento}';
          }

          /*
           * Metodo para enviar una propuesta
           */
           public function enviaPropuesta( $propuestaID ) {
              $envio = false;
              $datos = $this->datosPropuesta( $propuestaID );


              if( $envio ) {
                  $propuesta = Propuestas::find( $propuestaID );
                  $propuesta->estadoPropuesta = 1;
                  $propuesta->save();
              }
           }

}
