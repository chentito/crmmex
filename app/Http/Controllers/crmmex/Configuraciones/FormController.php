<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Configuraciones\Form AS Form;
use App\Models\crmmex\Configuraciones\FormFields AS FormFields;

class FormController extends Controller
{
    // Metodo que agrega una nueva estructura para campos
    public function agregaCampoForm() {
        $vista = array(
          'contenido' => view( 'crmmex.configuraciones.fieldForm' )->render()
        );

        return response()->json( $vista );
    }

    // Metodo que guarda la configuracion de un nuevo formulario
    public function guardaFormulario( Request $request ) {
        $form = new Form();
        $form->nombreForm = $request->formularios_nombreForm;
        $form->fechaAlta  = date( 'Y-m-d H:i:s' );
        $form->save();

        $totalCampos = count( $request->formularios_nombreCampo );
        for( $f = 0 ; $f < $totalCampos ; $f++ ) {
            $field = new FormFields();
            $field->formID         = $form->id;
            $field->nombre         = $request->formularios_nombreCampo[ $f ];
            $field->tipo           = $request->formularios_tipoCampo[ $f ];
            $field->obligatoriedad = $request->formularios_oblCampo[ $f ];
            $field->valores        = $request->formularios_valoresCampo[ $f ];
            $field->status         = 1;
            $field->save();
        }
    }

}
