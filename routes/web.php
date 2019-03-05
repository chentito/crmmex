<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Rutas protegidas por sesion
Route::middleware('auth')->group( function() {
    Route::get( '/home'                       , 'HomeController@index')->name('home');
    Route::get( '/home2'                      , function(){ return view( 'home2' ); });
    
    /*
     * Administracion de prospectos
     */
    Route::get( '/prospectos'                 , function(){ return view( 'prospectos.listado' ); });
    Route::get( '/prospectos/alta'            , function(){ return view( 'prospectos.alta' ); } );
    Route::get( '/prospectos/seguimiento'     , function(){ return view( 'prospectos.seguimiento' ); } );
    //Route::get( '/prospectos/listado'         , 'Prospectos@listado' );    Ruta removida a api
    
    Route::get( '/clientes'                   , function(){ return view( 'principales.clientes' ); });
    Route::get( '/ventas'                     , function(){ return view( 'principales.ventas' )->with( [ 'registros' => array() ] ); });
    
    /*
     * Productos
     */
    Route::get( '/productos'                  , function(){ return view( 'principales.productos' ); });
    Route::get( '/productos/listado'          , 'Productos@listadoProductos' );
    Route::get( '/productos/verProductos'       , function(){ return view( 'productos.verProductos' ); } );
    Route::get( '/productos/configuracion/{id}' , function( $id ){ return view( 'productos.configuracion' , [ 'id' => $id ] ); } );
    
    /*
     * Mercadotecnia
     */
    Route::get( '/mercadotecnia'              , function(){ return view( 'principales.mercadotecnia' ); });
    
    /*
     * Reportes
     */
    Route::get( '/reportes'                   , function(){ return view( 'principales.reportes' ); });
    
    /*
     * Configuraciones
     */
    Route::get( '/configuraciones'            , function(){ return view( 'principales.configuraciones' ); });

    /* 
     * Usuarios 
     */
    Route::get( '/usuarios/admin'             , function(){ return view( 'usuarios.perfil' ); });
    Route::get( '/usuarios/listado'           , 'ControllerAdministradores@listado' );
    Route::get( '/usuarios/misdatos/{id}'     , 'ControllerAdministradores@detalle' );
    Route::get( '/usuarios/nuevo'             , function(){ echo "hola borolas: agregaContacto"; });
    Route::get( '/usuarios/seguimiento'       , function(){ echo "hola borolas: seguimiento"; });

    /*
     * Administracion de usuarios del sistemas
     */
    Route::get( '/administracion'              , function(){ return view( 'principales.administracion' ); });
    Route::get( '/administracion/listado'      , 'Administradores@listaAdmin' );
    Route::get( '/administracion/guardaAdmin'  , ['as' => 'form_url', 'uses' => 'Administradores@store'] );
    Route::get( '/administracion/elimina/{id}' , 'Administradores@delete' );
    
    /*
     * Clientes
     */
    Route::get( '/clientes/listado' , 'Clientes@listadoClientes' );
    
    /*
     * Ventas
     */
    Route::get( '/ventas/listadoPropuestas' , 'VentasController@propuestas' );
    Route::get( '/ventas/verListadoPropuestas' , function(){ return view( 'ventas.propuestas' ); } );
    Route::get( '/ventas/forecast' , 'ForecastController@datosCalculoForecast' );

});

Route::get('/', function () { return redirect( '/login' ); });

