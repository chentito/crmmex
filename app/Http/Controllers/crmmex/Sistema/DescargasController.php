<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescargasController extends Controller
{

  //Descarga de archivos ejemplos para carga de contenidos
  public function descargaArchivoEjemplo( $archivo ) {

    switch( $archivo ) {
      case 'LayoutProductos' : $file = 'EjemploLayoutProductos.csv'; break;
    }

    $headers = array( 'Content-Type: application/csv' );
    return Storage::download('EjemploLayoutProductos.csv', 'Layout.csv' , $headers);
  }

}
