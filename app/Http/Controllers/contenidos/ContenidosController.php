<?php

namespace App\Http\Controllers\contenidos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Secciones AS Secciones;
use App\branding\Branding AS Branding;

class ContenidosController extends Controller
{
    // Controlador encargado para cargar la pantalla seleccionada
    public function contenidos( $id ) {
        usleep(500000);
        $branding   = Branding::where( 'seleccionado' , 1 )->first();
        $secciones  = Secciones::where( 'identificador' , $id )->first();
        $breadcrumb = explode( '|' , $secciones->ruta );

        return response()->json([
                'body'       => view( $secciones->vista , [ 'estilo' => $branding->estilo ,
                                                            'css'    => $branding->css ,
                                                            'btn'    => $branding->boton , 
                                                            'borde'  => $branding->borde ]
                                    )->render(),
                'breadcrumb' => view( 'crmmex.utils.breadcrumb' , [ 'elementos' => $breadcrumb , 
                                                                    'estilo'    => $branding->estilo ] 
                                    )->render()

        ]);
    }

}
