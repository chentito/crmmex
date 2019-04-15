<?php

namespace App\Http\Controllers\cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cliente\Propuestas AS Propuestas;

class PropuestasController extends Controller
{

    //Listado Propuestas
    public function listadoPropuestas( $cliID='' ) {
        $listadoP   = array();
        $condicion  = ( $cliID != '' ) ? array( ['cartera_id' , $cliID ] , [ 'status' , 1 ] ) : array( [ 'status' , 1 ] );
        $propuestas = Propuestas::where( $condicion )->get();

        foreach( $propuestas AS $propuesta ) {
            $listadoP[ 'propuestas' ][] = array (
                'contacto'      => $propuesta->idContacto,
                'fecha'         => $propuesta->fechaEnvio,
                'observaciones' => $propuesta->observaciones,
                'monto'         => $propuesta->monto,
                'descuento'     => $propuesta->descuento,
                'promocion'     => $propuesta->promocion,
                'opciones'      => ''
            );
        }

        return $listadoP;
    }

}
