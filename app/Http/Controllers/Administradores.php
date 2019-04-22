<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\DB;
use App\Usuarios AS Usuarios;

class Administradores extends Controller
{

    public function listaAdmin() {
        $arrAdministradores = array();
        $administradores    = Usuarios::where( 'status' , '1' )->get();

        foreach( $administradores AS $administrador ) {
            $arrAdministradores[ 'administradores' ][] = array (
                'id'        => $administrador->id,
                'nombres'   => $administrador->nombres,
                'appat'     => $administrador->appat,
                'apmat'     => $administrador->apmat,
                'email'     => $administrador->email,
                'rol'       => $administrador->rol,
                'extension' => $administrador->extension,
                'status'    => $administrador->status,
                'opciones'  => '<a href="/ejecutivoEdicion/' . $administrador->id . '"><i class="material-icons">edit</i></a>'
                             . '<a href="#" class="pl-2"><i class="material-icons">settings</i></a>'
                             . '<a href="/administracion/elimina/' . $administrador->id . '" class="pl-2"><i class="material-icons">delete_sweep</i></a>'
            );
        }

        return response()->json( $arrAdministradores );
    }

    public function store(Request $request) {
        $administrador = new Usuarios();
            $administrador->nombres   = $request[ 'admin_altaAdmin_nombre' ];
            $administrador->appat     = $request[ 'admin_altaAdmin_apPaterno' ];
            $administrador->apmat     = $request[ 'admin_altaAdmin_apMaterno' ];
            $administrador->email     = $request[ 'admin_altaAdmin_email' ];
            $administrador->rol       = $request[ 'admin_altaAdmin_rol' ];
            $administrador->extension = $request[ 'admin_altaAdmin_extension' ];
            $administrador->status    = 1;
            $administrador->fechaAlta = date('Y-m-d H:i:s');
            $administrador->save();

        return redirect( '/ejecutivoListado' );
    }

    public function delete( $id ) {
        $administrador = Usuarios::find( $id );
            $administrador->status    = 0;
            $administrador->fechaBaja = date('Y-m-d H:i:s');;
            $administrador->save();

        return redirect( '/ejecutivoListado' );
    }

    public function search( $id ) {
        $administrador = Usuarios::find( $id )->get();
        return response()->json( $administrador );
    }
    
    public function update(Request $request) {
        $administrador = Usuarios::find( $request[ 'admin_altaAdmin_id' ] );
        $administrador->nombres   = $request[ 'admin_altaAdmin_nombre' ];
        $administrador->appat     = $request[ 'admin_altaAdmin_apPaterno' ];
        $administrador->apmat     = $request[ 'admin_altaAdmin_apMaterno' ];
        $administrador->email     = $request[ 'admin_altaAdmin_email' ];
        $administrador->rol       = $request[ 'admin_altaAdmin_rol' ];
        $administrador->extension = $request[ 'admin_altaAdmin_extension' ];
        $administrador->status    = 1;
        $administrador->fechaAlta = date('Y-m-d H:i:s');
        $administrador->save();

        return redirect( '/ejecutivoListado' );
    }
    
}
