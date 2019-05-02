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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Modulo Clientes */
//Route::post( '/altaExpediente' , 'cliente\ExpedienteController@altaExpediente' );
Route::post( '/altaExpediente'  , 'crmmex\Clientes\ClientesController@guardaCliente' );
Route::get ( '/listadoClientes' , 'crmmex\Clientes\ClientesController@listadoClientes' );
Route::get ( '/obtieneExpediente/{id}' , 'crmmex\Clientes\ClientesController@obtieneCliente' );
Route::post( '/editaExpediente'  , 'crmmex\Clientes\ClientesController@actualizaCliente' );
Route::get ( '/listadoSeguimientos/{clienteID}' , 'crmmex\Clientes\SeguimientoController@listadoSeguimientos' );
Route::get ( '/listadoContactos/{clienteID}' , 'crmmex\Clientes\SeguimientoController@listadoContactosPorCliente' );
Route::post( '/guardaSeguimiento' , 'crmmex\Clientes\SeguimientoController@guardaSeguimiento' );


Route::get( 'listadoProspectos' , 'Prospectos@listado' );

Route::get( 'listadoContactos' , 'ContactosController@listadoContactos' );

//Route::get( 'listadoSeguimientos' , 'SeguimientosController@listadoSeguimientos' );

Route::get( 'listadoProductos' , 'Productos@listadoProductos' );

Route::get( 'listadoEjecutivos' , 'Administradores@listaAdmin' );

Route::get( 'listadoPropuestas' , 'VentasController@propuestas' );

Route::get( 'listadoCampanias' , 'mercadotecnia\CampaniasController@listadoCampanias' );

Route::get( '/opcionesCombos/{id}' , 'CatalogoController@catalogo' );

Route::get( '/opcionesCombosPorId/{id}' , 'CatalogoController@catalogoPorId' );

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
