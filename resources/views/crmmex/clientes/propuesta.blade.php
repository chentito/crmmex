<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Datos Propuesta</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="form_altaPropuestaComercial" name="form_altaPropuestaComercial">
        <input type="hidden" id="clienteID" name="clienteID" value="{{$param}}">
        <input type="hidden" id="pID" name="pID" value="">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <label for="catalogo_18">Identificador</label>
                        <input type="text" id="propuesta_identificador" name="propuesta_identificador" class="form-control form-control-sm" placeholder="Identificador">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="catalogo_18">Categor&iacute;a</label>
                        <select class="custom-select custom-select-sm" id="catalogo_18" name="catalogo_18"></select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="catalogo_15">Forma Pago</label>
                        <select class="custom-select custom-select-sm" id="catalogo_15" name="catalogo_15"></select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="catalogo_15">Contacto</label>
                        <select class="custom-select custom-select-sm" id="propuesta_contactos" name="propuesta_contactos"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-1">
                        <label for="propuesta_requerimientos">Requerimientos</label>
                        <textarea class="form-control" cols="3" placeholder="Requerimientos Cliente" id="propuesta_requerimientos" name="propuesta_requerimientos"></textarea>
                    </div>
                    <div class="col-sm-6 mb-1">
                        <label for="propuesta_observaciones">Observaciones</label>
                        <textarea class="form-control" cols="3" placeholder="Observaciones" id="propuesta_observaciones" name="propuesta_observaciones"></textarea>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                          <label for="catalogo_12">Grupo</label>
                          <select class="custom-select custom-select-sm" id="catalogo_12" name="catalogo_12">
                              <option value="">-</option>
                          </select>
                    </div>
                    <div class="col-sm-9 mb-1">
                        <label for="listadoProductosPropuestaComercial">Seleccione Producto/Servicio</label>
                        <select class="custom-select custom-select-sm" id="listadoProductosPropuestaComercial" name="listadoProductosPropuestaComercial">
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="col-sm-2 mb-1 text-center">
                        <!--button class="btn btn-sm {{$btn}}" id="btnAgregaEstructuraProducto">Agregar Producto</button-->
                    </div>
                    <div class="col-sm-12 mb-1 collapse" id="formIndividual">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="propuesta_cantidad">Cantidad</label>
                                <input class="form-control form-control-sm" placeholder="Cantidad" id="propuesta_cantidad" name="propuesta_cantidad" value="1" type="number">
                            </div>
                            <div class="col-sm-2">
                                <label for="propuesta_precio">Precio</label>
                                <input class="form-control form-control-sm" placeholder="Precio (Reemplazar el precio configurado)" id="propuesta_precio" name="propuesta_precio">
                            </div>
                            <div class="col-sm-4">
                                <label for="propuesta_observaciones_producto">Observaciones</label>
                                <textarea class="form-control form-control-sm" id="propuesta_observaciones_producto" name="propuesta_observaciones_producto" cols="1"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <label for="propuesta_cicloFacturacion">Ciclo de Facturaci&oacute;n</label>
                                <select class="custom-select custom-select-sm" id="catalogo_8" name="catalogo_8">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="propuesta_monto">Subtotal:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_monto" name="propuesta_monto" value="0.00" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="propuesta_promocion">Promoción:</label>
                        <select id="propuesta_promocion" name="propuesta_promocion" class="custom-select custom-select-sm"></select>
                    </div>
                    <div class="col-sm-2">
                        <label for="propuesta_descuento">Descuento:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_descuento" name="propuesta_descuento" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="propuesta_promocion">Total:</label>
                        <input id="propuesta_total" name="propuesta_total" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="propuesta_descuento">Fecha Vigencia:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_fechaVigencia" name="propuesta_fechaVigencia" placeholder="Fecha de Vigencia" readonly>
                    </div>
                </div>
                <div class="text-center mt-3">
                  <button class="btn btn-sm {{$btn}}" id="btnGeneraVistaPrevia"><i class="fa fa-file"></i> Vista Previa</button>
                  <button class="btn btn-sm {{$btn}}" id="btnGeneraPropuesta"><i class="fa fa-file-pdf"></i> Guardar Propuesta</button>
                  <button class="btn btn-sm {{$btn}}" id="btnRegresar" name="btnRegresar"><i class="fa fa-undo"></i> Regresar</button>
                </div>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
      $( function () {

          $( '#propuesta_fechaVigencia' ).datepicker({
              format: "yyyy-mm-dd",
              language: "es",
              todayBtn: "linked",
              clearBtn: true,
              startDate: "today",
              daysOfWeekDisabled: "0,6",
              daysOfWeekHighlighted: "0,6"
          });

          cargaDatosComboCatalogo();

          $( '#listadoProductosPropuestaComercial' ).change( function() {
              $( '#formIndividual' ).show( 'slow' );
          });
          document.getElementById( 'listadoProductosPropuestaComercial' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
              obtieneDatosProducto( this.value );
          });
          document.getElementById( 'propuesta_promocion' ).addEventListener( 'change' , function( e ) {
              aplicaPromo( this.value , document.getElementById( 'propuesta_monto' ).value , 'propuesta_descuento' );
          });
          document.getElementById( 'btnRegresar' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
          });
          document.getElementById( 'propuesta_cantidad' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
              setMonto( document.getElementById( 'propuesta_precio' ).value );
          });
          document.getElementById( 'propuesta_precio' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
              setMonto( this.value );
          });
          document.getElementById( 'btnGeneraPropuesta' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              guardaDatosPropuesta();
          });
          document.getElementById( 'btnGeneraVistaPrevia' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              generaVistaPrevia();
          });
          document.getElementById( 'catalogo_12' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
              if( this.value != '' ) {
                document.getElementById( 'propuesta_cantidad' ).value = 1;
                document.getElementById( 'propuesta_precio' ).value = "";
                document.getElementById( 'catalogo_8' ).value = "";
                document.getElementById( 'propuesta_observaciones_producto' ).value = "";
                setMonto( 0 );
                comboProductos( this.value );
              }
          });
      });

      async function comboProductos( grupo='' ) {
          $( '#listadoProductosPropuestaComercial' ).empty();
          document.getElementById( 'listadoProductosPropuestaComercial' ).add( new Option( '-' , '' ) );
          var filtro = ( grupo != '' ) ? '/' + grupo : '';
          let promise = axios.get( '/api/utiles/listadoProductosServicios' + filtro );
          let result = await promise;
          result.data.forEach( ( item ) => {
              document.getElementById( 'listadoProductosPropuestaComercial' ).add( new Option( item.nombre , item.id ) );
          });
      }
      //comboProductos();

      async function comboContactos( clienteID = '' ) {
          $( '#propuesta_contactos' ).empty();
          var cliente = ( clienteID == '' ? document.getElementById( 'clienteID' ).value : clienteID );
          let promise = axios.get( '/api/utiles/listadoContactos/' + cliente );
          let result = await promise;
          result.data.forEach( ( item ) => {
              document.getElementById( 'propuesta_contactos' ).add( new Option( item.nombre , item.id ) );
          });
      }
      comboContactos();

      function guardaDatosPropuesta() {
        var token  = sessionStorage.getItem( 'apiToken' );

        if( document.getElementById( 'propuestaID' ) == null ) {
              var url = '/api/altaPropuesta';
          } else {
              var url = '/api/editaPropuesta';
        }

        var datos  = new FormData( document.getElementById( 'form_altaPropuestaComercial' ) );
        var config = {
            headers:{
              "Accept"        : "application/json",
              "Authorization" : "Bearer " + token
            }
        };

        axios.post( url , datos , config )
             .then( response => {
                contenidos( 'clientes_editapropuesta' , response.data.idty );
             })
             .catch( err => {
               console.log( err );
             });

      }

      promocionesDisponibles();
      function promocionesDisponibles() {
        var token = sessionStorage.getItem( 'apiToken' );
        var url = '/api/utiles/listadoPromociones';

        var config = {
            headers:{
              'Accept':'application/json',
              'Authorization' : 'Bearer ' + token
            }
        };

        axios.get( url , config )
             .then( response => {
               response.data.forEach( ( item ) => {
                  document.getElementById( 'propuesta_promocion' ).add( new Option( item.nombre , item.id ) );
                });
             })
             .catch( err => {
               console.log( err );
             });
      }

      function generaVistaPrevia() {
          location.replace( '/api/generaPDF/5' );
      }

      function cantidad() {
        return document.getElementById( 'propuesta_cantidad' ).value;
      }

      function setMonto( precio ) {
        var cant = cantidad();
        var importe = cant * precio;
        document.getElementById( 'propuesta_monto' ).value = importe.toFixed(2);
      }

      function obtieneDatosProducto( productoID ) {
          var token = sessionStorage.getItem( 'apiToken' );
          var url   = '/api/obtieneProducto/' + productoID;
          var conf  = {
              headers: {
                'Accept' : 'application/json',
                'Authorization' : 'Bearer ' + token
              }
          };

          axios.get( url , conf )
               .then( response => {
                  var datos = response.data;
                  document.getElementById( 'propuesta_precio' ).value = datos.precio;
                  document.getElementById( 'catalogo_8' ).value = datos.periodicidad;
                  document.getElementById( 'propuesta_observaciones_producto' ).value = datos.descripcion;
                  setMonto( datos.precio );
               })
               .catch( err => {
                 console.log( err );
               });

      }

</script>
