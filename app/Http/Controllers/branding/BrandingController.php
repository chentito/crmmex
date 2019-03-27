<?php

namespace App\Http\Controllers\branding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\branding\Branding AS Branding;

class BrandingController extends Controller
{
    
    /* Acceso */
    public function index() {
        $datos = Branding::where( 'seleccionado' , 1 )->first();
        return view( 'crmmex.home' , array( 'estilo' => $datos->estilo , 'css' => $datos->css , 'btn' => $datos->boton , 'borde' => $datos->borde ) );
    }

    /* Actualiza tema utilizado */
    public function update( $id ) {
        /* Quita default */
        $actual = Branding::where( 'seleccionado' , 1 )->first();
        $actual->seleccionado=0;
        $actual->save();
        
        /* Asigna nuevo */
        $seleccionado = Branding::where( 'id' , $id )->first();
        $seleccionado->seleccionado=1;
        $seleccionado->save();
    }

}
