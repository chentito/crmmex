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
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // Dashboard, pantalla inicial
    Route::get( '/home2' , function(){
        return view( 'home2' );
    });
    
    Route::get( '/prospectos' , function(){
        return view( 'principales.prospectos' );
    });
    
    Route::get( '/clientes' , function(){
        return view( 'principales.clientes' );
    });
    
    Route::get( '/ventas' , function(){
        return view( 'principales.ventas' );
    });

    Route::get( '/mercadotecnia' , function(){
        return view( 'principales.mercadotecnia' );
    });
    
    Route::get( '/reportes' , function(){
        return view( 'principales.reportes' );
    });
    
    Route::get( '/configuraciones' , function(){
        return view( 'principales.configuraciones' );
    });
    
    Route::get( '/perfil' , function(){
        return view( 'usuarios.perfil' );
    });
});

Route::get('/', function () {
    return redirect( '/login' );
});

