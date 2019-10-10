<?php
/*
 * Controlador para los templates de correos electronicos enviados a través
 * de la plataforma
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Templates As Templates;

class TemplatesController extends Controller
{

  // Obtiene los datos de un Template
  public function obtieneDatosTemplate( $templateID ) {
    $template = Templates::find( $templateID );
    return response()->json( $template );
  }

  // Actualiza los datos de un template
  public function actualizaDatosTemplate( Request $request ) {
    $template = Templates::find( $request->template_id );
    $template->asunto = $request->template_subject;
    $template->cuerpo = $request->detalleTemplate_contenidoPieza;
    $template->save();
  }

}
