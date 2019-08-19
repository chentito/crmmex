<?php

namespace App\Http\Controllers\crmmex\Pronosticos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Pronosticos\Constantes AS Constantes;
use App\Models\crmmex\Pronosticos\FormulaConfiguracion AS Config;
use App\Models\crmmex\Pronosticos\Pronosticos AS Pronosticos;
use App\Models\crmmex\Productos\Historicos AS Historicos;
use FormulaInterpreter;
use Exception;

class ProcesaForecastController extends Controller
{

  private $mesCalculo;
  private $anioCalculo;

  // Ejecuta el calculo del forecast
  public static function procesaForecast( $anio="" , $mes="" ) {
    self::calculaSegunFormula( $anio="" , $mes="" );
  }

  // Calcula forecast de acuerdo a formula
  public function calculaSegunFormula( $mes="" , $anio="" ) {
    $this->mesCalculo  = $mes;
    $this->anioCalculo = $anio;
    $configuracion      = Config::find( 1 );
    $metrica            = $configuracion->objetivoCalculo; // Sobre importes, unidades o ambos
    $periodo            = $configuracion->periodo; // Ultimos 3 mese o ultimos 3 periodos
    $periodoTXT         = ( ( $configuracion->periodo == 1 ) ? 'MESES' : 'PERIODOS' );
    $tipoEstadistica    = $configuracion->operacion; // Promedio o mediana
    $tipoEstadisticaTXT = ( ( $configuracion->operacion == 1 ) ? 'PROMEDIO' : 'MEDIANA' );
    $formula            = $configuracion->formula;
    $periodosHist       = 3;
    $vars               = array();

    try {
      $compiler   = new FormulaInterpreter\Compiler();
      $executable = $compiler->compile( $formula );

      // Constantes
      foreach( $this->obtieneConstantes() AS $constante ) {
        // Tipo 1 es importe, otro caso es tasa, por eso se divide entre 100
        $vars[ $constante->nombre ] = ( ( $constante->tipo == 1 ) ? $constante->valor : ( 1 + ( $constante->valor / 100 ) ) );
      }

      // Estadistica
      if( strpos( $formula , $tipoEstadisticaTXT. '_' . $periodoTXT ) != false ) {
        $historicos = $this->obtieneValoresHistoricos( $periodo , $tipoEstadistica , $metrica );
        if( $metrica == 1  ) {
          $vars[ $tipoEstadisticaTXT. '_' . $periodoTXT . '_' . $periodosHist  ] = $historicos[ 'importe' ];
          $importe = $executable->run( $vars );
          $unidad  = 0;
        }
        if( $metrica == 2 ) {
          $vars[ $tipoEstadisticaTXT. '_' . $periodoTXT . '_' . $periodosHist  ] = $historicos[ 'unidad' ];
          $importe = 0;
          $unidad  = $executable->run( $vars );
        }
        if( $metrica == 3 ) {
          $vars[ $tipoEstadisticaTXT. '_' . $periodoTXT . '_' . $periodosHist  ] = $historicos[ 'importe' ];
          $importe = $executable->run( $vars );
          $vars[ $tipoEstadisticaTXT. '_' . $periodoTXT . '_' . $periodosHist  ] = $historicos[ 'unidad' ];
          $unidad = $executable->run( $vars );
        }
      } else {
        if( $metrica == 1 ) {
          $importe = $executable->run( $vars );
          $unidad  = 0;
        }
        if( $metrica == 2 ) {
          $importe = 0;
          $unidad  = $executable->run( $vars );
        }
        if( $metrica == 3 ) {
          $importe = $executable->run( $vars );
          $unidad  = $executable->run( $vars );
        }
      }

      $this->guardaPronostico( ( $this->anioCalculo != '' ? $this->anioCalculo : date( 'Y' ) ) , ( $this->mesCalculo != '' ? $this->mesCalculo : date( 'n' ) ) , $importe , $unidad );
      $result = array( [ 'importe' => $importe , 'unidades' => $unidad ] );
    } catch (\Exception $e) {
      $result = array( [ 'maj' => $e->getMessage() , 'vars' => serialize( $vars ) ] );
    }

    return response()->json( $result );
  }

  private function obtieneConstantes(){
    $constantes = Constantes::where( [ 'status' => 1 ] )
                            ->get();
    return $constantes;
  }

  /*
   * Metodo que realiza el calculo estadistico sobre datos historicos de acuerdo
   * a la configuracion del usuario, recibe:
   * @ $periodo si es 1, entonces se trata de los ultimos tres meses, si es 2 se trata de los ultimos periodos
   * @ $tipoEstadistica si es 1, se calcula el promedio, si es 2 se calcula la mediana
   * @ $objetivo si es 1, se calcula sobre importes, si es 2 se calcula sobre unidades, si es 3 se calcula sobre btnDeshaceCambios
   *
   * @return regrersa un arreglo con el total aplicado al periodo y estadisitica correspondiente
   */
  private function obtieneValoresHistoricos( $periodo , $tipoEstadistica , $objetivo ) {
    DB::connection()->enableQueryLog();
    $calculos = array();
    $historicos = Historicos::when( $periodo == 1 , function( $q ) { // Ultimos X meses
                                $fechaLimite = ( ( $this->anioCalculo != '' ) ? $this->anioCalculo : 'Y' ) . '-' . ( ( $this->mesCalculo != '' ) ? $this->mesCalculo : 'n' );
                                return $q->whereRaw( DB::raw( "CONCAT(anio,'-',mes)>='" . date( $fechaLimite , strtotime( '- 3 months' ) ) . "'" ) );
                              })
                            ->when( $periodo == 2 , function( $q ) { // Ultimos X periodos
                                $mes  = ( ( $this->mesCalculo=="" ) ? date( 'n' ) : self::$mesCalculo );
                                $anio = date( 'Y' , strtotime( '- 3 year' ) );
                                return $q->where( 'mes' , $mes )->where( 'anio' , '>=' , $anio );
                              })
                            ->where( 'status' , '1' )
                            ->get();
                            $queries = DB::getQueryLog();
                            Log::warning( $queries );
    $importes = array();
    $unidades = array();
    foreach( $historicos AS $historico ) {
      $importes[] = $historico->monto;
      $unidades[] = $historico->unidades;
    }

    if( $tipoEstadistica == 1 ) { // Promedio
      if( $objetivo == 1 ) {
        $calculos[ 'importe' ] = $this->calculaPromedio( $importes );
      }
      if( $objetivo == 2 ) {
        $calculos[ 'unidad' ]  = $this->calculaPromedio( $unidades );
      }
      if( $objetivo == 3 ) {
        $calculos[ 'importe' ] = $this->calculaPromedio( $importes );
        $calculos[ 'unidad' ]  = $this->calculaPromedio( $unidades );
      }
    }

    if( $tipoEstadistica == 2 ) { // Mediana
      if( $objetivo == 1 ) {
        $calculos[ 'importe' ] = $this->calculaMediana( $importes );
      }
      if( $objetivo == 2 ) {
        $calculos[ 'unidad' ]  = $this->calculaMediana( $unidades );
      }
      if( $objetivo == 3 ) {
        $calculos[ 'importe' ] = $this->calculaMediana( $importes );
        $calculos[ 'unidad' ]  = $this->calculaMediana( $unidades );
      }
    }

    return $calculos;
  }

  /* Metodo que calcula el promedio de un universo de valores */
  private function calculaPromedio( $valores ) {
    $total = count( $valores );
    if( $total == 0 )return "0";
    $suma  = array_sum( $valores );
    return $suma/$total;
  }

  /* Metodo que calcula la mediana de un universo de valores */
  private function calculaMediana( $valores ) {
    $ordenados = asort( $valores );
    $mitad     = count( $ordenados ) / 2;
    return $ordenados[ $mitad ];
  }

  /* Metodo que guarda el pronostico calculado */
  private function guardaPronostico( $anio , $mes , $importe , $unidades ) {
    //DB::connection()->enableQueryLog();
    $pronosticos = Pronosticos::updateOrCreate(
      [ 'mes' => $mes , 'anio' => $anio , 'status' => 1 ],
      [ 'importe' => $importe , 'cantidad' => $unidades  ]
    );
    //$queries = DB::getQueryLog();
    //Log::warning( $queries );
  }

}
