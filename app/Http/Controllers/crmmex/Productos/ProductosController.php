<?php
/*
 * Controlador para el manejo y administracion de productos
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Productos;

use App\Models\crmmex\Productos\Productos AS Prod;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;
use App\Http\Controllers\crmmex\Utils\CamposAdicionalesController AS CamposAdicionales;

class ProductosController extends Controller
{
    //Listado de productos/servicios
    public function listadoProductos() {
        $datos = array();
        $productos = Prod::whereIn( 'status' , array( 2 , 1 ) )->get();

        foreach( $productos AS $producto ) {
            $datos[ 'productos' ][] = array (
              'id'                => $producto->id,
              'clave'             => $producto->clave,
              'tipo'              =>  Utils::valorCatalogo( $producto->tipo ),
              'grupo'             =>  Utils::valorCatalogo( $producto->grupo ),
              'nombre'            => $producto->nombre,
              'descripcion'       => $producto->descripcion,
              'periodicidad'      => Utils::valorCatalogo( $producto->periodicidad ),
              'categoria'         => Utils::valorCatalogo( $producto->categoria ),
              'precio'            => $this->formatoMoneda( $producto->precio ),
              'impuesto'          => $producto->impuesto,
              'impuestoRetencion' => $producto->impuestoRetencion,
              'divisa'            => $producto->divisa,
              'status'            => ( $producto->status == '1' ? 'Activo' : 'Inactivo' ),
              'opciones'          => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Producto" onclick="contenidos(\'configuraciones_catalogos_editaProducto\',\''.$producto->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
            );
        }
        return response()->json( $datos );
    }

    /*
     * Metodo que guarda un nuevo producto
     */
    public function guardaProducto( Request $request ) {
        $producto = new Prod();
        $producto->clave             = $request->confProductos_clave;
        $producto->tipo              = $request->catalogo_9;
        $producto->grupo             = $request->catalogo_12;
        $producto->nombre            = $request->confProductos_nombre;
        $producto->descripcion       = $request->confProductos_descripcion;
        $producto->periodicidad      = $request->catalogo_8;
        $producto->categoria         = $request->catalogo_13;
        $producto->precio            = $request->confProductos_precio;
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

    /*
     * Metodo que actualiza un producto en particular
     */
    public function actualizaProducto( Request $request ) {
        $productoID = $request->confProductos_id;
        $producto = Prod::find( $productoID );
        $producto->clave        = $request->confProductos_clave;
        $producto->tipo         = $request->catalogo_9;
        $producto->grupo        = $request->catalogo_12;
        $producto->nombre       = $request->confProductos_nombre;
        $producto->descripcion  = $request->confProductos_descripcion;
        $producto->periodicidad = $request->catalogo_8;
        $producto->categoria    = $request->catalogo_13;
        $producto->precio       = $request->confProductos_precio;
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

    /*
     * Obtiene los datos de un producto en particular
     */
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
            'categoria'         => $producto->categoria,
            'precio'            => $producto->precio,
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

    /*
     * Metodo que da formato a las cantidades monetarias
     */
    public function formatoMoneda( $amount ) {
        if( is_numeric( $amount ) || is_double( $amount ) || is_float( $amount ) ) {
            return '$ ' . number_format( $amount , 2 );
        } else {
            return $amount;
        }
    }

}
