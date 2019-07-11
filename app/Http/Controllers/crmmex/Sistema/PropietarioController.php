<?php
/*
 * Controlador para los datos fiscales del administrador del sistema
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Propietario AS Propietario;

class PropietarioController extends Controller
{
    // Obtiene informacion del propietario
    public function propietario() {
      $propietario = Propietario::where( 'id' , 1 )->first();
      return response()->json( $propietario );
    }

    // Actualiza informacion del propietario
    public function actualiza( Request $request ) {
        $propietario = Propietario::find( 1 );
        $propietario->razonSocial          = $request->razonSocial;
        $propietario->rfc                  = $request->rfc;
        $propietario->calle                = $request->calle;
        $propietario->exterior             = $request->exterior;
        $propietario->interior             = $request->interior;
        $propietario->colonia              = $request->colonia;
        $propietario->municipio            = $request->municipio;
        $propietario->estado               = $request->estado;
        $propietario->codigoPostal         = $request->codigoPostal;
        $propietario->pais                 = $request->pais;
        $propietario->telefonos            = $request->telefonos;
        $propietario->correoElectronico    = $request->correoElectronico;
        $propietario->informacionAdicional = $request->informacionAdicional;
        if( $request->hasFile( 'logotipo' ) ) {
          $propietario->logotipo           = base64_encode( file_get_contents( $request->file( 'logotipo' )->getRealPath() ) );
          $propietario->mimeLogo           = $request->file( 'logotipo' )->getMimeType();
        }
        if( $propietario->save() ){
            return response()->json( array( 'mensaje' => 'La informacion se ha guardado correctamente' ) );
          } else {
            return response()->json( array( 'mensaje' => false ) );
        }
    }

    // Obtiene el nombre de la imagen
    public function imagenPropietario() {
      $imagen = Propietario::find( 1 );
      return response( $imagen->logotipo )->header( 'Content-type' , $imagen->mimeLogo );
    }

}
