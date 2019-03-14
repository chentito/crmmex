<?php

namespace App\Http\Controllers\ejecutivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modulos AS Modulos;
use App\Models\Secciones AS Secciones;

class RolesController extends Controller
{
    
    /*  Metodo que obtiene todos los modulos agregados */
    public function listadoModulos( $idAdmin='' ) {
        $datos   = array();
        $modulos = Modulos::where( 'status' , '1' )->get();
        
        foreach( $modulos AS $modulo ) {
            $datos[ $modulo->id ][ 'modulo' ] = array(
                'nombre' => $modulo->nombre,
                'ruta'   => $modulo->rutaInicial
            );

            $secciones = Secciones::where( [ 'status' => '1' , 'modulo' => $modulo->id ] )->get();
            foreach( $secciones AS $seccion ) {
                $datos[ $modulo->id ][ 'secciones' ][] = array(
                    'id'          => $seccion->id,
                    'nombre'      => $seccion->nombre,
                    'descripcion' => $seccion->descripcion,
                    'ruta'        => $seccion->ruta,
                    'privilegio'  => ( ( $idAdmin != '' ) ? $this->obtienePrivilegioUsuario( $idAdmin , $seccion->id ) : '' )
                );
            }
        }
        
        return response()->json( $datos );
    }
    
    private function obtienePrivilegioUsuario( $usuario , $seccion ) {
        
    }
}
