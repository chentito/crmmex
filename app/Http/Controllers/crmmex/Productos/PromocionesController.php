<?php

namespace App\Http\Controllers\crmmex\Productos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Utils\Promociones AS Promociones;

class PromocionesController extends Controller
{
    /*
     * Listado de promociones
     */
     public function listadoPromociones() {
        $promos = array();
        $promociones = Promociones::where( 'status' , 1 )->get();

        foreach( $promociones AS $promocion ) {
            $promos[ 'promociones' ][] = array(
              'id'              => $promocion->id,
              'nombreDescuento' => $promocion->nombreDescuento,
              'tipoDescuento'   => ( ( $promocion->tipoDescuento == 1 ) ? 'Porcentaje' : 'Monto' ),
              'cantidad'        => $promocion->cantidad,
              'inicioVigencia'  => $promocion->inicioVigencia,
              'finVigencia'     => $promocion->finVigencia,
              'status'          => ( ( $promocion->status == 1 ) ? 'Activa' : 'Inactiva' ),
              'opciones'        => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Promoción" onclick="contenidos(\'configuraciones_editaPromocion\',\''.$promocion->id.'\')" class="mr-2"><i class="fa fa-edit fa-sm"></i></a>'
                                 . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Visualizar Propuesta" onclick="contenidos(\'configuraciones_eliminaPromocion\',\''.$promocion->id.'\')" class="mr-2"><i class="fa fa-trash fa-sm"></i></a>'

            );
        }

        return response()->json( $promos );
     }

     /*
      * Metodo que guarda una promocion
      */
      public function guardaPromocion( Request $request ) {
          $promocion = new Promociones();
          $promocion->nombreDescuento = $request->promociones_nombre;
          $promocion->tipoDescuento   = $request->promociones_tipo;
          $promocion->cantidad        = $request->promociones_cantidad;
          $promocion->inicioVigencia  = $request->promociones_inicioVigencia;
          $promocion->finVigencia     = $request->promociones_finVigencia;
          $promocion->status          = 1;
          $promocion->save();
      }

      /*
       * Metodo que actualiza una promocion
       */
       public function actualizaPromocion( Request $request ) {
          $promocion = Promociones::find( $request->promociones_id );
          $promocion->nombreDescuento = $request->promociones_nombre;
          $promocion->tipoDescuento   = $request->promociones_tipo;
          $promocion->cantidad        = $request->promociones_cantidad;
          $promocion->inicioVigencia  = $request->promociones_inicioVigencia;
          $promocion->finVigencia     = $request->promociones_finVigencia;
          $promocion->save();
       }

      /*
       * Metodo que obtiene el detalle de una promocion
       */
       public function detallePromocion( $promocionID ) {
          $promocion = Promociones::find( $promocionID );
          return response()->json( $promocion );
       }

       /*
        * Metodo que elimina una promocion
        */
        public function eliminaPromocion( $promocionID ) {
            $promocion = Promociones::find( $promocionID );
            $promocion->status = 0;
            $promocion->save();
        }

}
