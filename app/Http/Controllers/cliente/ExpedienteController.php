<?php

namespace App\Http\Controllers\cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cliente\Contacto AS Contacto;
use App\Models\cliente\Cliente AS Cliente;
use App\Models\cliente\Direccion AS Direccion;

class ExpedienteController extends Controller
{

    //Alta expediente
    public function altaExpediente(Request $request) {
        // Alta de cliente
        $cliente = new Cliente;
        $cliente->razonSocial  = $request->cliente_razon_social;
        $cliente->rfc          = $request->cliente_rfc;
        $cliente->giro         = $request->catalogo_5;
        $cliente->categoria    = $request->catalogo_1;
        $cliente->subcategoria = $request->catalogo_2;
        $cliente->ejecutivo    = 1;
        $cliente->fechaAlta    = date( 'Y-m-d H:i:s' );
        $cliente->tipo         = $request->cliente_tipo;
        $cliente->status       = 1;
        $gCliente              = $cliente->save();
        $idtyCli = $cliente->id;

        // Alta de contacto
        $contacto = new Contacto;
        $contacto->clienteID         = $idtyCli;
        $contacto->nombre            = $request->contacto_nombre;
        $contacto->apellidoPaterno   = $request->contacto_paterno;
        $contacto->apellidoMaterno   = $request->contacto_materno;
        $contacto->correoElectronico = $request->contacto_email;
        $contacto->compania          = $request->contacto_celular_compania;
        $contacto->telefono          = $request->contacto_telefono;
        $contacto->extension         = $request->contacto_extension;
        $contacto->area              = $request->contacto_area;
        $contacto->puesto            = $request->contacto_puesto;
        $contacto->status            = 1;
        $contacto->fechaAlta         = date( 'Y-m-d H:i:s' );
        $contacto->ejecutivoAlta     = 1;
        $contacto->ejecutivo         = 1;
        $gContacto                   = $contacto->save();
        $idtyContacto = $contacto->id;

        // Alta de direccion
        $direccion = new Direccion;
        $direccion->idCliente     = $idtyCli;
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

        $status = false;
        $msj    = "Error al agregar cliente";
        if( $gDireccion && $gContacto && $gCliente ){
            $status = true;
            $msj    = "Cliente agregado correctamente";
        }

        $r = array( 'mensaje' => $msj, 'status'  => $status );
        return response()->json( $r );
    }

    public function obtieneExpediente( $id ) {
        $expediente = array();

        /* Busca datos del cliente */
        $cliente = Cliente::find( $id );
        $expediente[ 'cliente' ] = array(
            'razonSocial'  => $cliente->razonSocial,
            'rfc'          => $cliente->rfc,
            'giro'         => $cliente->giro,
            'categoria'    => $cliente->categoria,
            'subcategoria' => $cliente->subcategoria
        );
        $clienteID = $cliente->id;

        /* Busca datos del contacto */
        $contactos = Contacto::where( 'clienteID' , $clienteID )->get();
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
        $direccion = Direccion::where( 'idCliente' , $clienteID )->first();
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

}
