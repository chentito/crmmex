<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeguimientosController extends Controller
{
    // listado de seguimientos
    public function listadoSeguimientos() {
        $arrSeguimientos = array();
        $arrSeguimientos[ 'seguimientos' ] = array(
            
            array(
                'cliente'   => 'Cisco Systems LTD',
                'contacto'  => 'Carlos Reyes',
                'actividad' => 'Reunión para revisión de propuesta comercial',
                'estado'    => 'Pendiente',
                'fechaAlta' => '2019-02-11',
                'fechaFin'  => '',
                'opciones'  => ''
            ),
            array(
                'cliente'   => 'Sabritas SA de CV',
                'contacto'  => 'José Gutiérrez',
                'actividad' => 'Envío de propuesta comercial y de catálogo de productos',
                'estado'    => 'Concluido',
                'fechaAlta' => '2019-02-15',
                'fechaFin'  => '2019-02-16',
                'opciones'  => ''
            ),
            array(
                'cliente'   => 'Mexagon SA de CV',
                'contacto'  => 'Carlos Lam',
                'actividad' => 'Curso inductivo para la emisión de Recepción de Pago',
                'estado'    => 'Pendiente',
                'fechaAlta' => '2019-02-20',
                'fechaFin'  => '',
                'opciones'  => ''
            ),
            array(
                'cliente'   => 'Uniformes Escolares SA',
                'contacto'  => 'Carlos Reyes',
                'actividad' => 'Renovación de servicio, envío de una nueva propuesta comercial',
                'estado'    => 'Concluido',
                'fechaAlta' => '2019-02-28',
                'fechaFin'  => '2019-03-03',
                'opciones'  => ''
            )
            
            
        );
        
        return response()->json( $arrSeguimientos );
    }

}
