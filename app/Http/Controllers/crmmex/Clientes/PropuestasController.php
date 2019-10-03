<?php
/*
 * Controlador para funciones de listado de propuestas
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Productos\Productos AS Productos;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\PropuestasDetalle AS PropuestasDetalle;
use App\Models\crmmex\Clientes\Pagos AS Pagos;
use App\Models\crmmex\Sistema\ImgPropuesta AS ImgPropuesta;

use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;
use App\Http\Controllers\crmmex\Sistema\PHPMailerController AS Envio;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropuestasController extends Controller
{

   /*
    * Metodo que obtiene el listado de
    * propuestas de un cliente en particular
    */
    public function listadoPropuestas( $clienteID ) {
      $datos                 = array();
      $datos[ 'propuestas' ] = array();
      $propuestas = Propuestas::where( 'status' , 1 )
                              ->where( 'clienteID' , $clienteID )
                              ->when( Auth::user()->rol != 1 , function( $q ){
                                return $q->where( 'ejecutivoID' , Auth::user()->id );
                              })
                              ->get();

      foreach( $propuestas AS $propuesta ) {
        $datos[ 'propuestas' ][] = array (
          'id'              => $propuesta->id,
          'propuestaIDTY'   => $propuesta->propuestaIDTY,
          'ejecutivoID'     => Utils::nombreEjecutivo( $propuesta->ejecutivoID ),
          'clienteID'       => Utils::nombreCliente( $propuesta->clienteID ),
          'contactoID'      => Utils::nombreContacto( $propuesta->contactoID , false ),
          'categoria'       => Utils::valorCatalogo( $propuesta->categoria ),
          'fechaCreacion'   => $propuesta->fechaCreacion,
          'fechaVigencia'   => $propuesta->fechaVigencia,
          'ordenCompra'     => $propuesta->ordenCompra,
          'fechaEnvio'      => $propuesta->fechaEnvio,
          'observaciones'   => $propuesta->observaciones,
          'requerimientos'  => $propuesta->requerimientos,
          'formaPago'       => $propuesta->formaPago,
          'monto'           => number_format( $propuesta->monto , 2 ),
          'total'           => number_format( $propuesta->total , 2 ),
          'descuento'       => $propuesta->descuento,
          'promocion'       => $propuesta->promocion,
          'estadoPropuesta' => ( ( $propuesta->estadoPropuesta == 0 ) ? 'Sin enviar' : 'Enviado'  ),
          'pagoPropuesta'   => ( ( $this->statusPago( $propuesta->id ) == 0 ) ? 'No pagada' : ( ( $this->statusPago( $propuesta->id ) < $propuesta->total ) ? 'Parcial' : 'Pagada' ) ),
          'status'          => ( ( $propuesta->status == 0 ) ? 'Deshabilitada' : 'Habilitada' ),
          'opciones'        => ( $this->tipoCliente( $propuesta->clienteID ) == 1 ) ?
                              '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Propuesta" onclick="contenidos(\'clientes_editapropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-edit fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Visualizar Propuesta" onclick="generaPDF(\''.$propuesta->id.'\',\''.$propuesta->propuestaIDTY.'.pdf\')" class="mr-2"><i class="fa fa-file-pdf fa-sm"></i></a>'
                             //. '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Enviar Propuesta" onclick="envioPropuesta(\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-paper-plane fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Enviar Propuesta" onclick="contenidos( \'clientes_enviaPropuesta\', \''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-paper-plane fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Agregar Pago" onclick="contenidos(\'clientes_pagos\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-money-bill-wave fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Elimina Propuesta" onclick="contenidos(\'clientes_eliminaPropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-trash fa-sm"></i></a>'
                             :
                               '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Propuesta" onclick="contenidos(\'prospectos_editaPropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-edit fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Visualizar Propuesta" onclick="generaPDF(\''.$propuesta->id.'\',\''.$propuesta->propuestaIDTY.'.pdf\')" class="mr-2"><i class="fa fa-file-pdf fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Enviar Propuesta" onclick="contenidos(\'prospectos_envioPropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-paper-plane fa-sm"></i></a>'
                             . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Elimina Propuesta" onclick="contenidos(\'prospectos_eliminaPropuesta\',\''.$propuesta->id.'\')" class="mr-2"><i class="fa fa-trash fa-sm"></i></a>'
        );
      }
      return response()->json( $datos );
    }

   /*
    * Obtiene el tipo de cliente
    */
    private function tipoCliente( $clienteID ) {
      $cliente = Clientes::find( $clienteID );
      return $cliente->tipo;
    }

   /*
    * Metodo para el alta de una neuva propuesta
    */
    public function altaPropuesta( Request $request ) {
      $resp = array();
      $propuesta = new Propuestas();
      $propuesta->propuestaIDTY   = '';
      $propuesta->ejecutivoID     = Auth::user()->id;
      $propuesta->clienteID       = $request->clienteID;
      $propuesta->contactoID      = $request->propuesta_contactos;
      $propuesta->fechaCreacion   = date( 'Y-m-d H:i:s' );
      $propuesta->fechaVigencia   = $request->propuesta_fechaVigencia;
      $propuesta->ordenCompra     = $request->propuesta_ordenCompra;
      $propuesta->observaciones   = $request->propuesta_observaciones;
      $propuesta->requerimientos  = $request->propuesta_requerimientos;
      $propuesta->categoria       = $request->catalogo_12;
      $propuesta->monto           = $request->propuesta_monto;
      $propuesta->total           = $request->propuesta_total;
      $propuesta->descuento       = $request->propuesta_descuento;
      $propuesta->promocion       = $request->propuesta_promocion;
      $propuesta->pagoPropuesta   = 0;
      $propuesta->estadoPropuesta = 0;
      $propuesta->status          = 1;

      if( $propuesta->save() ) {
        $productos = Session::get( 'carrito' );
        foreach( $productos AS $prod ) {
          $detalle = new PropuestasDetalle();
          $detalle->idPropuesta = $propuesta->id;
          $detalle->idProducto  = $prod[ 'id' ];
          $detalle->comentarios = $prod[ 'comentarios' ];
          $detalle->cantidad    = $prod[ 'cantidad' ];
          $detalle->unitario    = $prod[ 'unitario' ];
          $detalle->descuento   = $prod[ 'descuento' ];
          $detalle->promocion   = $prod[ 'promocion' ];
          $detalle->traslados   = $prod[ 'traslados' ];
          $detalle->retenciones = $prod[ 'retenciones' ];
          $detalle->status      = "1";
          $detalle->save();
        }

        // Actualiza IDTY de la propuesta
        $propUpdate = Propuestas::find( $propuesta->id );
        $propUpdate->propuestaIDTY = str_replace( '{autoincremento}' , $propuesta->id , str_replace( '{valorcategoria}' , Utils::valorCatalogo( $request->catalogo_12 ) , $request->propuesta_identificador ) );
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
      $propuesta->categoria       = $request->catalogo_12;
      $propuesta->monto           = $request->propuesta_monto;
      $propuesta->total           = $request->propuesta_total;
      $propuesta->descuento       = $request->propuesta_descuento;
      $propuesta->promocion       = $request->propuesta_promocion;
      $propuesta->fechaVigencia   = $request->propuesta_fechaVigencia;
      $propuesta->ordenCompra     = $request->propuesta_ordenCompra;
      $propuesta->estadoPropuesta = 0;

      if( $propuesta->save() ) {
        DB::table( 'crmmex_ventas_propuestacomercial_detalle' )->where( [ 'idPropuesta' => $propuestaID , 'status' => 1 ] )->update( [ 'status' => 0 , 'deleted_at' => Carbon::now() ] );
        $productos = Session::get( 'carrito' );
        foreach( $productos AS $prod ) {
          $detalle = new PropuestasDetalle();
          $detalle->idPropuesta = $propuestaID;
          $detalle->idProducto  = $prod[ 'id' ];
          $detalle->comentarios = $prod[ 'comentarios' ];
          $detalle->cantidad    = $prod[ 'cantidad' ];
          $detalle->unitario    = $prod[ 'unitario' ];
          $detalle->descuento   = $prod[ 'descuento' ];
          $detalle->promocion   = $prod[ 'promocion' ];
          $detalle->traslados   = $prod[ 'traslados' ];
          $detalle->retenciones = $prod[ 'retenciones' ];
          $detalle->status      = "1";
          $detalle->save();
        }
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
    public function datosPropuesta( $propuestaID , $modo = '' , $esEnvio=false) {
      $datos     = array();
      $propuesta = Propuestas::find( $propuestaID );

      $datos = array (
        'id'               => $propuesta->id,
        'propuestaIDTY'    => $propuesta->propuestaIDTY,
        'ejecutivo'        => $propuesta->ejecutivoID,
        'ejecutivoTxt'     => Utils::nombreEjecutivo( $propuesta->ejecutivoID ),
        'cliente'          => $propuesta->clienteID,
        'contacto'         => $propuesta->contactoID,
        'contactoTxt'      => Utils::nombreContacto( $propuesta->contactoID , false ),
        'contactoTxtEnvio' => Utils::nombreContacto( $propuesta->contactoID ),
        'fechaCreacion'    => Utils::formatoFecha( $propuesta->fechaCreacion , false ),
        'fechaVigencia'    => Utils::formatoFecha( $propuesta->fechaVigencia ),
        'ordenCompra'      => $propuesta->ordenCompra,
        'fechaEnvio'       => Utils::formatoFecha($propuesta->fechaEnvio),
        'observaciones'    => $propuesta->observaciones,
        'requerimientos'   => $propuesta->requerimientos,
        'formaPago'        => $propuesta->formaPago,
        'categoria'        => Utils::valorCatalogo( $propuesta->categoria ),
        'categoriaID'        => $propuesta->categoria,
        'monto'            => $propuesta->monto,
        'total'            => $propuesta->total,
        'descuento'        => $propuesta->descuento,
        'promocion'        => $propuesta->promocion,
        'estado'           => ( ( $propuesta->estadoPropuesta == 0 ) ? 'Sin enviar' : 'Enviado'  ),
        'pagoPropuesta'    => ( ( $this->statusPago( $propuesta->id ) == 0 ) ? 'No pagada' : ( ( $this->statusPago( $propuesta->id ) < $propuesta->total ) ? 'Parcial' : 'Pagada' ) ),
        'footer'           => Utils::datosPropietario(),
        'status'           => ( ( $propuesta->status == 0 ? 'Deshabilitada' : 'Habilitada' ) )
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
          'traslados'   => $producto->traslados,
          'retenciones' => $producto->retenciones,
          'descuento'   => $producto->descuento,
          'estatus'     => $producto->status,
          'divisa'      => Utils::divisaProducto( $producto->idProducto ),
          'promocion'   => $producto->promocion
        );
      }
      $datos[ 'condiciones' ] = Utils::detallePredefinido( 2 )->valor;
      $datos[ 'disclaimer' ]  = Utils::detallePredefinido( 5 )->valor;
      $datos[ 'usaFirma' ]    = $this->usaFirmaDigitalizada();

      if( $modo == 'arreglo' ) {
        return $datos;
      } else {
        return response()->json( $datos );
      }
    }

   /*
    * Estatus de pago de la propuesta
    */
    public function statusPago( $propuestaID ) {
      $monto  = 0;
      $pagos = Pagos::where( 'propuestaID' , $propuestaID )
                    ->where( 'status' , 1 )
                    ->get();

      foreach( $pagos AS $pago ) {
          $monto = $monto + $pago->monto;
      }
      return $monto;
    }

   /*
    * Elimina un registro a traves de su ID
    */
    public function eliminaPropuesta( $propuestaID ) {
      $propuesta = Propuestas::find( $propuestaID );
      $propuesta->status = 3;
      $propuesta->save();
    }

  /*
   * Metodo que genera el PDF de la propuesta
   */
    public function generaPDF( $propuestaID , $envio = false ) {
      $datos = $this->datosPropuesta( $propuestaID , 'arreglo' );
      $pdf   = \PDF::loadView( 'crmmex.pdf.propuesta' , compact( 'datos' ) );
      if( $envio ) {
          return $pdf->output();
        } else {
          return $pdf->download( 'PropuestaComercial.pdf' );
      }
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
        case 'grupo'         :
            $val = '{valorcategoria}';
          break;
      }
      return $elementos[ 0 ].'_'.$val.'_{autoincremento}';
    }

   /*
    * Metodo que lleva el control del carrito para la propuesta
    */
    public function carrito( Request $request ) {
      if( !Session::has( 'carrito' ) || Session::get( 'carrito' ) == null ) {
          Session::put( 'carrito' , [] );
      } else {}

      $datos = array(
        'id'          => $request->propuestaProducto_productoID,
        'comentarios' => $request->propuestaProducto_observaciones,
        'cantidad'    => $request->propuestaProducto_cantidad,
        'unitario'    => $request->propuestaProducto_precio,
        'descuento'   => $request->propuestaProducto_descuento,
        'promocion'   => $request->propuestaProducto_promocion,
        'traslados'   => $request->propuestaProducto_traslados,
        'retenciones' => $request->propuestaProducto_retencion
      );

      Session::push( 'carrito' , $datos );
      Session::save();
      $totales = array(
        'subtotal'    => 0,
        'traslados'   => 0,
        'retenciones' => 0,
        'total'       => 0
      );

      $productos = Session::get( 'carrito' );
      foreach( $productos AS $v) {
        $importe = $v[ 'cantidad' ] * $v[ 'unitario' ];
        $totales[ 'subtotal' ]    = $totales[ 'subtotal' ] + $importe;

        $montoTraslados = number_format( ( $v[ 'traslados' ] / 100 ) * $importe , 2 , '.' , '' );
        $totales[ 'traslados' ]   = $totales[ 'traslados' ] + $montoTraslados;

        $montoRetenciones = number_format( ( $v[ 'retenciones' ] / 100 ) * $importe , 2 , '.' , '' );
        $totales[ 'retenciones' ] = $totales[ 'retenciones' ] + $montoRetenciones;

        $totales[ 'total' ] = $totales[ 'subtotal' ] + $totales[ 'traslados' ] - $totales[ 'retenciones' ];
      }

      return response()->json( $totales );
    }

   /*
    * Carga variable de sesion para editar propuesta
    */
    public function cargaCarrito( $propuestaID ) {
      Session::forget( 'carrito' );
      Session::flush();
      $productos = PropuestasDetalle::where( 'idPropuesta' , $propuestaID )
                                    ->where( 'status' , "1" )
                                    ->get();
      Session::get( 'carrito' );
      foreach( $productos AS $producto ) {
        $prod = array(
          'id'          => $producto->idProducto,
          'comentarios' => $producto->comentarios,
          'cantidad'    => $producto->cantidad,
          'unitario'    => $producto->unitario,
          'descuento'   => $producto->descuento,
          'promocion'   => $producto->promocion,
          'traslados'   => $producto->traslados,
          'retenciones' => $producto->retenciones
        );
        Session::push( 'carrito' , $prod );
        Session::save();
      }
    }

   /*
    * Elimina elemento del carrito
    */
    public function eliminaElementoCarrito( $productoID ) {
      $productos = Session::get( 'carrito' );
      $indice    = 0;
      foreach( $productos AS $producto ) {
          if( $producto[ 'id' ] == $productoID ){
              unset( $productos[ $indice ] );
          } else {
              $indice ++;
          }
      }
      Session::put( 'carrito' , $productos );
      Session::save();

      $totales = array(
          'subtotal'    => 0,
          'traslados'   => 0,
          'retenciones' => 0,
          'total'       => 0
      );

      $prods = Session::get( 'carrito' );
      foreach( $prods AS $v) {
          $importe = $v[ 'cantidad' ] * $v[ 'unitario' ];
          $totales[ 'subtotal' ]    = $totales[ 'subtotal' ] + $importe;

          $montoTraslados = number_format( ( $v[ 'traslados' ] / 100 ) * $importe , 2 , '.' , '' );
          $totales[ 'traslados' ]   = $totales[ 'traslados' ] + $montoTraslados;

          $montoRetenciones = number_format( ( $v[ 'retenciones' ] / 100 ) * $importe , 2 , '.' , '' );
          $totales[ 'retenciones' ] = $totales[ 'retenciones' ] + $montoRetenciones;

          $totales[ 'total' ] = $totales[ 'subtotal' ] + $totales[ 'traslados' ] - $totales[ 'retenciones' ];
      }
      return response()->json( $totales );
    }

  /*
   * Elimina carrito
   */
    public function eliminaCarrito() {
      Session::forget( 'carrito' );
      Session::put( 'carrito' , [] );
      Session::save();
    }

   /*
    * Envio de la propuesta
    */
    public function enviaPropuesta( $propuestaID , Request $request ) {
      $enviado = Propuestas::find( $propuestaID );
      $enviado->estadoPropuesta = 1;
      $enviado->fechaEnvio      = date( 'Y-m-d H:i:s' );
      $enviado->save();

      $datos   = $this->datosPropuesta( $propuestaID , 'arreglo' , true );
      $doc     = $this->generaPDF( $propuestaID , true );
      $adjunto = array();

      $adjunto[] = array(
        'archivo'  => $doc,
        'nombre'   => $datos[ 'propuestaIDTY' ] . '.pdf',
        'encoding' => 'base64',
        'mime'     => 'application/pdf'
      );

      if( $request->hasFile( 'adjuntoDestinatarioEnvioPropuesta' ) ) { // Documento presentacion
        $adjunto[] = array(
          'archivo'  => file_get_contents( $request->file( 'adjuntoDestinatarioEnvioPropuesta' )->getRealPath() ),
          'nombre'   => $request->file( 'adjuntoDestinatarioEnvioPropuesta' )->getClientOriginalName(),
          'encoding' => 'base64',
          'mime'     => $request->file( 'adjuntoDestinatarioEnvioPropuesta' )->getMimeType()
        );
      }

      if( $request->hasFile( 'adjuntoAdicionalDestinatarioEnvioPropuesta' ) ) { // Documento adicional
        $adjunto[] = array(
          'archivo'  => file_get_contents( $request->file( 'adjuntoAdicionalDestinatarioEnvioPropuesta' )->getRealPath() ),
          'nombre'   => $request->file( 'adjuntoAdicionalDestinatarioEnvioPropuesta' )->getClientOriginalName(),
          'encoding' => 'base64',
          'mime'     => $request->file( 'adjuntoAdicionalDestinatarioEnvioPropuesta' )->getMimeType()
        );
      }

      //$destinatarios = array( 'cvreyes@mexagon.net' , 'clam@mexagon.net' );
      $destinatarios = array( 'cvreyes@mexagon.net' );
      $reservadas = array(
        array( 'cliente'        , $datos[ 'contactoTxt' ] ),
        array( 'fechaSolicitud' , $datos[ 'fechaCreacion' ] ),
        array( 'fechaVigencia'  , $datos[ 'fechaVigencia' ] ),
        array( 'propuestaIDTY'  , $datos[ 'propuestaIDTY' ] ),
        array( 'producto'       , $datos[ 'detalle' ][ 0 ][ 'productoTxt' ] )
      );

      $propuesta = Envio::envioPropuesta( $propuestaID , $destinatarios , $reservadas , $adjunto );
      if( Envio::$status ) {
          return response()->json( array( 'Enviado correctamente' ) );
      } else {
          return response()->json( array( 'Error al enviar' ) );
      }
    }

  /*
   * Configura logo para propuesta
   */
    public function logoPropuesta( Request $request ) {
      if( $request->hasFile( 'logotipoPropuesta' ) ) {
        $archivo        = $request->file( 'logotipoPropuesta' );
        $img            = ImgPropuesta::where( 'id' , 1 )->first();
        $img->contenido = file_get_contents( $request->file( 'logotipoPropuesta' )->getRealPath() );
        $img->tipo      = $request->file( 'logotipoPropuesta' )->getMimeType();
        $img->nombreImg = $archivo->getClientOriginalName();
        $img->edicion   = date( 'Y-m-d H:i:s' );
        $img->status    = 1;
        $img->save();
      }

      if( $request->has( 'usaFirmaDigitalizada' ) ) {
        if( $request->hasFile( 'firmaPropuesta' ) ) {
          $archivo2        = $request->file( 'firmaPropuesta' );
          $img2            = ImgPropuesta::where( 'id' , 2 )->first();
          $img2->contenido = file_get_contents( $request->file( 'firmaPropuesta' )->getRealPath() );
          $img2->tipo      = $request->file( 'firmaPropuesta' )->getMimeType();
          $img2->nombreImg = $archivo2->getClientOriginalName();
          $img2->edicion   = date( 'Y-m-d H:i:s' );
          $img2->status    = 1;
          $img2->save();
        }
      } else {
          $img2 = ImgPropuesta::where( 'id' , 2 )->first();
          $img2->contenido = '';
          $img2->tipo      = '';
          $img2->nombreImg = '';
          $img2->edicion   = date( 'Y-m-d H:i:s' );
          $img2->status    = 0;
          $img2->save();
      }

      return response()->json( array( 'logo' => 'ok' , 'firma' => $img2->status ) );
    }

    public function usaFirmaDigitalizada() {
      $status = ImgPropuesta::where( 'id' , 2 )->first();
      return $status->status;
    }

    /*
    * Para visualizar la imagen de la propuesta
    */
    public function imagenParaPropuesta( $id ) {
      $imagen = ImgPropuesta::find( $id );
      return response( $imagen->contenido )->header( 'Content-type' , $imagen->tipo );
    }

}
