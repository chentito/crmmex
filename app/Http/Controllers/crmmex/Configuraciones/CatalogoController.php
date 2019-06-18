<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Utils\Catalogo AS Catalogo;

class CatalogoController extends Controller
{

    public function listadoCatalogos( $tipo ) {
        $elementos = array();
        $catalogos = Catalogo::where( 'status' , 1 )
                             ->where( 'sistema' , $tipo )
                             ->get();

        foreach( $catalogos AS $catalogo ) {
          $elementos[] = array(
            'id'     => $catalogo->id,
            'nombre' => $catalogo->nombre
          );
        }

        return response()->json( $elementos );
    }

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
