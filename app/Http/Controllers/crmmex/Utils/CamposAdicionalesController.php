<?php

namespace App\Http\Controllers\crmmex\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Utils\CamposAdicionales AS CamposAdicionales;
use App\Models\crmmex\Utils\CamposAdicionalesValores AS CamposAdicionalesValores;

class CamposAdicionalesController extends Controller
{

    // Listado de campos Adicionales
    public function listado( $seccion='' ) {
        $campos = array();
        array_push( $campos , 'camposAdicionales' );
        $camposAdicionales = CamposAdicionales::where( 'status' , '1' )
                                ->when( $seccion != "" , function( $q ) use( $seccion ) {
                                    return $q->where( 'seccion' , $seccion );
                                })
                                ->orderBy( 'id' )
                                ->get();

        foreach( $camposAdicionales AS $campoAdicional ) {
            $campos[ 'camposAdicionales' ][] = array (
              'id'             => $campoAdicional->id,
              'nombre'         => $campoAdicional->nombre,
              'seccion'        => $campoAdicional->seccion,
              'tipo'           => $campoAdicional->tipo,
              'expresion'      => $campoAdicional->expresion,
              'valores'        => $campoAdicional->valores,
              'obligatoriedad' => ( $campoAdicional->obligatoriedad == '1' ? 'Obligatorio' : 'Opcional' ),
              'status'         => ( $campoAdicional->status == '1' ? 'Activo' : 'Inactivo' ),
              'opciones'       => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Editar Campo Adicional" onclick="contenidos(\'configuraciones_editaCampoAdicional\',\''.$campoAdicional->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                                . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar Campo Adicional" onclick="contenidos(\'configuraciones_eliminaCampoAdicional\',\''.$campoAdicional->id.'\')" class="ml-2"><i class="fa fa-trash fa-sm"></i></a>'
            );
        }

        return response()->json( $campos );
    }

    // Obtiene los datos de un campo adicional
    public function datosCampoAdicional( $campoAdicionalID ) {
          $datos = CamposAdicionales::find( $campoAdicionalID );
          return response()->json( $datos );
    }

    // Agrega un nuevo campo adicional
    public function agregaCampo( Request $request ) {
        $campoAdicional = new CamposAdicionales();
        $campoAdicional->nombre         = $request->adicional_clientes_nombre;
        $campoAdicional->seccion        = $request->adicional_clientes_seccion;
        $campoAdicional->tipo           = $request->adicional_clientes_tipoDato;
        $campoAdicional->expresion      = $request->adicional_clientes_validacion;
        $campoAdicional->valores        = $request->adicional_clientes_valores;
        $campoAdicional->obligatoriedad = $request->adicional_clientes_obligatoriedad;
        $campoAdicional->status         = 1;
        $campoAdicional->save();
    }

    // Edita campo adicional
    public function editaCampoAdicional( Request $request ) {
      $campoAdicional = CamposAdicionales::find( $request->adicional_clientes_id );
      $campoAdicional->nombre         = $request->adicional_clientes_nombre;
      $campoAdicional->seccion        = $request->adicional_clientes_seccion;
      $campoAdicional->tipo           = $request->adicional_clientes_tipoDato;
      $campoAdicional->expresion      = $request->adicional_clientes_validacion;
      $campoAdicional->valores        = $request->adicional_clientes_valores;
      $campoAdicional->obligatoriedad = $request->adicional_clientes_obligatoriedad;
      $campoAdicional->status         = 1;
      $campoAdicional->save();
    }

    // Elimina campo adicional
    public function eliminaCampoAdicional( $campoAdicionalID ) {
      $campoAdicional = CamposAdicionales::find( $campoAdicionalID );
      $campoAdicional->status = 0;
      $campoAdicional->save();
    }

    // Genera el campo adicional en html
    public function campoAdicionalHTML( $campoAdicionalID , $val = '' ) {
        $datos   = CamposAdicionales::find( $campoAdicionalID );
        $valores = explode( ';' , $datos->valores );
        $v       = array();

        if( $datos->tipo == '3' ) {
          foreach( $valores AS $valor ) {
            $elementos = explode( ',' , $valor );
            $v[] = array(
              'valor' => $elementos[ 0 ],
              'texto' => $elementos[ 1 ]
            );
          }
        }

        $data    = array(
          'idty'           => $datos->id,
          'nombre'         => $datos->nombre,
          'tipo'           => $datos->tipo,
          'valores'        => $v,
          'datoValor'      => $val,
          'obligatoriedad' => $datos->obligatoriedad
        );

        return response()->json([
            'campo' => view( 'crmmex.utils.estructuraCampoAdicional' , $data )->render()
        ]);
    }

    // Proceso que guarda los campos Adicionales
    public static function almacenaDatosAdicionales( Request $request , $registroID , $seccion ) {
        foreach( $request->all() AS $ll => $v ) {
            if( substr( $ll , 0 , 22 ) == 'edicionCampoAdicional_' ){
                $campoAdicionalID    = str_replace( 'edicionCampoAdicional_' , '' , $ll );
                $campo = CamposAdicionalesValores::updateOrCreate(
                  [ 'campoAdicionalID' => $campoAdicionalID , 'registroID' => $registroID , 'seccion' => $seccion ],
                  [ 'valor' => $v , 'status' => '1' ]
                );
            }
        }
    }

    // Busca los datos adicionales almacenados para un registro y una seccion
    public static function obtieneDatosAdicionales( $seccion , $registroID ) {
          $camposAdicionales = CamposAdicionalesValores::where( [ 'seccion' => $seccion ] )
                                                       ->where( [ 'registroID' => $registroID ] )
                                                       ->get();
          return $camposAdicionales;
    }

}
