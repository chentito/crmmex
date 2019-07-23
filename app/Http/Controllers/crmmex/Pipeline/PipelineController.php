<?php
/*******************************************************************************
 * Controlador ejecuta los proceso necesarios para la configuracion y ejecucion
 * de pipeline
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 ******************************************************************************/
namespace App\Http\Controllers\crmmex\Pipeline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Pipeline\Detalles AS Detalles;
use App\Models\crmmex\Pipeline\Indicadores AS Indicadores;
use App\Models\crmmex\Pipeline\Fases AS Fases;
use App\Models\crmmex\Pipeline\Procesos AS Procesos;

use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

class PipelineController extends Controller
{

    // Metodo que obtiene el listado de indicadores disponibles
    public function listadoIndicadores() {
        $datos = array();
        $indicadores = Indicadores::where( 'status' , 1 )->get();

        foreach ( $indicadores AS $indicador ) {
            $datos[ 'indicadores' ][] = array(
                'id'                => $indicador->id,
                'nombreIndicador'   => $indicador->nombreIndicador,
                'fechaAlta'         => $indicador->fechaAlta,
                'fechaModificacion' => $indicador->fechaModificacion,
                'fechaEliminacion'  => $indicador->fechaEliminacion,
                'grupoID'           => Utils::valorCatalogo( $indicador->grupoID ),
                'status'            => ( $indicador->status == 1 ? 'Activo' : 'Inactivo' ),
                'opciones'          => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Edita Indicador" onclick="contenidos(\'configuraciones_editaIndicador\',\''.$indicador->id.'\')" class="ml-2"><i class="fa fa-edit fa-sm"></i></a>'
            );
        }

        return response()->json( $datos );
    }

    // Metodo para dar de alta un nuevo indicador
    public function altaIndicador( Request $request ) {
        $fases    = json_decode( $request->fases , true );
        $detalles = json_decode( $request->detalles , true );

        $indicador = new Indicadores();
        $indicador->nombreIndicador = $request->nuevoIndicdor_nombre;
        $indicador->fechaAlta = date( 'Y-m-d' );
        $indicador->grupoID = $request->grupoProductosPerteneceIndicador;
        $indicador->status  = 1;

        if( $indicador->save() ) {
            foreach( $fases AS $fase ) {
                $f = new Fases();
                $f->indicadorID = $indicador->id;
                $f->nombreFase  = $fase[ 'valor' ];
                $f->status      = 1;
                $f->save();
            }

            foreach( $detalles AS $detalle ) {
                $d = new Detalles();
                $d->indicadorID   = $indicador->id;
                $d->faseID        = $this->faseID( $detalle[ 'valor' ][ 'fase' ] , $indicador->id );
                $d->tituloDetalle = $detalle[ 'valor' ][ 'detalle' ];
                $d->peso          = $detalle[ 'valor' ][ 'peso' ];
                $d->procesoID     = $detalle[ 'valor' ][ 'proceso' ];
                $d->status        = 1;
                $d->save();
            }
        }
    }

    private function faseID( $nombreFase , $indicadorID ) {
        $fase = Fases::where( 'nombreFase' , $nombreFase )
                     ->where( 'indicadorID' , $indicadorID )
                     ->first();
       return $fase->id;
    }

    public function obtieneProcesosSistema() {
        $procesos = Procesos::where( 'status' , 1 )->get();
        return response()->json( $procesos );
    }

}
