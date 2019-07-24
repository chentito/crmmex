<?php

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
        $cliente = Cliente::find( $clienteID );
        $grupo   = $this->getGrupo( $cliente->productoID );
        return response()->json( $this->getIndicador( $grupo , $clienteID ) );
    }

    // Obtiene el indicador correspondiente
    public function getIndicador( $grupo , $clienteID ) {
        $pipeline  = array();

        // Verifica si hay un indicador de proposito general
        $propGral  = Indicadores::where( 'grupoID' , '0' )->where( 'status' , 1 )->count();
        $gpo       = ( $propGral > 0 ) ? '0' : $grupo;
        $indicador = Indicadores::where( 'grupoID' , $gpo )->where( 'status' , 1 )->first();

        if( $indicador ) {
            $fases = Fases::where( 'indicadorID' , $indicador->id )
                          ->where( 'status' , 1 )
                          ->orderBy( 'id' , 'ASC' )
                          ->get();

                $detalles = Detalles::where( 'indicadorID' , $indicador->id )
                                    ->where( 'status' , 1 )
                                    ->get();

                foreach( $detalles AS $detalle ) {
                    $pipeline[ 'detalles' ][] = array (
                      'detalleID'     => $detalle->id,
                      'indicadorID'   => $indicador->id,
                      'faseID'        => $detalle->faseID,
                      'tituloDetalle' => $detalle->tituloDetalle,
                      'peso'          => $detalle->peso,
                      'estado'        => $this->estadoProceso( $detalle->procesoID , $clienteID ),
                      'descripcion'   => $this->descripcionEstado( $detalle->procesoID ),
                      'procesoID'     => $detalle->procesoID
                    );
                }

                return $pipeline;
            } else {
                return array();
        }
    }

    // Obtiene el grupo de producto de interes del prospectos_listado
    private function getGrupo( $productoID ) {
        $producto = Producto::find( $productoID );
        return $producto->grupo;
    }

    // Obtiene el estado de ejecución de algun proceso dentro de la
    // plataforma para un prospecto/cliente en particular
    private function estadoProceso( $procesoID , $clienteID ) {
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
    private function descripcionEstado( $procesoID ) {
        $procesos = Procesos::find( $procesoID );
        return $procesos->descripcionProceso;
    }
}
