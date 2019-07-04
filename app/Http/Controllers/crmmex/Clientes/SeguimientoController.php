<?php
/*
 * Controlador para el seguimiento de clientes
 * @Autor Mexagon.net / Carlos cvreyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Support\Facades\Auth;
use App\Models\crmmex\Clientes\Seguimiento AS Seguimiento;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utiles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeguimientoController extends Controller
{

    /*
     * Metodo para obtener el listado de seguimientos
     */
    public function listadoSeguimientos( $clienteID = '' ) {
        $ejecutivoID  = Auth::user()->id;
        $seguimientos = array();
        $seg          = Seguimiento::where( [ 'status' => 1 ] )
                      ->where( [ 'ejecutivoID' => $ejecutivoID ] )
                      ->when( $clienteID != '' , function( $cond ) use( $clienteID ) {
                        return $cond->where( [ 'clienteID' => $clienteID ] );
                      })
                      ->get();

        foreach ( $seg as $s ) {
          $seguimientos[ 'seguimientos' ][] = array (
            'id'              => $s->id,
            'clienteID'       => Utiles::nombreCliente( $s->clienteID ),
            'contactoID'      => $this->nombreContacto( $s->contactoID ),
            'ejecutivoID'     => Utiles::nombreEjecutivo( $s->ejecutivoID ),
            'tipoActividad'   => Utiles::valorCatalogo( $s->tipoActividad ),
            'nombreActividad' => $s->nombreActividad,
            'descripcion'     => $s->descripcion,
            'fechaAlta'       => $s->fechaAlta,
            'fechaEjecucion'  => $s->fechaEjecucion,
            'estado'          => Utiles::valorCatalogo( $s->estado ),
            'status'          => $s->status,
            'opciones'        => ( $this->tipoCliente( $s->clienteID ) == 1 ) ?
                                '<a href="javascript:void(0)" onclick="contenidos(\'clientes_editaseguimiento\',\''.$s->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                              . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_eliminaSeguimiento\',\''.$s->id.'\')"><i class="fa fa-trash fa-sm ml-2"></i></a>'
                                :
                                '<a href="javascript:void(0)" onclick="contenidos(\'prospectos_editaseguimiento\',\''.$s->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                              . '<a href="javascript:void(0)" onclick="contenidos(\'prospectos_eliminaSeguimiento\',\''.$s->id.'\')"><i class="fa fa-trash fa-sm ml-2"></i></a>'
          );
        }

        return response()->json( $seguimientos );
    }

    /*
     * Elimina un seguimiento
     */
     public function eliminaSeguimiento( $seguimientoID ) {
        $seguimiento = Seguimiento::find( $seguimientoID );
        $seguimiento->status = 0;
        $seguimiento->save();
     }

    /*
     * Obtiene el tipo de cliente
     */
    private function tipoCliente( $clienteID ) {
        $cliente = Clientes::find( $clienteID );
        return $cliente->tipo;
    }

    /*
     * Obtiene el nombre del contacto
     */
    private function nombreContacto( $contactoID ) {
        $contacto = Contactos::find( $contactoID );
        return $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' . $contacto->apellidoMaterno;
    }

    /*
     * Metodo que guarda los datos de un nuevo seguimiento
     */
    public function guardaSeguimiento( Request $request ) {
        $seguimiento = new Seguimiento();
        $seguimiento->clienteID       = $request->clienteID;
        $seguimiento->contactoID      = $request->prospectos_nuevoseguimiento_involucrados;
        $seguimiento->ejecutivoID     = Auth::user()->id;
        $seguimiento->tipoActividad   = $request->catalogo_16;
        $seguimiento->nombreActividad = $request->prospectos_nuevoseguimiento_titulo;
        $seguimiento->descripcion     = $request->prospectos_nuevoseguimiento_texto;
        $seguimiento->fechaAlta       = date( 'Y-m-d H:i:s' );
        $seguimiento->fechaEjecucion  = $request->prospectos_nuevoseguimiento_fecha;
        $seguimiento->estado          = $request->catalogo_17;
        $seguimiento->status          = 1;
        $stat                         = $seguimiento->save();
        $respuesta                    = array( 'status' => $stat , 'idty' => $seguimiento->id );
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
        $segID                        = $request->seguimiento_idty;
        $seguimiento                  = Seguimiento::find( $segID );
        $seguimiento->contactoID      = $request->prospectos_nuevoseguimiento_involucrados;
        $seguimiento->tipoActividad   = $request->catalogo_16;
        $seguimiento->nombreActividad = $request->prospectos_nuevoseguimiento_titulo;
        $seguimiento->descripcion     = $request->prospectos_nuevoseguimiento_texto;
        $seguimiento->fechaEjecucion  = $request->prospectos_nuevoseguimiento_fecha;
        $seguimiento->estado          = $request->catalogo_17;
        $gSeg                         = $seguimiento->save();
        $resp                         = array( 'stat' => $gSeg , 'idty' => $seguimiento->id );
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

    /*
     * Obtiene el identificador textual del seguimiento
     */
     public function seguimientoIdty( $id ) {
        $seguimiento = Seguimiento::find( $id );
        return '# ' . $seguimiento->id . ' / ' . $seguimiento->nombreActividad;
     }

}
