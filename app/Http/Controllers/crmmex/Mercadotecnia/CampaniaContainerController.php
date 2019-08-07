<?php

namespace App\Http\Controllers\crmmex\Mercadotecnia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use App\Models\crmmex\Mercadotecnia\Campanias AS Campanias;
use App\Models\crmmex\Mercadotecnia\Piezas AS Piezas;
use App\Models\crmmex\Mercadotecnia\Envios AS Envios;
use App\Models\crmmex\Configuraciones\Form AS Form;
use App\Models\crmmex\Configuraciones\FormFields AS FormFields;
use App\Models\crmmex\Configuraciones\FormSave AS FormSave;

class CampaniaContainerController extends Controller
{
    // muestra la pantalla de landing page en caso de que exissta la configuracion
    public function landingPage( $campaniaID , $contactoID , $preview=false , $formToPreview="" ) {

      if( $preview ) {
        $datos = $this->datosCampania( "" , $formToPreview );
        return view( 'crmmex.landingPage.landingPage' ,
                      [
                        'campaniaID'     => "",
                        'estado'         => "test",
                        'contactoID'     => "",
                        'nombreCampania' => "Nombre de la campaña",
                        'contenido'      => "Contenido",
                        'formID'         => $datos[ 'form' ]
                    ]);
      } else if( $this->verificaContactoEnCampania( $contactoID , $campaniaID ) > 0 ) {
          if( $this->verificaContactoEnFormulario( $contactoID , $campaniaID ) > 0 ) {
                return view( 'crmmex.landingPage.landingPageResponse' , [ 'mensaje' => 'Su información ya ha sido almacenada previamente.' ] );
            } else {
                $datos = $this->datosCampania( $campaniaID );
                return view( 'crmmex.landingPage.landingPage' ,
                              [
                                'campaniaID'     => $campaniaID,
                                'estado'         => "produccion",
                                'contactoID'     => $contactoID,
                                'nombreCampania' => $datos[ 'nombreCampania' ],
                                'contenido'      => $datos[ 'contenido' ],
                                'formID'         => $datos[ 'form' ]
                            ]);
          }
      } else {
          return view( 'crmmex.landingPage.landingPageResponse' , [ 'mensaje' => 'Los datos proporcionados no son válidos.' ] );
      }
    }

    // Valida el identificador del usuario con la campania en uso
    private function verificaContactoEnCampania( $contactoID , $campaniaID ) {
        $envio = Envios::where( [ 'campaniaID' => $campaniaID , 'contactoID' => $contactoID ] )->count();
        return $envio;
    }

    // Valida que el usuario no haya respondido ya el formulario
    private function verificaContactoEnFormulario( $contactoID , $campaniaID ) {
        $respuestas = FormSave::where( [ 'campaniaID' => $campaniaID , 'contactoID' => $contactoID ] )->count();
        return $respuestas;
    }

    // Muestra pantalla despues de haber capturado datos
    public function landingPageSave( Request $request ) {

        if( $request->estado == 'test' ) {
          $mensaje = 'Prueba ejecutada correctamente';
        } else {
          $fields = $request->all();
          foreach( $fields AS $llave => $valor ) {
              if( substr( $llave , 0 , 6 ) == 'field_' ) {
                  $id = explode( '_' , $llave );
                  $dato = new FormSave();
                  $dato->campaniaID = $request->campaniaID;
                  $dato->contactoID = $request->contactoID;
                  $dato->fieldID    = $id[ 1 ];
                  if( is_array( $valor ) ) {
                      $v = '';
                      foreach( $valor AS $val ) {
                          $v .= $val . ',';
                      }
                  } else {
                      $v = $valor;
                  }
                  $dato->respuesta  = trim( $v , ',' );
                  $dato->fecha      = date( 'Y-m-d H:i:s' );
                  $dato->status     = 1;
                  $dato->save();
              }
          }

          $mensaje = 'Informacion almacenada correctamente, gracias por participar.';
        }

        return view( 'crmmex.landingPage.landingPageResponse' , [ 'mensaje' => $mensaje ] );
    }

    // Obtiene los detalles de la campania
    private function datosCampania( $campaniaID , $formToPreview="" ) {
        $datos    = array();

        if( $formToPreview != "" ) {
          $datos[ 'form' ] = $this->formulario( $formToPreview );
        } else {
          $campania = Campanias::where( 'id' , $campaniaID )->first();
          $datos[ 'nombreCampania' ] = $campania->nombre_campania;

          $contenido = Piezas::where( 'id' , $campania->pieza )->first();
          $datos[ 'contenido' ] = $contenido->pieza;

          if( $contenido->formID != 0 ) {
                $datos[ 'form' ] = $this->formulario( $contenido->formID );
              } else {
                $datos[ 'form' ] = '';
          }
        }
        return $datos;
    }

    // metodo para armar el formulario asignado a la pieza de correo
    private function formulario( $formularioID ) {
        $datosForm  = array();
        $formulario = Form::where( 'id' , $formularioID )->first();
        $datosForm[ 'nombreForm' ] = $formulario->nombreForm;
        $fields     = FormFields::where( [ 'formID' => $formularioID , 'status' => 1 ] )->get();

        foreach( $fields AS $field ) {
            $datosForm[ 'fields' ][] = array (
                'id'             => $field->id,
                'nombre'         => $field->nombre,
                'idInput'        => 'field_' . $field->id,
                'tipo'           => $field->tipo,
                'obligatoriedad' => $field->obligatoriedad,
                'valores'        => $field->valores
            );
        }

        return $datosForm;
    }

}
