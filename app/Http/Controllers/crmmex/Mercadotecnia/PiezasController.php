<?php
/*
 * Controlador para la administracion de las piezas de correo a enviar en
 * las campañas configuradas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Mercadotecnia\Piezas AS Piezas;
use App\Models\crmmex\Mercadotecnia\Campanias AS Campanias;

class PiezasController extends Controller
{
    // Metodo que retorna el listado de piezas disponibles
    public function listadoPiezas() {
        $piezas = Piezas::where( 'status' , 1 )->get();
        return response()->json( $piezas );
    }

    // Metodo que agrega una nueva pieza
    public function nuevaPieza( Request $request ) {
        if( $request->idTemplateEditado == 0 ) {
              $pieza = new Piezas();
              $pieza->nombrePieza = $request->nombreNuevoTemplate;
              $pieza->pieza       = $request->diseno_template_editor;
              $pieza->formID      = $request->nuevoTemplateForm;
              $pieza->status      = 1;
              $pieza->save();
          } else {
              $pieza = Piezas::find( $request->idTemplateEditado );
              $pieza->nombrePieza = $request->nombreNuevoTemplate;
              $pieza->pieza       = $request->diseno_template_editor;
              $pieza->formID      = $request->nuevoTemplateForm;
              $pieza->status      = 1;
              $pieza->save();
        }
    }

    // Metodo que agrega una neuva pieza para las campañas
    public function altaPiezaCampania( Request $request ) {
        $piezaCampania = new Piezas();
        $piezaCampania->nombrePieza = $request->altaNuevoTemplate_nombre;
        $piezaCampania->pieza       = $request->contPieza;
        $piezaCampania->formID      = $request->altaNuevoTemplate_formOpciones;
        $piezaCampania->status      = 1;
        $piezaCampania->save();
        return response()->json( array( 'mensaje' => 'Pieza agregada correctamente' ) );
    }

    // Metodo que obtiene el detalle de una pieza
    public function detallePieza( $piezaID ) {
        $pieza = Piezas::find( $piezaID );
        return response()->json( $pieza );
    }

    // Metodo que elimina una pieza
    public function eliminaPieza( $piezaID ) {
        $enUso = Campanias::where( 'status' , 1 )
                          ->where( 'pieza' , $piezaID )
                          ->where( 'fechaEnvio' , '>' , date( 'Y-m-d H:i:s' ) )
                          ->count();

        if( $enUso > 0 ) {
          $mensaje = 'La pieza se encuentra asignada a una campaña vigente';
        } else {
          $pieza = Piezas::find( $piezaID );
          $pieza->status = 0;
          $pieza->save();
          $mensaje = 'Pieza eliminada correctamente';
        }

        return response()->json( array( 'mensaje' => $mensaje ) );
    }

}
