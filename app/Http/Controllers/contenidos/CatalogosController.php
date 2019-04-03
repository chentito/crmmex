<?php

namespace App\Http\Controllers\contenidos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogo AS Catalogo;

class CatalogosController extends Controller
{
    
    public function generaListadoCombo( $id ) {
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
    
    public function catalogoPorId( $id ) {
        $catalogo = array();
        $opciones = Catalogo::find( $id );

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
