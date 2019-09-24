<?php
/*
 * Controlador para la funcionalidad de campos adicionales
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Utils;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\crmmex\Utils\CamposAdicionales AS CamposAdicionales;
use App\Models\crmmex\Utils\CamposAdicionalesValores AS CamposAdicionalesValores;
use App\Models\crmmex\Utils\CamposAdicionalesSecciones AS CamposAdicionalesSecciones;

class CamposAdicionalesController extends Controller
{

  // Listado de campos Adicionales
  public function listado( $seccion='' , $orden = '') {
    $campos = array();
    $campos[ 'camposAdicionales' ] = array();
    $camposAdicionales = CamposAdicionales::where( 'status' , '1' )
      ->when( $seccion != "" , function( $q ) use( $seccion ) {
        return $q->where( 'seccion' , $seccion );
      })
      #->when( $orden != '' , function( $q ) use( $orden ) {
      #  return $q->orderBy( 'id' , $orden );
      #})
      ->orderBy( 'id' , 'DESC' )
      ->get();

    foreach( $camposAdicionales AS $campoAdicional ) {
      $detalleSeccion = $this->nombreSeccion( $campoAdicional->seccion , true );
      $campos[ 'container' ] = $detalleSeccion[ 'container' ];
      $campos[ 'camposAdicionales' ][] = array (
        'id'             => $campoAdicional->id,
        'nombre'         => $campoAdicional->nombre,
        'seccion'        => $detalleSeccion[ 'nombreSeccion' ],
        'tipo'           => ($campoAdicional->tipo == '1' ) ? 'Texto libre' : 'Lista desplegable',
        'expresion'      => $this->tipoValidacion( $campoAdicional->expresion ),
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
  public function datosCampoAdicional( $campoAdicionalID , $enarray=false) {
    $datos = CamposAdicionales::find( $campoAdicionalID );
    if( $enarray ) return $datos;
    else return response()->json( $datos );
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
    if( $campoAdicional->save() ) {
      DB::table( 'crmmex_sis_camposadicionales_valores' )->where( 'campoAdicionalID' , $campoAdicionalID )->update( [ 'status' => 0 ] );
    }
  }

  // Genera el campo adicional en html
  public function campoAdicionalHTML( $campoAdicionalID , $val = '' ) {
    $datos   = CamposAdicionales::where( 'id' , $campoAdicionalID )->first();
    $valores = explode( ',' , $datos->valores );
    $v       = array();

    if( $datos->tipo == '3' ) {
      foreach( $valores AS $valor ) {
        $v[] = array(
          'valor' => $valor,
          'texto' => $valor
        );
      }
    }

    $data    = array(
      'idty'           => $datos->id,
      'nombre'         => $datos->nombre,
      'tipo'           => $datos->tipo,
      'valores'        => $v,
      'datoValor'      => ( ( $val == 'null' ) ? '' : $val ),
      'obligatoriedad' => $datos->obligatoriedad,
      'seccion'        => $datos->seccion
    );

    return response()->json([
      'id' => $campoAdicionalID,
      'campo' => view( 'crmmex.utils.estructuraCampoAdicional' , $data )->render()
    ]);
  }

  // Proceso que guarda los campos Adicionales
  public static function almacenaDatosAdicionales( Request $request, $registroID, $seccion , $indice='' ) {
    $campos = CamposAdicionales::where( [ 'seccion' => $seccion , 'status' => 1 ] )->get();
    foreach( $campos AS $campo ) {
      $campoAdicionalID = $campo->id;
      $field = 'edicionCampoAdicional_' . $seccion . '_' . $campoAdicionalID;
      //$v = ( ( $indice == '' ) ? $request->$field : $request->$field[ $indice ] );
      if( $indice == '' ) {
        $v = $request->$field[ 0 ];
      } else {
        $v = $request->$field[ $indice ];
      }


      CamposAdicionalesValores::updateOrCreate(
        [ 'campoAdicionalID' => $campoAdicionalID , 'registroID' => $registroID , 'seccion' => $seccion ],
        [ 'valor' => $v , 'status' => '1' ]
      );
    }
  }

  // Busca los datos adicionales almacenados para un registro y una seccion
  public static function obtieneDatosAdicionales( $seccion , $registroID ) {
    $camposAdicionales = CamposAdicionalesValores::where( 'seccion' , $seccion )
      ->where( 'registroID' , $registroID )
      ->where( 'status' , 1 )
      ->get();
    return $camposAdicionales;
  }

  // Nombre del campo adicional
  public static function nombreDatoAdicional( $campoAdicionalID ) {
    $nombre = CamposAdicionales::find( $campoAdicionalID );
    return $nombre->nombre;
  }

  // Obtiene los valores de campos adicionales de un registro especifico
  public static function obtieneAdicionalesPorRegistro( $seccionID , $registroID ) {
    $adicionales = CamposAdicionales::where( 'seccion' , $seccionID )->where( 'status' , 1 )->get();
    $valores     = array();
    foreach( $adicionales AS $adicional ) {
      $valAdicionales = CamposAdicionalesValores::where( 'seccion' , $seccionID )->where( 'registroID' , $registroID )->where( 'campoAdicionalID' , $adicional->id )->first();
      $v = ( ( !$valAdicionales ) ? 'N/D' : ( ( $valAdicionales->valor == null ) ? 'N/D' : $valAdicionales->valor ) );
      $valores[ str_replace( ' ' , '_' , $adicional->nombre ) ] = $v;
    }
    return $valores;
  }

  // Obtiene el nombre de la seccion a la que se le agregaran campos Adicionales
  public function nombreSeccion( $seccionID , $enarray=false ) {
    $nombre = CamposAdicionalesSecciones::find( $seccionID );
    if( $enarray ) return $nombre;
    else return response()->json( $nombre );
  }

  private function tipoValidacion( $validacionID ) {
    switch( $validacionID ) {
      case '1':return 'Sin validación';break;
      case '2':return 'Correo electrónico';break;
      case '3':return 'Número telefónico';break;
      case '4':return 'RFC';break;
      case '5':return 'Solo números';break;
    }
  }

}
