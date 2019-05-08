<?php

namespace App\Http\Controllers;

use App\Models\crmmex\Productos\Productos AS Prod;

use Illuminate\Http\Request;

class Productos extends Controller
{
    //Listado de productos/servicios
    public function listadoProductos() {
        $datos = array();
        $productos = Prod::where( 'status' , 1 )->get();

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
              'precio'        => $producto->precio,
              'impuesto'      => $producto->impuesto,
              'divisa'        => $producto->divisa,
              'configuracion' => ''
            );
        }

        return response()->json( $datos );
    }

    public function formatoMoneda( $amount ) {
        if( is_numeric( $amount ) || is_double( $amount ) || is_float( $amount ) ) {
            return '$ ' . number_format( $amount , 2 );
        } else {
            return $amount;
        }
    }

}
