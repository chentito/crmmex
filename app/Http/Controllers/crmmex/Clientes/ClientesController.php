<?php
/*
 * Controlador para el manejo y administracion del modulo de clienteSeguimiento
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */

namespace App\Http\Controllers\crmmex\Clientes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Direccion AS Direccion;
use App\Models\crmmex\Clientes\Seguimiento AS Seg;
use App\Models\crmmex\Clientes\Propuestas AS Prop;

use App\Http\Controllers\crmmex\Utils\UtilsController AS Utiles;
use App\Http\Controllers\crmmex\Utils\CamposAdicionalesController AS CamposAdicionales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller
{

    /* Metodo que verifica la existencia de un RFC */
    public function valRFC( $rfc ) {
        $total = Clientes::where( 'rfc' , $rfc )->where( 'status' , '1' )->count();
        return $total;
    }

    /* Alta de un nuevo cliente con sus respectivas estructuras */
    public function guardaCliente( Request $request ) {
        /* Alta del registro cliente */
        $cliente = new Clientes;
        $cliente->razonSocial   = $request->cliente_razon_social;
        $cliente->rfc           = $request->cliente_rfc;
        $cliente->giro          = $request->catalogo_5;
        $cliente->categoria     = $request->catalogo_1;
        $cliente->subcategoria  = $request->catalogo_2;
        $cliente->ejecutivo     = Auth::user()->id;
        $cliente->fechaAlta     = date( 'Y-m-d H:i:s' );
        $cliente->tipo          = $request->cliente_tipo;
        $cliente->grupo         = $request->cliente_grupo;
        $cliente->observaciones = $request->cliente_observaciones;
        $cliente->productoID    = $request->cliente_producto_interes;
        $cliente->status        = 1;
        $gCliente               = $cliente->save();
        $idtyCli                = $cliente->id;

        if( $gCliente ) {
            /* Alta de los registros de contacto */
            $contadorContactos = count( $request->contacto_nombre );

            for( $i = 0 ; $i < $contadorContactos ; $i++ ) {
                $contacto = new Contactos;
                $contacto->clienteID         = $idtyCli;
                $contacto->nombre            = $request->contacto_nombre[ $i ];
                $contacto->apellidoPaterno   = $request->contacto_paterno[ $i ];
                $contacto->apellidoMaterno   = $request->contacto_materno[ $i ];
                $contacto->correoElectronico = $request->contacto_email[ $i ];
                $contacto->celular           = $request->contacto_celular[ $i ];
                $contacto->compania          = $request->contacto_celular_compania[ $i ];
                $contacto->telefono          = $request->contacto_telefono[ $i ];
                $contacto->extension         = $request->contacto_extension[ $i ];
                $contacto->area              = $request->contacto_area[ $i ];
                $contacto->puesto            = $request->contacto_puesto[ $i ];
                $contacto->status            = 1;
                $contacto->fechaAlta         = date( 'Y-m-d H:i:s' );
                #$contacto->ejecutivoAlta     = 1;
                #$contacto->ejecutivo         = 1;
                $gContacto                   = $contacto->save();
                $idtyContacto                = $contacto->id;
            }

            if( $gContacto ) {
                /* Alta del registro de direccion */
                $direccion = new Direccion;
                $direccion->clienteID     = $idtyCli;
                $direccion->calle         = $request->direccion_calle;
                $direccion->noExterior    = $request->direccion_no_exterior;
                $direccion->noInterior    = $request->direccion_no_interior;
                $direccion->colonia       = $request->direccion_colonia;
                $direccion->cp            = $request->direccion_cp;
                $direccion->delegacion    = $request->direccion_delegacion;
                $direccion->ciudad        = $request->direccion_ciudad;
                $direccion->estado        = $request->direccion_estado;
                $direccion->pais          = $request->direccion_pais;
                $direccion->fechaAlta     = date( 'Y-m-d H:i:s' );
                $direccion->ejecutivoAlta = 1;
                $direccion->status        = 1;
                $gDireccion               = $direccion->save();
            }
        }

        /* Guarda los campos adicionales asignados al cliente */
        CamposAdicionales::almacenaDatosAdicionales( $request , $idtyCli , $cliente->tipo );

        $status = false;
        $msj    = "Error al agregar cliente";
        if( $gDireccion && $gContacto && $gCliente ) {
            $status = true;
            $msj    = "Cliente agregado correctamente";
        }

        $r = array( 'mensaje' => $msj, 'status'  => $status );
        return response()->json( $r );
    }

    /* Obtiene el listado de clientes */
    public function listadoClientes( $tipo = '' ) {
      $arrClientes = array();
      $clientes    = Clientes::whereIn( 'status' , [ 1 , 2 ] )
                             ->when(  $tipo != '' , function( $q ) use ( $tipo ) {
                               return $q->where( 'tipo' , $tipo );
                             })
                             ->orderBy( 'id' , 'DESC' )
                             ->get();

      foreach( $clientes AS $cliente ) {
          $arrClientes[ 'clientes' ][] = array (
              'id'                => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Cliente" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')">'.$cliente->id.'</a>',
              'razonSocial'       => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Cliente" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')">'.$cliente->razonSocial.'</a>',
              'rfc'               => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Cliente" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')">'.$cliente->rfc.'</a>',
              'giro'              => Utiles::valorCatalogo( $cliente->giro ),
              'categoria'         => $cliente->categoria,
              'subcategoria'      => $cliente->subcategoria,
              'ejecutivo'         => Utiles::nombreEjecutivo( $cliente->ejecutivo ),
              'fechaAlta'         => $cliente->fechaAlta,
              'fechaModificacion' => $cliente->fechaModificacion,
              'tipo'              => ( ( $cliente->tipo == '1' ) ? 'Cliente' : 'Prospecto' ),
              'observaciones'     => $cliente->observaciones,
              'grupo'             => $cliente->grupo,
              'producto'          => $cliente->productoID,
              'status'            => ( ( $cliente->status == '1' ) ? 'Activo' : 'Deshabilitado' ),
              'opciones'          => ( ( $cliente->status == '2' ) ? '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Habilitar Cliente" onclick="habilitaCliente(\''.$cliente->id.'\')"><i class="fa fa-check fa-sm"></i></a>' :
                                          '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Cliente" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                                        . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Detalle Cliente" onclick="contenidos(\'clientes_detalle\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-id-card fa-sm"></i></a>'
                                        . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Agregar Seguimiento" onclick="contenidos(\'clientes_seguimiento\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-toolbox fa-sm"></i></a>'
                                        . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Agregar Propuesta" onclick="contenidos(\'clientes_listadoPropuestas\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-file-alt fa-sm"></i></a>'
                                        . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Eliminar Cliente" onclick="contenidos(\'clientes_eliminaCliente\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-trash fa-sm"></i></a>'
                                     )
          );
      }

      return response()->json( $arrClientes );
    }

    /* Obtiene el listado de prospectos */
    public function listadoProspectos() {
        $datos      = array();
        $prospectos = DB::table( 'crmmex_ventas_contacto' )
                    ->leftJoin( 'crmmex_ventas_cliente' , 'crmmex_ventas_contacto.clienteID' , '=' , 'crmmex_ventas_cliente.id' )
                    ->where( 'crmmex_ventas_cliente.tipo' , 2)
                    ->whereIn( 'crmmex_ventas_cliente.status' , [ 1,2 ] )
                    ->where( 'crmmex_ventas_contacto.status' , 1 )
                    //->groupBy( 'crmmex_ventas_contacto.id' )
                    ->orderBy( 'crmmex_ventas_cliente.id' , 'ASC' )
                    ->get();

        foreach( $prospectos AS $prospecto ) {
            $datos[ 'prospectos' ][] = array(
              'id'                => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Prospecto" onclick="contenidos(\'prospectos_edicion\',\''.$prospecto->id.'\')">'.$prospecto->id.'</a>',
              'nombre'            => '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Modificar Prospecto" onclick="contenidos(\'prospectos_edicion\',\''.$prospecto->id.'\')">'.$prospecto->nombre.'</a>',
              'apellidoPaterno'   => $prospecto->apellidoPaterno,
              'apellidoMaterno'   => $prospecto->apellidoMaterno,
              'correoElectronico' => $prospecto->correoElectronico,
              'celular'           => $prospecto->celular,
              'telefono'          => $prospecto->telefono,
              'razonSocial'       => $prospecto->razonSocial,
              'rfc'               => $prospecto->rfc,
              'giro'              => Utiles::valorCatalogo( $prospecto->giro ),
              'categoria'         => $prospecto->categoria,
              'subcategoria'      => $prospecto->subcategoria,
              'ejecutivo'         => Utiles::nombreEjecutivo( $prospecto->ejecutivo ),
              'fechaAlta'         => $prospecto->fechaAlta,
              'fechaModificacion' => $prospecto->fechaModificacion,
              'tipo'              => ( ( $prospecto->tipo == '1' ) ? 'Cliente' : 'Prospecto' ),
              'observaciones'     => $prospecto->observaciones,
              'grupo'             => $prospecto->grupo,
              'status'            => ( ( $prospecto->status == '1' ) ? 'Activo' : 'Deshabilitado' ),
              'opciones'          => ( ( $prospecto->status == '2' ) ) ? '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Habilitar Prospecto" onclick="habilitaProspecto(\''.$prospecto->id.'\')"><i class="fa fa-check fa-sm"></i></a>' :
                                     '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Modificar Prospecto" onclick="contenidos(\'prospectos_edicion\',\''.$prospecto->id.'\')"><i class="fa fa-edit fa-sm"></i></a>'
                                   . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Agregar Seguimiento" onclick="contenidos(\'prospectos_seguimiento\',\''.$prospecto->id.'\')" class="ml-2"><i class="fa fa-toolbox fa-sm"></i></a>'
                                   . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Agregar Propuesta" onclick="contenidos(\'prospectos_listadoPropuestas\',\''.$prospecto->id.'\')" class="ml-2"><i class="fa fa-file-alt fa-sm"></i></a>'
                                   . '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Elimina Prospecto" onclick="contenidos(\'prospectos_elimina\',\''.$prospecto->id.'\')" class="ml-2"><i class="fa fa-trash fa-sm"></i></a>'
            );
        }

        return response()->json( $datos );
    }

    /* Consulta de cliente por ID */
    public function obtieneCliente( $clienteID ) {
      $expediente = array();

      /* Busca datos del cliente */
      $cliente = Clientes::find( $clienteID );
      $expediente[ 'cliente' ] = array(
          'id'                => $cliente->id,
          'razonSocial'       => $cliente->razonSocial,
          'rfc'               => $cliente->rfc,
          'giro'              => $cliente->giro,
          'categoria'         => $cliente->categoria,
          'subcategoria'      => $cliente->subcategoria,
          'ejecutivo'         => $cliente->ejecutivo,
          'fechaAlta'         => $cliente->fechaAlta,
          'fechaModificacion' => $cliente->fechaModificacion,
          'observaciones'     => $cliente->observaciones,
          'tipo'              => $cliente->tipo,
          'grupo'             => $cliente->grupo,
          'producto'          => $cliente->productoID,
          'subcategoria'      => $cliente->subcategoria
      );
      $clienteID = $cliente->id;

      /* Busca datos del contacto */
      $contactos = Contactos::where( [ 'clienteID' => $clienteID , 'status' => 1 ] )->orderBy( 'id' , 'asc' )->get();
      foreach( $contactos AS $contacto ) {
          $expediente[ 'contactos' ][] = array (
              'idty'              => $contacto->id,
              'nombre'            => $contacto->nombre,
              'apellidoPaterno'   => $contacto->apellidoPaterno,
              'apellidoMaterno'   => $contacto->apellidoMaterno,
              'correoElectronico' => $contacto->correoElectronico,
              'celular'           => $contacto->celular,
              'compania'          => $contacto->compania,
              'telefono'          => $contacto->telefono,
              'extension'         => $contacto->extension,
              'area'              => $contacto->area,
              'puesto'            => $contacto->puesto,
          );
      }

      /* Busca datos de direccion */
      $direccion = Direccion::where( 'clienteID' , $clienteID )->first();
      $expediente[ 'direccion' ] = array(
          'calle'             => $direccion->calle,
          'noExterior'        => $direccion->noExterior,
          'noInterior'        => $direccion->noInterior,
          'colonia'           => $direccion->colonia,
          'cp'                => $direccion->cp,
          'delegacion'        => $direccion->delegacion,
          'ciudad'            => $direccion->ciudad,
          'estado'            => $direccion->estado,
          'pais'              => $direccion->pais,
          'fechaAlta'         => $direccion->fechaAlta,
          'fechaModificacion' => $direccion->fechaModificacion
      );

      /* Busca Seguimientos */
      $seguimientos = Seg::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->get();
      foreach( $seguimientos AS $seguimiento ) {
        $expediente[ 'seguimientos' ][] = array(
          'id'              => $seguimiento->id,
          'clienteID'       => $seguimiento->clienteID,
          'contactoID'      => Utiles::nombreContacto( $seguimiento->contactoID ),
          'ejecutivoID'     => $seguimiento->ejecutivoID,
          'tipoActividad'   => $seguimiento->tipoActividad,
          'nombreActividad' => $seguimiento->nombreActividad,
          'descripcion'     => $seguimiento->descripcion,
          'fechaAlta'       => $seguimiento->fechaAlta,
          'fechaEjecucion'  => $seguimiento->fechaEjecucion,
          'estado'          => Utiles::valorCatalogo( $seguimiento->estado )
        );
      }

      /* Busca propuestas */
      $propuestas = Prop::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->get();
      foreach( $propuestas AS $propuesta ) {
        $expediente[ 'propuestas' ][] = array (
          'id'             => $propuesta->id,
          'ejecutivoID'    => $propuesta->ejecutivoID,
          'clienteID'      => $propuesta->clienteID,
          'contactoID'     => Utiles::nombreContacto( $propuesta->contactoID ),
          'categoria'      => $propuesta->categoria,
          'fechaEnvio'     => $propuesta->fechaEnvio,
          'fechaVigencia'  => $propuesta->fechaVigencia,
          'observaciones'  => $propuesta->observaciones,
          'requerimientos' => $propuesta->requerimientos,
          'formaPago'      => $propuesta->formaPago,
          'monto'          => $propuesta->monto,
          'descuento'      => $propuesta->descuento,
          'promocion'      => $propuesta->promocion,
          'idty'           => $propuesta->propuestaIDTY,
        );
      }

      // Busca en datos adicionales
      $adicionales = CamposAdicionales::obtieneDatosAdicionales( $expediente[ 'cliente' ][ 'tipo' ] , $clienteID );
      foreach( $adicionales AS $adicional ) {
          $expediente[ 'adicionales' ][ $adicional->campoAdicionalID ] = $adicional->valor;
          $expediente[ 'adicionalesEdicion' ][] = array(
            'id'    => CamposAdicionales::nombreDatoAdicional( $adicional->campoAdicionalID ),
            'valor' => $adicional->valor
          );
      }

      return response()->json( $expediente );
    }

    /*
     * Metodo que actualiza los datos de un cliente
     */
    public function actualizaCliente( Request $request ) {
        $idtyCli = $request->expediente_id;

        //$this->authorize( 'revisaCliente' , $idtyCli );
        $cliente = Clientes::find( $idtyCli );
        $cliente->razonSocial       = $request->cliente_razon_social;
        $cliente->rfc               = $request->cliente_rfc;
        $cliente->giro              = $request->catalogo_5;
        $cliente->categoria         = $request->catalogo_1;
        $cliente->subcategoria      = $request->catalogo_2;
        //$cliente->ejecutivo         = 1;
        $cliente->fechaModificacion = date( 'Y-m-d H:i:s' );
        $cliente->tipo              = $request->cliente_tipo;
        $cliente->grupo             = $request->cliente_grupo;
        $cliente->productoID        = $request->cliente_producto_interes;
        $cliente->observaciones     = $request->cliente_observaciones;
        $cliente->status            = 1;
        $gCliente                   = $cliente->save();

        $direccion = Direccion::where( 'clienteID' , $idtyCli )->first();
        $direccion->clienteID         = $idtyCli;
        $direccion->calle             = $request->direccion_calle;
        $direccion->noExterior        = $request->direccion_no_exterior;
        $direccion->noInterior        = $request->direccion_no_interior;
        $direccion->colonia           = $request->direccion_colonia;
        $direccion->cp                = $request->direccion_cp;
        $direccion->delegacion        = $request->direccion_delegacion;
        $direccion->ciudad            = $request->direccion_ciudad;
        $direccion->estado            = $request->direccion_estado;
        $direccion->pais              = $request->direccion_pais;
        $direccion->fechaModificacion = date( 'Y-m-d H:i:s' );
        $direccion->ejecutivoAlta     = 1;
        $direccion->status            = 1;
        $gDireccion                   = $direccion->save();

        $contadorContactos = count( $request->contacto_nombre );
        $idsContactos      = $request->idsContactos;
        for( $i = 0 ; $i < $contadorContactos ; $i++ ) {
            $idCurrContacto = $request->contacto_idty[ $i ];
            $idsContactos   = str_replace( $idCurrContacto.',' , '' , $idsContactos );

            $contacto = Contactos::updateOrCreate (
                [ 'id' => $request->contacto_idty[ $i ] ],
                [
                  'clienteID'         => $idtyCli,
                  'nombre'            => $request->contacto_nombre[ $i ],
                  'apellidoPaterno'   => $request->contacto_paterno[ $i ],
                  'apellidoMaterno'   => $request->contacto_materno[ $i ],
                  'correoElectronico' => $request->contacto_email[ $i ],
                  'celular'           => $request->contacto_celular[ $i ],
                  'compania'          => $request->contacto_celular_compania[ $i ],
                  'telefono'          => $request->contacto_telefono[ $i ],
                  'extension'         => $request->contacto_extension[ $i ],
                  'area'              => $request->contacto_area[ $i ],
                  'puesto'            => $request->contacto_puesto[ $i ],
                  'status'            => 1,
                  'fechaAlta'         => date( 'Y-m-d H:i:s' ),
                  'fechaEdicion'      => date( 'Y-m-d H:i:s' ),
                  'ejecutivoAlta'     => 1,
                  'ejecutivo'         => 1
                ]
            );

        }

        /* Elimina los contactos que no se enviaron en la peticion */
        $eliminados = explode( ',' , $idsContactos );
        foreach( $eliminados AS $eliminado ) {
            Contactos::where( 'id' , $eliminado )->update( [ 'status' => 0 ] );
        }

        /* Guarda los campos adicionales asignados al cliente */
        CamposAdicionales::almacenaDatosAdicionales( $request , $idtyCli , $cliente->tipo );
    }

    /* Identificador del cliente */
    public function clienteIdty( $clienteID ) {
        $cliente = Clientes::find( $clienteID );
        return "# ".$cliente->id . " / " . $cliente->razonSocial;
    }

    /* Metodo que elimina un cliente */
    public function eliminaCliente( $clienteID , $movimiento ) {
        $cliente = Clientes::find( $clienteID );
        $cliente->status = $movimiento;
        $cliente->save();
    }

    /* Metodo que habilita cliente */
    public function habilitaCliente( $clienteID ) {
      $cliente = Clientes::find( $clienteID );
      $cliente->status = 1;
      $cliente->save();
    }
}
