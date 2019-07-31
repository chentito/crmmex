<?php
/*
 * Controlador para la modificacion de privilegios de acceso y uso a la plataforma
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Sistema\Privilegios AS Privilegios;
use App\Models\crmmex\Sistema\PrivilegiosModulos AS PrivilegiosModulos;
use App\Models\crmmex\Sistema\Secciones AS Secciones;
use App\Models\crmmex\Sistema\Modulos AS Modulos;

class PrivilegiosController extends Controller
{
    // Listado de privilegios por perfil
    public function listadoPrivilegios( $perfilID ) {
          $privilegios = array();
          $secciones   = Privilegios::where( 'status' , 1 )->where( 'idRol' , $perfilID )->get();
          $modulos     = PrivilegiosModulos::where( 'status' , 1 )->where( 'perfilID' , $perfilID )->get();
          $privilegios = array( 'secciones' => $secciones , 'modulos' => $modulos );
          return response()->json( $privilegios );
    }

    // Guarda la configuracion de privilegios de un perfil
    public function guardaPrivilegios( Request $request ) {
        $perfilID   = $request->perfilIDConf;
        $modulos    = Modulos::where( 'status' , 1 )->get();

        // Modulos
        foreach( $modulos AS $modulo ) {
            $privilegioModulo = PrivilegiosModulos::where( 'perfilID' , $perfilID )->where( 'moduloID' , $modulo->id )->first();
            if( $privilegioModulo ) {
                PrivilegiosModulos::where( 'perfilID' , $perfilID )->where( 'moduloID' , $modulo->id )
                                  ->update( [ 'status' => ( ( !$request->has( 'modulo_' . $modulo->id ) ) ? 0 : 1 ) ] );
            } else {
                if( $request->has( 'modulo_' . $modulo->id ) ) {
                    $agregaMod = new PrivilegiosModulos();
                    $agregaMod->perfilID = $perfilID;
                    $agregaMod->moduloID = $modulo->id;
                    $agregaMod->status   = 1;
                    $agregaMod->save();
                }
            }

            // Secciones
            $secciones  = Secciones::where( 'status' , 1 )->where( 'modulo' , $modulo->id )->get();
            foreach( $secciones AS $seccion ) {
               $privilegio = Privilegios::where( 'idRol' , $perfilID )->where( 'idSeccion' , $seccion->id )->where( 'moduloID' , $modulo->id )->first();
               if( $privilegio ) {
                    Privilegios::where( 'idRol' , $perfilID )->where( 'idSeccion' , $seccion->id )->where( 'moduloID' , $modulo->id )
                               ->update( [ 'status' => ( ( $request->has( 'seccion_' . $seccion->id ) && $request->has( 'modulo_' . $modulo->id ) ) ? 1 : 0 ) ] );
               } else {
                  if( $request->has( 'seccion_' . $seccion->id ) ) {
                      $agrega = new Privilegios();
                      $agrega->idRol     = $perfilID;
                      $agrega->idSeccion = $seccion->id;
                      $agrega->moduloID  = $modulo->id;
                      $agrega->status    = 1;
                      $agrega->save();
                  }
               }
            }

        }
    }

}
