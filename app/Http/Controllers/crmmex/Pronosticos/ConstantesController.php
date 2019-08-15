<?php

namespace App\Http\Controllers\crmmex\Pronosticos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\crmmex\Pronosticos\Constantes AS Constantes;
use App\Models\crmmex\Pronosticos\FormulaConfiguracion AS Config;

class ConstantesController extends Controller
{

  // Obtiene el listado de todas las constantes
  public function getConstants() {
    $constants = Constantes::where( [ 'status' => 1 ] )
                           ->get();
    return response()->json( $constants );
  }

  // Agrega una nueva estructura para la constante
  public function addConstantStructure( $nombre='' , $descripcion='' , $valor='' , $id='0' , $tipo='' ) {
    $random = rand(11111,99999);
    return view( 'crmmex.pronosticos.constante' ,
                [ 'nombre'      => $nombre ,
                  'descripcion' => $descripcion ,
                  'valor'       => $valor ,
                  'id'          => $id ,
                  'tipo'        => $tipo ,
                  'rand'        => $random ] );
  }

  // Obtiene los datos de la configuracion
  public function getConfiguration() {
    $datos = Config::where( [ 'status' => 1 ] )->first();
    return response()->json( $datos );
  }

  // Guarda la configuracion de la formula
  public function setConfiguration( Request $request ) {
    $ids  = array();
    $conf = Config::where( [ 'status' => 1 ] )->first();
    $conf->objetivoCalculo = $request->formula_objetivoCalculo;
    $conf->periodo         = $request->formula_periodo;
    $conf->operacion       = $request->formula_operacion;
    $conf->formula         = $request->formula_calculada;

    if( $conf->save() ) {
      if( $request->has( 'formula_constantes_nombre' ) ) {
        $constantes = count( $request->formula_constantes_nombre );
        for( $c = 0 ; $c < $constantes ; $c ++ ) {
          if( $request->formula_constantes_id[ $c ] == 0 ) {
              $const = new Constantes();
            } else {
              $const = Constantes::find( $request->formula_constantes_id[ $c ] );
          }
          $const->nombre      = $request->formula_constantes_nombre[ $c ];
          $const->descripcion = $request->formula_constantes_descripcion[ $c ];
          $const->valor       = $request->formula_constantes_valor[ $c ];
          $const->tipo        = $request->formula_constantes_tipo[ $c ];
          $const->status      = 1;
          $const->save();
          $ids[] = $const->id;
        }
      }
    }

    Constantes::whereNotIn( 'id' , $ids )->update( [ 'status' => 0 ] );
  }

}
