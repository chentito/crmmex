<?php
/*
 * Controlador para funciones utiles del sistema
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\crmmex\Utils;

use App\Models\crmmex\Utils\Estados AS Estados;
use App\Models\crmmex\Utils\Paises AS Paises;
use App\Models\crmmex\Utils\Catalogo AS Catalogo;
use App\Models\crmmex\Utils\Estatus AS Estatus;
use App\Models\crmmex\Utils\OpcionesCat AS Opciones;
use App\Models\crmmex\Utils\Promociones AS Promociones;
use App\Models\crmmex\Productos\Productos AS Productos;
use App\Models\crmmex\Clientes\Contactos AS Contactos;
use App\Models\crmmex\Clientes\Clientes AS Clientes;
use App\Models\crmmex\Clientes\Propuestas AS Propuestas;
use App\Models\crmmex\Utils\Predefinidos AS Predefinidos;
use App\Models\crmmex\Mercadotecnia\Listas AS Listados;
use App\Models\crmmex\Mercadotecnia\Piezas AS Pieza;
use App\Models\crmmex\Sistema\Perfiles AS Perfiles;
use App\Models\crmmex\Sistema\Propietario AS Propietario;
use App\Models\crmmex\Configuraciones\Form AS Forms;
use App\Models\crmmex\Sistema\Configuraciones AS Configuraciones;
use App\User AS Ejecutivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UtilsController extends Controller
{

    protected static $meses = array(
      '01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr', '05' => 'May', '06' => 'Jun',
      '07' => 'Jul', '08' => 'Ago', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic'
    );

   /*
    * Regresa el listado de estados
    */
    public function estados( $paisID = '' ) {
      $datos   = array();
      $estados = Estados::where( 'status' , 1 )->get();

      foreach( $estados AS $estado ) {
          $datos[] = array(
            'id'      => $estado->id,
            'entidad' => $estado->entidad
          );
      }

      return response()->json( $datos );
    }

    /*
     * Obtiene el estado de acuerdo a su id
     */
    public static function nombreEstado( $estadoID ) {
      $estado = Estados::where( 'id' , $estadoID )->first();
      return mb_strtoupper( $estado->entidad );
    }

   /*
    * Regresa el listado de paises
    */
    public function paises() {
      $datos  = array();
      $paises = Paises::where( 'status' , 1 )->get();

      foreach ( $paises as $pais ) {
          $datos[] = array(
              'id'     => $pais->id,
              'nombre' => $pais->nombre
          );
      }

      return response()->json( $datos );
    }

   /*
    * Regresa los posibles estados de un registro
    */
    public function estatusRegistro() {
      $datos = array();
      $estatus = Estatus::all();

      foreach( $estatus AS $e ) {
          $datos[] = array(
            'id'     => $e->id,
            'status' => $e->status
          );
      }

      return response()->json( $datos );
    }

   /*
    * Obtiene las opciones de catalogos utiles
    */
    public function opcionesCatalogos( $catalogoID ) {
      $catalogo = array();
      $opciones = Catalogo::find( $catalogoID );

      foreach( $opciones->opciones AS $opcion ) {
        if( $opcion->status == 1 ) {
          $catalogo[] = array(
              'id'     => $opcion->id,
              'nombre' => $opcion->opcion,
              'params' => $opcion->parametros
          );
        }
      }

      return response()->json( $catalogo );
    }

   /*
    * Obtiene los catalogos y sus opciones
    */
    public function catalogo( $id ) {
      $catalogo = array();
      $opciones = Catalogo::find( $id );

      $catalogo[] = array(
          'id'     => 0,
          'nombre' => $opciones->nombre,
          'params' => ''
      );

      foreach( $opciones->opciones AS $opcion ) {
          $catalogo[] = array (
              'id'     => $opcion->id,
              'nombre' => $opcion->opcion,
              'params' => $opcion->parametros
          );
      }

      return response()->json( $catalogo );
    }

   /*
    * Listado de catalogos y sus opciones
    */
    public function catalogosOpciones() {
      $cat       = array();
      $catalogos = Catalogo::where( 'status' , 1 )->get();

      foreach ( $catalogos  as $catalogo ) {
          $opts = array();
          foreach( $catalogo->opciones AS $opcion ) {
              $opts[] = array(
                  'idOpt'     => $opcion->id,
                  'nombreOpt' => $opcion->opcion
              );
          }
          $cat[] = array(
              'id'       => $catalogo->id,
              'nombre'   => $catalogo->nombre,
              'opciones' => $opts
          );
      }

      return response()->json( $cat );
    }

   /*
    * Obtiene el valor de un parametro del catalogo
    */
    public static function valorCatalogo( $valorID ) {
      if( $valorID == '' )return "";
      $opciones = Opciones::find( $valorID );
      return $opciones->opcion;
   }

   /*
    * Obtiene la divisa del producto
    */
    public static function divisaProducto( $productoID ) {
      $producto = Productos::where( 'id' , $productoID )->first();
      return self::valorCatalogo( $producto->divisa );
    }

   /*
    * Obtiene el nombre de un ejecutivo de acuerdo a su ID
    */
    public static function nombreEjecutivo( $ejecutivoID ) {
      $ejecutivo = Ejecutivo::find( $ejecutivoID );
      if( $ejecutivo ){
        return $ejecutivo->name . ' ' . $ejecutivo->apPat . ' ' . $ejecutivo->apMat;
      } else {
        return "";
      }
    }

   /*
    * Obtiene razon social de un cliente a partir de su id
    */
    public static function nombreCliente( $clienteID ) {
      $cliente = Clientes::find( $clienteID );
      return $cliente->razonSocial;
    }

   /*
    * Obtiene el nombre de algun contacto
    */
    public static function nombreContacto( $contactoID , $email=true ) {
      $contacto = Contactos::find( $contactoID );
      return $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' . $contacto->apellidoMaterno . ( ( $email ) ? ' [' . $contacto->correoElectronico . ']' : '' );
    }

   /*
    * Obtiene el nombre del producto
    */
    public static function nombreProducto( $productoID ) {
      $producto = Productos::find( $productoID );
      return ( ( strlen( $producto->clave ) > 0 ) ?  $producto->clave . ' / ' : '' ) . $producto->nombre;
    }

   /*
    * Identificador de la propuesta
    */
    public static function propuestaIDTY( $propuestaID ) {
      $propuesta = Propuestas::find( $propuestaID );
      return $propuesta->propuestaIDTY;
    }

   /*
    * Obtiene nombre de un listado de audiencias
    */
    public static function nombreAudiencia( $audienciaID ) {
      $listado = Listados::find( $audienciaID );
      return $listado->nombre;
    }

   /*
    * Nombre de la pieza de correo
    */
    public static function nombrePieza( $piezaID ) {
      $pieza = Pieza::find( $piezaID );
      if( $pieza ){
          return $pieza->nombrePieza;
      } else {
          return '';
      }
    }

   /*
    * Obtiene el combo de productos
    */
    public function productosServicios( $grupo='' ) {
      $datos = array();
      $productos = Productos::where( 'status' , 1 )
                            ->when( $grupo!='' , function( $q ) use( $grupo ) {
                                $q->where( 'grupo' , $grupo );
                            })
                            ->get();

      foreach( $productos AS $producto ) {
          $datos[] = array(
            'id'     => $producto->id,
            'nombre' => 'Clave:' . $producto->clave . ' | Nombre:' . $producto->nombre
          );
      }

      return response()->json( $datos );
    }

   /*
    * Obtiene listado de contactos por cliente
    */
    public function listadoContactos( $clienteID ) {
      $datos = array();
      $contactos = Contactos::where( 'clienteID' , $clienteID )->where( 'status' , 1 )->get();

      foreach( $contactos AS $contacto ) {
          $datos[] = array(
            'id' => $contacto->id,
            'nombre' => $contacto->nombre . ' ' . $contacto->apellidoPaterno . ' ' .
                        $contacto->apellidoMaterno . ' [' . $contacto->correoElectronico . ']'
          );
      }

      return response()->json( $datos );
    }

   /*
    * Realiza el calculo para la promocion seleccionada
    */
    public static function aplicaPromocion( $promoID ) {
      $promocion = Promociones::find( $promoID );
      return response()->json( array( 'tipoDescuento' => $promocion->tipoDescuento, 'cantidad' => $promocion->cantidad ) );
    }

   /*
    * Regresa el listado de promociones activas
    */
    public function listadoPromociones( $grupoID ) {
      $promos   = array();
      $promos[] = array( 'id' => '0' , 'nombre' => 'Sin promocion' );
      $promociones = Promociones::where( 'status' , 1 )
                                ->where( 'grupoID' , $grupoID )
                                ->where( 'inicioVigencia' , '<' , date( 'Y-m-d H:i:s' ) )
                                ->where( 'finVigencia' , '>' , date( 'Y-m-d H:i:s' ) )
                                ->get();

      foreach ( $promociones AS $promocion ) {
          $promos[] = array( 'id' => $promocion->id , 'nombre' => $promocion->nombreDescuento .  ( ( $promocion->tipoDescuento == 1 ) ? ' [ % ]' : ' [ $ ]' ) );
      }

      return response()->json( $promos );
    }

   /*
    * Regresa el detalle de un producto
    */
    public static function datosProducto( $productoID ) {
      $producto = Productos::find( $productoID );
      return $producto;
    }

   /*
    * Regresa un valor predefinido de acuerdo a su id
    */
    public function getPredefinido( $predefinidoID ) {
      $predefinido = Predefinidos::find( $predefinidoID );
      return $predefinido;
    }

   /*
    * Establece un valor predefinido de acuerdo a su id
    */
    public function setPredefinido( $predefinidoID , Request $request ) {
      $identificador = 'valorPredefinido_' . $predefinidoID;
      $predefinido = Predefinidos::find( $predefinidoID );
      $predefinido->valor = $request->$identificador;
      $predefinido->save();
    }

   /*
    * Regresa el registro de un predefinido de acuerdo a su id
    */
    public static function detallePredefinido( $predefinidoID ) {
      $predefinido = Predefinidos::find( $predefinidoID );
      return $predefinido;
    }

   /*
    * Establece el formato de una fecha
    */
    public static function formatoFecha( $f , $time=true ) {
      if( $time ){
          return $f;
        } else {
          $partes = explode( ' ' , $f );
          return $partes[ 0 ];
      }
    }

   /*
    * Edita opcion del catalogo
    */
    public function actualizaOpcionCatalogo( $optID , $optNombre ) {
      $opcion         = Opciones::find( $optID );
      $opcion->opcion = $optNombre;
      $opcion->save();
      $cat = array( 'catID' , $opcion->idCat );
      return response()->json( $cat );
    }

   /*
    * Agrega una nueva opcion al catalogo
    */
    public function agregaOpcionCatalogo( $catalogoID , $nombre ) {
      $opcion = new Opciones();
      $opcion->idCat  = $catalogoID;
      $opcion->opcion = $nombre;
      $opcion->status = 1;
      $opcion->save();
    }

   /*
    * Elimina una opcion del catalogo
    */
    public function eliminaOpcionCatalogo( $opcionID ) {
      $opcion = Opciones::find( $opcionID );
      $opcion->status = 0;
      $opcion->save();
    }

   /*
    * Obtiene el nombre del perfil asignado a un usuario
    */
    public static function nombrePerfil( $perfilID ) {
      $perfil = Perfiles::find( $perfilID );
      return $perfil->rol;
    }

   /*
    * Obtiene el nombre del formulario
    */
    public static function nombreForm( $formID ) {
      if( $formID == "0" ) {
        return "Sin formulario";
      } else {
        $form = Forms::find( $formID );
        if( $form ) {
          return $form->nombreForm;
        } else {
          return "Sin formulario";
        }
      }
    }

   /*
    * Tipo de menu en uso
    */
    public static function tipoMenu() {
      $menu = Configuraciones::find( '1' )->first();
      return $menu->value;
    }

   /*
    * Ejecutivo de propuesta
    */
    public static function datosPropuesta( $propuestaID ) {
      $propuesta = Propuestas::find( $propuestaID );
      return $propuesta;
    }

   /*
    * Datos del propietario para la propuesta comercial
    */
    public static function datosPropietario( $json=false ) {
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
      $datos[ 'estado' ]               = self::nombreEstado( $propietario->estado );
      $datos[ 'codigoPostal' ]         = $propietario->codigoPostal;
      $datos[ 'pais' ]                 = $propietario->pais;
      $datos[ 'telefonos' ]            = $propietario->telefonos;
      $datos[ 'correoElectronico' ]    = $propietario->correoElectronico;
      $datos[ 'informacionAdicional' ] = $propietario->informacionAdicional;
      $datos[ 'status' ]               = $propietario->status;

      if( $json ) {
        return response()->json( $datos );
      } else {
        return $datos;
      }
    }

}
