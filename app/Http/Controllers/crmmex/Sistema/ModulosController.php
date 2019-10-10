<?php
/*
 * Controlador para el control de modulos y privilegios
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Modulos AS Modulos;

class ModulosController extends Controller
{
  // Listado de Modulos
  public function listadoModulos() {
    $modulos = Modulos::where( 'status' , 1 )->get();
    return response()->json( $modulos );
  }
}
