<?php
/*
 * Controlador para obtener las estadísticas de ventas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Estadisticas;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Estadisticas\Ventas AS Ventas;
use App\Models\crmmex\Productos\Historicos AS Historicos;

class VentasController extends Controller
{
  // Ventas mensuales
  public static function ventasMensuales( $json=false , $meses = '12' ) {
    $ventas = array();
    $fecha  = date( 'Y-m' , strtotime( '- '.$meses. ' months' ) ) ;
    $ventasMensuales = Ventas::select  ( DB::raw( "sum(monto) as monto , substr(fechaPago,1,7) AS periodo" ) )
                             ->whereRaw( DB::raw( "status=1 AND substr(fechaPago,1,7)>'$fecha'" ) )
                             ->groupBy ( DB::raw( "substr(fechaPago,1,7)" ) )->get();

    foreach( $ventasMensuales AS $ventasMes ) {
      $ventas[] = array(
        'periodo' => $ventasMes->periodo,
        'monto'   => $ventasMes->monto
      );
    }

    if( $json ) return response()->json( $ventas );
    else return $ventas;
  }

}
