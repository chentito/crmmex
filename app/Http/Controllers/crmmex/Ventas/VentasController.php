<?php
/*
 * Controlador para el modulo de ventas
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Ventas;

use App\Models\crmmex\Ventas\Facturas AS Facturas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentasController extends Controller
{
    /*
     * Metodo que obtiene el listado de facturas
     */
     public function listadoFacturas() {
          $datos    = array();
          $facturas = Facturas::where( 'status' , 1 )->get();

          foreach( $facturas AS $factura ) {
            $datos[ 'facturas' ][] = array (
                'facturaID'    => $factura->facturaID,
                'clienteID'    => $factura->clienteID,
                'propuestaID'  => $factura->propuestaID,
                'monto'        => $factura->monto,
                'fechaEmision' => $factura->fechaEmision,
                'status'       => $factura->status,
                'opciones'     => ''
            );
          }

          return response()->json( $datos );
     }

}
