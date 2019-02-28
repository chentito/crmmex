<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas AS Ventas;

class VentasController extends Controller
{
    
    public function propuestas() {
        $arrProp    = array();
        $propuestas = Ventas::all();
        
        foreach( $propuestas AS $propuesta ) {
            $arrProp[ 'propuestas' ][] = array(
                'cliente'       => $propuesta->clientes,
                'contacto'      => $propuesta->idContacto,
                'fechaEnvio'    => $propuesta->fechaEnvio,
                'monto'         => $propuesta->monto,
                'descuento'     => $propuesta->descuento,
                'observaciones' => $propuesta->observaciones,
                'idEjecutivo'   => $propuesta->ejecutivos,
                'status'        => $propuesta->status,
                'opciones'      => ''
            );
        }

        return response()->json( $arrProp );
    }

}
