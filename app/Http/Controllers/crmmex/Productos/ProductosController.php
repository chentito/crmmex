<?php
/*
 * Controlador para el manejo y administracion de productos
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Productos;

use App\Models\crmmex\Productos\Productos AS Prod;
use App\Models\crmmex\Productos\Historicos AS Historicos;
Use Exception;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;
use App\Http\Controllers\crmmex\Utils\CamposAdicionalesController AS CamposAdicionales;

class ProductosController extends Controller
{

  //Listado de productos/servicios
  public function listadoProductos() {
    $datos                = array();
    $datos[ 'productos' ] = array();
    $productos = Prod::whereIn( 'status' , array( 2 , 1 ) )->get();

    foreach( $productos AS $producto ) {
      $grupo = Utils::valorCatalogo( $producto->grupo );
      $tipo  = Utils::valorCatalogo( $producto->tipo );
      $productos = array (
        'id'                => $producto->id,
        'clave'             => $producto->clave,
        'tipo'              => ( $tipo == '' ) ? 'Sin tipo' : $tipo ,
        'grupo'             => ( $grupo == '' ) ? 'Sin grupo' : $grupo,
        'nombre'            => $producto->nombre,
        'descripcion'       => $producto->descripcion,
        'periodicidad'      => Utils::valorCatalogo( $producto->periodicidad ),
        'marca'             => $producto->marca,
        'modelo'            => $producto->modelo,
        'precio'            => $this->formatoMoneda( $producto->precio ),
        'impuesto'          => $producto->impuesto,
        'impuestoRetencion' => $producto->impuestoRetencion,
        'divisa'            => $producto->divisa,
        'status'            => ( $producto->status == '1' ? 'Activo' : 'Inactivo' ),
        'opciones'          => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Producto" onclick="contenidos(\'configuraciones_catalogos_editaProducto\',\''.$producto->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
      );

      // Agrega campos adicionales
      $adicionales = CamposAdicionales::obtieneAdicionalesPorRegistro( 3 , $producto->id );
      $datos[ 'productos' ][] = array_merge( $productos , $adicionales );
    }
    return response()->json( $datos );
  }

  /* Metodo que guarda un nuevo producto */
  public function guardaProducto( Request $request ) {
    $producto = new Prod();
    $producto->clave             = $request->confProductos_clave;
    $producto->tipo              = $request->catalogo_9;
    $producto->grupo             = $request->catalogo_12;
    $producto->nombre            = $request->confProductos_nombre;
    $producto->descripcion       = $request->confProductos_descripcion;
    $producto->periodicidad      = $request->catalogo_8;
    //$producto->categoria         = $request->catalogo_13;
    $producto->precio            = $request->confProductos_precio;
    $producto->marca             = $request->confProductos_marca;
    $producto->modelo            = $request->confProductos_modelo;
    if( $request->confProductos_tasaTrasladosOtra != '' ) {
        $producto->impuesto    = $request->confProductos_tasaTrasladosOtra;
      } else {
        $producto->impuesto    = $request->confProductos_tasaTraslados;
    }
    $producto->impuestoRetencion = $request->confProductos_tasaRetencionesOtra;
    $producto->divisa            = $request->catalogo_10;
    $producto->status            = $request->confProductos_status;
    $gProducto                   = $producto->save();

    /* Guarda los campos adicionales asignados al cliente */
    CamposAdicionales::almacenaDatosAdicionales( $request , $producto->id , '3' );
  }

  /* Metodo que actualiza un producto en particular */
  public function actualizaProducto( Request $request ) {
    $productoID = $request->confProductos_id;
    $producto = Prod::find( $productoID );
    $producto->clave        = $request->confProductos_clave;
    $producto->tipo         = $request->catalogo_9;
    $producto->grupo        = $request->catalogo_12;
    $producto->nombre       = $request->confProductos_nombre;
    $producto->descripcion  = $request->confProductos_descripcion;
    $producto->periodicidad = $request->catalogo_8;
    //$producto->categoria    = $request->catalogo_13;
    $producto->precio       = $request->confProductos_precio;
    $producto->marca        = $request->confProductos_marca;
    $producto->modelo       = $request->confProductos_modelo;
    if( $request->confProductos_tasaTrasladosOtra != '' ) {
        $producto->impuesto    = $request->confProductos_tasaTrasladosOtra;
      } else {
        $producto->impuesto    = $request->confProductos_tasaTraslados;
    }
    $producto->impuestoRetencion = $request->confProductos_tasaRetencionesOtra;
    $producto->divisa       = $request->catalogo_10;
    $producto->status       = $request->confProductos_status;
    $gProducto              = $producto->save();

    /* Guarda los campos adicionales asignados al cliente */
    CamposAdicionales::almacenaDatosAdicionales( $request , $producto->id , '3' );
  }

  /* Obtiene los datos de un producto en particular */
  public function obtieneProducto( $productoID ) {
    $producto = Prod::find( $productoID );
    $datos    = array(
      'id'                => $producto->id,
      'clave'             => $producto->clave,
      'tipo'              => $producto->tipo,
      'grupo'             => $producto->grupo,
      'nombre'            => $producto->nombre,
      'descripcion'       => $producto->descripcion,
      'periodicidad'      => $producto->periodicidad,
      //'categoria'         => $producto->categoria,
      'precio'            => $producto->precio,
      'marca'             => $producto->marca,
      'modelo'            => $producto->modelo,
      'impuesto'          => $producto->impuesto,
      'impuestoRetencion' => $producto->impuestoRetencion,
      'divisa'            => $producto->divisa,
      'status'            => $producto->status
    );

    // Busca en datos adicionales
    $adicionales = CamposAdicionales::obtieneDatosAdicionales( '3' , $producto->id );
    foreach( $adicionales AS $adicional ) {
      $datos[ 'adicionales' ][ $adicional->campoAdicionalID ] = $adicional->valor;
      $datos[ 'adicionalesEdicion' ][] = array(
        'id'    => CamposAdicionales::nombreDatoAdicional( $adicional->campoAdicionalID ),
        'valor' => $adicional->valor
      );
    }

    return response()->json( $datos );
  }

  /* Metodo que da formato a las cantidades monetarias */
  public function formatoMoneda( $amount ) {
    if( is_numeric( $amount ) || is_double( $amount ) || is_float( $amount ) ) {
      return '$ ' . number_format( $amount , 2 );
    } else {
      return $amount;
    }
  }

  /* Metodo que carga los historicos de cada producto */
  public function cargaHistoricosProducto( Request $request ) {
    if( $request->file( 'confHistoricosProducto_file' )->isValid() ) {
      // Recorre los elementos del archivo
      $recurso = fopen( $request->confHistoricosProducto_file->path() , 'r' );
      while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          $historicos = new Historicos();
          $historicos->productoID = $request->productoID;
          $historicos->mes        = $datos[ $request->confHistoricosProducto_mes ];
          $historicos->anio       = $datos[ $request->confHistoricosProducto_anio ];
          $historicos->monto      = $datos[ $request->confHistoricosProducto_monto ];
          $historicos->unidades   = $datos[ $request->confHistoricosProducto_unidades ];
          $historicos->status     = 1;
          $historicos->save();
      }
      $msj = array( 'msj' => 'Archivo procesado correctamente' );
    } else {
      $msj = array( 'msj' => 'Error al procesar archivo' );
    }

    return response()->json( $msj );
  }

  /* Metodo que obtiene los datos historicos de un producto */
  public function obtieneHistoricos( $productoID ) {
    $historicos = Historicos::where( 'productoID' , $productoID )
                              ->where( 'status' , 1 )
                              ->orderBy( 'anio' , 'ASC' )
                              ->orderBy( 'mes' , 'ASC' )
                              ->get();
    return response()->json( $historicos );
  }

  /* Metodo que obtiene el promedio de ventas historico */
  public function obtienePromedioHistorico( $productoID , $meses ) {
    $prom       = array();
    $fecha      = date( 'Y-m' , strtotime( '- '.$meses.' months' ) );
    $historicos = Historicos::select( DB::raw( "AVG(monto) AS promedio" ) )
                            ->whereRaw( DB::raw( "productoID = '$productoID' AND status=1 AND STR_TO_DATE( concat( anio , '-' , mes ) , '%Y-%m' ) >= '$fecha'" ) )
                            ->first();

    $prom[ 'promedio' ] = $historicos->promedio;
    return response()->json( $prom );
  }

  /* Carga masiva de productos a través de layout */
  public function cargaMasivaProductos( Request $request ) {
    $resultado = array();
    $linea     = 0;
    if( $request->file( 'layoutProductos' )->isValid() ) {
      // Recorre los elementos del archivo
      $recurso = fopen( $request->layoutProductos->path() , 'r' );
      while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
        if( $linea > 0 ) {
          try{
            if( count( $datos ) != 8 ) {
              $resultado[] = "Linea " . $linea . "|Error en la estructura del renglon.";
            } elseif( $datos[ 0 ] == '' || $datos[ 1 ] == '' || $datos[ 5 ] == '' ) {
              $resultado[] = "Linea " . $linea . "|SKU,Nombre y precio son valores obligatorios, se ha omitido la carga al catalogo.";
            } else {
              $producto = new Prod();
              $producto->clave             = $datos[ 0 ];
              $producto->nombre            = $datos[ 1 ];
              $producto->tipo              = 0;
              $producto->grupo             = 0;
              $producto->descripcion       = $datos[ 4 ];
              $producto->precio            = $datos[ 5 ];
              $producto->marca             = $datos[ 2 ];
              $producto->modelo            = $datos[ 3 ];
              $producto->impuesto          = $datos[ 6 ];
              $producto->impuestoRetencion = $datos[ 7 ];
              $producto->status            = 1;
              $producto->save();
              $resultado[] = "Linea " . $linea . "|SKU " . $datos[ 0 ] . " agregado correctamente al catalogo.";
            }
          } catch( Exception $e ) {
            $error_code = 1062;
            if( $error_code == 1062 ) {
              $resultado[] = "Linea " . $linea . "|SKU " . $datos[ 0 ] . " existente, se ha omitido la carga al catalog.";
            } else {
              $resultado[] = "Linea " . $linea . "|Error en el registro.";
            }
          }
        }
        $linea ++;
      }
    } else {
      $resultado[] = "Error al procesar el archivo, verifique su estructura.";
    }
    return response()->json( $resultado );
  }

}
