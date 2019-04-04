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
        return view( 'crmmex.home' , array (
            'estilo' => $datos->estilo ,
            'css'    => $datos->css ,
            'btn'    => $datos->boton ,
            'back'   => $datos->background,
            'borde'  => $datos->borde
        ));
    }

    /* Actualiza tema utilizado */
    public function update( $id ) {
        /* Quita default */
        $actual = Branding::where( 'seleccionado' , 1 )->first();
        $back   = $actual->background;
        $actual->seleccionado=0;
        $actual->background='';
        $actual->save();

        /* Asigna nuevo */
        $seleccionado = Branding::where( 'id' , $id )->first();
        $seleccionado->seleccionado=1;
        $seleccionado->background=$back;
        $seleccionado->save();
    }

    /* Actualiza imagen */
    public function updateImagen( $imagen ) {
        /* Quita default */
        $actual = Branding::where( 'seleccionado' , 1 )->first();
        $actual->background=$imagen;
        $actual->save();
    }

}
