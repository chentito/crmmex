<?php
/*
 * Controlador para la administracion de campañas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Mercadotecnia\Campanias AS Campanias;
use App\Models\crmmex\Sistema\Tracking AS Tracking;
use App\Models\crmmex\Configuraciones\FormSave AS FormSave;

class CampaniasController extends Controller
{

  // Obtiene el listado de campanias
  public function listadoCampanias() {
    $campaniasD                = array();
    $campaniasD[ 'campanias' ] = array();
    $campanias  = Campanias::whereIn( 'status' , [ 1 , 2 ] )->orderBy( 'id' , 'desc' )->get();

    foreach( $campanias AS $campania ) {
      $campaniasD[ 'campanias' ][] = array (
        'id'                       => $campania->id,
        'nombre_campania'          => $campania->nombre_campania,
        'fechaEnvio'               => $campania->fechaEnvio,
        'subject'                  => $campania->subject,
        'id_listado_destinatarios' => Utils::nombreAudiencia( $campania->id_listado_destinatarios ),
        'pieza'                    => Utils::nombrePieza( $campania->pieza ),
        'enviado'                  => ( ( $campania->enviado == 1 ) ? 'Enviada' : 'Sin enviar' ),
        'status'                   => ( ( $campania->status == 1 ) ? 'Activa' : 'Inactiva' ),
        'opciones'                 => ( $campania->fechaEnvio > date( 'Y-m-d H:i:s' ) ) ?
                                      '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_estadisticas\',\''.$campania->id.'\');" title="Ver Estadisticas"><i class="fa fa-chart-area fa-sm"></i></a>'
                                     . '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_detalle\',\''.$campania->id.'\');" title="Editar Campaña" class="ml-1"><i class="fa fa-edit fa-sm"></i></a>'
                                     . '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_elimina\',\''.$campania->id.'\');" title="Eliminar Campaña" class="ml-1"><i class="fa fa-sm fa-trash"></i></a>'
                                     : '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_estadisticas\',\''.$campania->id.'\');" title="Ver Estadisticas"><i class="fa fa-chart-area fa-sm"></i></a>'
      );
    }

    return response()->json( $campaniasD );
  }

  /* Obtiene los datos de un registro en particular */
  public function search( $id ) {
    $campania  = Campanias::find( $id );
    $camp      = array(
      'nombre'        => $campania->nombre_campania,
      'fechaEnvio'    => $campania->fechaEnvio,
      'subject'       => $campania->subject,
      'destinatarios' => $campania->id_listado_destinatarios,
      'pieza'         => $campania->detalleCampania_templates
    );
    return response()->json( $camp );
  }

  /* Guarda un nuevo registro en la tabla de campañas */
  public function save( Request $request ) {
    $campania = new Campanias();
    $campania->nombre_campania          = $request[ 'detalleCampania_nombre' ];
    $campania->fechaEnvio               = $request[ 'detalleCampania_fechaEnvio' ]. ' ' . $request[ 'detalleCampania_horaEnvio' ] . ':' . $request[ 'detalleCampania_minutoEnvio' ] . ':00';
    $campania->subject                  = $request[ 'detalleCampania_asunto' ];
    $campania->id_listado_destinatarios = $request[ 'detalleCampania_destinatarios' ];
    $campania->pieza                    = $request[ 'detalleCampania_templates' ];
    $campania->enviado                  = 0;
    $campania->status                   = 1;

    if( $campania->save() ) {
        $update = Campanias::find( $campania->id );
        $update->tracking = $this->tracking( $campania->id );
        $update->save();

        return "Campania agregada correctamente";
      } else {
        return "Error al agregar campania";
    }
  }

  /* Actualiza un registro en particular en la tabla de campañas */
  public function update( Request $request ) {
    $campania = Campanias::find( $request[ 'detalleCampania_id' ] );
    $campania->nombre_campania          = $request[ 'detalleCampania_nombre' ];
    $campania->fechaEnvio               = $request[ 'detalleCampania_fechaEnvio' ]. ' ' . $request[ 'detalleCampania_horaEnvio' ] . ':' . $request[ 'detalleCampania_minutoEnvio' ] . ':00';
    $campania->subject                  = $request[ 'detalleCampania_asunto' ];
    $campania->id_listado_destinatarios = $request[ 'detalleCampania_destinatarios' ];
    $campania->pieza                    = $request[ 'detalleCampania_templates' ];
    $campania->status                   = 1;

    if( $campania->save() ) {
        return "Campania actualizada correctamente";
      } else {
        return "Error al actualizar campania";
    }
  }

  /* Elimina un registro especifico */
  public function delete( $id ) {
    $campania = Campanias::find( $id );
    $campania->status = 0;

    if( $campania->save() ) {
      return "Campania eliminada correctamente";
    } else {
      return "Error al eliminar campania";
    }
  }

  /*
   * Elemnto util para el seguimiento sobre las piezas de correo
   */
   private function tracking( $campaniaID ) {
     $html = '<img src="'.URL::to('/').'/campaniatracking/'.$campaniaID.'/{contactoID}" width="0" height="0">';
     return $html;
   }

  /* Listado de destinatarios por campania */
  public function destinatariosPorCampania( $campaniaID ) {
    $datos = array();
    $destinatarios = DB::table( 'crmmex_camp_audiencias_lista' )
                       ->whereRaw( DB::raw( "audienciaID=(SELECT camp.id_listado_destinatarios FROM crmmex_merc_campanias AS camp WHERE id='+$campaniaID+')" ) )
                       ->get();

    foreach( $destinatarios AS $destinatario ) {
      $datos[] = array(
        'email' => $destinatario->email,
        'idty'  => $destinatario->idty,
        'click' => $this->fechaTracking( $campaniaID , $destinatario->idty )
      );
    }

    return response()->json( $datos );
  }

  // Obtiene fecha de click detectado a través del proceso de tracking
  private function fechaTracking( $campaniaID , $contactoID ) {
    $tracking = Tracking::where( 'campaniaID' , $campaniaID )
                        ->where( 'contactoID' , $contactoID )
                        ->first();
    if( $tracking ) {
      return $tracking->fechaRegistro;
    } else {
      return "-";
    }
  }

  // Obtiene las respuestas del formulario contestado a traves de la campaña
  public function obtieneRespuestasForm( $campaniaID ) {
    $datos = array();
    $respuestas = DB::table( 'crmmex_camp_forms_resp' )
                    ->select( DB::raw( 'crmmex_camp_audiencias_lista.email, crmmex_camp_forms_resp.contactoID, crmmex_camp_forms_fields.nombre, crmmex_camp_forms_resp.respuesta, crmmex_camp_forms_resp.fecha' ) )
                    ->leftJoin( 'crmmex_camp_forms_fields' , 'crmmex_camp_forms_fields.id' , '=' , 'crmmex_camp_forms_resp.fieldID' )
                    ->leftJoin( 'crmmex_camp_audiencias_lista' , 'crmmex_camp_audiencias_lista.idty' , '=' , 'crmmex_camp_forms_resp.contactoID' )
                    ->where( 'crmmex_camp_forms_resp.campaniaID' , $campaniaID )
                    ->get();

    foreach( $respuestas AS $respuesta ) {
      $datos[] = array(
        'email'      => $respuesta->email,
        'contactoID' => $respuesta->contactoID,
        'pregunta'   => $respuesta->nombre,
        'respuesta'  => $respuesta->respuesta,
        'fecha'      => $respuesta->fecha
      );
    }

    return response()->json( $datos );
  }

}
