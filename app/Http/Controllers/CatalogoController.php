<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogo AS Catalogo;

class CatalogoController extends Controller
{
    //
    public function catalogo( $id ) {
        $catalogo = array();
        $opciones = Catalogo::find( $id );

        $catalogo[] = array(
            'id'     => 0,
            'nombre' => $opciones->nombre,
            'params' => ''
        );
        
        foreach( $opciones->opciones AS $opcion ) {
            $catalogo[] = array(
                'id'     => $opcion->id,
                'nombre' => $opcion->opcion,
                'params' => $opcion->parametros
            );
        }

        return response()->json( $catalogo );
    }

}
