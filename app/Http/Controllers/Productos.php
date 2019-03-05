<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Productos extends Controller
{
    //Listado de productos/servicios
    public function listadoProductos() {
        $productos = array( 'productos' => array(
            array(
                'id'                => 250,
                'nombreProducto'    => 'Paquete de emisión CFDi (50 créditos)',
                'categoriaProducto' => 'Emisión CFDI',
                'periodicidad'      => 'Mensual',
                'tipo'              => 'Servicio',
                'costo'             => $this->formatoMoneda( '400' ),
                'configuracion'     => '<a href="/productos/configuracion/250/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 201,
                'nombreProducto'    => 'Paquete de emisión CFDi (500 créditos)',
                'categoriaProducto' => 'Emisión CFDI',
                'periodicidad'      => 'Mensual',
                'tipo'              => 'Servicio',
                'costo'             => $this->formatoMoneda( '2500' ),
                'configuracion'     => '<a href="/productos/configuracion/201/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 106,
                'nombreProducto'    => 'Desarrollo de Addenda',
                'categoriaProducto' => 'Adicionales CFDi',
                'periodicidad'      => 'Anual',
                'tipo'              => 'Servicio',
                'costo'             => $this->formatoMoneda( '6000' ),
                'configuracion'     => '<a href="/productos/configuracion/106/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 120,
                'nombreProducto'    => 'Lector de codigo de barras',
                'categoriaProducto' => 'Perifericos',
                'periodicidad'      => 'Un solo pago',
                'tipo'              => 'Producto',
                'costo'             => $this->formatoMoneda( '1250' ),
                'configuracion'     => '<a href="/productos/configuracion/120/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 95,
                'nombreProducto'    => 'Desarrollo a la medida',
                'categoriaProducto' => 'Emisión CFDI',
                'periodicidad'      => 'Variable',
                'tipo'              => 'Servicio',
                'costo'             => $this->formatoMoneda( 'Variable' ),
                'configuracion'     => '<a href="/productos/configuracion/95/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 88,
                'nombreProducto'    => 'Lector biométrico',
                'categoriaProducto' => 'Perifericos',
                'periodicidad'      => 'Un solo pago',
                'tipo'              => 'Producto',
                'costo'             => $this->formatoMoneda( '1750' ),
                'configuracion'     => '<a href="/productos/configuracion/88/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 50,
                'nombreProducto'    => 'Servidor DELL Inspiron 2599',
                'categoriaProducto' => 'Servidores',
                'periodicidad'      => 'Variable',
                'tipo'              => 'Producto',
                'costo'             => $this->formatoMoneda( '25900' ),
                'configuracion'     => '<a href="/productos/configuracion/50/"><i class="fas fa-cogs"></i></a>'
            ),
            array(
                'id'                => 6,
                'nombreProducto'    => 'Personalización de factura',
                'categoriaProducto' => 'Adicionales CFDi',
                'periodicidad'      => 'Anual',
                'tipo'              => 'Servicio',
                'costo'             => $this->formatoMoneda( '4500' ),
                'configuracion'     => '<a href="/productos/configuracion/6/"><i class="fas fa-cogs"></i></a>'
            )
        ));
        
        return response()->json( $productos );
    }
    
    public function formatoMoneda( $amount ) {
        if( is_numeric( $amount ) || is_double( $amount ) || is_float( $amount ) ) {
            return '$ ' . number_format( $amount , 2 );
        } else {
            return $amount;
        }
    }
}
