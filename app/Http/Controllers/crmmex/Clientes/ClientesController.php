<?php
/*
 * Controlador para el manejo y administracion del modulo de clienteSeguimiento
 * @AUtor Mexagon.net / Carlos cvreyes
 * @Fecha Abril 2019
 */

namespace App\Http\Controllers\crmmex\Clientes;

use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Direccion AS Direccion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientesController extends Controller
{

    public function listado() {
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
        $cliente->ejecutivo     = 1;
        $cliente->fechaAlta     = date( 'Y-m-d H:i:s' );
        $cliente->tipo          = $request->cliente_tipo;
        $cliente->observaciones = $request->cliente_observaciones;
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
                $contacto->ejecutivoAlta     = 1;
                $contacto->ejecutivo         = 1;
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
    public function listadoClientes() {
      $arrClientes = array();
      $clientes    = Clientes::where( 'status' , '1' )->get();

      foreach( $clientes AS $cliente ) {
          $arrClientes[ 'clientes' ][] = array(
              'id'          => $cliente->id,
              'razonSocial' => $cliente->razonSocial,
              'rfc'         => $cliente->rfc,
              'giro'        => $cliente->giro,
              'ejecutivo'   => $cliente->ejecutivo,
              'fechaAlta'   => $cliente->fechaAlta,
              'tipo'        => ( ( $cliente->tipo == '1' ) ? 'Cliente' : 'Prospecto' ),
              'opciones'    => '<a href="javascript:void(0)" onclick="contenidos(\'clientes_edicion\',\''.$cliente->id.'\')"><i class="fa fa-edit fa-lg"></i></a>'
                             . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_seguimiento\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-toolbox fa-lg"></i></a>'
                             . '<a href="javascript:void(0)" onclick="contenidos(\'clientes_propuesta\',\''.$cliente->id.'\')" class="ml-2"><i class="fa fa-file-alt fa-lg"></i></a>'
          );
      }

      return response()->json( $arrClientes );
    }

    /* Consulta de cliente por ID */
    public function obtieneCliente( $clienteID ) {
      $expediente = array();

      /* Busca datos del cliente */
      $cliente = Clientes::find( $clienteID );
      $expediente[ 'cliente' ] = array(
          'razonSocial'   => $cliente->razonSocial,
          'rfc'           => $cliente->rfc,
          'giro'          => $cliente->giro,
          'categoria'     => $cliente->categoria,
          'observaciones' => $cliente->observaciones,
          'tipo'          => $cliente->tipo,
          'subcategoria'  => $cliente->subcategoria
      );
      $clienteID = $cliente->id;

      /* Busca datos del contacto */
      $contactos = Contactos::where( 'clienteID' , $clienteID )->get();
      foreach( $contactos AS $contacto ) {
          $expediente[ 'contactos' ][] = array(
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
          'calle'      => $direccion->calle,
          'noExterior' => $direccion->noExterior,
          'noInterior' => $direccion->noInterior,
          'colonia'    => $direccion->colonia,
          'cp'         => $direccion->cp,
          'delegacion' => $direccion->delegacion,
          'ciudad'     => $direccion->ciudad,
          'estado'     => $direccion->estado,
          'pais'       => $direccion->pais
      );

      return response()->json( $expediente );
    }

    public function actualizaCliente( Request $request , $id ) {
        $cliente = Clientes::find( $id );
        $cliente->razonSocial       = $request->cliente_razon_social;
        $cliente->rfc               = $request->cliente_rfc;
        $cliente->giro              = $request->catalogo_5;
        $cliente->categoria         = $request->catalogo_1;
        $cliente->subcategoria      = $request->catalogo_2;
        $cliente->ejecutivo         = 1;
        $cliente->fechaModificacion = date( 'Y-m-d H:i:s' );
        $cliente->tipo              = $request->cliente_tipo;
        $cliente->observaciones     = $request->cliente_observaciones;
        $cliente->status            = 1;
        $gCliente                   = $cliente->save();


    }

}
