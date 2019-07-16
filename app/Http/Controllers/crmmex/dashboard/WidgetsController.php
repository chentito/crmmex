<?php

namespace App\Http\Controllers\crmmex\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Estadisticas\VentasController AS EstadisticasVentas;

use App\Models\crmmex\dashboard\Widgets AS Widgets;
use App\Models\crmmex\Estadisticas\Pronosticos AS Pronosticos;

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
            case '1': $datos = $this->ObjetivoCumplimiento();break;
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

    // Obtiene el pronostico de un periodo
    public function pronostico( $mes , $anio ) {
        $pronostico = Pronosticos::select( DB::raw( "IFNULL( SUM( monto ) , 0 ) AS pronostico" ) )
                                 ->whereRaw( DB::raw( "mes='" . $mes . "' AND anio='" . $anio . "' AND status=1" ) )
                                 ->first();
        return $pronostico->pronostico;
    }

    // Obtiene la configuracion de un widget
    private function confWidget( $widgetID ) {
        $conf = Widgets::find( $widgetID );
        return $conf->configuracion;
    }
}
