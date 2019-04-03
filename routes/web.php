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

Route::get( '/nLogin' , function(){ return view( 'crm.login.login' ); });
Route::get( '/template' , function(){ return view( 'crm.layout.nuevo' ); });
Route::get( '/template2/{tema?}' , function( $tema=null ) {
    $estilo = "";
    $css    = "";
    $btns   = "";
    switch( $tema ) {
        case 'dark'  :$estilo='bg-dark';   $btns='btn-dark';   $css='dark.css';break;
        case 'blue'  :$estilo='bg-primary';$btns='btn-primary';$css='blue2.css';break;
        case 'grey'  :$estilo='bg-ligth';  $btns='btn-ligth';  $css='grey.css';break;
        case 'blue2' :$estilo='bg-info';   $btns='btn-info';   $css='blue.css';break;
        case 'red'   :$estilo='bg-danger'; $btns='btn-danger'; $css='red.css';break;
        case 'yellow':$estilo='bg-warning';$btns='btn-warning';$css='yellow.css';break;
        case 'green' :$estilo='bg-success';$btns='btn-success';$css='green.css';break;
        case 'white' :$estilo='bg-white';  $btns='btn-white';  $css='white.css';break;
        default      :$estilo='bg-dark';   $btns='btn-dark';   $css='dark.css';
    }
    return view( 'crm.layout.nuevo2' , [ 'estilo' => $estilo , 'css' => $css , 'btn' => $btns ] );
});

Route::get( '/combos/{id}' , 'contenidos\CatalogosController@generaListadoCombo');

Route::get( '/fachada' , function() {
    echo EsPDF::check('algo.pdf');
});

// Rutas protegidas por sesion
Route::middleware('auth')->group( function() {
    /* V3 */
    Route::get( '/home4' , function(){
        return redirect('/login');
    });
    Route::get( '/setTema/{id}' , 'branding\BrandingController@update' );
    Route::get( '/contenidos/{id}' , 'contenidos\ContenidosController@contenidos' );
    Route::get( '/home' , 'branding\BrandingController@index');
    
    
    /* V2 */
    Route::get( '/home3'     , function(){ return view( 'crm.crm' ); });
    /* Prospectos */
    Route::get( '/prospecto' , function(){ return view( 'crm.prospectos.prospectos' ); });
    Route::get( '/prospectoAlta' , function(){ return view( 'crm.prospectos.prospectoAlta' ); });
    Route::get( '/prospectoSeguimiento' , function(){ return view( 'crm.prospectos.prospectoSeguimiento' ); });
    Route::get( '/prospectoContacto/{idP}' , function( $id ){ return view( 'crm.prospectos.prospectoContacto' ); });
    /* Clientes */
    Route::get( '/cliente' , function(){ return view( 'crm.clientes.clientes' ); });
    Route::get( '/clienteAlta' , function(){ return view( 'crm.clientes.clienteAlta' ); });
    Route::get( '/clienteSeguimiento' , function(){ return view( 'crm.clientes.clienteSeguimiento' ); });
    Route::get( '/clienteAltaSeguimiento' , function(){ return view( 'crm.clientes.clienteAltaSeguimiento' ); });
    Route::get( '/clientePropuesta/{idCliente}' , function(){ return view( 'crm.clientes.clientePropuesta' ); });
    /* Configuraciones */
    Route::get( '/configuracion' , 'configuraciones\CatalogosController@catalogos' );
    Route::get( '/configuracionForecast' , function(){ return view( 'crm.configuraciones.configuracionForecast' ); });
    Route::get( '/configuracionPipeline' , function(){ return view( 'crm.configuraciones.configuracionPipeline' ); });
    Route::get( '/configuracionCamposAdicionales' , function(){ return view( 'crm.configuraciones.configuracionCamposAdicionales' ); });
    Route::get( '/configuracionSMTP' , function(){ return view( 'crm.configuraciones.configuracionSMTP' ); });
    /* Productos/Servicios */
    Route::get( '/producto' , function(){ return view( 'crm.productos.productos' ); });
    Route::get( '/productoConfiguracion/{id}' , function(){ return view( 'crm.productos.productoConfiguracion' ); });
    Route::get( '/productoAlta' , function(){ return view( 'crm.productos.productoAlta' ); });
    /* Ventas */
    Route::get( '/venta' , function(){ return view( 'crm.ventas.ventas' ); });
    /* Mercadotecnia */
    Route::get( '/mercadotecnia' , function(){ return view( 'crm.mercadotecnia.mercadotecnia' ); });
    /* Reportes */
    Route::get( '/reportes' , function(){ return view( 'crm.reportes.reportes' ); });
    /* Ejecutivos */
    Route::get( '/ejecutivos' , function(){ return view( 'crm.ejecutivos.perfil' ); });
    Route::get( '/ejecutivoListado' , function(){ return view( 'crm.ejecutivos.ejecutivoListado' ); });
    Route::get( '/ejecutivoEdicion/{id}' , function(){ return view( 'crm.ejecutivos.ejecutivoEdicion' ); });
    Route::get( '/ejecutivoAlta' , function(){ return view( 'crm.ejecutivos.ejecutivoAlta' ); });
    Route::get( '/ejecutivoRoles/{idRol?}' , 'ejecutivo\RolesController@listadoModulos' );
    Route::get( '/ejecutivoActividades/{idRol?}' , function(){ return view( 'crm.ejecutivos.ejecutivoActividades' ); } );

    Route::get( '/misModulos' , 'ejecutivo\RolesController@listadoModulos' );

    Route::get( '/opcionesCat/{id}' , 'CatalogoController@catalogo' );

    /* V1 */
    //Route::get( '/home'                       , 'HomeController@index')->name('home');
    Route::get( '/home2'                      , function(){ return view( 'home2' ); });

    /*******************************
     * Administracion de prospectos
     *******************************/
    Route::get( '/prospectos'                    , function(){ return view( 'prospectos.listado' ); } );
    Route::get( '/prospectos/altaContacto/{idP}' , function(){
        return view( 'prospectos.contactos' )
                ->with(['id' => '','nombre' => '','paterno' => '','materno' => '','email' => '','celular' => '','telefono' => '','extension' => '','puesto' => '']);
    });
    Route::get( '/prospectos/alta'               , function(){
        return view( 'prospectos.alta' );
    });
    Route::get( '/prospectos/contactos/{idP}'    , function( $id ){ return view( 'prospectos.listadoContactos' , [ 'id' => $id ] ); } );
    Route::get( '/prospectos/contactos/edita/{idC}' , function( $id ){
        return view( 'prospectos.contactos' )
                ->with(['id' => $id,'nombre' => 'Carlos','paterno' => 'Reyes','materno' => 'Salazar','email' => 'cvreyes@mexagon.net','celular' => '5578100961','telefono' => '12055555','extension' => '310','puesto' => 'Programador']);
    });

    Route::get( '/prospectos/seguimiento'        , function(){ return view( 'prospectos.seguimiento' ); } );

    Route::get( '/clientes'                   , function(){ return view( 'principales.clientes' ); });
    Route::get( '/ventas'                     , function(){ return view( 'principales.ventas' )->with( [ 'registros' => array() ] ); });

    /************************
     * Productos / Servicios
     ************************/
    Route::get( '/productos'                  , function(){ return view( 'productos.verProductos' ); });
    Route::get( '/productos/listado'          , 'Productos@listadoProductos' );
    Route::get( '/productos/verProductos'       , function(){ return view( 'productos.verProductos' ); } );
    Route::get( '/productos/configuracion/{id}' , function( $id ){ return view( 'productos.configuracion' , [ 'id' => $id ] ); } );

    /****************
     * Mercadotecnia
     ****************/
    //Route::get( '/mercadotecnia'              , function(){ return view( 'principales.mercadotecnia' ); });

    /***********
     * Reportes
     ***********/
    //Route::get( '/reportes'                   , function(){ return view( 'principales.reportes' ); });

    /******************
     * Configuraciones
     ******************/
    Route::get( '/configuraciones'            , function(){ return view( 'principales.configuraciones' ); });

    /***********
     * Usuarios
     ***********/
    Route::get( '/usuarios/admin'             , function(){ return view( 'usuarios.perfil' ); });
    Route::get( '/usuarios/listado'           , 'ControllerAdministradores@listado' );
    Route::get( '/usuarios/misdatos/{id}'     , 'ControllerAdministradores@detalle' );
    Route::get( '/usuarios/nuevo'             , function(){ echo "hola borolas: agregaContacto"; });
    Route::get( '/usuarios/seguimiento'       , function(){ echo "hola borolas: seguimiento"; });

    /******************************************
     * Administracion de usuarios del sistemas
     ******************************************/
    Route::get( '/administracion'              , function(){ return view( 'principales.administracion' ); });
    Route::get( '/administracion/listado'      , 'Administradores@listaAdmin' );
    Route::get( '/administracion/guardaAdmin'  , ['as' => 'form_url', 'uses' => 'Administradores@store'] );
    Route::get( '/administracion/elimina/{id}' , 'Administradores@delete' );

    /***********
     * Clientes
     ***********/
    //Route::get( '/clientes/listado' , 'Clientes@listadoClientes' );

    /*********
     * Ventas
     *********/
    Route::get( '/ventas/listadoPropuestas' , 'VentasController@propuestas' );
    Route::get( '/ventas/verListadoPropuestas' , function(){ return view( 'ventas.propuestas' ); } );
    Route::get( '/ventas/forecast' , 'ForecastController@datosCalculoForecast' );

});

Route::get('/', function () { return redirect( '/login' ); });
Route::get('/vue', function () { return view( 'vue' ); });
Route::get('/vueDat', function () { 
    return "Holaaa";
});

