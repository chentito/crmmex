<?php
/*
 * Procesos de carga de información a través de layout:
 * Clientes/Prospectos, Contactos y campos adicionales.
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */
namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\crmmex\Utils\CamposAdicionalesController AS CamposAdicionales;

use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Direccion AS Direccion;
use App\Models\crmmex\Utils\CamposAdicionalesValores AS CamposAdicionalesValores;

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

    public function ajustaGiro( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 1 ) {
            $seccion = ( ( $datos[ 36 ] == 0 ) ? "2" : "1" );
            $campoID = ( ( $datos[ 36 ] == 0 ) ? "1" : "15" );
            $adicionales = CamposAdicionalesValores::where( 'registroID' , $datos[ 0 ] )->where( 'seccion' , $seccion )->where( 'campoAdicionalID' , $campoID )->first();
            $adicionales->valor = $datos[ 14 ];
            $adicionales->save();
            Log::warning(  DB::getQueryLog() );
          }
          $line ++;
        }
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }

      return response()->json( $data );
    }

    public function altaIDWHCMS( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 1 ) {
            if( $datos[ 36 ] != "0" ) {
              $requestWH = new Request( [ 'edicionCampoAdicional_1_40' => $datos[ 36 ] ] );
              Log::warning( 'Posicion 36 el valor para el ID ' . $datos[ 0 ] . ' es: ' . $datos[ 36 ] );
              CamposAdicionales::almacenaDatosAdicionales( $requestWH , $datos[ 0 ] , 1  );
            }
          }
          $line ++;
        }
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }

      return response()->json( $data );
    }

    public function idWH_RFC( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 0 ) {
            $cliente = Clientes::where( 'rfc' , $datos[ 1 ] )->first();
            if( $cliente ) {
              $requestWH = new Request( [ 'edicionCampoAdicional_1_40' => $datos[ 0 ] ] );
              CamposAdicionales::almacenaDatosAdicionalesMasivos( $requestWH , $cliente->id , 1 );
            }
          }
          $line ++;
        }
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }

      return response()->json( $data );
    }

    public function cargaBaseDatosWHMCSCamposAdicionales( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 0 ) {
            /* Guarda los campos adicionales asignados al cliente */
            $requestWH = new Request([ 'edicionCampoAdicional_1_' . $datos[ 0 ]  => $datos[ 3 ] ]);
            CamposAdicionales::almacenaDatosAdicionalesMasivos( $requestWH , $datos[ 2 ] , 1 );
          }
          $line ++;
        }
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }
      return response()->json( $data );
    }

    public function cargaBaseDatosWHMCS( Request $request ) {
      $line = 0;
      $data = array();
      if( $request->file( 'layoutCargaProspectos' )->isValid() ) {
        $recurso = fopen( $request->layoutCargaProspectos->path() , 'r' );
        while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
          if( $line > 0 ) {
            // Crea cliente
            $cliente = new Clientes();
            $cliente->razonSocial   = $datos[ 4 ];
            $cliente->rfc           = $datos[ 1 ];
            $cliente->ejecutivo     = Auth::user()->id;
            //$cliente->fechaAlta     = $datos[ 51 ];
            $cliente->fechaAlta     = date( 'Y-m-d H:i:s' );
            $cliente->tipo          = 1;// Exclusivamente clientes
            $cliente->observaciones = ( isset( $datos[ 25 ] ) ? $datos[ 25 ] : '' );
            $cliente->productoID    = 0;
            $cliente->status        = 1;

            if( $cliente->save() ) {
              /* Guarda los campos adicionales asignados al cliente */
              $requestWH = new Request([ 'edicionCampoAdicional_1_40' => $datos[ 0 ] ]);
              CamposAdicionales::almacenaDatosAdicionales( $requestWH , $cliente->id , 1 );

              // Alta del registro contacto
              $contacto = new Contactos();
              $contacto->clienteID         = $cliente->id;
              $contacto->nombre            = $datos[ 2 ];
              $contacto->apellidoPaterno   = $datos[ 3 ];
              $contacto->apellidoMaterno   = "";
              $contacto->correoElectronico = $datos[ 5 ];
              $contacto->celular           = "";
              $contacto->telefono          = $datos[ 12 ];
              $contacto->extension         = "";
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
              $direccion->colonia       = "";
              $direccion->cp            = $datos[ 10 ];
              $direccion->delegacion    = "";
              $direccion->ciudad        = $datos[ 8 ];
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
      } else {
        $data = array( 'Error al adjuntar archivo' );
      }
      return response()->json( $data );
    }

      /* Metodo que genera un identificador temporal para el RFC */
      public function rfcTemp() {
        $temp = '';
        $opciones = array( 'a' , 'b' , 'c' , 'd' , 'e' , 'f' , 'g' ,
                           'h' , 'i' , 'j' , 'k' , 'l' , 'm' , 'n' ,
                           'o' , 'p' , 'q' , 'r' , 's' , 't' , 'u' ,
                           'v' , 'w' , 'x' , 'y' , 'z' , '1' , '2' ,
                           '3' , '4' , '5' , '6' , '7' , '8' , '9'
                    );
        for( $i = 0 ; $i < 10 ; $i ++ ) {
          $temp .= $opciones[ rand( 0 , 34 ) ];
        }

        return $temp;
      }

}
