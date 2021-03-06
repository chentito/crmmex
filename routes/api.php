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
Route::middleware( 'auth:api' )->post( '/altaExpediente'               , 'crmmex\Clientes\ClientesController@guardaCliente' );
Route::middleware( 'auth:api' )->post( '/editaExpediente'              , 'crmmex\Clientes\ClientesController@actualizaCliente' );
Route::middleware( 'auth:api' )->get ( '/listadoClientes/{tipo?}'      , 'crmmex\Clientes\ClientesController@listadoClientes' );
//Route::middleware( 'auth:api' )->get ( '/listadoProspectos/{tipo}'  , 'crmmex\Clientes\ClientesController@listadoClientes' );
Route::middleware( 'auth:api' )->get ( '/listadoProspectos'            , 'crmmex\Clientes\ClientesController@listadoProspectos' );
Route::middleware( 'auth:api' )->get ( '/obtieneExpediente/{id}'       , 'crmmex\Clientes\ClientesController@obtieneCliente' );
Route::middleware( 'auth:api' )->post( '/eliminaCliente/{id}/{mov}'    , 'crmmex\Clientes\ClientesController@eliminaCliente' );
Route::middleware( 'auth:api' )->post( '/habilitaCliente/{id}'         , 'crmmex\Clientes\ClientesController@habilitaCliente' );
Route::middleware( 'auth:api' )->get ( '/listadoPagos/{propuestaID}'   , 'crmmex\Clientes\PagosController@listadoPagos' );
Route::middleware( 'auth:api' )->post( '/altaPago'                     , 'crmmex\Clientes\PagosController@altaPago' );
Route::middleware( 'auth:api' )->post( '/eliminaPago/{pagoID}'         , 'crmmex\Clientes\PagosController@eliminaPago' );
Route::middleware( 'auth:api' )->get ( '/statusPago/{propuestaID}'     , 'crmmex\Clientes\PropuestasController@statusPago' );
//Route::middleware( 'auth:api' )->get ( '/enviaPropuesta/{propuestaID}' , 'crmmex\Clientes\PropuestasController@enviaPropuesta' );
Route::middleware( 'auth:api' )->post( '/enviaPropuesta/{propuestaID}' , 'crmmex\Clientes\PropuestasController@enviaPropuesta' );
Route::middleware( 'auth:api' )->get ( '/obtienePipeline/{clienteID}'  , 'crmmex\Pipeline\AnalisisPipelineController@analisisPiepeline' );
Route::middleware( 'auth:api' )->post( '/estructuraContacto'           , 'crmmex\Clientes\ClientesController@cargaEstructuraContacto' );


/******************** Importacion de clientes/prospectos ********************/
Route::middleware( 'auth:api' )->post( '/importaCatalogoClientes'        , 'crmmex\Clientes\ImportacionController@cargaLayoutClientes' );
Route::middleware( 'auth:api' )->post( '/importaCatalogoClientesMexagon' , 'crmmex\Clientes\ImportacionController@cargaLayoutClientesMexagon' );
Route::middleware( 'auth:api' )->post( '/importaCatalogoContactosMexagon' , 'crmmex\Clientes\ImportacionController@idWH_RFC' );


/************************************ Seguimientos ************************************/
Route::middleware( 'auth:api' )->get ( '/validaRFC/{rfc}'                    , 'crmmex\Clientes\ClientesController@valRFC' );
Route::middleware( 'auth:api' )->get ( '/listadoSeguimientos/{clienteID?}'   , 'crmmex\Clientes\SeguimientoController@listadoSeguimientos' );
Route::middleware( 'auth:api' )->get ( '/listadoContactos/{clienteID}'       , 'crmmex\Clientes\SeguimientoController@listadoContactosPorCliente' );
Route::middleware( 'auth:api' )->post( '/guardaSeguimiento'                  , 'crmmex\Clientes\SeguimientoController@guardaSeguimiento' );
Route::middleware( 'auth:api' )->get ( '/obtieneSeguimiento/{id}'            , 'crmmex\Clientes\SeguimientoController@obtieneSeguimiento' );
Route::middleware( 'auth:api' )->post( '/actualizaSeguimiento'               , 'crmmex\Clientes\SeguimientoController@actualizaSeguimiento' );
Route::middleware( 'auth:api' )->get ( '/listadoPropuestas/{clienteID}'      , 'crmmex\Clientes\PropuestasController@listadoPropuestas' );
Route::middleware( 'auth:api' )->post( '/clienteIdty/{clienteID}'            , 'crmmex\Clientes\ClientesController@clienteIdty' );
Route::middleware( 'auth:api' )->post( '/seguimientoIdty/{seguimientoID}'    , 'crmmex\Clientes\SeguimientoController@seguimientoIdty' );
Route::middleware( 'auth:api' )->post( '/eliminaSeguimiento/{seguimientoID}' , 'crmmex\Clientes\SeguimientoController@eliminaSeguimiento' );
Route::middleware( 'auth:api' )->get ( '/proximosSeguimientos'               , 'crmmex\Clientes\SeguimientoController@proximosSeguimientos' );


/************************************ Propuestas ***********************************/
Route::middleware( 'auth:api' )->get ( '/obtieneDatosPropuesta/{propuestaID}' , 'crmmex\Clientes\PropuestasController@datosPropuesta' );
/*Route::middleware( 'auth:api' )->post( '/altaPropuesta'                       , 'crmmex\Clientes\PropuestasController@altaPropuesta' );
Route::middleware( 'auth:api' )->post( '/editaPropuesta'                      , 'crmmex\Clientes\PropuestasController@editaPropuesta' );
Route::middleware( 'auth:api' )->post( '/eliminaPropuesta/{propuestaID}'      , 'crmmex\Clientes\PropuestasController@eliminaPropuesta' );
Route::middleware( 'auth:api' )->get ( '/idtyPropuesta'                       , 'crmmex\Clientes\PropuestasController@generaIdPropuesta' );
Route::middleware( 'auth:api' )->get ( '/generaPDF/{propuestaID}'             , 'crmmex\Clientes\PropuestasController@generaPDF' );
Route::middleware( 'auth:api' )->get ( '/enviaPropuesta/{propuestaID}'        , 'crmmex\Clientes\PropuestasController@enviaPropuesta' );
Route::middleware( 'auth:api' )->post( '/carrito'                             , 'crmmex\Clientes\PropuestasController@carrito' );
Route::middleware( 'auth:api' )->post( '/carritoElimina'                      , 'crmmex\Clientes\PropuestasController@eliminaCarrito' );
Route::middleware( 'auth:api' )->post( '/carritoEliminaProd/{productoID}'     , 'crmmex\Clientes\PropuestasController@eliminaElementoCarrito' );
Route::middleware( 'auth:api' )->post( '/carritoCarga/{propuestaID}'          , 'crmmex\Clientes\PropuestasController@cargaCarrito' ); */


/************************************ Promociones ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoPromociones'               , 'crmmex\Productos\PromocionesController@listadoPromociones' );
Route::middleware( 'auth:api' )->post( '/guardaPromocion'                  , 'crmmex\Productos\PromocionesController@guardaPromocion' );
Route::middleware( 'auth:api' )->get ( '/detallePromocion/{promocionID}'   , 'crmmex\Productos\PromocionesController@detallePromocion' );
Route::middleware( 'auth:api' )->post( '/actualizaPromocion'               , 'crmmex\Productos\PromocionesController@actualizaPromocion' );
Route::middleware( 'auth:api' )->post( '/eliminaPromocion/{promocionID}'   , 'crmmex\Productos\PromocionesController@eliminaPromocion' );


/******************** Operaciones para el modulo de ventas ********************/
Route::middleware( 'auth:api' )->get ( '/listadoFacturas' , 'crmmex\Ventas\VentasController@listadoFacturas' );


/******************** Operaciones para el modulo de Productos ********************/
Route::middleware( 'auth:api' )->get ( '/listadoProductos'                               , 'crmmex\Productos\ProductosController@listadoProductos' );
Route::middleware( 'auth:api' )->post( '/guardaProducto'                                 , 'crmmex\Productos\ProductosController@guardaProducto' );
Route::middleware( 'auth:api' )->post( '/actualizaProducto'                              , 'crmmex\Productos\ProductosController@actualizaProducto' );
Route::middleware( 'auth:api' )->get ( '/obtieneProducto/{productoID}'                   , 'crmmex\Productos\ProductosController@obtieneProducto' );
Route::middleware( 'auth:api' )->post( '/cargaHistoricosProducto'                        , 'crmmex\Productos\ProductosController@cargaHistoricosProducto' );
Route::middleware( 'auth:api' )->get ( '/obtieneHistoricos/{productoID}'                 , 'crmmex\Productos\ProductosController@obtieneHistoricos' );
Route::middleware( 'auth:api' )->get ( '/obtienePromedioHistoricos/{productoID}/{meses}' , 'crmmex\Productos\ProductosController@obtienePromedioHistorico' );
Route::middleware( 'auth:api' )->get ( '/obtieneListadoProductos/{catalogoID}'           , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::middleware( 'auth:api' )->post( '/cargaMasivaProductos'                           , 'crmmex\Productos\ProductosController@cargaMasivaProductos' );
Route::middleware( 'auth:api' )->post( '/eliminaProducto/{productoID}/{mov}'             , 'crmmex\Productos\ProductosController@eliminaProducto' );
Route::middleware( 'auth:api' )->get ( '/disponibilidadClave/{term}'                     , 'crmmex\Productos\ProductosController@verificaClave' );


/************************************ Control de ejecutivos ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoEjecutivos'              , 'crmmex\Administradores\Administradores@listaAdmin' );
Route::middleware( 'auth:api' )->get ( '/datosEjecutivo/{ejecutivoID}'   , 'crmmex\Administradores\Administradores@search' );
Route::middleware( 'auth:api' )->post( '/altaEjecutivo'                  , 'crmmex\Administradores\Administradores@store' );
Route::middleware( 'auth:api' )->post( '/editaEjecutivo'                 , 'crmmex\Administradores\Administradores@update' );
Route::middleware( 'auth:api' )->post( '/shortEditaEjecutivo'            , 'crmmex\Administradores\Administradores@shortUpdate' );
Route::middleware( 'auth:api' )->post( '/eliminaEjecutivo/{ejecutivoID}' , 'crmmex\Administradores\Administradores@delete' );


/************************************ Campanias ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoCampanias'                  , 'crmmex\Mercadotecnia\CampaniasController@listadoCampanias' );
Route::middleware( 'auth:api' )->post( '/guardaCampania'                    , 'crmmex\Mercadotecnia\CampaniasController@save' );
Route::middleware( 'auth:api' )->post( '/actualizaCampania'                 , 'crmmex\Mercadotecnia\CampaniasController@update' );
Route::middleware( 'auth:api' )->post( '/buscaCampania/{campaniaID}'        , 'crmmex\Mercadotecnia\CampaniasController@search' );
Route::middleware( 'auth:api' )->post( '/eliminaCampania/{campaniaID}'      , 'crmmex\Mercadotecnia\CampaniasController@delete' );
Route::middleware( 'auth:api' )->get ( '/listadoDestinatarios/{campaniaID}' , 'crmmex\Mercadotecnia\CampaniasController@destinatariosPorCampania' );
Route::middleware( 'auth:api' )->get ( '/respuestasForm/{campaniaID}'       , 'crmmex\Mercadotecnia\CampaniasController@obtieneRespuestasForm' );


/************************************ Configuraciones ************************************/
Route::middleware( 'auth:api' )->get ( '/obtieneSMTP'                                                    , 'crmmex\Configuraciones\SMTPController@obtieneConfiguracion' );
Route::middleware( 'auth:api' )->post( '/testSMTP'                                                       , 'crmmex\Configuraciones\SMTPController@testSMTP' );
Route::middleware( 'auth:api' )->post( '/actualizaSMTP'                                                  , 'crmmex\Configuraciones\SMTPController@update' );
Route::middleware( 'auth:api' )->get ( '/listadoCamposAdicionales/{seccion?}/{orden?}'                   , 'crmmex\Utils\CamposAdicionalesController@listado' );
Route::middleware( 'auth:api' )->post( '/nuevoCampoAdicional'                                            , 'crmmex\Utils\CamposAdicionalesController@agregaCampo' );
Route::middleware( 'auth:api' )->post( '/editaCampoAdicional'                                            , 'crmmex\Utils\CamposAdicionalesController@editaCampoAdicional' );
Route::middleware( 'auth:api' )->post( '/eliminaCampoAdicional/{campoAdicionalID}'                       , 'crmmex\Utils\CamposAdicionalesController@eliminaCampoAdicional' );
Route::middleware( 'auth:api' )->get ( '/datosCampoAdicional/{campoAdicionalID}'                         , 'crmmex\Utils\CamposAdicionalesController@datosCampoAdicional' );
Route::middleware( 'auth:api' )->get ( '/htmlCampoAdicional/{campoAdicionalID}/{campoAdicionalIDValor?}' , 'crmmex\Utils\CamposAdicionalesController@campoAdicionalHTML' );
Route::middleware( 'auth:api' )->get ( '/nombreSeccionCampoAdicional/{seccionID}'                        , 'crmmex\Utils\CamposAdicionalesController@nombreSeccion' );
Route::middleware( 'auth:api' )->get ( '/listadoListas'                                                  , 'crmmex\Mercadotecnia\ListasController@listadoListas' );
Route::middleware( 'auth:api' )->get ( '/listadoContactosAudiencia/{audienciaID}'                        , 'crmmex\Mercadotecnia\ListasController@listadoContactos' );
Route::middleware( 'auth:api' )->post( '/altaAudiencia'                                                  , 'crmmex\Mercadotecnia\ListasController@altaListado' );
Route::middleware( 'auth:api' )->get ( '/listadoTemplates'                                               , 'crmmex\Mercadotecnia\PiezasController@listadoTemplates' );
Route::middleware( 'auth:api' )->get ( '/listadoPiezasDisponibles/{editable?}'                           , 'crmmex\Mercadotecnia\PiezasController@listadoPiezas' );
Route::middleware( 'auth:api' )->post( '/altaPiezaTemplate'                                              , 'crmmex\Mercadotecnia\PiezasController@nuevaPieza' );
Route::middleware( 'auth:api' )->post( '/altaPiezaCampana'                                               , 'crmmex\Mercadotecnia\PiezasController@altaPiezaCampania' );
Route::middleware( 'auth:api' )->post( '/eliminaPiezaTemplate/{piezaID}'                                 , 'crmmex\Mercadotecnia\PiezasController@eliminaPieza' );
Route::middleware( 'auth:api' )->get ( '/detallePiezaTemplate/{piezaID}'                                 , 'crmmex\Mercadotecnia\PiezasController@detallePieza' );
Route::middleware( 'auth:api' )->get ( '/formsNuevoCampo/{id?}/{nombre?}/{tipo?}/{obligatoriedad?}/{validacion?}/{valor?}' , 'crmmex\Configuraciones\FormController@agregaCampoForm' );
Route::middleware( 'auth:api' )->post( '/guardaFormulario'                                               , 'crmmex\Configuraciones\FormController@guardaFormulario' );
Route::middleware( 'auth:api' )->post( '/actualizaFormulario'                                            , 'crmmex\Configuraciones\FormController@actualizaFormulario' );
Route::middleware( 'auth:api' )->get ( '/listadoFormularios'                                             , 'crmmex\Configuraciones\FormController@listadoFormularios' );
Route::middleware( 'auth:api' )->get ( '/eliminaFormulario/{formularioID}'                               , 'crmmex\Configuraciones\FormController@eliminaFormulario' );
Route::middleware( 'auth:api' )->get ( '/editaFormulario/{formularioID}'                                 , 'crmmex\Configuraciones\FormController@editaFormulario' );
Route::middleware( 'auth:api' )->post( '/cargaHistoricosLayout'                                          , 'crmmex\Sistema\HistoricosController@cargaHistoricos' );
Route::middleware( 'auth:api' )->get ( '/listadoHistoricos'                                              , 'crmmex\Sistema\HistoricosController@listadoHistoricos' );
Route::middleware( 'auth:api' )->get ( '/generaLayoutHistoricos/{fechainicial}/{fechaFinal}'             , 'crmmex\Sistema\HistoricosController@exportarCSV' );
Route::middleware( 'auth:api' )->get ( '/listadoPerfiles/{edicion?}'                                     , 'crmmex\Sistema\PerfilesController@listadoPerfiles' );
Route::middleware( 'auth:api' )->get ( '/detallePerfil/{perfilID}'                                       , 'crmmex\Sistema\PerfilesController@consultaPerfil' );
Route::middleware( 'auth:api' )->post( '/actualizaPerfil'                                                , 'crmmex\Sistema\PerfilesController@editaPerfil' );
Route::middleware( 'auth:api' )->post( '/altaPerfil'                                                     , 'crmmex\Sistema\PerfilesController@altaPerfil' );
Route::middleware( 'auth:api' )->post( '/eliminaPerfil/{perfilID}'                                       , 'crmmex\Sistema\PerfilesController@eliminaPerfil' );
Route::middleware( 'auth:api' )->post( '/logoPropuesta'                                                  , 'crmmex\Clientes\PropuestasController@logoPropuesta' );
Route::middleware( 'auth:api' )->get ( '/usaFirmaDigitalizada'                                           , 'crmmex\Clientes\PropuestasController@usaFirmaDigitalizada' );
Route::middleware( 'auth:api' )->get ( '/listadoCuentasBancarias/{bancoID?}'                             , 'crmmex\Sistema\CuentasBancariasController@listado' );
Route::middleware( 'auth:api' )->post( '/altaCuentaBancaria'                                             , 'crmmex\Sistema\CuentasBancariasController@alta' );
Route::middleware( 'auth:api' )->post( '/editaCuentaBancaria'                                            , 'crmmex\Sistema\CuentasBancariasController@actualiza' );
Route::middleware( 'auth:api' )->get ( '/obtieneCuentaBancaria/{cuentaID}'                               , 'crmmex\Sistema\CuentasBancariasController@obtiene' );
Route::middleware( 'auth:api' )->post( '/eliminaCuentaBancaria/{cuentaID}/{movimiento}'                  , 'crmmex\Sistema\CuentasBancariasController@elimina' );
Route::middleware( 'auth:api' )->post( '/habilitaCuentaBancaria/{cuentaID}'                              , 'crmmex\Sistema\CuentasBancariasController@habilita' );


/************************************ Multimedia ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoMultimedia'                             , 'crmmex\Sistema\MultimediaController@listadoMultimedia' );
Route::middleware( 'auth:api' )->post( '/nuevoMultimedia'                               , 'crmmex\Sistema\MultimediaController@nuevoElemento' );
Route::middleware( 'auth:api' )->post( '/editaMultimedia'                               , 'crmmex\Sistema\MultimediaController@actualizaElemento' );
Route::middleware( 'auth:api' )->post( '/eliminaMultimedia/{multimediaID}/{movimiento}' , 'crmmex\Sistema\MultimediaController@eliminaElemento' );
Route::middleware( 'auth:api' )->post( '/habilitaMultimedia/{multimediaID}'             , 'crmmex\Sistema\MultimediaController@habilitaElemento' );
//Route::middleware( 'auth:api' )->get ( '/visualizaMultimedia/{multimediaID}'            , 'crmmex\Sistema\MultimediaController@verElemento' );


/************************************ Dashboard ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoWidgets'                          , 'crmmex\Dashboard\DashboardController@listadoWidgets' );
Route::middleware( 'auth:api' )->post( '/guardaConfWidgets'                       , 'crmmex\Dashboard\DashboardController@guardaConfWidgets' );
Route::middleware( 'auth:api' )->post( '/actualizaPosicion/{widgetID}/{posicion}' , 'crmmex\Dashboard\DashboardController@actualizaPosicionWidget' );
Route::middleware( 'auth:api' )->get ( '/listadoEstadoWidgets'                    , 'crmmex\Dashboard\DashboardController@listadoStatusWidgets' );
Route::middleware( 'auth:api' )->get ( '/datosWidget/{widgetID}'                  , 'crmmex\Dashboard\WidgetsController@datosWidget' );


/************************************ Acciones utiles en el sistema ************************************/
Route::middleware( 'auth:api' )->post( '/setPredefinido/{predefinidoID}' , 'crmmex\Utils\UtilsController@setPredefinido' );
Route::middleware( 'auth:api' )->get ( '/getPredefinido/{predefinidoID}' , 'crmmex\Utils\UtilsController@getPredefinido' );
Route::get ( '/utiles/comboEstados/{pais?}'                 , 'crmmex\Utils\UtilsController@estados' );
Route::get ( '/utiles/comboPaises'                          , 'crmmex\Utils\UtilsController@paises' );
Route::get ( '/utiles/opcionesCatalogos/{catalogoID}'       , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::get ( '/utiles/estatus'                              , 'crmmex\Utils\UtilsController@estatusRegistro' );
Route::get ( '/utiles/listadoProductosServicios/{grupoID?}' , 'crmmex\Utils\UtilsController@productosServicios' );
Route::get ( '/utiles/listadoContactos/{clienteID}'         , 'crmmex\Utils\UtilsController@listadoContactos' );
Route::post( '/utiles/aplicaPromo/{promoID}'                , 'crmmex\Utils\UtilsController@aplicaPromocion' );
Route::get ( '/utiles/listadoPromociones/{grupoID}'         , 'crmmex\Utils\UtilsController@listadoPromociones' );
Route::get ( '/opcionesCombos/{id}'                         , 'crmmex\Utils\UtilsController@catalogo' );
Route::get ( '/catalogos'                                   , 'crmmex\Utils\UtilsController@catalogosOpciones' );
Route::get ( '/opcionesCombosPorId/{id}'                    , 'crmmex\Utils\UtilsController@opcionesCatalogos' );
Route::get ( '/dataTableConfig/{idty}'                      , 'crmmex\Utils\DatatableController@dataTableConfig' );
Route::get ( '/dataTableConfigView/{idty}'                  , 'crmmex\Utils\DatatableController@dataTableConfigView' );
Route::post( '/actualizaGridConfig'                         , 'crmmex\Utils\DatatableController@actualizaGridConfig' );
Route::post( '/actualizaOptCat/{optID}/{optNombre}'         , 'crmmex\Utils\UtilsController@actualizaOpcionCatalogo' );
Route::post( '/agregaOptCat/{catID}/{optNombre}'            , 'crmmex\Utils\UtilsController@agregaOpcionCatalogo' );
Route::post( '/eliminaOptCat/{optID}'                       , 'crmmex\Utils\UtilsController@eliminaOpcionCatalogo' );
Route::post( '/configuraciones/{configuracionID}/{valor}'   , 'crmmex\Configuraciones\ConfiguracionesController@setValue' );
Route::get ( '/listadoConfiguraciones'                      , 'crmmex\Configuraciones\ConfiguracionesController@configuraciones' );
Route::post( '/setConfiguraciones'                          , 'crmmex\Configuraciones\ConfiguracionesController@setConfiguraciones' );
Route::get ( '/download/{archivo}'                          , 'crmmex\Sistema\DescargasController@descargaArchivoEjemplo' );


/************************************ Pronosticos ************************************/
Route::get ( '/getConfiguration'                                                     , 'crmmex\Pronosticos\ConstantesController@getConfiguration' );
Route::get ( '/getConstants'                                                         , 'crmmex\Pronosticos\ConstantesController@getConstants' );
Route::get ( '/addConstantStructure/{nombre?}/{descripcion?}/{valor?}/{id?}/{tipo?}' , 'crmmex\Pronosticos\ConstantesController@addConstantStructure' );
Route::post( '/setConfiguration'                                                     , 'crmmex\Pronosticos\ConstantesController@setConfiguration' );


/************************************ Acciones utiles para templates de envio de correo ************************************/
Route::get ( '/obtieneDatosTemplate/{templateID}' , 'crmmex\Sistema\TemplatesController@obtieneDatosTemplate' );
Route::post( '/actualizaDatosTemplate'            , 'crmmex\Sistema\TemplatesController@actualizaDatosTemplate' );


/************************************ Branding ************************************/
Route::middleware( 'auth:api' )->get ( '/obtieneDatosPropietario'   , 'crmmex\Sistema\PropietarioController@propietario' );
Route::middleware( 'auth:api' )->post( '/actualizaDatosPropietario' , 'crmmex\Sistema\PropietarioController@actualiza' );
Route::middleware( 'auth:api' )->post( '/imagenPropietario'         , 'crmmex\Sistema\PropietarioController@imagenPropietario' );
Route::middleware( 'auth:api' )->post( '/usaBackgroundPersonalizado', 'crmmex\Sistema\PropietarioController@savePersBackground' );
Route::middleware( 'auth:api' )->post( '/imagenParaPropuesta/{id}'  , 'crmmex\Clientes\PropuestasController@imagenParaPropuesta' );


/************************************ Pipeline ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoIndicadores'                 , 'crmmex\Pipeline\PipelineController@listadoIndicadores' );
Route::middleware( 'auth:api' )->get ( '/detalleIndicador/{indicadorID}'     , 'crmmex\Pipeline\PipelineController@detalleIndicador' );
Route::middleware( 'auth:api' )->post( '/guardaIndicador'                    , 'crmmex\Pipeline\PipelineController@altaIndicador' );
Route::middleware( 'auth:api' )->post( '/eliminaIndicador/{indicadorID}'     , 'crmmex\Pipeline\PipelineController@eliminaIndicador' );
Route::middleware( 'auth:api' )->post( '/deshabilitaIndicador/{indicadorID}' , 'crmmex\Pipeline\PipelineController@deshabilitaIndicador' );
Route::middleware( 'auth:api' )->post( '/habilitaIndicador/{indicadorID}'    , 'crmmex\Pipeline\PipelineController@habilitaIndicador' );
Route::middleware( 'auth:api' )->post( '/actualizaIndicador'                 , 'crmmex\Pipeline\PipelineController@actualizaIndicador' );
Route::middleware( 'auth:api' )->get ( '/obtieneProcesosSistema'             , 'crmmex\Pipeline\PipelineController@obtieneProcesosSistema' );
Route::middleware( 'auth:api' )->post( '/actualizaDescripcionProcesos'       , 'crmmex\Pipeline\PipelineController@actualizaDescripcionProcesos' );


/************************************ Forecast ************************************/
Route::middleware( 'auth:api' )->get( '/obtienePronostico'     , 'crmmex\Pronosticos\ProcesaForecastController@calculaSegunFormula' );
Route::middleware( 'auth:api' )->get( '/listadoProcesamientos' , 'crmmex\Pronosticos\PronosticosController@listadoProcesaimentos' );


/************************************ Reportes ************************************/
Route::middleware( 'auth:api' )->get ( '/reporteIndicadores' , 'crmmex\Reportes\IndicadoresController@listadoIndicadores' );


/************************************ Privilegios y permisos ************************************/
Route::middleware( 'auth:api' )->get ( '/listadoModulos'                , 'crmmex\Sistema\ModulosController@listadoModulos' );
Route::middleware( 'auth:api' )->get ( '/listadoSecciones/{moduloID?}'  , 'crmmex\Sistema\SeccionesController@listadoSecciones' );
Route::middleware( 'auth:api' )->get ( '/listadoPrivilegios/{perfilID}' , 'crmmex\Sistema\PrivilegiosController@listadoPrivilegios' );
Route::middleware( 'auth:api' )->post( '/guardaPrivilegios'             , 'crmmex\Sistema\PrivilegiosController@guardaPrivilegios' );
Route::middleware( 'auth:api' )->post( '/verificaModulos/{perfilID}'    , 'crmmex\Sistema\AccesoController@verModulos' );


/************************************ Pruebas API consumidas desdee Angular ************************************/
Route::get   ( '/users'      , 'UsersController@index'   )->middleware( 'cors' );
Route::get   ( '/users/{id}' , 'UsersController@show'    )->middleware( 'cors' );
Route::post  ( '/users'      , 'UsersController@store'   )->middleware( 'cors' );
Route::post  ( '/users/{id}' , 'UsersController@update'  )->middleware( 'cors' );
Route::delete( '/users/{id}' , 'UsersController@destroy' )->middleware( 'cors' );
