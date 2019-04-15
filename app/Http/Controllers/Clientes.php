<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cartera AS Cartera;

class Clientes extends Controller
{
    /*
     * Regresa el arreglo de prospectos
     */
    public function listadoClientes() {
        $arrClientes = array();
        $clientes = Cartera::where( 'status' , '1' )->where( 'tipo' , '1' )->get();
        
        foreach( $clientes AS $cliente ) {
            $arrClientes[ 'clientes' ][] = array(
                'id'          => $cliente->id,
                'razonSocial' => $cliente->razonSocial,
                'rfc'         => $cliente->rfc,
                'giro'        => $cliente->giro,
                'ejecutivo'   => $cliente->ejecutivo,
                'fechaAlta'   => $cliente->fechaAlta,
                'id'          => $cliente->id,
                'opciones'    => '<a href="javascript:void(0)" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')"><i class="fa fa-edit fa-lg"></i></a>'
                               . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_seguimiento\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-toolbox fa-lg"></i></a>'
                               . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_propuesta\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-file-alt fa-lg"></i></a>'
            );
        }
        
        return response()->json( $arrClientes );
    }
}
