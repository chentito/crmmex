<?php

namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Mercadotecnia\Listas AS Listas;
use App\Models\crmmex\Mercadotecnia\ListasContactos AS Contactos;

class ListasController extends Controller
{
    // Listas disponibles
    public function listadoListas() {
        $listas = Listas::where( 'status' , 1 )->get();
        return response()->json( $listas );
    }

    // Contactos disponibles
    public function listadoContactos( $audienciaID ) {
        $contactos = Contactos::where( 'status' ,  1 )
                              ->where( 'audienciaID' , $audienciaID )
                              ->get();
        return response()->json( $contactos );
    }

    // Alta audiencia
    public function altaListado( Request $request ) {
        if( $request->file( 'altaAudiencia_file' )->isValid() ){
              // Genera lista
              $lista = new Listas();
              $lista->nombre = $request->altaAudiencia_nombreListado;
              $lista->status = 1;
              $lista->save();
              $id = $lista->id;

              // Recorre los elementos del archivo
              $recurso = fopen( $request->altaAudiencia_file->path() , 'r' );
              while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
                  $contactos = new Contactos();
                  $contactos->audienciaID = $id;
                  $contactos->nombre      = $datos[ $request->altaAudiencia_posNom ];
                  $contactos->email       = $datos[ $request->altaAudiencia_posEmail ];
                  $contactos->telefono    = $datos[ $request->altaAudiencia_posTel ];
                  $contactos->empresa     = $datos[ $request->altaAudiencia_posEmpresa ];
                  $contactos->status      = 1;
                  $contactos->save();
              }

              $msj = array( 'msj' => 'Archivo procesado correctamente' );
          } else {
              $msj = array( 'msj' => 'Error al adjntar archivo' );
        }

        return response()->json( $msj );
    }

}
