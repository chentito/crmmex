<?php

namespace App\Http\Controllers\contenidos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Secciones AS Secciones;

class ContenidosController extends Controller
{
    // Controlador encargado para cargar la pantalla seleccionada
    public function contenidos( $id ) {sleep(1);
        $secciones = Secciones::where( 'identificador' , $id )->first();
        return view( $secciones->vista );
    }
    
    
}
