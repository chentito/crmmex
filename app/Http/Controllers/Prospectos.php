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
                'opciones'    => '<a href="javascript:void(0)" onclick="contenidos(\'prospectos_edicion\',\''.$cliente->id.'\')"><i class="fa fa-edit fa-lg"></i></a>'
                               . '<a href="javascript:void(0)" onclick="contenidos(\'prospectos_seguimiento\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-toolbox fa-lg"></i></a>'
                               . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_propuesta\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-file-alt fa-lg"></i></a>'
            );
        }
        
        return response()->json( $arrClientes );
    }
   
}
