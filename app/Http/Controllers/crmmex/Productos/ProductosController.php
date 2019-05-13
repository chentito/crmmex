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

class ProductosController extends Controller
{
    //Listado de productos/servicios
    public function listadoProductos() {
        $datos = array();
        $productos = Prod::whereIn( 'status' , array( 2 , 1 ) )->get();

        foreach( $productos AS $producto ) {
            $datos[ 'Productos' ][] = array (
              'id'            => $producto->id,
              'clave'         => $producto->clave,
              'tipo'          => $producto->tipo,
              'grupo'         => $producto->grupo,
              'nombre'        => $producto->nombre,
              'descripcion'   => $producto->descripcion,
              'periodicidad'  => $producto->periodicidad,
              'categoria'     => $producto->categoria,
              'precio'        => $this->formatoMoneda( $producto->precio ),
              'impuesto'      => $producto->impuesto,
              'divisa'        => $producto->divisa,
              'status'        => ( $producto->status == '1' ? 'Activo' : 'Inactivo' ),
              'configuracion' => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Producto" onclick="contenidos(\'configuraciones_catalogos_editaProducto\',\''.$producto->id.'\')"><i class="fa fa-edit fa-lg"></i></a>'
            );
        }
        return response()->json( $datos );
    }

    /*
     * Metodo que guarda un nuevo producto
     */
    public function guardaProducto( Request $request ) {
        $producto = new Prod();
        $producto->clave        = $request->confProductos_clave;
        $producto->tipo         = $request->catalogo_9;
        $producto->grupo        = $request->catalogo_12;
        $producto->nombre       = $request->confProductos_nombre;
        $producto->descripcion  = $request->confProductos_descripcion;
        $producto->periodicidad = $request->catalogo_8;
        $producto->categoria    = $request->catalogo_13;
        $producto->precio       = $request->confProductos_precio;
        $producto->impuesto     = $request->catalogo_14;
        $producto->divisa       = $request->catalogo_10;
        $producto->status       = $request->confProductos_status;
        $gProducto              = $producto->save();
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
        $producto->impuesto     = $request->catalogo_14;
        $producto->divisa       = $request->catalogo_10;
        $producto->status       = $request->confProductos_status;
        $gProducto              = $producto->save();
    }

    /*
     * Obtiene los datos de un producto en particular
     */
     public function obtieneProducto( $productoID ) {
          $producto = Prod::find( $productoID );
          $datos    = array(
            'id'           => $producto->id,
            'clave'        => $producto->clave,
            'tipo'         => $producto->tipo,
            'grupo'        => $producto->grupo,
            'nombre'       => $producto->nombre,
            'descripcion'  => $producto->descripcion,
            'periodicidad' => $producto->periodicidad,
            'categoria'    => $producto->categoria,
            'precio'       => $producto->precio,
            'impuesto'     => $producto->impuesto,
            'divisa'       => $producto->divisa,
            'status'       => $producto->status
          );

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
