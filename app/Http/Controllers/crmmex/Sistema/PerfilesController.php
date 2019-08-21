<?php
/*
 * Controlador para la administracion de roles del sistema
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Sistema\Perfiles AS Perfiles;

class PerfilesController extends Controller
{
    // Obtiene el listado de Perfiles
    public function listadoPerfiles($edicion=false) {
        $datos               = array();
        $datos[ 'perfiles' ] = array();
        $perfiles            = Perfiles::whereIn( 'status' , [ 1 , 2 ] )
                                       ->when( $edicion==1 , function( $q ){
                                         return $q->where( 'id' , '>' , 1 );
                                       })
                                       ->get();

        foreach( $perfiles AS $perfil ) {
            $datos[ 'perfiles' ][] = array(
                'id'                => $perfil->id,
                'nombre'            => $perfil->rol,
                'fechaAlta'         => $perfil->fechaAlta,
                'fechaModificacion' => $perfil->fechaModificacion,
                'status'            => ( ( $perfil->status == 1 ) ? 'Activo' : 'Inactivo' ) ,
                'opciones'          => ( $perfil->id != 1 ) ? '<a href="javascript:void(0)" onclick="contenidos(\'edita_perfil\',\''.$perfil->id.'\')" class="ml-2"><i class="fa fa-sm fa-edit"></i></a>'
                                     . '<a href="javascript:void(0)" onclick="contenidos(\'elimina_perfil\',\''.$perfil->id.'\')" class="ml-2"><i class="fa fa-sm fa-trash"></i></a>' : ''
            );
        }

        return response()->json( $datos );
    }

    // Alta de nuevo perfil
    public function altaPerfil( Request $request ) {
        $perfil = new Perfiles();
        $perfil->rol       = $request->roles_nombrePerfil;
        $perfil->fechaAlta = date( 'Y-m-d H:i:s' );
        $perfil->status    = $request->roles_statusPerfil;
        $perfil->save();
    }

    // Edicion perfil
    public function editaPerfil( Request $request ) {
        $perfil = Perfiles::find( $request->roles_idPerfil );
        $perfil->rol               = $request->roles_nombrePerfil;
        $perfil->fechaModificacion = date( 'Y-m-d H:i:s' );
        $perfil->status            = $request->roles_statusPerfil;
        $perfil->save();
    }

    // Consulta Perfil
    public function consultaPerfil( $perfilID ) {
        $perfil = Perfiles::find( $perfilID );
        return response()->json( $perfil );
    }

    // Elimina perfil
    public function eliminaPerfil( $perfilID ) {
        $perfil = Perfiles::find( $perfilID );
        $perfil->fechaModificacion = date( 'Y-m-d H:i:s' );
        $perfil->status            = 3;
        $perfil->save();
    }

}
