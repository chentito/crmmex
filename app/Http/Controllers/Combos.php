<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\FormaContacto;

class Combos extends Controller
{

    // Obtiene los medios de contacto
    public function medioContacto() {
        $medios = FormaContacto::all();
        return $medios;
    }

}
