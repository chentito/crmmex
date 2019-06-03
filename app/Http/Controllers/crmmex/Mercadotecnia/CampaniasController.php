<?php

namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\mercadotecnia\Campanias AS Campanias;

class CampaniasController extends Controller
{

    // Obtiene el listado de campanias
    public function listadoCampanias() {
        $campaniasD = array();
        $campanias  = Campanias::where( 'status' , '1' )->orderBy( 'id' , 'desc' )->get();

        foreach( $campanias AS $campania ) {
            $campaniasD[ 'campanias' ][] = array (
                'nombre'        => $campania->nombre_campania,
                'url'           => '<a href="'.$campania->url.'" target="_blank">'.$campania->url.'</a>',
                'fechaEnvio'    => $campania->fechaEnvio,
                'subject'       => $campania->subject,
                'destinatarios' => $campania->id_listado_destinatarios,
                'opciones'      => '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_estadisticas\');"><i class="fa fa-chart-area fa-lg"></i></a>'
                                 . '<a href="javascript:void(0)" onclick="return contenidos(\'mercadotecnia_detalle\');" class="ml-1"><i class="fa fa-search fa-lg"></i></a>'
            );
        }

        return response()->json( $campaniasD );
    }

    /* Obtiene los datos de un registro en particular */
    public function search( $id ) {
        $campania = Campanias::find( $id );
        return response()->json( $campania );
    }

    /* Guarda un nuevo registro en la tabla de campañas */
    public function save( Request $request ) {
        $campania = new Campanias();
        $campania->nombre_campania          = $request[ 'detalleCampania_nombre' ];
        $campania->url                      = $request[ 'detalleCampania_landingPage' ];
        $campania->fechaEnvio               = $request[ 'detalleCampania_fechaEnvio' ];
        $campania->subject                  = $request[ 'detalleCampania_asunto' ];
        $campania->from_nombre              = $request[ 'detalleCampania_remitente' ];
        $campania->from_email               = $request[ 'detalleCampania_remitenteEmail' ];
        $campania->id_listado_destinatarios = $request[ 'detalleCampania_destinatarios' ];
        $campania->status                   = 1;

        if( $campania->save() ) {
            return "Campania agregada correctamente";
          } else {
            return "Error al agregar campania";
        }
    }

    /* Actualiza un registro en particular en la tabla de campañas */
    public function update( Request $request ) {
        $campania = Campanias::find( $request[ 'detalleCampania_id' ] );
        $campania->nombre_campania          = $request[ 'detalleCampania_nombre' ];
        $campania->url                      = $request[ 'detalleCampania_landingPage' ];
        $campania->fechaEnvio               = $request[ 'detalleCampania_fechaEnvio' ];
        $campania->subject                  = $request[ 'detalleCampania_asunto' ];
        $campania->from_nombre              = $request[ 'detalleCampania_remitente' ];
        $campania->from_email               = $request[ 'detalleCampania_remitenteEmail' ];
        $campania->id_listado_destinatarios = $request[ 'detalleCampania_destinatarios' ];
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

}
