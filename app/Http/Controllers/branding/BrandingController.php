<?php

namespace App\Http\Controllers\branding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\branding\Branding AS Branding;
use App\Models\crmmex\Sistema\Configuraciones AS Configuraciones;

class BrandingController extends Controller
{

    /* Acceso */
    public function index() {
        $datos = Branding::where( 'seleccionado' , 1 )->first();
        $menu  = $this->tipoMenu();
        return view( 'crmmex.home' , array (
            'estilo'    => $datos->estilo ,
            'css'       => $datos->css ,
            'btn'       => $datos->boton ,
            'back'      => $datos->background,
            'usaBack'   => $datos->usa_background,
            'borde'     => $datos->borde,
            'trans'     => $datos->transparencia,
            'tipoMenu'  => $menu,
            'container' => ( $menu == 1 ) ? 'container' : 'container-fluid',
        ));
    }

    /* Actualiza tema utilizado */
    public function update( $id ) {
        /* Quita default */
        $actual = Branding::where( 'seleccionado' , 1 )->first();
        $back   = $actual->background;
        $actual->seleccionado=0;
        $actual->usa_background=0;
        $actual->background='';
        $actual->save();

        /* Asigna nuevo */
        $seleccionado = Branding::where( 'id' , $id )->first();
        $seleccionado->seleccionado=1;
        $seleccionado->usa_background=1;
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

    /* Quita el uso de la imagen */
    public function quitaImagen() {
        $seleccionado = Branding::where( 'seleccionado' , 1 )->first();
        $seleccionado->usa_background = 0;
        $seleccionado->background     = "";
        $seleccionado->transparencia  = 1;
        $seleccionado->save();
    }

    /* Establece Transparencia */
    public function guardaTrans( $val ) {
        $seleccionado = Branding::where( 'seleccionado' , 1 )->first();
        $seleccionado->transparencia = $val/10;
        $seleccionado->save();
    }

    /* Tipo de menu a desplegar */
    private function tipoMenu() {
        $menu = Configuraciones::find( 1 )->first();
        return $menu->valor;
    }

}
