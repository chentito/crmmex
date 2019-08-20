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
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Mercadotecnia\Piezas AS Piezas;
use App\Models\crmmex\Mercadotecnia\Campanias AS Campanias;

class PiezasController extends Controller
{

  // Obtiene el listado de templates disponibles
  public function listadoTemplates() {
    $datos = array();
    $datos[ 'templates' ] = array();
    $templates = Piezas::where( 'status' , 1 )->where( 'editable' , 1 )->get();

    foreach( $templates AS $template ) {
      $datos[ 'templates' ][] = array(
        'id'          => $template->id,
        'nombrePieza' => $template->nombrePieza,
        'pieza'       => substr( $template->pieza , 0 , 20 ),
        'formID'      => Utils::nombreForm( $template->formID ),
        'status'      => ( $template->status == 1 ? 'Activo' : 'Inactivo' ),
        'opciones'    => '<a href="javascript:void(0)" onclick="contenidos()" data-toggle="tooltip" data-placement="top" title="Editar Template" class="mr-2"><i class="fa fa-sm fa-edit"></i></a>'
                       . '<a href="javascript:void(0)" onclick="contenidos()" data-toggle="tooltip" data-placement="top" title="Eliminar Template"><i class="fa fa-sm fa-trash"></i></a>'
      );
    }

    return response()->json( $datos );
  }

  // Metodo que retorna el listado de piezas disponibles
  public function listadoPiezas( $editable=true ) {
    $piezas = Piezas::where( 'status' , 1 )
                    ->when( $editable=false , function( $q ){
                        return $q->where( 'editable' , 0 );
                    })
                    ->get();
    return response()->json( $piezas );
  }

  // Metodo que agrega una nueva pieza
  public function nuevaPieza( Request $request ) {
    if( $request->idTemplateEditado == "0" ) {
        $pieza = new Piezas();
        $pieza->nombrePieza = $request->nombreNuevoTemplate;
        $pieza->pieza       = $request->diseno_template_editor;
        $pieza->formID      = $request->nuevoTemplateForm;
        $pieza->editable    = 1;
        $pieza->status      = 1;
        $pieza->save();
      } else {
        $pieza = Piezas::find( $request->idTemplateEditado );
        $pieza->nombrePieza = $request->nombreNuevoTemplate;
        $pieza->pieza       = $request->diseno_template_editor;
        $pieza->formID      = $request->nuevoTemplateForm;
        $pieza->editable    = 1;
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
