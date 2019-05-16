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
    Route::post( 'getToken' , 'API\APIManage@getToken' );

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



Route::middleware('auth:api')->get( '/user' , function (Request $request) {
    return $request->user();
});

/* Api CRM */

/******************** Operaciones para el modulo de clientes ********************/
Route::middleware( 'auth:api' )->post( '/altaExpediente' , 'crmmex\Clientes\ClientesController@guardaCliente' );
Route::middleware( 'auth:api' )->get( '/listadoClientes' , 'crmmex\Clientes\ClientesController@listadoClientes' );
#Route::post( '/altaExpediente'                  , 'crmmex\Clientes\ClientesController@guardaCliente' );
#Route::get ( '/listadoClientes'                 , 'crmmex\Clientes\ClientesController@listadoClientes' );
Route::get ( '/obtieneExpediente/{id}'          , 'crmmex\Clientes\ClientesController@obtieneCliente' );
Route::post( '/editaExpediente'                 , 'crmmex\Clientes\ClientesController@actualizaCliente' );
Route::get ( '/validaRFC/{rfc}'                 , 'crmmex\Clientes\ClientesController@valRFC' );
Route::get ( '/listadoSeguimientos/{clienteID}' , 'crmmex\Clientes\SeguimientoController@listadoSeguimientos' );
Route::get ( '/listadoContactos/{clienteID}'    , 'crmmex\Clientes\SeguimientoController@listadoContactosPorCliente' );
Route::post( '/guardaSeguimiento'               , 'crmmex\Clientes\SeguimientoController@guardaSeguimiento' );
Route::get ( '/obtieneSeguimiento/{id}'         , 'crmmex\Clientes\SeguimientoController@obtieneSeguimiento' );
Route::post( '/actualizaSeguimiento'            , 'crmmex\Clientes\SeguimientoController@actualizaSeguimiento' );
Route::get ( '/listadoPropuestas/{clienteID}'   , 'crmmex\Clientes\PropuestasController@listadoPropuestas' );

/******************** Operaciones para el modulo de ventas ********************/
Route::get ( '/listadoFacturas' , 'crmmex\Ventas\VentasController@listadoFacturas' );

/******************** Acciones utiles en el sistema ********************/
Route::get ( '/utiles/comboEstados/{pais?}'           , 'crmmex\Utils\UtilsController@estados' );
Route::get ( '/utiles/comboPaises'                    , 'crmmex\Utils\UtilsController@paises' );
Route::get ( '/utiles/opcionesCatalogos/{catalogoID}' , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::get ( '/utiles/estatus'                        , 'crmmex\Utils\UtilsController@estatusRegistro' );
Route::get ( '/utiles/listadoProductosServicios'      , 'crmmex\Utils\UtilsController@productosServicios' );
Route::get ( '/utiles/listadoContactos/{clienteID}'   , 'crmmex\Utils\UtilsController@listadoContactos' );
Route::get ( '/opcionesCombos/{id}'                   , 'crmmex\Utils\UtilsController@catalogo' );
Route::get ( '/opcionesCombosPorId/{id}'              , 'crmmex\Utils\UtilsController@opcionesCatalogos' );

/******************** Operaciones para el modulo de Productos ********************/
Route::get ( '/listadoProductos'             , 'crmmex\Productos\ProductosController@listadoProductos' );
Route::post( '/guardaProducto'               , 'crmmex\Productos\ProductosController@guardaProducto' );
Route::post( '/actualizaProducto'            , 'crmmex\Productos\ProductosController@actualizaProducto' );
Route::get ( '/obtieneProducto/{productoID}' , 'crmmex\Productos\ProductosController@obtieneProducto' );



/*Route::get( 'listadoProspectos' , 'Prospectos@listado' );
Route::get( 'listadoContactos' , 'ContactosController@listadoContactos' );
Route::get( 'listadoEjecutivos' , 'Administradores@listaAdmin' );
Route::get( 'listadoPropuestas' , 'VentasController@propuestas' );
Route::get( 'listadoCampanias' , 'mercadotecnia\CampaniasController@listadoCampanias' );*/

Route::get( '/listadoCatalogos' , 'configuraciones\CatalogosController@catalogosConf' );
Route::get( '/agregaOpcionCatalogo' , 'configuraciones\CatalogosController@agregarOpcionCatalogo' );
Route::get( '/eliminaOpcionCatalogo' , 'configuraciones\CatalogosController@eliminarOpcionCatalogo' );
Route::get( '/listadoPropuestas/{cliID?}' , 'cliente\PropuestasController@listadoPropuestas' );
Route::get( '/configuracionRoles/{rolID?}' , 'ejecutivo\RolesController@listadoModulos' );
Route::get( '/rolesDisponibles' , 'ejecutivo\RolesController@listadoRoles' );

// Api para pruebas con angular
Route::get   ( '/users'      , 'UsersController@index'   )->middleware( 'cors' );
Route::get   ( '/users/{id}' , 'UsersController@show'    )->middleware( 'cors' );
Route::post  ( '/users'      , 'UsersController@store'   )->middleware( 'cors' );
Route::post  ( '/users/{id}' , 'UsersController@update'  )->middleware( 'cors' );
Route::delete( '/users/{id}' , 'UsersController@destroy' )->middleware( 'cors' );
