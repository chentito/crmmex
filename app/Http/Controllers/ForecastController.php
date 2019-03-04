<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forecast AS Forecast;

class ForecastController extends Controller
{
    //
    public function datosCalculoForecast() {
        $registros      = array();
        $forecast       = new Forecast();
        $ejecutivos     = $forecast->listaEjecutivos();
        $periodoInicial = '01 Feb';
        $periodoFinal   = '28 Feb';
        $vt             = 0;
        $vp             = 0;
        $pr             = 0;
        $tt             = 0;

        foreach( $ejecutivos AS $ejecutivo ) {
            $total       = rand( 1000 , 10000 );
            $vTotales    = rand( 1 , 5 );
            $vPendientes = rand( 1 , 10 );
            $prevision   = rand( 4 , 8 );
            $precioMedio = $total / $vTotales;
            $estimado    = $vPendientes + $prevision;
            $registros[] = array(
                'ejecutivo'        => $ejecutivo->email,
                'ventasTotales'    => $vTotales,
                'montoVentas'      => $total,
                'precioMedio'      => $precioMedio,
                'ventasPendientes' => $vPendientes,
                'prevision'        => $prevision,
                'estimado'         => $estimado,
                'ventaBruta'       => $estimado * $precioMedio
            );
        }

        return view( 'ventas.tablaForecast' , compact( 'registros' , 'periodoInicial' , 'periodoFinal' , 'vt' , 'vp' , 'pr' , 'tt' ) );
    }
}
