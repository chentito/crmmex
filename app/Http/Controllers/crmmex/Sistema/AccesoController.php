<?php
/*
 * Controlador para la administracion de acceso a las diferentes funcionalidades
 * de acuerdo al usuario logeado
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Septiembre 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Privilegios AS Privilegios;
use App\Models\crmmex\Sistema\PrivilegiosModulos AS PrivilegiosModulos;
use App\Models\crmmex\Sistema\Modulos AS Modulos;
use App\Models\crmmex\Sistema\Secciones AS Secciones;

class AccesoController extends Controller
{

  // Verifica si el acceso es permitido de acuerdo al perfil del usuario
  // logeado y al identificador de la seccion
  public static function ver( $seccionID ) {
    if( Auth::user()->rol == 1 ) return true;
    $acceso = Privilegios::where( 'idRol' , Auth::user()->rol )->where( 'idSeccion' , $seccionID )->first();
    return ( $acceso->status == 1 ) ? true : false ;
  }

  // Verifica privilegios para el listado de modulos del menu
  public static function verModulos( $perfilID ) {
    $accesos = array();

    $modulos = Modulos::where( 'status' , 1 )->get();
    foreach( $modulos AS $modulo ) {
      $acceso = PrivilegiosModulos::where( 'moduloID' , $modulo->id )
              ->where( 'perfilID' , $perfilID )
              ->where( 'status' , 1 )
              ->first();
      if( $perfilID == 1 ){ $acceso = '1'; }
      $accesos[ 'modulos' ][ $modulo->id ] = ( ( $acceso ) ? '1' : '0' );
    }

    $secciones = ( ( $perfilID == 1 ) ? Secciones::where( 'status' , 1 )->get() : Privilegios::where( 'idRol' , Auth::user()->rol )->get() );
    foreach( $secciones AS $seccion ) {
      if( $perfilID == 1 ) {
        $estado = '1';
        $indice = $seccion->id;
      } else {
        $estado = $seccion->status;
        $indice = $seccion->idSeccion;
      }
      $accesos[ 'secciones' ][ $indice ] = ( ( $estado == 1 ) ? '1' : '0' );
    }

    return $accesos;
  }

}
