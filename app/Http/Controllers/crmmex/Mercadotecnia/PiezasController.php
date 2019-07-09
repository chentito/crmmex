<?php

namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Mercadotecnia\Piezas AS Piezas;

class PiezasController extends Controller
{
    // Metodo que retorna el listado de piezas disponibles
    public function listadoPiezas() {
        $piezas = Piezas::where( 'status' , 1 )->get();
        return response()->json( $piezas );
    }

    // Metodo que agrega una nueva pieza
    public function nuevaPieza( Request $request ) {
        $pieza = new Piezas();
        $pieza->nombrePieza = $request->nombreNuevoTemplate;
        $pieza->pieza       = $request->diseno_template_editor;
        $pieza->status      = 1;
        $pieza->save();
    }

    // Metodo que obtiene el detalle de una pieza
    public function detallePieza( $piezaID ) {
        $pieza = Piezas::find( $piezaID );
        return response()->json( $pieza );
    }

}
