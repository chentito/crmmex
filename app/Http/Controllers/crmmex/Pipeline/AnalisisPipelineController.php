<?php
/*******************************************************************************
 * Controlador que realiza el analisis de pipeline de un cliente de acuerdo
 * al grupo del producto de su interes, si existen indicadores de uso general
 * se le da prioridad
 * de pipeline
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 ******************************************************************************/
namespace App\Http\Controllers\crmmex\Pipeline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Clientes\Clientes AS Cliente;
use App\Models\crmmex\Productos\Productos AS Producto;
use App\Models\crmmex\Pipeline\Detalles AS Detalles;
use App\Models\crmmex\Pipeline\Indicadores AS Indicadores;
use App\Models\crmmex\Pipeline\Fases AS Fases;
use App\Models\crmmex\Pipeline\Procesos AS Procesos;
use App\Models\crmmex\Clientes\Seguimiento AS Seguimiento;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;

class AnalisisPipelineController extends Controller
{
  // Metodo que genera el analisis pipeline de cada cliente/prospecto
  public function analisisPiepeline( $clienteID ) {
    $indicadores                  = array();
    $indicadores[ 'indicadores' ] = array();
    $propuestas = Propuestas::where( 'clienteID' , $clienteID )
                            ->where( 'status' , 1 )
                            ->get();

    foreach( $propuestas AS $propuesta ) {
      $categoriaPropuesta = $propuesta->categoria;
      $indicadores[ 'indicadores' ][] = array(
        'id'       => $propuesta->id,
        'idty'     => $propuesta->propuestaIDTY,
        'pipeline' => self::getIndicador( $categoriaPropuesta , $clienteID , $propuesta->id )
      );
    }

    return response()->json( $indicadores );
  }

  // Obtiene el indicador correspondiente
  public static function getIndicador( $grupo , $clienteID , $propuestaID ) {
    $pipeline  = array();
    // Verifica si hay un indicador del grupo de la propuesta
    $indGpo = Indicadores::where( 'grupoID' , $grupo )->where( 'status' , 1 )->count();
    if( $indGpo > 0 ){
      $indicador = Indicadores::where( 'grupoID' , $grupo )->where( 'status' , 1 )->first();
    } else {
      $propGral  = Indicadores::where( 'grupoID' , '0' )->where( 'status' , 1 )->count();
      if( $propGral > 0 ) {
        $indicador  = Indicadores::where( 'grupoID' , '0' )->where( 'status' , 1 )->first();
      } else {
        $indicador = false;
      }
    }

    if( $indicador ) {
        $fases = Fases::where( 'indicadorID' , $indicador->id )->where( 'status' , 1 )
                    ->orderBy( 'id' , 'ASC' )->get();
        $detalles = Detalles::where( 'indicadorID' , $indicador->id )->where( 'status' , 1 )->get();
        foreach( $detalles AS $detalle ) {
            $pipeline[ 'detalles' ][] = array (
              'detalleID'     => $detalle->id,
              'indicadorID'   => $indicador->id,
              'faseID'        => $detalle->faseID,
              'tituloDetalle' => $detalle->tituloDetalle,
              'peso'          => $detalle->peso,
              'estado'        => self::estadoProceso( $detalle->procesoID , $clienteID ),
              'descripcion'   => self::descripcionEstado( $detalle->procesoID ),
              'procesoID'     => $detalle->procesoID
            );
        }

        return $pipeline;
      } else {
        return array();
    }
  }

  // Obtiene el grupo de producto de interes del prospectos_listado
  private static function getGrupo( $productoID ) {
    $producto = Producto::find( $productoID );
    return $producto->grupo;
  }

  // Obtiene el estado de ejecución de algun proceso dentro de la
  // plataforma para un prospecto/cliente en particular
  private static function estadoProceso( $procesoID , $clienteID ) {
    switch( $procesoID ) {
      case '1':return true; break;
      case '2':return ( Seguimiento::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->count() > 0 ) ? true : false; break;
      case '3':return ( Propuestas::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->count() > 0 ) ? true : false; break;
      case '4':return ( Propuestas::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->where( 'fechaEnvio' , '!=' , '0000-00-00 00:00:00' )->count() > 0 ) ? true : false; break;
      case '5':
                $prop         = Propuestas::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->first();
                $fecEnvProp   = $prop->fechaEnvio;
                $seguimientos = Seguimiento::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->where( 'fechaEjecucion' , '>' , $fecEnvProp )->count();
                return ( $seguimientos > 0 ) ? true : false;
                break;
      case '6':
                $pagos = DB::table( 'crmmex_ventas_pagos' )
                           ->select( DB::raw( "COUNT(*) AS total" ) )
                           ->leftJoin( 'crmmex_ventas_propuestacomercial' , 'crmmex_ventas_pagos.propuestaID' , '=' , 'crmmex_ventas_propuestacomercial.id' )
                           ->whereRaw( DB::raw( "crmmex_ventas_propuestacomercial.clienteID = '".$clienteID."' AND crmmex_ventas_propuestacomercial.status=1" ) )
                           ->first();
                return ( $pagos->total > 0 ) ? true : false ;
                break;
      case '7':return ( Cliente::where( 'id' , $clienteID )->where( 'tipo' , 1 )->where( 'status' , 1 )->count() > 0 ) ? true : false ; break;

    }
  }

  // Obtiene el detalle del proceso
  private static function descripcionEstado( $procesoID ) {
    $procesos = Procesos::find( $procesoID );
    return $procesos->descripcionProceso;
  }
}
