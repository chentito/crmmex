<?php
/*******************************************************************************
 * Controlador que recorre el analisis de pipeline sobre todos los clientes/prospectos
 * registados, verificando el indicador que el corresponda, si existe uno de uso
 * general, entonces se le da prioridad
 * de pipeline
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 ******************************************************************************/
namespace App\Http\Controllers\crmmex\Reportes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Pipeline\AnalisisPipelineController AS AnalisisPipelineController;

use App\Models\crmmex\Pipeline\Indicadores AS Indicadores;
use App\Models\crmmex\Clientes\Clientes AS Clientes;

class IndicadoresController extends Controller
{
    // Lisado de indicadores disponibles
    public function listadoIndicadores() {
        $datos   = array();
        $usoGral = Indicadores::where( 'status' , 1 )->where( 'grupoID' , 0 )->count();

        if( $usoGral > 0 ) {
            $indicadorUso = Indicadores::where( 'status' , 1 )->where( 'grupoID' , 0 )->first();
            $datos[ 'indicador' ] = $indicadorUso->id;

            $clientes = Clientes::where( 'status' , 1 )->whereIn( 'tipo' , [ 1 , 2 ] )->get();
            foreach( $clientes AS $cliente ) {
                $pipeline = AnalisisPipelineController::getIndicador( 0 , $cliente->id );
                $datos[ $cliente->tipo ][] = $pipeline;
            }

        } else {

        }

        return response()->json( $datos );
    }



}
