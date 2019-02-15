<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios\Administradores;

class ControllerAdministradores extends Controller
{
    
    public function listado() {
        $admins = Administradores::all()->toArray();
        echo serialize($admins);
    }
    
    public function detalle( $id ) {
        $admin = Administradores::find( $id )->toArray();
        //echo serialize( $admin );
        return view( 'usuarios.informacion' , 
                [ 
                    'nombreUsuario' => $admin[ 'name' ] , 
                    'emailUsuario'  => $admin[ 'email' ] ,
                    'passUsuario'   => $admin[ 'password' ] 
                ]);
    }
    
}
