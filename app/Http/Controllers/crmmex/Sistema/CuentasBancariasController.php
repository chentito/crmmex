<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\crmmex\Utils\UtilsController AS Utils;

use App\Models\crmmex\Sistema\CuentasBancarias AS CuentasBancarias;

class CuentasBancariasController extends Controller
{

  // Listado cuentas Bancarias
  public function listado( $bancoID='' ) {
    $ctas = CuentasBancarias::whereIn( 'status' , [ 1 , 2 ] )
                            ->when( $bancoID != '' , function( $q ) use( $bancoID ) {
                              return $q->where( 'bancoID' , $bancoID )->where( 'status' , 1 );
                            })
                            ->get();
    $datos = array();
    $datos[ 'ctasBancarias' ] = array();

    foreach( $ctas AS $cta ) {
      $datos[ 'ctasBancarias' ][] = array(
        'id'                => $cta->id,
        'bancoID'           => utils::valorCatalogo( $cta->bancoID ),
        'nombreCuenta'      => $cta->nombreCuenta,
        'numeroCuenta'      => $cta->numeroCuenta,
        'fechaAlta'         => $cta->fechaAlta,
        'fechaModificacion' => $cta->fechaModificacion,
        'status'            => ( ( $cta->status == 1 ) ? 'Habilitada' : 'Deshabilitada' ),
        'opciones'          => ( ( $cta->status == 1 ) ?
                                  '<a href="javascript:void(0)" onclick="contenidos(\'configuraciones_editaCuentaBancaria\',\''.$cta->id.'\')" title="Editar cuenta"><i class="fa fa-sm fa-edit"></i></a>'
                                . '<a class="ml-1" href="javascript:void(0)" onclick="contenidos(\'configuraciones_eliminaCuentaBancaria\',\''.$cta->id.'\')" title="Elimina cuenta"><i class="fa fa-sm fa-trash"></i></a>'
                                  :
                                  '<a href="javascript:void(0)" onclick="habilitaCuentaBancaria(\''.$cta->id.'\')" title="Habilita cuenta"><i class="fa fa-sm fa-check"></i></a>' )
      );
    }

    return response()->json( $datos );
  }

  // Alta cuenta bancaria
  public function alta( Request $request ) {
    $cta               = new CuentasBancarias();
    $cta->bancoID      = $request->catalogo_19;
    $cta->nombreCuenta = $request->altaCuentaBancaria_nombreCuenta;
    $cta->numeroCuenta = $request->altaCuentaBancaria_numeroCuenta;
    $cta->fechaAlta    = date( 'Y-m-d H:i:s' );
    $cta->status       = 1;
    $cta->save();
    return response()->json( array( 'Cuenta agregada correctamente' ) );
  }

  // Obtiene los datos de una cuenta bancaria
  public function obtiene( $cuentaID ) {
    $cta = CuentasBancarias::find( $cuentaID );
    return response()->json( $cta );
  }

  // Actualiza una cuenta bancaria
  public function actualiza( Request $request ) {
    $cta = CuentasBancarias::where( 'id' , $request->cuentaBancaria_id )->first();
    $cta->bancoID      = $request->catalogo_19;
    $cta->nombreCuenta = $request->altaCuentaBancaria_nombreCuenta;
    $cta->numeroCuenta = $request->altaCuentaBancaria_numeroCuenta;
    $cta->fechaModificacion = date( 'Y-m-d H:i:s' );
    $cta->save();
    return response()->json( array( 'Cuenta actualizada correctamente' ) );
  }

  // Elimina una cuenta bancaria
  public function elimina( $cuentaID , $movimiento ) {
    $cta = CuentasBancarias::find( $cuentaID );
    $cta->status = $movimiento;
    $cta->fechaModificacion = date( 'Y-m-d H:i:s' );
    $cta->save();
    return response()->json( array( 'Cuenta eliminada correctamente' ) );
  }

  // Habilita una cuenta
  public function habilita( $cuentaID ) {
    $cta = CuentasBancarias::find( $cuentaID );
    $cta->status = 1;
    $cta->fechaModificacion = date( 'Y-m-d H:i:s' );
    $cta->save();
    return response()->json( array( 'Cuenta habilitada correctamente' ) );
  }

}
