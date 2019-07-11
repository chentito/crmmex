<?php
/*
 * Controlador para el proceso de pagos de propuestas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Clientes\Pagos AS Pagos;

class PagosController extends Controller
{
    // Listado de Pagos
    public function listadoPagos( $propuestaID ) {
        $registros = array( 'pagos' );
        $pagos = Pagos::where( 'propuestaID' , $propuestaID )
                      ->where( 'status' , 1 )
                      ->get();

        foreach( $pagos AS $pago ) {
            $registros[ 'pagos' ][] = array(
                'id' => $pago->id,
                'propuestaID' => Utils::propuestaIDTY( $pago->propuestaID ),
                'monto'       => number_format( $pago->monto , 2),
                'banco'       => Utils::valorCatalogo( $pago->banco ),
                'metodoPago'  => Utils::valorCatalogo( $pago->metodoPago ),
                'cuenta'      => $pago->cuenta,
                'fechaPago'   => $pago->fechaPago,
                'status'      => ( ( $pago->status == 1 ) ? 'Activo' : 'Inactivo' ),
                'opciones'    => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Elimina Pago" onclick="eliminaPago(\''.$pago->id.'\')" class="mr-2"><i class="fa fa-trash fa-sm"></i></a>'
            );

        }

        return response()->json( $registros );
    }

    // Agregar pago
    public function altaPago( Request $request ) {
        $pagos = new Pagos();
        $pagos->propuestaID = $request->pagoPropuesta_propuestaID;
        $pagos->monto       = $request->pagoPropuesta_monto;
        $pagos->banco       = $request->catalogo_19;
        $pagos->metodoPago  = $request->catalogo_15;
        $pagos->cuenta      = $request->pagoPropuesta_cuenta;
        $pagos->fechaPago   = $request->pagoPropuesta_fechaPago;
        $pagos->status      = 1;
        $pagos->save();
    }

    // Eliminar un pago
    public function eliminaPago( $pagoID ) {
      $pagos = Pagos::find( $pagoID );
      $pagos->status      = 0;
      $pagos->save();
    }

}
