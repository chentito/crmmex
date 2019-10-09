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
use App\branding\Branding AS Branding;

class PropietarioController extends Controller
{

  // Obtiene informacion del propietario
  public function propietario() {
    $datos = array();
    $propietario = Propietario::where( 'id' , 1 )->first();
    $datos[ 'id' ]                   = $propietario->id;
    $datos[ 'razonSocial' ]          = $propietario->razonSocial;
    $datos[ 'rfc' ]                  = $propietario->rfc;
    $datos[ 'calle' ]                = $propietario->calle;
    $datos[ 'exterior' ]             = $propietario->exterior;
    $datos[ 'interior' ]             = $propietario->interior;
    $datos[ 'colonia' ]              = $propietario->colonia;
    $datos[ 'municipio' ]            = $propietario->municipio;
    $datos[ 'estado' ]               = $propietario->estado;
    $datos[ 'codigoPostal' ]         = $propietario->codigoPostal;
    $datos[ 'pais' ]                 = $propietario->pais;
    $datos[ 'telefonos' ]            = $propietario->telefonos;
    $datos[ 'correoElectronico' ]    = $propietario->correoElectronico;
    $datos[ 'informacionAdicional' ] = $propietario->informacionAdicional;
    $datos[ 'status' ]               = $propietario->status;
    return response()->json( $datos );
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
      $propietario->logotipo           = file_get_contents( $request->file( 'logotipo' )->getRealPath() );
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

  // Guarda la imagen para uso de background
  public function savePersBackground( Request $r ) {
    $branding = Branding::where( 'seleccionado' , 1 )->first();
    if( $r->hasFile( 'imgBackgroundPersonalizado' ) ) {
      $branding->usa_background_pers             = 1;
      $branding->background_pers                 = file_get_contents( $r->file( 'imgBackgroundPersonalizado' )->getRealPath() );
      $branding->background_pers_name            = $r->file( 'imgBackgroundPersonalizado' )->getClientOriginalName();
      $branding->background_pers_img_contenttype = $r->file( 'imgBackgroundPersonalizado' )->getMimeType();
      $branding->usa_background                  = 1;
    }

    if( $branding->save() ) {
        return response()->json( array( 'mensaje' => 'Fondo actualizado correctamente' ) );
      } else {
        return response()->json( array( 'mensaje' => false ) );
    }
  }

  // Obtiene y muestra imagen de fondo personalizada
  public function getPersBackground() {
    $branding = Branding::where( 'seleccionado' , 1 )->first();
    return response( $branding->background_pers )->header( 'Content-type' , $branding->background_pers_img_contenttype );
  }

}
