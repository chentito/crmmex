<?php
/*
 * Controlador que maneja la carga de contenidos de acuerdo al nombreCliente
 * de la seccion solicitada, pasa un parametro para su procesamiento
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Marzo 2019
 */
namespace App\Http\Controllers\contenidos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Secciones AS Secciones;
use App\branding\Branding AS Branding;
use App\Http\Controllers\crmmex\Sistema\AccesoController AS AccesoController;

use App\Models\crmmex\Sistema\Configuraciones AS Configuraciones;

class ContenidosController extends Controller
{

  // Controlador encargado para cargar la pantalla seleccionada
  public function contenidos( $id , $param='' ) {
    $this->middleware( 'auth' );
    usleep(500000);
    $branding   = Branding::where( 'seleccionado' , 1 )->first();
    $secciones  = Secciones::where( 'identificador' , $id )->first();
    $perfilID   = Auth::user()->rol;
    $configuraciones = Configuraciones::find( 1 )->first();
    $container  = ( $configuraciones->valor == 1 ) ? 'container' : 'container-fluid';
    $breadcrumb = explode( '|' , $secciones->ruta );
    $parametro  = ( $param != '' ) ? $param : '';

    return response()->json([
      'body' => view( $secciones->vista , [ 'estilo'    => $branding->estilo ,
                                            'css'       => $branding->css ,
                                            'btn'       => $branding->boton ,
                                            'trans'     => ( $branding->transparencia * 10 ) ,
                                            'borde'     => $branding->borde ,
                                            'container' => $container ,
                                            'param'     => $parametro ,
                                            'priv'      => AccesoController::verModulos( $perfilID )
                                          ] )->render(),
      'breadcrumb' => view( 'crmmex.utils.breadcrumb' , [ 'elementos' => $breadcrumb , 'estilo'    => $branding->estilo ] )->render()
    ]);
  }

}
