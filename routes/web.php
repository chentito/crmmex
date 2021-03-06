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
    Route::get( '/visualizaMultimedia/{multimediaID}' , 'crmmex\Sistema\MultimediaController@verElemento' );
    Route::get( '/setImagen/{id}'           , 'branding\BrandingController@updateImagen' );
    Route::get( '/quitaImagen'              , 'branding\BrandingController@quitaImagen' );
    Route::get( '/guardaTrans/{val}'        , 'branding\BrandingController@guardaTrans' );
    Route::get( '/contenidos/{id}/{param?}' , 'contenidos\ContenidosController@contenidos' )->middleware( 'bitacora' );
    Route::get( '/home'                     , 'branding\BrandingController@index');
    Route::get( '/generaToken'              , 'crmmex\Utils\ApiTokenController@getTokenWeb' );
    /*Route::get( '/estructuraContacto/{nom?}/{idty?}/{appat?}/{apmat?}/{correo?}/{celular?}/{tel?}/{ext?}/{adicionales?}' ,
        function( $nom='', $idty='', $appat='', $apmat='', $correo='', $celular='', $tel='', $ext='' , $adicionales='') {
          return view( 'crmmex.prospectos.contacto' ,
            [
              'rand'  => rand(1111,9999), 'btn'   => 'btn-danger', 'idty'        => $idty        , 'nom'     => $nom,
              'appat' => $appat         , 'apmat' => $apmat      , 'correo'      => $correo      , 'celular' => $celular,
              'tel'   => $tel           , 'ext'   => $ext        , 'adicionales' => $adicionales
            ]
          );
        }
    );*/
});

// Rutas utiles para el carrito de la propuesta
Route::middleware( 'web' )->group( function() {
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
  Route::get ( '/imagenPropietario'                   , 'crmmex\Sistema\PropietarioController@imagenPropietario' );
  Route::get ( '/imagenParaPropuesta/{id}'            , 'crmmex\Clientes\PropuestasController@imagenParaPropuesta' );
  Route::get ( '/fondoPersonalizado'                  , 'crmmex\Sistema\PropietarioController@getPersBackground' );
  Route::get ( '/download/{archivo}'                  , 'crmmex\Sistema\DescargasController@descargaArchivoEjemplo' );
  Route::get ( '/imagenEjecutivo/{ejecutivoID}'       , 'crmmex\Administradores\Administradores@imagenPerfil' );
});

Route::get ( '/campaniatracking/{campaniaID}/{contactoID}' , 'crmmex\Sistema\TrackingController@registro' );
Route::post( '/forms/{contactoID}'                         , 'crmmex\Sistema\TrackingController@formAnswering' );
Route::get( '/obtienePronostico/{mes?}/{anio?}'            , 'crmmex\Pronosticos\ProcesaForecastController@calculaSegunFormula' );

Route::get( '/' , function (){ return redirect( '/login' ); } );
Route::get( '/envioCorreo/{propuestaID}' , 'crmmex\Sistema\PHPMailerController@envioPropuesta' );


Route::get ( '/campania/{campaniaID}/{contactoID}/{preview?}/{formToPreview?}' , 'crmmex\Mercadotecnia\CampaniaContainerController@landingPage' );
Route::post( '/campaniaSave'                                                   , 'crmmex\Mercadotecnia\CampaniaContainerController@landingPageSave' );
Route::get ( '/listadoCamposAdicionales/{seccion?}/{orden?}'                   , 'crmmex\Utils\CamposAdicionalesController@listado' );
Route::get ( '/agregaRFCTmp'                                                   , 'crmmex\Clientes\ClientesController@rfcs' );

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
