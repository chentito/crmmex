<?php
/*
 * Controlador para funciones de listado de propuestas
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Productos\Productos AS Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropuestasController extends Controller
{
    /*
     * Metodo que obtiene el listado de
     * propuestas de un cliente en particular
     */
     public function listadoPropuestas( $clienteID ) {
        $datos      = array();
        $propuestas = Propuestas::where( 'status' , 1 )->where( 'clienteID' , $clienteID )->get();

        foreach( $propuestas AS $propuesta ) {
            $datos[ 'propuestas' ][] = array (
                'id'            => $propuesta->id,
                'ejecutivo'     => $propuesta->ejecutivoID,
                'cliente'       => $propuesta->clienteID,
                'contacto'      => $propuesta->contactoID,
                'fechaEnvio'    => $propuesta->fechaEnvio,
                'observaciones' => $propuesta->observaciones,
                'monto'         => $propuesta->monto,
                'descuento'     => $propuesta->descuento,
                'promocion'     => $propuesta->promocion,
                'status'        => $propuesta->status,
                'opciones'      => ''
            );
        }

        return response()->json( $datos );
     }



}
