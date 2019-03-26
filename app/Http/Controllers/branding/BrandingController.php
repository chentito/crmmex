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
        return view( 'crmmex.index' , array( 'estilo' => $datos->estilo , 'css' => $datos->css , 'btn' => $datos->boton ) );
    }

}
