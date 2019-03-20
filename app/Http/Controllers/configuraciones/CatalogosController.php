<?php

namespace App\Http\Controllers\configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogo AS Catalogo;

class CatalogosController extends Controller
{
    
    public function catalogos() {
        $catalogos = $this->opcionesCatalogos();
        return view( 'crm.configuraciones.configuraciones' , [ 'catalogos' => $catalogos ] );
    }
    
    public function opcionesCatalogos() {
        $opciones  = array();
        $catalogos = Catalogo::all();
        
        foreach( $catalogos AS $catalogo ) {
            $cat = array(
                'id'     => $catalogo->id,
                'nombre' => $catalogo->nombre,
            );
            
            foreach( $catalogo->opciones AS $opcion ) {
                $cat[ 'opciones' ][] = array(
                    'idOP'     => $opcion->id,
                    'nombreOP' => $opcion->opcion,
                );
            }
            
            $opciones[] = $cat;
        }
        
        //return response()->json( $opciones );
        return $opciones;
    }
}
