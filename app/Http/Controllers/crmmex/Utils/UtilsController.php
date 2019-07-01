<?php
/*
 * Controlador para funciones utiles del sistema
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Utils;

use App\Models\crmmex\Utils\Estados AS Estados;
use App\Models\crmmex\Utils\Paises AS Paises;
use App\Models\crmmex\Utils\Catalogo AS Catalogo;
use App\Models\crmmex\Utils\Estatus AS Estatus;
use App\Models\crmmex\Utils\OpcionesCat AS Opciones;
use App\Models\crmmex\Utils\Promociones AS Promociones;
use App\Models\crmmex\Productos\Productos AS Productos;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Utils\Predefinidos AS Predefinidos;
use App\User AS Ejecutivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilsController extends Controller
{

    protected static $meses = array(
        '01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr', '05' => 'May', '06' => 'Jun',
        '07' => 'Jul', '08' => 'Ago', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'
    );

    /*
     * Regresa el listado de estados
     */
     public function estados( $paisID = '' ) {
        $datos   = array();
        $estados = Estados::where( 'status' , 1 )->get();

        foreach( $estados AS $estado ) {
            $datos[] = array(
              'id'      => $estado->id,
              'entidad' => $estado->entidad
            );
        }

        return response()->json( $datos );
     }

     /*
      * Regresa el listado de paises
      */
     public function paises() {
        $datos  = array();
        $paises = Paises::where( 'status' , 1 )->get();

        foreach ( $paises as $pais ) {
            $datos[] = array(
                'id'     => $pais->id,
                'nombre' => $pais->nombre
            );
        }

        return response()->json( $datos );
     }

     /*
      * Regresa los posibles estados de un registro
      */
      public function estatusRegistro() {
          $datos = array();
          $estatus = Estatus::all();

          foreach( $estatus AS $e ) {
              $datos[] = array(
                'id'     => $e->id,
                'status' => $e->status
              );
          }

          return response()->json( $datos );
      }

     /*
      * Obtiene las opciones de catalogos utiles
      */
      public function opcionesCatalogos( $catalogoID ) {
          $catalogo = array();
          $opciones = Catalogo::find( $catalogoID );

          foreach( $opciones->opciones AS $opcion ) {
              $catalogo[] = array(
                  'id'     => $opcion->id,
                  'nombre' => $opcion->opcion,
                  'params' => $opcion->parametros
              );
          }

          return response()->json( $catalogo );
      }

      /*
       * Obtiene los catalogos y sus opciones
       */
      public function catalogo( $id ) {
          $catalogo = array();
          $opciones = Catalogo::find( $id );

          $catalogo[] = array(
              'id'     => 0,
              'nombre' => $opciones->nombre,
              'params' => ''
          );

          foreach( $opciones->opciones AS $opcion ) {
              $catalogo[] = array (
                  'id'     => $opcion->id,
                  'nombre' => $opcion->opcion,
                  'params' => $opcion->parametros
              );
          }

          return response()->json( $catalogo );
      }

      /*
       * Obtiene el valor de un parametro del catalogo
       */
       public static function valorCatalogo( $valorID ) {
          $opciones = Opciones::find( $valorID );
          return $opciones->opcion;
       }

       /*
        * Obtiene el nombre de un ejecutivo de acuerdo a su ID
        */
        public static function nombreEjecutivo( $ejecutivoID ) {
            $ejecutivo = Ejecutivo::find( $ejecutivoID );
            return $ejecutivo->name . ' ' . $ejecutivo->apPat . ' ' . $ejecutivo->apMat;
        }

      /*
       * Obtiene razon social de un cliente a partir de su id
       */
       public static function nombreCliente( $clienteID ) {
          $cliente = Clientes::find( $clienteID );
          return $cliente->razonSocial;
       }

       /*
        * Obtiene el nombre de algun contacto
        */
        public static function nombreContacto( $contactoID ) {
            $contacto = Contactos::find( $contactoID );
            return $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' . $contacto->apellidoMaterno . ' [' . $contacto->correoElectronico . ']';
        }

        /*
         * Obtiene el nombre del producto
         */
         public static function nombreProducto( $productoID ) {
            $producto = Productos::find( $productoID );
            return $producto->clave . ' ' . $producto->nombre . ( strlen( $producto->descripcion > 0 ) ? ' / ' . $producto->descripcion : '' );
         }

      /*
       * Obtiene el combo de productos
       */
       public function productosServicios( $grupo='' ) {
          $datos = array();
          $productos = Productos::where( 'status' , 1 )
                                ->when( $grupo!='' , function( $q ) use( $grupo ) {
                                    $q->where( 'grupo' , $grupo );
                                })
                                ->get();

          foreach( $productos AS $producto ) {
              $datos[] = array(
                'id'     => $producto->id,
                'nombre' => 'Clave:' . $producto->clave . ' | Nombre:' . $producto->nombre
              );
          }

          return response()->json( $datos );
       }

       /*
        * Obtiene listado de contactos por cliente
        */
        public function listadoContactos( $clienteID ) {
            $datos = array();
            $contactos = Contactos::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->get();

            foreach( $contactos AS $contacto ) {
                $datos[] = array(
                  'id' => $contacto->id,
                  'nombre' => $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' .
                              $contacto->apellidoMaterno . ' [' . $contacto->correoElectronico . ']'
                );
            }

            return response()->json( $datos );
        }

        public static function aplicaPromocion( $promoID , $monto ) {
            $hoy       = date( 'Y-m-d H:i:s' );
            $promocion = Promociones::find( $promoID );

            if( $promocion->inicioVigencia > $hoy || $promocion->finVigencia < $hoy ) return $monto;

            if( $promocion->tipoDescuento == 1 ) {
                  return number_format( ( $monto * $promocion->cantidad ) / 100 , 2 );
              } elseif( $promocion->tipoDescuento == 2 ) {
                  return number_format( $monto - $promocion->cantidad , 2 );
            }

        }

        public function listadoPromociones() {
            $promos   = array();
            $promos[] = array( 'id' => '0' , 'nombre' => 'Sin promocion' );
            $promociones = Promociones::where( 'status' , 1 )
                                      ->where( 'inicioVigencia' , '<' , date( 'Y-m-d H:i:s' ) )
                                      ->where( 'finVigencia' , '>' , date( 'Y-m-d H:i:s' ) )->get();

            foreach ( $promociones AS $promocion ) {
                $promos[] = array( 'id' => $promocion->id , 'nombre' => $promocion->nombreDescuento .  ( ( $promocion->tipoDescuento == 1 ) ? ' [' . $promocion->cantidad . '%]' : '' ) );
            }

            return response()->json( $promos );
        }

        public static function datosProducto( $productoID ) {
            $producto = Productos::find( $productoID );
            return $producto;
        }

        public function getPredefinido( $predefinidoID ) {
            $predefinido = Predefinidos::find( $predefinidoID );
            return $predefinido;
        }

        public function setPredefinido( Request $request) {
            $valor = $request->nomenclatura_prefijo . '_' . $request->nomenclatura_variable . '_' . $request->nomenclatura_identificador;
            $predefinido = Predefinidos::find( $request->nomenclatura_id );
            $predefinido->valor = $valor;
            $predefinido->save();
        }

        public static function detallePredefinido( $predefinidoID ) {
            $predefinido = Predefinidos::find( $predefinidoID );
            return $predefinido;
        }

        public static function formatoFecha( $f ) {return $f;
            list( $fecha , $hora )      = explode( ' ' , $f );
            list( $anio , $mes , $dia ) = explode( '-' , $fecha );
            //$formato = $dias[ 2 ] . ' de ' . self::$meses[ $dias[ 1 ] ] . ', ' .$dias[ 0 ];
            $formato = $anio;
            if( isset( $hora ) ) {
                $formato .= ' ' . $fecha;
            }

            return $formato;
        }

}
