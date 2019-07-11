<?php
/*
 * Controlador para los archivos multimedia a incluir en las piezas de correo
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Multimedia AS Multimedia;

class MultimediaController extends Controller
{

    // Archivos disponibles
    public function listadoMultimedia() {
        $datos     = array();
        $elementos = Multimedia::whereIn( 'status' , [ 1 , 2 ] )->get();

        foreach( $elementos AS $elemento ) {
            $datos[ 'multimedia' ][] = array (
                'id'                 => $elemento->id,
                'nombre'             => $elemento->nombre,
                'contenido'          => $elemento->contenido,
                'mime'               => $elemento->mime,
                'fechaAlta'          => $elemento->fechaAlta,
                'fechaActualizacion' => $elemento->fechaActualizacion,
                'fechaBaja'          => $elemento->fechaBaja,
                'status'             => ( ( $elemento->status == 1 ) ? 'Habilitada' : 'Deshabilitada' ),
                'opciones'           => ( ( $elemento->status == 1 ) ?
                                        '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar Imagen" onclick="contenidos(\'configuraciones_eliminaMultimedia\',\''.$elemento->id.'\')" class="ml-2"><i class="fa fa-trash fa-sm"></i></a>'
                                      :
                                        '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Habilitar Imagen" onclick="habilitarMultimedia(\''.$elemento->id.'\')" class="ml-2"><i class="fa fa-check fa-sm"></i></a>'
                                      )
            );
        }

        return response()->json( $datos );
    }

    // Alta de un nuevo archivo
    public function nuevoElemento( Request $request ) {
        $mensaje = '';
        if( $request->file( 'altaMultimedia_file' )->isValid() ) {
            $archivo = $request->file( 'altaMultimedia_file' );
            $datos                     = new Multimedia();
            $datos->nombre             = $archivo->getClientOriginalName();
            //$datos->contenido          = fopen( $request->altaMultimedia_file , 'rb' );
            $datos->contenido          = base64_encode( file_get_contents( $archivo->getRealPath() ) );
            $datos->mime               = $archivo->getMimeType();
            $datos->fechaAlta          = date( 'Y-m-d H:i:s' );
            $datos->status             = 1;
            $datos->save();
            $mensaje = 'Archivo cargado correctamente';
        } else {
            $mensaje = 'Error al adjuntar archivo';
        }

        return response()->json( array( 'mensaje' => $mensaje ) );
    }

    // Elimina elemento
    public function eliminaElemento( $elementoID , $movimiento ) {
        $datos = Multimedia::find( $elementoID );
        if( $movimiento == 2 ) {
            $datos->fechaActualizacion = date( 'Y-m-d H:i:s' );
          } else {
            $datos->fechaBaja = date( 'Y-m-d H:i:s' );
        }
        $datos->status = $movimiento;
        $datos->save();
    }

    // Habilita elemento
    public function habilitaElemento( $elementoID ) {
        $datos = Multimedia::find( $elementoID );
        $datos->fechaActualizacion = date( 'Y-m-d H:i:s' );
        $datos->status = 1;
        $datos->save();
    }

    // Actualizacion elemento
    public function actualizaElemento( Request $request ) {
        $datos = Multimedia::find( $request->id );
        $datos->nombre             = $request->nombre;
        $datos->contenido          = $request->contenido;
        $datos->mime               = $request->mime;
        $datos->fechaActualizacion = date( 'Y-m-d H:i:s' );
        $datos->save();
    }

}
