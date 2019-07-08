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
use App\Mail\EnvioPrueba AS EP;
use App\Mail\GmailExample;
use Illuminate\Support\Facades\Mail;

Auth::routes();

// Rutas protegidas por sesion
Route::middleware('auth')->group( function() {
    /* V3 */
    Route::get( '/home4' , function() {
        return redirect('/login');
    });
    Route::get( '/setTema/{id}'             , 'branding\BrandingController@update' );
    Route::get( '/setImagen/{id}'           , 'branding\BrandingController@updateImagen' );
    Route::get( '/quitaImagen'              , 'branding\BrandingController@quitaImagen' );
    Route::get( '/guardaTrans/{val}'        , 'branding\BrandingController@guardaTrans' );
    Route::get( '/contenidos/{id}/{param?}' , 'contenidos\ContenidosController@contenidos' )->middleware( 'bitacora' );
    Route::get( '/home'                     , 'branding\BrandingController@index');
    Route::get( '/generaToken'              , 'crmmex\Utils\ApiTokenController@getTokenWeb' );
    Route::get( '/estructuraContacto/{nom?}/{idty?}/{appat?}/{apmat?}/{correo?}/{celular?}/{compania?}/{tel?}/{ext?}/{area?}/{puesto?}/' ,
        function( $nom='', $idty='', $appat='', $apmat='', $correo='', $celular='', $compania='', $tel='', $ext='', $area='', $puesto='' ) {
          return view( 'crmmex.prospectos.contacto' ,
            [
              'rand'    => rand(1111,9999), 'btn'      => 'btn-danger', 'idty'=> $idty, 'nom' => $nom, 'appat' => $appat, 'apmat'  => $apmat, 'correo' => $correo,
              'celular' => $celular       , 'compania' => $compania   , 'tel' => $tel , 'ext' => $ext, 'area'  => $area , 'puesto' => $puesto
            ]
          );
        }
    );
});

// Rutas utiles para el carrito de la propuesta
Route::middleware( 'web' )->group( function(){

  Route::get ( '/obtieneDatosPropuesta/{propuestaID}' , 'crmmex\Clientes\PropuestasController@datosPropuesta' );
  Route::post( '/altaPropuesta'                       , 'crmmex\Clientes\PropuestasController@altaPropuesta' );
  Route::post( '/editaPropuesta'                      , 'crmmex\Clientes\PropuestasController@editaPropuesta' );
  Route::post( '/eliminaPropuesta/{propuestaID}'      , 'crmmex\Clientes\PropuestasController@eliminaPropuesta' );
  Route::get ( '/idtyPropuesta'                       , 'crmmex\Clientes\PropuestasController@generaIdPropuesta' );
  Route::get ( '/generaPDF/{propuestaID}'             , 'crmmex\Clientes\PropuestasController@generaPDF' );
  Route::get ( '/enviaPropuesta/{propuestaID}'        , 'crmmex\Clientes\PropuestasController@enviaPropuesta' );
  Route::post( '/carrito'                             , 'crmmex\Clientes\PropuestasController@carrito' );
  Route::post( '/carritoElimina'                      , 'crmmex\Clientes\PropuestasController@eliminaCarrito' );
  Route::post( '/carritoEliminaProd/{productoID}'     , 'crmmex\Clientes\PropuestasController@eliminaElementoCarrito' );
  Route::post( '/carritoCarga/{propuestaID}'          , 'crmmex\Clientes\PropuestasController@cargaCarrito' );

});

Route::get( '/' , function (){ return redirect( '/login' ); } );
Route::get( '/envioCorreo/{propuestaID}' , 'crmmex\Sistema\PHPMailerController@envioPropuesta' );
Route::get( '/phpconf' , function(){
  phpinfo();
});


/**********************
 * Ejemplos a eliminar
 **********************/

/* Creacion de archivo pdf */
Route::get( '/imprimir' , function() {
    $nombre = "Carlos Vicente Reyes Salazar";
    $fecha  = date( 'Y-m-d H:i:s' );
    $pdf = \PDF::loadView( 'crmmex.pdf.ejemplo' , compact( 'nombre' , 'fecha' ) );
    return $pdf->download( 'ejemplo.pdf' );
});

/* Envio de correo electronico (sin funcionar) */
Route::get( '/email' , function() {
  Mail::to( 'cvreyes@mexagon.net' )->send(new EP);
});

Route::get( '/gmail' , function () {
  Mail::to( 'cvreyes@mexagon.net' )->send( new GmailExample() );
  return view('/');
});
