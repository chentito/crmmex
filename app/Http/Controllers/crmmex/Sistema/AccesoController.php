<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Privilegios AS Privilegios;

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

}
