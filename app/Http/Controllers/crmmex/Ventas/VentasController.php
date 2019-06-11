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

use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

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
                'clienteID'    => Utils::nombreCliente( $factura->clienteID ),
                'propuestaID'  => $factura->propuestaID,
                'monto'        => number_format( $factura->monto , 2 ),
                'fechaEmision' => $factura->fechaEmision,
                //'banco'        => $factura->banco,
                'banco'        => 'Santander',
                'formaPago'    => 'Transferencia Interbancaria',
                'status'       => ( ( $factura->status == 1 ) ? 'Activa' : 'Cancelada' ),
                'opciones'     => '<a href="javascript:void(0)" title="Registrar Pago" class="ml-1"><i class="fa fa-sm fa-money-bill"></i></a>'
            );
          }

          return response()->json( $datos );
     }

}
