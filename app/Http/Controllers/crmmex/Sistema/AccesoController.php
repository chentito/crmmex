<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Privilegios AS Privilegios;
use App\Models\crmmex\Sistema\PrivilegiosModulos AS PrivilegiosModulos;
use App\Models\crmmex\Sistema\Modulos AS Modulos;

class AccesoController extends Controller
{
    // Verifica si el acceso es permitido de acuerdo al perfil del usuario
    // logeado y al identificador de la seccion
    public static function ver( $seccionID ) {
        $acceso   = Privilegios::where( 'idRol' , Auth::user()->rol )
                               ->where( 'idSeccion' , $seccionID )
                               ->first();
        return ( $acceso->status == 1 ) ? true : false ;
    }

    // Verifica privilegios para el listado de modulos del menu
    public function verModulos( $perfilID ) {
        $modulos = Modulos::where( 'status' , 1 )->get();
        $accesos = array();

        foreach( $modulos AS $modulo ) {
            $acceso    = PrivilegiosModulos::where( 'moduloID' , $modulo->id )->where( 'perfilID' , $perfilID )->where( 'status' , 1 )->first();
            $accesos[] = array(
                'modulo' => $modulo->id,
                'acceso' => ( ( $acceso ) ? '1' : '0' )
            );
        }

        return response()->json( $accesos );
    }

}
