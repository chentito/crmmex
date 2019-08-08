<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Sistema\Configuraciones AS Configuraciones;

class ConfiguracionesController extends Controller
{
    // Establece el valor de una configuracion
    public function setValue( $configuracionID , $valor ) {
        $conf = Configuraciones::find( $configuracionID )->first();
        $conf->valor = $valor;
        $conf->save();
    }

}
