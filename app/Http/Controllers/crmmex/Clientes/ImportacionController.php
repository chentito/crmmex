<?php

namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Direccion AS Direccion;

use App\Http\Controllers\crmmex\Utils\CamposAdicionalesController AS CamposAdicionales;

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

          if( $line > 1 ) {
            // Alta del registro cliente
            $cliente = new Clientes();
            $cliente->id            = $datos[ 0 ];
            $cliente->razonSocial   = ( isset( $datos[ 35 ] ) ? $datos[ 35 ] : '' );
            $cliente->rfc           = ( isset( $datos[ 5 ] ) ? $datos[ 5 ] : '' );;
            $cliente->ejecutivo     = Auth::user()->id;
            $cliente->fechaAlta     = $datos[ 29 ];
            if( $datos[ 36 ] == 0 ) {
              $cliente->tipo        = 2;
              $tipo = 2;
            } else {
              $cliente->tipo        = 1;
              $tipo = 1;
            }

            $cliente->observaciones = ( isset( $datos[ 39 ] ) ? $datos[ 39 ] : '' );
            $cliente->productoID    = 1;
            $cliente->status        = 1;

            if( $cliente->save() ) {
              // Guarda los campos adicionalesEdicion

              if( $datos[ 36 ] == 0 ) {
                $request = new Request([
                  'edicionCampoAdicional_' . $cliente->tipo . '_1'  => $datos[ 14 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_2'  => $datos[ 15 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_3'  => $datos[ 20 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_4'  => $datos[ 21 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_5'  => $datos[ 22 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_6'  => $datos[ 23 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_7'  => $datos[ 24 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_8'  => $datos[ 25 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_9'  => $datos[ 26 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_10' => $datos[ 27 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_11' => $datos[ 28 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_12' => $datos[ 30 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_13' => $datos[ 43 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_14' => $datos[ 4 ]
                ]);
              } else {
                $request = new Request([
                  'edicionCampoAdicional_' . $cliente->tipo . '_15' => $datos[ 14 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_16' => $datos[ 15 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_17' => $datos[ 20 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_18' => $datos[ 21 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_19' => $datos[ 22 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_20' => $datos[ 23 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_21' => $datos[ 24 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_22' => $datos[ 25 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_23' => $datos[ 26 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_24' => $datos[ 27 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_25' => $datos[ 28 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_26' => $datos[ 30 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_27' => $datos[ 43 ],
                  'edicionCampoAdicional_' . $cliente->tipo . '_28' => $datos[ 4 ]
                ]);
              }
              /* Guarda los campos adicionales asignados al cliente */
              CamposAdicionales::almacenaDatosAdicionales( $request , $cliente->id , $tipo );

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

    public function cargaLayoutContactosMexagon( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 1 ) {
            if( $this->existsParent( $datos[ 8 ] ) > 0 ) {
              $contacto = new Contactos();
              $contacto->clienteID         = $datos[ 8 ];
              $contacto->nombre            = $datos[ 1 ];
              $contacto->apellidoPaterno   = "";
              $contacto->apellidoMaterno   = "";
              $contacto->correoElectronico = $datos[ 2 ];
              $contacto->celular           = $datos[ 4 ];
              $contacto->telefono          = $datos[ 3 ];
              $contacto->extension         = "";
              $contacto->status            = 1;
              $contacto->fechaAlta         = $datos[ 9 ];
              $contacto->ejecutivo         = Auth::user()->id;
              $contacto->ejecutivoAlta     = Auth::user()->id;

              $contacto->save();
              $requestCont = new Request([
                'edicionCampoAdicional_4_29' => $datos[ 5 ],
                'edicionCampoAdicional_4_30' => $datos[ 6 ],
                'edicionCampoAdicional_4_31' => $datos[ 7 ],
              ]);
              CamposAdicionales::almacenaDatosAdicionales( $requestCont , $contacto->id , 4 );
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

    private function existsParent( $parentID ) {
      $total = Clientes::where( 'id' , $parentID )->count();
      return $total;
    }

}
