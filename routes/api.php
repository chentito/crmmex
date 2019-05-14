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

Route::middleware('auth:api')->get( '/user' , function (Request $request) {
    return $request->user();
});

#Route::middleware( 'auth:api' )->post( '/altaExpediente' , 'crmmex\Clientes\ClientesController@guardaCliente' );
#Route::middleware( 'auth:api' )->get( '/listadoClientes' , 'crmmex\Clientes\ClientesController@listadoClientes' );

/* Modulo Clientes */
Route::post( '/altaExpediente'                  , 'crmmex\Clientes\ClientesController@guardaCliente' );
Route::get ( '/listadoClientes'                 , 'crmmex\Clientes\ClientesController@listadoClientes' );
Route::get ( '/obtieneExpediente/{id}'          , 'crmmex\Clientes\ClientesController@obtieneCliente' );
Route::post( '/editaExpediente'                 , 'crmmex\Clientes\ClientesController@actualizaCliente' );
Route::get ( '/validaRFC/{rfc}'                 , 'crmmex\Clientes\ClientesController@valRFC' );
Route::get ( '/listadoSeguimientos/{clienteID}' , 'crmmex\Clientes\SeguimientoController@listadoSeguimientos' );
Route::get ( '/listadoContactos/{clienteID}'    , 'crmmex\Clientes\SeguimientoController@listadoContactosPorCliente' );
Route::post( '/guardaSeguimiento'               , 'crmmex\Clientes\SeguimientoController@guardaSeguimiento' );
Route::get ( '/obtieneSeguimiento/{id}'         , 'crmmex\Clientes\SeguimientoController@obtieneSeguimiento' );
Route::post( '/actualizaSeguimiento'            , 'crmmex\Clientes\SeguimientoController@actualizaSeguimiento' );
Route::get ( '/listadoPropuestas/{clienteID}'   , 'crmmex\Clientes\PropuestasController@listadoPropuestas' );

/* Modulo Ventas */
Route::get ( '/listadoFacturas' , 'crmmex\Ventas\VentasController@listadoFacturas' );

/* Acciones utiles */
Route::get ( '/utiles/comboEstados/{pais?}'           , 'crmmex\Utils\UtilsController@estados' );
Route::get ( '/utiles/comboPaises'                    , 'crmmex\Utils\UtilsController@paises' );
Route::get ( '/utiles/opcionesCatalogos/{catalogoID}' , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::get ( '/utiles/estatus'                        , 'crmmex\Utils\UtilsController@estatusRegistro' );
Route::get ( '/utiles/listadoProductosServicios'      , 'crmmex\Utils\UtilsController@productosServicios' );
Route::get ( '/utiles/listadoContactos/{clienteID}'   , 'crmmex\Utils\UtilsController@listadoContactos' );
Route::get ( '/opcionesCombos/{id}'                   , 'crmmex\Utils\UtilsController@catalogo' );
Route::get ( '/opcionesCombosPorId/{id}'              , 'crmmex\Utils\UtilsController@opcionesCatalogos' );

/* Productos */
Route::get ( '/listadoProductos'             , 'crmmex\Productos\ProductosController@listadoProductos' );
Route::post( '/guardaProducto'               , 'crmmex\Productos\ProductosController@guardaProducto' );
Route::post( '/actualizaProducto'            , 'crmmex\Productos\ProductosController@actualizaProducto' );
Route::get ( '/obtieneProducto/{productoID}' , 'crmmex\Productos\ProductosController@obtieneProducto' );



Route::get( 'listadoProspectos' , 'Prospectos@listado' );
Route::get( 'listadoContactos' , 'ContactosController@listadoContactos' );
Route::get( 'listadoEjecutivos' , 'Administradores@listaAdmin' );
Route::get( 'listadoPropuestas' , 'VentasController@propuestas' );
Route::get( 'listadoCampanias' , 'mercadotecnia\CampaniasController@listadoCampanias' );

Route::get( '/listadoCatalogos' , 'configuraciones\CatalogosController@catalogosConf' )->middleware( 'cors' );
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
