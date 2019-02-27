<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cartera AS Cartera;

class Clientes extends Controller
{
    public function listadoClientes() {
        $arrClientes = array();
        $clientes = Cartera::where( 'status' , '1' )->get();
        
        foreach( $clientes AS $cliente ) {
            $arrClientes[ 'clientes' ][] = array(
                'id'          => $cliente->id,
                'razonSocial' => $cliente->razonSocial,
                'rfc'         => $cliente->rfc,
                'giro'        => $cliente->giro,
                'ejecutivo'   => $cliente->ejecutivo,
                'fechaAlta'   => $cliente->fechaAlta,
                'id'          => $cliente->id,
                'opciones'    => ''
            );
        }
        
        return response()->json( $arrClientes );
    }
}
