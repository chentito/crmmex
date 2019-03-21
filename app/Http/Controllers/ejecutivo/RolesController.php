<?php

namespace App\Http\Controllers\ejecutivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Modulos AS Modulos;
use App\Models\Secciones AS Secciones;
use App\Models\Roles AS Roles;
use App\Models\RolRegla AS RolRegla;

class RolesController extends Controller
{
    
    /*  Metodo que obtiene todos los modulos agregados */
    public function listadoModulos( $idRol='' ) {
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
                    'privilegio'  => ( ( $idRol != '' ) ? $this->obtienePrivilegioUsuario( $idRol , $seccion->id ) : '' )
                );
            }
        }
        session( [ 'MiLLave' => 'mi valor valor valor' ] );
        return view( 'crm.ejecutivos.ejecutivoRoles' , [ 'modulos' => $datos , 'roles' => $this->listadoRoles() , 'rolUrl' => $idRol ] );
    }

    protected function listadoRoles() {
        $datos = array();
        $roles = Roles::where( 'status' , '1' )->get();
        
        foreach( $roles AS $rol ) {
            $datos[] = array(
                'idty'   => $rol->id,
                'nombre' => $rol->rol
            );
        }
        
        return $datos;
    }
    
    private function obtienePrivilegioUsuario( $idRol , $seccion ) {
        $val = ( $idRol == '1' ) ?
                "1"
                :
                RolRegla::where( [ 'idRol' => $idRol , 'idSeccion' => $seccion , 'status' => '1' ] )->count();
        return $val;
    }
}
