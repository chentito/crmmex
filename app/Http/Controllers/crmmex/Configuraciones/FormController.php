<?php

namespace App\Http\Controllers\crmmex\Configuraciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Configuraciones\Form AS Form;
use App\Models\crmmex\Configuraciones\FormFields AS FormFields;

class FormController extends Controller
{

  // Listado de todos los formularios dados de alta
  public function listadoFormularios() {
    $datos                  = array();
    $datos[ 'formularios' ] = array();
    $formularios = Form::where( 'status' , 1 )->get();

    foreach( $formularios AS $formulario ) {
      $datos[ 'formularios' ][] = array(
        'id'           => $formulario->id,
        'nombreForm'   => $formulario->nombreForm,
        'fechaAlta'    => $formulario->fechaAlta,
        'fechaEdicion' => $formulario->fechaEdicion,
        'status'       => ( ( $formulario->status == 1 ) ? 'Activo' : 'Inactivo' ),
        'opciones'     => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Edita Formulario" onclick="contenidos(\'configuraciones_editaForm\',\''.$formulario->id.'\')" class="mr-1"><i class="fa fa-edit fa-sm"></i></a>'
                        . '<a href="/campania/x/y/true/'.$formulario->id.'" target="_blank" data-toggle="tooltip" data-placement="top" title="Elimina Formulario" onclick="" class="mr-1"><i class="fa fa-sm fa-eye"></i></a>'
                        . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Elimina Formulario" onclick="contenidos(\'configuraciones_eliminaForm\',\''.$formulario->id.'\')"><i class="fa fa-trash fa-sm"></i></a>'
      );
    }

    return response()->json( $datos );
  }

  // Metodo que agrega una nueva estructura para campos
  public function agregaCampoForm( $id="0", $nombre="" , $tipo="" , $obligatoriedad="" , $validacion="" , $valores="" ) {
    $vista = array(
      'contenido' => view( 'crmmex.configuraciones.fieldForm' ,
        [
          'rand'           => rand(1111,9999) ,
          'id'             => $id ,
          'nombre'         => $nombre ,
          'tipo'           => $tipo ,
          'obligatoriedad' => $obligatoriedad ,
          'validacion'     => $validacion ,
          'valor'          => $valores
        ])->render()
    );

    return response()->json( $vista );
  }

  // Metodo que obtiene los detalles de un formulario para editar
  public function editaFormulario( $formularioID ) {
    $form  = Form::where( 'id' , $formularioID )->first();
    $datos = array();
    $datos[ 'nombreForm' ] = $form->nombreForm;
    $datos[ 'idForm' ]     = $formularioID;
    $campos = FormFields::where( 'formID' , $formularioID )->where( 'status' , 1 )->get();

    foreach( $campos AS $campo ) {
      $datos[ 'campos' ][] = array (
        'id'             => $campo->id,
        'nombre'         => $campo->nombre,
        'tipo'           => $campo->tipo,
        'obligatoriedad' => $campo->obligatoriedad,
        'validacion'     => $campo->validacion,
        'valores'        => ( $campo->valores != '' ? $campo->valores : '' )
      );
    }

    return response()->json( $datos );
  }

    // Metodo que guarda la configuracion de un nuevo formulario
    public function guardaFormulario( Request $request ) {
        $form = new Form();
        $form->nombreForm = $request->formularios_nombreForm;
        $form->fechaAlta  = date( 'Y-m-d H:i:s' );
        $form->status     = 1;
        $form->save();

        $totalCampos = count( $request->formularios_nombreCampo );
        for( $f = 0 ; $f < $totalCampos ; $f++ ) {
            $field = new FormFields();
            $field->formID         = $form->id;
            $field->nombre         = $request->formularios_nombreCampo[ $f ];
            $field->tipo           = $request->formularios_tipoCampo[ $f ];
            $field->obligatoriedad = $request->formularios_oblCampo[ $f ];
            $field->valores        = $request->formularios_valoresCampo[ $f ];
            $field->validacion     = $request->formularios_valCampo[ $f ];
            $field->status         = 1;
            $field->save();
        }
    }

    // Metodo para actualizar un formulario
    public function actualizaFormulario( Request $request ) {
        $camposIDs = array();
        $form = Form::where( 'id' , $request->formularios_idForm )->first();
        $form->nombreForm = $request->formularios_nombreForm;

        if( $form->save() ) {
            $totalCampos = count( $request->formularios_nombreCampo );
            for( $f = 0 ; $f < $totalCampos ; $f++ ) {
                $campos = FormFields::where( 'id' , $request->formularios_campoID[ $f ] )->where( 'formID' , $request->formularios_idForm )->first();
                if( !$campos ) {
                    $campos = new FormFields();
                }
                $campos->nombre         = $request->formularios_nombreCampo[ $f ];
                $campos->formID         = $request->formularios_idForm;
                $campos->tipo           = $request->formularios_tipoCampo[ $f ];
                $campos->obligatoriedad = $request->formularios_oblCampo[ $f ];
                $campos->valores        = $request->formularios_valoresCampo[ $f ];
                $campos->validacion     = $request->formularios_valCampo[ $f ];
                $campos->status         = 1;
                $campos->save();
                $camposIDs[]            = $campos->id;
            }
        }

        // Elimina los campos que no se enviaron en el request
        FormFields::where( 'formID' , $request->formularios_idForm )->where( 'status' , 1 )->whereNotIn( 'id' , $camposIDs )->update( [ 'status' => 0 ] );
    }

    //Metodo para eliminar el formulario seleccionado
    public function eliminaFormulario( $formularioID ) {
        $form = Form::find( $formularioID );
        $form->status = 0;
        $form->fechaEdicion = date( 'Y-m-d H:i:s' );
        $form->save();
    }

}
