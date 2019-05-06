<?php
/*
 * Controlador para el seguimiento de clientes
 * @Autor Mexagon.net / Carlos cvreyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Clientes;

use App\Models\crmmex\Clientes\Seguimiento AS Seguimiento;
use App\Models\crmmex\Clientes\Contactos AS Contactos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeguimientoController extends Controller
{

    /*
     * Metodo para obtener el listado de seguimientos
     */
    public function listadoSeguimientos( $clienteID ) {
        $seguimientos = array();
        $seg          = Seguimiento::where( 'status' , 1 )->where( 'clienteID' , $clienteID )->get();

        foreach ( $seg as $s ) {
          $seguimientos[ 'seguimientos' ][] = array (
            'id'              => $s->id,
            'clienteID'       => $s->clienteID,
            'contactoID'      => $s->contactoID,
            'tipoActividad'   => $s->tipoActividad,
            'nombreActividad' => $s->nombreActividad,
            'descripcion'     => $s->descripcion,
            'fechaAlta'       => $s->fechaAlta,
            'fechaEjecucion'  => $s->fechaEjecucion,
            'status'          => $s->status,
            'opciones'        => '<a href="javascript:void(0)" onclick="contenidos(\'clientes_editaseguimiento\',\''.$s->id.'\')"><i class="fa fa-edit fa-lg"></i></a>'
          );
        }

        return response()->json( $seguimientos );
    }

    /*
     * Metodo que guarda los datos de un nuevo seguimiento
     */
    public function guardaSeguimiento( Request $request ) {
        $seguimiento = new Seguimiento();
        $seguimiento->clienteID       = $request->clienteID;
        $seguimiento->contactoID      = $request->prospectos_nuevoseguimiento_involucrados;
        $seguimiento->tipoActividad   = $request->prospectos_nuevoseguimiento_tipo;
        $seguimiento->nombreActividad = $request->prospectos_nuevoseguimiento_titulo;
        $seguimiento->descripcion     = $request->prospectos_nuevoseguimiento_texto;
        $seguimiento->fechaAlta       = $request->prospectos_nuevoseguimiento_fecha;
        $seguimiento->estado          = $request->prospectos_nuevoseguimiento_estado;
        $seguimiento->status          = 1;
        $stat      = $seguimiento->save();
        $respuesta = array( 'status' => $stat );
        return response()->json( $respuesta );
    }

    /*
     * Metodo que obtiene los datos de un seguimiento
     */
    public function obtieneSeguimiento( $id ) {
        $seguimiento = Seguimiento::find( $id );
        $seg         = array(
          'segID'          => $seguimiento->id,
          'clienteID'      => $seguimiento->clienteID,
          'titulo'         => $seguimiento->nombreActividad,
          'fechaEjecucion' => $seguimiento->fechaEjecucion,
          'tipo'           => $seguimiento->tipoActividad,
          'estado'         => $seguimiento->estado,
          'contacto'       => $seguimiento->contactoID,
          'descripcion'    => $seguimiento->descripcion
        );
        return response()->json( $seg );
    }

    /*
     * Metodo que actualiza un registro en particular
     */
     public function actualizaSeguimiento( Request $request ) {
        $segID       = $request->seguimiento_idty;
        $seguimiento = Seguimiento::find( $segID );
        $seguimiento->contactoID      = $request->prospectos_nuevoseguimiento_involucrados;
        $seguimiento->tipoActividad   = $request->prospectos_nuevoseguimiento_tipo;
        $seguimiento->nombreActividad = $request->prospectos_nuevoseguimiento_titulo;
        $seguimiento->descripcion     = $request->prospectos_nuevoseguimiento_texto;
        $seguimiento->fechaEjecucion  = $request->prospectos_nuevoseguimiento_fecha;
        $seguimiento->estado          = $request->prospectos_nuevoseguimiento_estado;
        $gSeg                         = $seguimiento->save();
        $resp                         = array( 'stat' => $gSeg );
        return response()->json( $resp );
     }

    /*
     * Metodo que obtiene los contactos disponibles por cliente
     */
    public function listadoContactosPorCliente( $clienteID='' ) {
        $contactos = Contactos::where( [ 'status' => 1 ] )->where(  [ 'clienteID' => $clienteID ] )->get();
        $cont      = array();
        foreach( $contactos AS $contacto ) {
            $cont[ 'contactos' ][] = array (
              'contacto' => $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' . $contacto->apellidoMaterno . '   [' . $contacto->correoElectronico . ']',
              'id'       => $contacto->id
            );
        }
        return response()->json( $cont );
    }

}
