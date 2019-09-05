<?php

namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Direccion AS Direccion;

class ImportacionController extends Controller
{
    /* Metodo que carga el layout a ser procesado
     * para la importacion de clientes y prospectos
     */
    public function cargaLayoutClientes( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          $countLine = count( $datos );
          if( $line == 0 ) {
            for( $t = 0 ; $t < $countLine ; $t++ ) {
              $data[ 'titles' ][] = $datos[ $t ];
            }
          } else {
            for( $t = 0 ; $t < $countLine ; $t++ ) {
              $data[ 'data' ][] = $datos[ $t ];
            }
          }
          $line ++;
        }
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }
      return response()->json( $data );
    }

    public function cargaLayoutClientesMexagon( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          $countLine = count( $datos );
          //if( $countLine != 44 ) { continue; }
          array_map( 'trim' , $datos );

          if( $line > 0 ) {
            // Alta del registro cliente
            $cliente = new Clientes();
            $cliente->id            = $datos[ 0 ];
            $cliente->razonSocial   = ( isset( $datos[ 35 ] ) ? $datos[ 35 ] : '' );
            $cliente->rfc           = ( isset( $datos[ 5 ] ) ? $datos[ 5 ] : '' );;
            $cliente->ejecutivo     = Auth::user()->id;
            $cliente->fechaAlta     = date( 'Y-m-d H:i:s' );
            $cliente->tipo          = 2;
            $cliente->observaciones = ( isset( $datos[ 39 ] ) ? $datos[ 39 ] : '' );
            $cliente->productoID    = 1;
            $cliente->status        = 1;

            if( $cliente->save() ) {
              // Alta del registro contacto
              $contacto = new Contactos();
              $contacto->clienteID         = $cliente->id;
              $contacto->nombre            = $datos[ 3 ];
              $contacto->apellidoPaterno   = $datos[ 1 ];
              $contacto->apellidoMaterno   = $datos[ 2 ];
              $contacto->correoElectronico = $datos[ 16 ];
              $contacto->celular           = $datos[ 19 ];
              $contacto->telefono          = $datos[ 17 ];
              $contacto->extension         = $datos[ 18 ];
              $contacto->status            = 1;
              $contacto->fechaAlta         = date( 'Y-m-d H:i:s' );
              $contacto->ejecutivo         = Auth::user()->id;
              $contacto->ejecutivoAlta     = Auth::user()->id;
              $contacto->save();

              // Alta del registro direccion
              $direccion = new Direccion();
              $direccion->clienteID     = $cliente->id;
              $direccion->calle         = $datos[ 6 ];
              $direccion->noExterior    = '';
              $direccion->noInterior    = '';
              $direccion->colonia       = $datos[ 8 ];
              $direccion->cp            = $datos[ 7 ];
              $direccion->delegacion    = $datos[ 11 ];
              $direccion->ciudad        = $datos[ 12 ];
              $direccion->estado        = $datos[ 9 ];
              $direccion->pais          = 1;//$datos[ 10 ];
              $direccion->fechaAlta     = date( 'Y-m-d H:i:s' );
              $direccion->ejecutivoAlta = Auth::user()->id;
              $direccion->status = 1;
              $direccion->save();
            }
          }

          $line ++;
        }
        $data = array( 'Se almacenaron ' . $line . 'registros' );
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }

      return response()->json( $data );
    }

}
