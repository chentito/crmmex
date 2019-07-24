<?php
/*******************************************************************************
 * Controlador ejecuta los proceso necesarios para la configuracion y ejecucion
 * de pipeline
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 ******************************************************************************/
namespace App\Http\Controllers\crmmex\Pipeline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $datos[ 'indicadores' ][] = array (
                'id'                => $indicador->id,
                'nombreIndicador'   => $indicador->nombreIndicador,
                'fechaAlta'         => $indicador->fechaAlta,
                'fechaModificacion' => $indicador->fechaModificacion,
                'fechaEliminacion'  => $indicador->fechaEliminacion,
                'grupoID'           => ( $indicador->grupoID == 0 ) ? 'Todos' : Utils::valorCatalogo( $indicador->grupoID ),
                'status'            => ( $indicador->status == 1 ? 'Activo' : 'Inactivo' ),
                'opciones'          => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Edita Indicador" '
                                     . 'onclick="contenidos(\'configuraciones_edicionPipeline\',\''.$indicador->id.'\')" class="ml-2"><i class="fa fa-edit fa-sm"></i></a>'
                                     . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Elimina Indicador" '
                                     . 'onclick="contenidos(\'configuraciones_eliminaIndicador\',\''.$indicador->id.'\')" class="ml-2"><i class="fa fa-trash fa-sm"></i></a>'
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
                $f->nombreFase  = $fase[ 'valor' ][ 'fase' ];
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

    // Metodo para la actualizacion del inidicador seleccionado
    public function actualizaIndicador( Request $request ) {
        $fases    = json_decode( $request->fases , true );
        $detalles = json_decode( $request->detalles , true );

        $indicador = Indicadores::find( $request->indicadorID );
        $indicador->nombreIndicador   = $request->nuevoIndicdor_nombre;
        $indicador->fechaModificacion = date( 'Y-m-d' );
        $indicador->grupoID           = $request->grupoProductosPerteneceIndicador;

        if( $indicador->save() ) {
            $indices  = array();
            $indicesD = array();

            // Fases
            foreach ( $fases AS $fase ) {
                if( $fase[ 'valor' ][ 'idty' ] == 0 ) {
                    $f = new Fases();
                    $f->indicadorID = $request->indicadorID;
                    $f->nombreFase  = $fase[ 'valor' ][ 'fase' ];
                    $f->status      = 1;
                    $f->save();
                    $indices[]      = $f->id;
                  } else {
                    $f = Fases::find( $fase[ 'valor' ][ 'idty' ] );
                    $f->indicadorID = $request->indicadorID;
                    $f->nombreFase  = $fase[ 'valor' ][ 'fase' ];
                    $f->save();
                    $indices[]      = $fase[ 'valor' ][ 'idty' ];
                }
            }

            DB::table( 'crmmex_pipeline_fases' )
              ->where( 'indicadorID' , $request->indicadorID )
              ->whereNotIn( 'id' , $indices )
              ->update( [ 'status' => 0 ] );

            // Detalles
            foreach ( $detalles AS $detalle ) {
                if( $detalle[ 'valor' ][ 'idty' ] == 0 ) {
                    $d = new Detalles();
                    $d->indicadorID   = $request->indicadorID;
                    $d->faseID        = $this->faseID( $detalle[ 'valor' ][ 'fase' ] , $request->indicadorID );
                    $d->tituloDetalle = $detalle[ 'valor' ][ 'detalle' ];
                    $d->peso          = $detalle[ 'valor' ][ 'peso' ];
                    $d->procesoID     = $detalle[ 'valor' ][ 'proceso' ];
                    $d->status        = 1;
                    $d->save();
                    $indicesD[]       = $d->id;
                } else {
                  $d = Detalles::find( $detalle[ 'valor' ][ 'idty' ] );
                  $d->indicadorID   = $request->indicadorID;
                  $d->faseID        = $this->faseID( $detalle[ 'valor' ][ 'fase' ] , $request->indicadorID );
                  $d->tituloDetalle = $detalle[ 'valor' ][ 'detalle' ];
                  $d->peso          = $detalle[ 'valor' ][ 'peso' ];
                  $d->procesoID     = $detalle[ 'valor' ][ 'proceso' ];
                  $d->save();
                  $indicesD[]       = $detalle[ 'valor' ][ 'idty' ];
                }
            }

            DB::table( 'crmmex_pipeline_detalleindicador' )
              ->where( 'indicadorID' , $request->indicadorID )
              ->whereNotIn( 'id' , $indicesD )
              ->update( [ 'status' => 0 ] );
        }

    }

    // Obtiene el detalle de un indicador por su ID
    public function detalleIndicador( $indicadorID ) {
        $datos = array();
        $ind   = Indicadores::find( $indicadorID );

        $datos[ 'nombreIndicador' ] = $ind->nombreIndicador;
        $datos[ 'grupoID' ]         = $ind->grupoID;

        $fases = Fases::where( 'indicadorID' , $ind->id )
                      ->where( 'status' , 1 )
                      ->get();

        foreach( $fases AS $fase ) {
            $detalles = Detalles::where( 'faseID' , $fase->id )
                                ->where( 'indicadorID' , $ind->id )
                                ->where( 'status' , 1 )
                                ->get();

            foreach( $detalles AS $detalle ) {
                $datos[ 'detalle' ][] = array (
                  'faseID'  => $fase->id,
                  'idty'    => $detalle->id,
                  'fase'    => $fase->nombreFase,
                  'detalle' => $detalle->tituloDetalle,
                  'peso'    => $detalle->peso,
                  'proceso' => $detalle->procesoID
                );
            }
        }

        return response()->json( $datos );
    }

    // Obtiene el identificador de la fase
    private function faseID( $nombreFase , $indicadorID ) {
        $fase = Fases::where( 'nombreFase' , $nombreFase )
                     ->where( 'indicadorID' , $indicadorID )
                     ->first();
       return $fase->id;
    }

    // Obtiene los procesos predefinidos del sistema
    public function obtieneProcesosSistema() {
        $procesos = Procesos::where( 'status' , 1 )->get();
        return response()->json( $procesos );
    }

    // Actualiza las descripciones de los procesos del sistema
    public function actualizaDescripcionProcesos( Request $request ) {
        $procesos = Procesos::where( 'status' , 1 )->get();
        foreach( $procesos AS $proceso ) {
            $update = Procesos::find( $proceso->id );
            $fieldName = 'descripcion_proceso_' . $proceso->id;
            $update->descripcionProceso = $request->$fieldName;
            $update->save();
        }
    }

    // Metodo para eliminar un indicador seleccionado
    public function eliminaIndicador( $indicadorID ) {
        $indicador = Indicadores::find( $indicadorID );
        $indicador->fechaEliminacion = date( 'Y-m-d' );
        $indicador->status = 0;
        $indicador->save();
    }

}
