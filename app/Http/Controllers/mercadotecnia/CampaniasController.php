<?php

namespace App\Http\Controllers\mercadotecnia;

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

}
