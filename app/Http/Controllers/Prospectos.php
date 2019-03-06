<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cartera AS Cartera;

class Prospectos extends Controller
{
    /*
     * Regresa el arreglo de prospectos
     */
    public function listado() {
        $arrClientes = array();
        $clientes = Cartera::where( 'status' , '1' )->where( 'tipo' , '2' )->get();
        
        foreach( $clientes AS $cliente ) {
            $arrClientes[ 'prospectos' ][] = array(
                'id'          => $cliente->id,
                'razonSocial' => $cliente->razonSocial,
                'rfc'         => $cliente->rfc,
                'giro'        => $cliente->giro,
                'ejecutivo'   => $cliente->ejecutivo,
                'fechaAlta'   => $cliente->fechaAlta,
                'id'          => $cliente->id,
                'opciones'    => '<a href="/prospectos/contactos/'.$cliente->id.'"><i class="fas fa-user"></i></a>'
            );
        }
        
        return response()->json( $arrClientes );
    }
   
}
