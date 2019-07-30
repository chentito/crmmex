<?php
/*
 * Controlador para la administracion de secciones por modulos
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Secciones AS Secciones;

class SeccionesController extends Controller
{
    // Listado de secciones
    public function listadoSecciones( $moduloID = '' ) {
        $secciones = Secciones::where( 'status' , 1 )
                              ->when( $moduloID != '' , function( $q ) use( $moduloID ) {
                                  return $q->where( 'modulo' , $moduloID );
                              })
                              ->get();
        return response()->json( $secciones );
    }

}
