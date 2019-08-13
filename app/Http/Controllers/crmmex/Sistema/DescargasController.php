<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescargasController extends Controller
{

  //Descarga de archivos ejemplos para carga de contenidos
  public function descargaArchivoEjemplo( $archivo ) {

    switch( $archivo ) {
      case 'LayoutProductos' : $file = public_path() . '/storage/ejemplos/EjemploLayoutProductos.csv'; break;
    }

    $headers = array( 'Content-Type: application/csv' );
    return response()->download( $file , 'Layout.csv' , $headers );
  }

}
