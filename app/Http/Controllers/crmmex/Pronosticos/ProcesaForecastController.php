<?php

namespace App\Http\Controllers\crmmex\Pronosticos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Pronosticos\Constantes AS Constantes;
use App\Models\crmmex\Pronosticos\FormulaConfiguracion AS Config;
use App\Models\crmmex\Productos\Historicos AS Historicos;
use FormulaParser\FormulaParser;
use Exception;

class ProcesaForecastController extends Controller
{

  // Calcula forecast de acuerdo a formula
  public function calculaSegunFormula() {
    $configuracion      = Config::find( 1 );
    $metrica            = $configuracion->objetivoCalculo; // Sobre importes, unidades o ambos
    $periodo            = $configuracion->periodo; // Ultimos 3 mese o ultimos 3 periodos
    $periodoTXT         = ( ( $configuracion->periodo == 1 ) ? 'MESES' : 'PERIODOS' );
    $tipoEstadistica    = $configuracion->operacion; // Promedio o mediana
    $tipoEstadisticaTXT = ( ( $configuracion->operacion == 1 ) ? 'PROMEDIO' : 'MEDIANA' );
    $formula            = $configuracion->formula;
    $periodosHist       = 3;

    try {
      $parser = new FormulaParser( $formula , 2 );
      $vars   = array();

      // Constantes
      foreach( $this->obtieneConstantes() AS $constante ) {
        // Tipo 1 es importe, otro caso es tasa, por eso se divide entre 100
        $vars[ $constante->nombre ] = ( ( $constante->tipo == 1 ) ? $constante->valor : ( $constante->valor / 100 ) );
      }

      // Estadistica
      if( strpos( $formula , $tipoEstadisticaTXT. '_' . $periodoTXT ) != false ) {
        $vars[ $tipoEstadisticaTXT. '_' . $periodoTXT . '_' . $periodosHist  ] = $this->obtieneValoresHistoricos( $periodo , $tipoEstadistica , $metrica );
      }

      $parser->setVariables( $vars );
      $result = $parser->getResult(); // [0 => 'done', 1 => 16.38]

    } catch (\Exception $e) {
      echo $e->getMessage(), "\n";
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
    $calculos = array();
    $historicos = Historicos::when( $periodo == 1 , function( $q ) { // Ultimos X meses
                                return $q->whereRaw( DB::raw( "CONCAT(anio,'-',mes)>='" . date( 'Y-j' , strtotime( '- 3 months' ) ) . "'" ) );
                              })
                            ->when( $periodo == 2 , function( $q ) { // Ultimos X periodos
                                $mes  = date( 'j' );
                                $anio = date( 'Y' , strtotime( '- 3 year' ) );
                                return $q->where( 'mes' , $mes )->where( 'anio' , '>=' , $anio );
                              })
                            ->where( [ 'status' => 1 ] )
                            ->get();

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
    $suma  = array_sum( $valores );
    return $suma/$total;
  }

  /* Metodo que calcula la mediana de un universo de valores */
  private function calculaMediana( $valores ) {
    $ordenados = asort( $valores );
    $mitad     = count( $ordenados ) / 2;
    return $ordenados[ $mitad ];
  }

}
