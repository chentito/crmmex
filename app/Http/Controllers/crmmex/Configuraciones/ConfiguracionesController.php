<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Sistema\Configuraciones AS Configuraciones;

class ConfiguracionesController extends Controller
{

  // Establece el valor de una configuracion
  public function setValue( $configuracionID , $valor ) {
    $conf = Configuraciones::find( $configuracionID )->first();
    $conf->valor = $valor;
    $conf->save();
  }

  // Listado de todas las configuraciones
  public function configuraciones() {
    $conf = Configuraciones::where( 'status' , 1 )->get();
    return response()->json( $conf );
  }

  // Establece los valores de configuraciones en un solo movimiento
  public function setConfiguraciones( Request $request ) {
    foreach( $request->all() AS $key => $value ) {
      $id = explode( '_' , $key );
      $this->setValue( $id[ 1 ] , $value );
    }
  }

}
