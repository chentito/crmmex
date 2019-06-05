<?php

namespace App\Http\Controllers\crmmex\Administradores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User AS Usuarios;
use App\UserAddress AS Direccion;
use Hash;

class Administradores extends Controller
{

    public function listaAdmin() {
        $arrAdministradores = array();
        $administradores    = Usuarios::where( 'active' , '1' )->get();

        foreach( $administradores AS $administrador ) {
            $arrAdministradores[ 'administradores' ][] = array (
                'id'        => $administrador->id,
                'nombres'   => $administrador->name,
                'appat'     => $administrador->apPat,
                'apmat'     => $administrador->apMat,
                'email'     => $administrador->email,
                'rol'       => $administrador->rol,
                'comentarios' => $administrador->comentarios,
                'extension' => '',
                'status'    => $administrador->active,
                'opciones'  => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Usuario" onclick="contenidos(\'ejecutivos_edicion\',\''.$administrador->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                             . '<a class="ml-1" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario" onclick="contenidos(\'ejecutivos_elimina\',\''.$administrador->id.'\')"><i class="fa fa-trash fa-sm"></i></a>'
            );
        }

        return response()->json( $arrAdministradores );
    }

    public function store(Request $request) {
        $altaAdmin     = false;
        $administrador = new Usuarios();
        $administrador->name        = $request[ 'edicionUsuariosNombre' ];
        $administrador->appat       = $request[ 'edicionUsuariosAPaterno' ];
        $administrador->apmat       = $request[ 'edicionUsuariosAMaterno' ];
        $administrador->email       = $request[ 'edicionUsuariosEmail' ];
        $administrador->rol         = $request[ 'edicionUsuariosRol' ];
        $administrador->comentarios = $request[ 'edicionUsuariosComentarios' ];
        $administrador->password    = Hash::make( $request[ 'edicionUsuariosContrasena' ] );
        $administrador->active      = 1;
        $administrador->created_at  = date('Y-m-d H:i:s');

        if( $administrador->save() ) {
          $direccion = new Direccion();
          $direccion->userID    = $administrador->id;
          $direccion->calle     = $request[ 'edicionUsuariosCalle' ];
          $direccion->exterior  = $request[ 'edicionUsuariosExterior' ];
          $direccion->interior  = $request[ 'edicionUsuariosInterior' ];
          $direccion->colonia   = $request[ 'edicionUsuariosColonia' ];
          $direccion->municipio = $request[ 'edicionUsuariosCiudad' ];
          $direccion->estado    = $request[ 'edicionUsuariosEstado' ];
          $direccion->cp        = $request[ 'edicionUsuariosCP' ];
          $direccion->pais      = $request[ 'edicionUsuariosPais' ];

          if( $direccion->save() ) {
            $altaAdmin = true;
          }
        }

        if( $altaAdmin ) {
          return "Ejecutivo agregado correctamente";
        } else {
          return "Error al agregar ejecutivo";
        }
    }

    public function delete( $id ) {
        $administrador = Usuarios::find( $id );
        $administrador->active     = 0;
        $administrador->deleted_at = date('Y-m-d H:i:s');;
        $administrador->save();
    }

    public function search( $id ) {
        $administrador = Usuarios::find( $id );
        $admins = array(
          'nombre'      => $administrador->name,
          'apPat'       => $administrador->apPat,
          'apMat'       => $administrador->apMat,
          'rol'         => $administrador->rol,
          'email'       => $administrador->email,
          'comentarios' => $administrador->comentarios,
          'calle'       => $administrador->direccion->calle,
          'interior'    => $administrador->direccion->interior,
          'exterior'    => $administrador->direccion->exterior,
          'colonia'     => $administrador->direccion->colonia,
          'municipio'   => $administrador->direccion->municipio,
          'estado'      => $administrador->direccion->estado,
          'cp'          => $administrador->direccion->cp,
          'pais'        => $administrador->direccion->pais
        );

        return response()->json( $admins );
    }

    public function update(Request $request) {
        // Actualizacion usuario
        $administrador = Usuarios::find( $request[ 'edicionUsuariosID' ] );
        $administrador->name         = $request[ 'edicionUsuariosNombre' ];
        $administrador->apPat        = $request[ 'edicionUsuariosAPaterno' ];
        $administrador->apMat        = $request[ 'edicionUsuariosAMaterno' ];
        $administrador->rol          = $request[ 'edicionUsuariosRol' ];
        $administrador->email        = $request[ 'edicionUsuariosEmail' ];
        if( !empty( $request[ 'edicionUsuariosContrasena' ] ) ) {
            $administrador->password = Hash::make( $request[ 'edicionUsuariosContrasena' ] );
        }
        $administrador->active       = $request[ 'edicionUsuariosEstatus' ];
        $administrador->comentarios  = $request[ 'edicionUsuariosComentarios' ];
        // Actualizacion direccion
        $direccion = Direccion::where( 'userID' , $request[ 'edicionUsuariosID' ] );
        $direccion->calle     = $request[ 'edicionUsuariosCalle' ];
        $direccion->exterior  = $request[ 'edicionUsuariosExterior' ];
        $direccion->interior  = $request[ 'edicionUsuariosInterior' ];
        $direccion->colonia   = $request[ 'edicionUsuariosColonia' ];
        $direccion->municipio = $request[ 'edicionUsuariosCiudad' ];
        $direccion->estado    = $request[ 'edicionUsuariosEstado' ];
        $direccion->cp        = $request[ 'edicionUsuariosCP' ];
        $direccion->pais      = $request[ 'edicionUsuariosPais' ];

        if( $administrador->save() ) {
          return "Datos actualizados correctamente.";
        } else {
          return "Error al actualizad datos.";
        }
    }

    public function shortUpdate( Request $request ) {
        $ejecutivo = Usuarios::find( Auth::user()->id );
        $ejecutivo->name        = $request[ 'perfilNombre' ];
        $ejecutivo->apPat       = $request[ 'perfilApPat' ];
        $ejecutivo->apMat       = $request[ 'perfilApMat' ];
        $ejecutivo->email       = $request[ 'perfilEmail' ];
        if( $request[ 'perfilPassword' ] != '' ) {
          $ejecutivo->password  = Hash::make( $request[ 'perfilPassword' ] );
        }

        if( $ejecutivo->save() ) {
            Auth::setUser( $ejecutivo );
            return "Datos actualizados correctamente.";
          } else {
            return "Error al actualizad datos.";
        }
    }

}
