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
use App\Models\crmmex\Productos\Productos AS Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilsController extends Controller
{

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
       * Obtiene el combo de productos
       */
       public function productosServicios() {
          $datos = array();
          $productos = Productos::where( 'status' , 1 )->get();

          foreach( $productos AS $producto ) {
              $datos[] = array(
                'id'     => $producto->id,
                'nombre' => 'Clave:' . $producto->clave . ' | Nombre:' . $producto->nombre
              );
          }

          return response()->json( $datos );
       }

}
