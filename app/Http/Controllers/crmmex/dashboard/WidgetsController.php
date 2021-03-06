<?php
/*
 * Controlador para abastecer los datos de cada widget
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Estadisticas\VentasController AS EstadisticasVentas;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\dashboard\Widgets AS Widgets;
use App\Models\crmmex\dashboard\WidgetsConfig AS WidgetsConfig;
use App\Models\crmmex\Pronosticos\Pronosticos AS Pronosticos;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Pagos AS Pagos;
use App\Models\crmmex\Sistema\Tokens AS Tokens;
use App\User AS User;
use Carbon\Carbon;

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
      case '4': $datos = $this->VentasPorCategoria(); break;
      case '5': $datos = $this->ClientesProspectos(); break;
      case '7': $datos = $this->ResumenVentas(); break;
      case '8': $datos = $this->ultimosAccesos(); break;
    }
    return $datos;
  }

  // Metodo para alimentar el reporte de ventas
  public function ObjetivoCumplimiento() {
    $mesesMostrar = $this->confWidget( 1 );
    $periodos     = EstadisticasVentas::ventasMensuales( false , $mesesMostrar );
    $datos        = array();
    $ingresos     = array();

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
    $mesesMostrar = $this->confWidget( 2 );
    $datos        = array();
    $inicial      = date( 'Y-m' , strtotime( '- ' . $mesesMostrar . ' months' ) );
    $final        = date( 'Y-m' );
    $fechas       = $this->rangoDeFechas( Carbon::parse( $inicial ) , Carbon::parse( $final ) );
    $usuarios     = User::where( 'active' , 1 )->get();
    $iteracion    = 0;

    foreach( $fechas AS $fecha ) {
      $datos[ 'periodos' ][] = $fecha;
    }

    foreach( $usuarios AS $usuario ) {
      $ingresos = $ingresosFecha = array();

      foreach( $datos[ 'periodos' ] AS $fecha ) {
        $pagos = DB::table( 'crmmex_ventas_pagos' )->select( DB::raw( 'IFNULL( SUM(monto) , 0 ) AS montotot' ) )
                   ->whereRaw( DB::raw( 'SUBSTRING( fechaPago , 1 , 7 )="'.$fecha.'"' ) )->where( 'ejecutivoID' , $usuario->id )->first();
        $ingresosFecha[] = $pagos->montotot;
      }

      $ingresos = array( 'nombre'   => $usuario->name . ' ' . $usuario->apPat, 'ingresos' => $ingresosFecha );
      $datos[ 'ejecutivos' ][] = $ingresos;
    }

    return response()->json( $datos );
  }

  private function rangoDeFechas( Carbon $start_date , Carbon $end_date ) {
    $dates = [];

    for($date = $start_date->copy(); $date->lte($end_date); $date->addMonth()) {
      $dates[] = $date->format('Y-m');
    }

    return $dates;
  }

  // Ventas por categiria
  public function VentasPorCategoria() {
    $mesesMostrar = $this->confWidget( 4 );
    $inicial      = date( 'Y-m' , strtotime( '- ' . $mesesMostrar . ' months' ) );
    $datos        = array();
    $registros    = DB::table( "crmmex_ventas_propuestacomercial" )
                    ->select( DB::raw( "crmmex_ventas_propuestacomercial.categoria AS cat, count(*) AS total" ) )
                    ->whereRaw( DB::raw( "crmmex_ventas_propuestacomercial.status=1" ) )
                    ->whereRaw( DB::raw( "substr(crmmex_ventas_propuestacomercial.fechaCreacion,1,7)>='$inicial'" ) )
                    ->whereRaw( DB::raw( "crmmex_ventas_propuestacomercial.total = ( SELECT SUM( monto ) FROM crmmexagon.crmmex_ventas_pagos WHERE crmmex_ventas_pagos.propuestaID=crmmex_ventas_propuestacomercial.id AND crmmex_ventas_pagos.status=1 )" ) )
                    ->groupBy( "crmmex_ventas_propuestacomercial.categoria" )
                    ->get();
    $pagadas = 0;
    foreach( $registros AS $registro ) {
      $pagadas = $pagadas + $registro->total;
    }

    foreach( $registros AS $registro ) {
      $datos[ 'registros' ][] = array(
        'categoria' => Utils::valorCatalogo( $registro->cat ),
        'porciento' => ( ( $registro->total * 100 ) / $pagadas )
      );
    }

    return response()->json( $datos );
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
                            ->groupBy( DB::raw( "substr(fechaAlta,1,7),tipo" ) )->get();

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
    $configWidget = WidgetsConfig::where( [ 'userID' => Auth::user()->id , 'widgetID' => $widgetID ] )->first();
    if( $configWidget ) {
      return $configWidget->configuracion;
    } else {
      $conf = Widgets::find( $widgetID );
      return $conf->configuracion;
    }
  }

  // Metodo para obtener las estadisticas del widget de resumen de ventas
  public function ResumenVentas() {
    $pagos = Pagos::whereYear( 'fechaPago' , '=' , date( 'Y' ) )->where( 'status' , 1 )->get();
    $totalAnio = 0;
    $totalMes  = 0;
    $totalHoy  = 0;

    foreach ( $pagos AS $pago ) {
      $fechaPago = explode( ' ' , $pago->fechaPago );
      $fecha     = explode( '-' , $fechaPago[ 0 ] );
      $totalAnio = $totalAnio + $pago->monto;

      if( $fecha[ 0 ] == date( 'Y' ) && $fecha[ 1 ] == date( 'm' ) ) {
        $totalMes = $totalMes + $pago->monto;
      }

      if( $fecha[ 0 ] == date( 'Y' ) && $fecha[ 1 ] == date( 'm' ) && $fecha[ 2 ] == date( 'd' ) ) {
        $totalHoy = $totalHoy + $pago->monto;
      }
    }

    return response()->json( array( 'totalAnio' => $totalAnio , 'totalMes' => $totalMes , 'totalHoy' => $totalHoy ) );
  }

  // Metodo que muestra los ultimos 20 accesos
  public function ultimosAccesos() {
    $datos  = array();
    $tokens = Tokens::take( 10 )->orderBy( 'created_at' , 'desc' )->get();

    foreach( $tokens AS $token ) {
      $datos[ 'tokens' ][] = array(
        'user_id'    => $token->user_id,
        'name'       => $token->name,
        'created_at' => date( $token->created_at ),
      );
    }

    return response()->json( $datos );
  }

}
