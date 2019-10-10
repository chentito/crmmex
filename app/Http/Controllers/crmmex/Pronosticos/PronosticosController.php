<?php

namespace App\Http\Controllers\crmmex\Pronosticos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Pronosticos\Pronosticos AS Pronosticos;

class PronosticosController extends Controller
{

  //Obtiene el listado de los procesamientos para el calculo de forecast
  public function listadoProcesaimentos() {
    $ejecuciones = Pronosticos::where( 'status' , 1 )->get();
    return response()->json( $ejecuciones );
  }
}
