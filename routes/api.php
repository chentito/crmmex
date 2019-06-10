<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Rutas API protegidas con autenticacion */
Route::group(['prefix' => 'auth'], function () {
    /*
     * Alta de un nuevo usuario, la accion aun no esta
     * protegida por el middleware para su uso externo
     */
    Route::post( 'addUser' , 'API\APIManage@addUser' );

    /*
     * Accion que genera un token a partir de datos
     * de acceso validos
     */
    Route::post( 'getToken' , 'API\APIManage@getToken' )->middleware( 'cors' );

    /*
     * Accion que genera la accion para activar la cuenta generada
     */
    Route::get( 'addUser/activate/{token}' , 'API\APIManage@signupActivate' );

    Route::group( [ 'middleware' => 'auth:api' ] , function() {
        /*
         * Accion que revoca un token previamente generado
         */
        Route::get( 'delToken' , 'API\APIManage@delToken' );
    });
});

Route::middleware( 'auth:api' )->get( '/user' , function (Request $request) {
    return $request->user();
});

/* Api CRM */

/******************** Operaciones para el modulo de clientes ********************/
Route::middleware( 'auth:api' )->post( '/altaExpediente'         , 'crmmex\Clientes\ClientesController@guardaCliente' );
Route::middleware( 'auth:api' )->post( '/editaExpediente'        , 'crmmex\Clientes\ClientesController@actualizaCliente' );
Route::middleware( 'auth:api' )->get(  '/listadoClientes'        , 'crmmex\Clientes\ClientesController@listadoClientes' );
Route::middleware( 'auth:api' )->get ( '/obtieneExpediente/{id}' , 'crmmex\Clientes\ClientesController@obtieneCliente' );


/************************************ Seguimientos ************************************/
Route::middleware( 'auth:api' )->get ( '/validaRFC/{rfc}'                  , 'crmmex\Clientes\ClientesController@valRFC' );
Route::middleware( 'auth:api' )->get ( '/listadoSeguimientos/{clienteID?}' , 'crmmex\Clientes\SeguimientoController@listadoSeguimientos' );
Route::middleware( 'auth:api' )->get ( '/listadoContactos/{clienteID}'     , 'crmmex\Clientes\SeguimientoController@listadoContactosPorCliente' );
Route::middleware( 'auth:api' )->post( '/guardaSeguimiento'                , 'crmmex\Clientes\SeguimientoController@guardaSeguimiento' );
Route::middleware( 'auth:api' )->get ( '/obtieneSeguimiento/{id}'          , 'crmmex\Clientes\SeguimientoController@obtieneSeguimiento' );
Route::middleware( 'auth:api' )->post( '/actualizaSeguimiento'             , 'crmmex\Clientes\SeguimientoController@actualizaSeguimiento' );
Route::middleware( 'auth:api' )->get ( '/listadoPropuestas/{clienteID}'    , 'crmmex\Clientes\PropuestasController@listadoPropuestas' );
Route::middleware( 'auth:api' )->post( '/clienteIdty/{clienteID}'          , 'crmmex\Clientes\ClientesController@clienteIdty' );
Route::middleware( 'auth:api' )->post( '/seguimientoIdty/{seguimientoID}'  , 'crmmex\Clientes\SeguimientoController@seguimientoIdty' );


/************************************ Propuestas ************************************/
Route::middleware( 'auth:api' )->get ( '/obtieneDatosPropuesta/{propuestaID}' , 'crmmex\Clientes\PropuestasController@datosPropuesta' );
Route::middleware( 'auth:api' )->post( '/altaPropuesta'                       , 'crmmex\Clientes\PropuestasController@altaPropuesta' );


/******************** Operaciones para el modulo de ventas ********************/
Route::middleware( 'auth:api' )->get ( '/listadoFacturas' , 'crmmex\Ventas\VentasController@listadoFacturas' );


/******************** Operaciones para el modulo de Productos ********************/
Route::middleware( 'auth:api' )->get ( '/listadoProductos'             , 'crmmex\Productos\ProductosController@listadoProductos' );
Route::middleware( 'auth:api' )->post( '/guardaProducto'               , 'crmmex\Productos\ProductosController@guardaProducto' );
Route::middleware( 'auth:api' )->post( '/actualizaProducto'            , 'crmmex\Productos\ProductosController@actualizaProducto' );
Route::middleware( 'auth:api' )->get ( '/obtieneProducto/{productoID}' , 'crmmex\Productos\ProductosController@obtieneProducto' );


/************************************ Control de ejecutivos ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoEjecutivos'              , 'crmmex\Administradores\Administradores@listaAdmin' );
Route::middleware( 'auth:api' )->get ( '/datosEjecutivo/{ejecutivoID}'   , 'crmmex\Administradores\Administradores@search' );
Route::middleware( 'auth:api' )->post( '/altaEjecutivo'                  , 'crmmex\Administradores\Administradores@store' );
Route::middleware( 'auth:api' )->post( '/editaEjecutivo'                 , 'crmmex\Administradores\Administradores@update' );
Route::middleware( 'auth:api' )->post( '/shortEditaEjecutivo'            , 'crmmex\Administradores\Administradores@shortUpdate' );
Route::middleware( 'auth:api' )->post( '/eliminaEjecutivo/{ejecutivoID}' , 'crmmex\Administradores\Administradores@delete' );


/************************************ Campanias ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoCampanias'             , 'crmmex\Mercadotecnia\CampaniasController@listadoCampanias' );
Route::middleware( 'auth:api' )->post( '/guardaCampania'               , 'crmmex\Mercadotecnia\CampaniasController@save' );
Route::middleware( 'auth:api' )->post( '/actualizaCampania'            , 'crmmex\Mercadotecnia\CampaniasController@update' );
Route::middleware( 'auth:api' )->post( '/buscaCampania/{campaniaID}'   , 'crmmex\Mercadotecnia\CampaniasController@search' );
Route::middleware( 'auth:api' )->post( '/eliminaCampania/{campaniaID}' , 'crmmex\Mercadotecnia\CampaniasController@delete' );


/************************************ Configuraciones ************************************/
Route::middleware( 'auth:api' )->get ( '/obtieneSMTP'   , 'crmmex\Configuraciones\SMTPController@obtieneConfiguracion' );
Route::middleware( 'auth:api' )->post( '/actualizaSMTP' , 'crmmex\Configuraciones\SMTPController@update' );


/************************************ Acciones utiles en el sistema ************************************/
Route::get ( '/utiles/comboEstados/{pais?}'           , 'crmmex\Utils\UtilsController@estados' );
Route::get ( '/utiles/comboPaises'                    , 'crmmex\Utils\UtilsController@paises' );
Route::get ( '/utiles/opcionesCatalogos/{catalogoID}' , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::get ( '/utiles/estatus'                        , 'crmmex\Utils\UtilsController@estatusRegistro' );
Route::get ( '/utiles/listadoProductosServicios'      , 'crmmex\Utils\UtilsController@productosServicios' );
Route::get ( '/utiles/listadoContactos/{clienteID}'   , 'crmmex\Utils\UtilsController@listadoContactos' );
Route::post( '/utiles/aplicaPromo/{promoID}/{monto}'  , 'crmmex\Utils\UtilsController@aplicaPromocion' );
Route::get ( '/utiles/listadoPromociones'             , 'crmmex\Utils\UtilsController@listadoPromociones' );
Route::get ( '/opcionesCombos/{id}'                   , 'crmmex\Utils\UtilsController@catalogo' );
Route::get ( '/opcionesCombosPorId/{id}'              , 'crmmex\Utils\UtilsController@opcionesCatalogos' );


/************************************ Pruebas API consumidas desdee Angular ************************************/
Route::get   ( '/users'      , 'UsersController@index'   )->middleware( 'cors' );
Route::get   ( '/users/{id}' , 'UsersController@show'    )->middleware( 'cors' );
Route::post  ( '/users'      , 'UsersController@store'   )->middleware( 'cors' );
Route::post  ( '/users/{id}' , 'UsersController@update'  )->middleware( 'cors' );
Route::delete( '/users/{id}' , 'UsersController@destroy' )->middleware( 'cors' );
