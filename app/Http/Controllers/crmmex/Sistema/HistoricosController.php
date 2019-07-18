<?php
/*
 * Controlador para la carga de datos historicos
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Julio 2019
 */

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\crmmex\Productos\Historicos AS Historicos;
use App\Models\crmmex\Productos\Productos AS Productos;

class HistoricosController extends Controller
{
    // Funcion que regresa el listado de todos los historicos dados de alta
    public function listadoHistoricos() {
      $datos = array();
      $historicos = Historicos::where( 'status' , 1 )
                              ->get();
      foreach( $historicos AS $historico ) {
        $datos[ 'historicos' ][] = array(
          'id'         => $historico->id,
          'productoID' => $this->datosProducto( $historico->productoID , 'id' , 'clave' ),
          'mes'        => $historico->mes,
          'anio'       => $historico->anio,
          'monto'      => '$ ' . number_format( $historico->monto , 2 ),
          'unidades'   => $historico->unidades,
          'status'     => ( ( $historico->status == 1 ) ? 'Activo' : 'Inactivo' ),
          'opciones'   => ''
        );
      }

      return response()->json( $datos );
    }

    // Funcion que carga los datos historicos de productos para su pronostico
    public function cargaHistoricos( Request $request ) {
        if( $request->file( 'confHistoricosProducto_file' )->isValid() ) {
            $recurso   = fopen( $request->confHistoricosProducto_file->path() , 'r' );
            $agregados = 0;
            $omitidos  = 0;

            while ( ( $datos = fgetcsv( $recurso , 0 , "\t" , "'" ) ) !== FALSE ) {
                $id = $this->datosProducto( $datos[ $request->confHistoricosProducto_clave ] , 'clave' , 'id' );
                if( $id != '' ) {
                    try {
                        $historicos = new Historicos();
                        $historicos->productoID = $id;
                        $historicos->mes        = $datos[ $request->confHistoricosProducto_mes ];
                        $historicos->anio       = $datos[ $request->confHistoricosProducto_anio ];
                        $historicos->monto      = $datos[ $request->confHistoricosProducto_monto ];
                        $historicos->unidades   = $datos[ $request->confHistoricosProducto_unidades ];
                        $historicos->status     = 1;
                        if( $historicos->save() ) {
                          $agregados ++;
                        }
                    } catch(QueryException $ex){
                      Log::notice( $ex->getMessage() );
                      $omitidos ++;
                    }
                 } else {
                  $omitidos ++;
                }
            }

            $msj = array( 'msj' => 'Archivo procesado correctamente, se agregaron ' . $agregados . ' registros, se omitieron ' . $omitidos );
        } else {
            $msj = array( 'msj' => 'Error al procesar archivo' );
        }

        return response()->json( $msj );
    }

    // Funcion que obtiene el ID del producto de acuerdo a su clave
    private function datosProducto( $valor , $campoBusca , $campoRegresa ) {
        $producto = Productos::where( $campoBusca , $valor )
                             ->where( 'status' , 1 )
                             ->first();

        if( !$producto ) { return ""; }
        else { return $producto->$campoRegresa; }
    }

    // Funcion para exportar el layout de ejemplo
    public function exportarCSV( $periodoInicial , $periodoFinal ) {
      $headers = array(
          "Content-type" => "text/csv",
          "Content-Disposition" => "attachment; filename=ejemplo_layout.csv",
          "Pragma" => "no-cache",
          "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
          "Expires" => "0"
      );

      $datos     = array();
      $productos = Productos::select( DB::raw( "clave AS clave, ''  AS mes, ''  AS mes, ''  AS importe, ''  AS unidades " ) )->where( 'status' , 1 )->get();

      foreach( $productos AS $producto ) {
        $inicial = new Carbon( $periodoInicial );
        $final   = new Carbon( $periodoFinal );
        while( $inicial->lte( $final ) ) {
          $loop    = explode( '-' , $inicial->toDateString() );
          $datos[] = array(
            'clave'      => $producto->clave,
            'mes'        => $loop[ 1 ],
            'anio'       => $loop[ 2 ],
            'monto'      => "",
            'unidades'   => ""
          );

          $inicial->addMonth();
        }
      }

      $columnas = array( 'ID Producto', 'Mes(numerico)', 'Anio(Numerico)', 'Importe vendido', 'Unidades vendidas' );
      $callback = function() use ( $datos , $columnas ) {
          $file = fopen( 'php://output' , 'w' );
          fputcsv( $file , $columnas );

          foreach( $datos as $dato ) {
            fputcsv( $file , array (
                              $dato[ 'clave' ],
                              $dato[ 'mes' ],
                              $dato[ 'anio' ],
                              $dato[ 'monto' ],
                              $dato[ 'unidades' ]
                            )
                    );
          }

          fclose( $file );
      };

      return response()->stream( $callback , 200 , $headers );
    }

}
