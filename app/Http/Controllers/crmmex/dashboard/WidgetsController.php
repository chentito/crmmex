<?php
/*
 * Controlador para abastecer los datos de cada widget
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Estadisticas\VentasController AS EstadisticasVentas;

use App\Models\crmmex\dashboard\Widgets AS Widgets;
use App\Models\crmmex\Pronosticos\Pronosticos AS Pronosticos;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Clientes\Clientes AS Clientes;

class WidgetsController extends Controller
{

    public $periodosMes = array(
                                    [ '01' => 'Ene' ],
                                    [ '02' => 'Feb' ],
                                    [ '03' => 'Mar' ],
                                    [ '04' => 'Abr' ],
                                    [ '05' => 'May' ],
                                    [ '06' => 'Jun' ],
                                    [ '07' => 'Jul' ],
                                    [ '08' => 'Ago' ],
                                    [ '09' => 'Sep' ],
                                    [ '10' => 'Oct' ],
                                    [ '11' => 'Nov' ],
                                    [ '12' => 'Dic' ]
                                );

    public function datosWidget( $widgetID ) {
        switch( $widgetID ) {
            case '1': $datos = $this->ObjetivoCumplimiento(); break;
            case '2': $datos = $this->VentasPorEjecutivo(); break;
            case '3': $datos = $this->Propuestas(); break;
            case '4': $datos = $this->Propuestas(); break;
            case '5': $datos = $this->ClientesProspectos(); break;
        }

        return $datos;
    }

  // Metodo para alimentar el reporte de ventas
  public function ObjetivoCumplimiento() {
    $mesesMostrar = $this->confWidget( 1 );
    $periodos     = EstadisticasVentas::ventasMensuales( false , $mesesMostrar );
    $datos        = array();

    foreach( $periodos AS $periodo ) {
      $fechas                    = explode( '-' , $periodo[ 'periodo' ] );
      $datos[ 'categorias' ][]   = $periodo[ 'periodo' ];
      $datos[ 'objetivos' ][]    = $this->pronostico( $fechas[ 1 ] , $fechas[ 0 ] );
      $datos[ 'cumplimiento' ][] = $periodo[ 'monto' ];
    }

    return response()->json( $datos );
  }

    // Metodo para obtener las ventas por ejecutivo
    public function VentasPorEjecutivo() {
        $datos  = array();
        $ventas = DB::table( 'crmmex_ventas_pagos' )
                    ->select( DB::raw( 'SUM(p.monto) AS monto, SUBSTRING(p.fechaPago,1,7) AS periodo, pc.ejecutivoID AS ejecutivo' ) )
                    ->leftJoin( 'crmmex_ventas_propuestacomercial' , 'crmmex_ventas_pagos.propuestaID' , '=' , 'crmmex_ventas_propuestacomercial.id' )
                    ->groupBy( DB::raw( 'pc.ejecutivoID, SUBSTRING(p.fechaPago,1,7)' ) );

        foreach( $ventas AS $venta ) {

        }

        return $datos;
    }

    // Metodo que obtiene el detalle de propuestas
    public function Propuestas() {
        #DB::enableQueryLog();
        $mesesMostrar = $this->confWidget( 3 );
        $fecha        = date( 'Y-m' , strtotime( '-' . $mesesMostrar . ' months' ) );
        $datos[ 'aceptadas' ]  = 0;
        $datos[ 'rechazadas' ] = 0;
        $datos[ 'proceso' ]    = 0;
        $propuestas   = Propuestas::whereRaw( DB::raw( "substr(fechaCreacion,1,7)>='$fecha'" ) )
                                  ->get();
        #$datos[ 'query' ] = DB::getQueryLog();
        foreach( $propuestas AS $propuesta ) {
            if( $propuesta->status == 3 ) {
                  $datos[ 'rechazadas' ] = $datos[ 'rechazadas' ] + 1;
              } else if( $propuesta->status == 1 && $propuesta->estadoPropuesta == 0 ) {
                  $datos[ 'proceso' ] = $datos[ 'proceso' ] + 1;
              } else {
                  $datos[ 'aceptadas' ] = $datos[ 'aceptadas' ] + 1;
            }
        }

        return response()->json( $datos );
    }

  public function ClientesProspectos() {
    $mesesMostrar          = $this->confWidget( 5 );
    $fecha                 = date( 'Y-m' , strtotime( '-' . $mesesMostrar . ' months' ) );
    $datos[ 'periodos' ]   = array();
    $datos[ 'clientes' ]   = array();
    $datos[ 'prospectos' ] = array();
    $totales               = Clientes::select( DB::raw( "COUNT(*) AS total, tipo, substr(fechaAlta,1,7) AS periodo" ) )
                            ->whereRaw( DB::raw( "substr(fechaAlta,1,7)>='$fecha'" ) )
                            ->groupBy( DB::raw( "substr(fechaAlta,1,7),tipo" ) )
                            ->get();

    foreach( $totales AS $total ) {
      if( !in_array( $total->periodo , $datos[ 'periodos' ] ) ) { $datos[ 'periodos' ][]   = $total->periodo; }
      if( $total->tipo == 1 ){
          $datos[ 'clientes' ][]   = $total->total;
        } elseif ( $total->tipo == 2 ) {
          $datos[ 'prospectos' ][] = $total->total;
      }
    }

    return response()->json( $datos );
  }

  // Obtiene el pronostico de un periodo
  public function pronostico( $mes , $anio ) {
    $pronostico = Pronosticos::where( 'mes' , $mes )->where( 'anio' , $anio )->first();
    if( $pronostico ) {
      return $pronostico->importe;
    } else {
      return 0;
    }    
  }

  // Obtiene la configuracion de un widget
  private function confWidget( $widgetID ) {
      $conf = Widgets::find( $widgetID );
      return $conf->configuracion;
  }

}
