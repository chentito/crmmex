<?php
/*
 * Controlador para funciones utiles del sistema
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Utils;

use App\Models\crmmex\Utils\Estados AS Estados;
use App\Models\crmmex\Utils\Paises AS Paises;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilsController extends Controller
{

    /*
     * Regresa el listado de estados
     */
     public function estados( $paisID = '' ) {
        $datos   = array();
        $estados = Estados::where( 'status' , 1 )->get();

        foreach( $estados AS $estado ) {
            $datos[] = array(
              'id'      => $estado->id,
              'entidad' => $estado->entidad
            );
        }

        return response()->json( $datos );
     }

     /*
      * Regresa el listado de paises
      */
     public function paises() {
        $datos  = array();
        $paises = Paises::where( 'status' , 1 )->get();

        foreach ( $paises as $pais ) {
            $datos[] = array(
                'id'     => $pais->id,
                'nombre' => $pais->nombre
            );
        }

        return response()->json( $datos );
     }

}
