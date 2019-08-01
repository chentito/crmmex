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
                        <input type="text" id="propuesta_identificador" name="propuesta_identificador" class="form-control form-control-sm" placeholder="Identificador" readonly>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <label for="catalogo_15">Contacto</label>
                        <select class="custom-select custom-select-sm" id="propuesta_contactos" name="propuesta_contactos"></select>
                    </div>
                    <div class="col-sm-2 mb-1">
                          <label for="catalogo_12">Grupo</label>
                          <select class="custom-select custom-select-sm" id="catalogo_12" name="catalogo_12">
                              <option value="">-</option>
                          </select>
                    </div>
                    <div class="col-sm-2 mb-1">
                        <label for="propuesta_descuento">Fecha Vigencia:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_fechaVigencia" name="propuesta_fechaVigencia" placeholder="Fecha de Vigencia" readonly>
                    </div>
                    <div class="col-sm-2 mb-1">
                        <label for="propuesta_cotizacion">Orden de compra:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_ordenCompra" name="propuesta_ordenCompra" placeholder="Orden de compra">
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

                    <div class="col-sm-9 mb-1">
                        <label for="listadoProductosPropuestaComercial">Seleccione Producto/Servicio</label>
                        <select class="custom-select custom-select-sm" id="listadoProductosPropuestaComercial" name="listadoProductosPropuestaComercial">
                            <option value="">-</option>
                        </select>
                    </div>
                    <div class="col-sm-2 mb-1 text-center"></div>
                    <div class="col-sm-12 mb-1 collapse" id="formIndividual">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="propuesta_cantidad">Cantidad</label>
                                <input class="form-control form-control-sm" placeholder="Cantidad" id="propuestaProducto_cantidad" name="propuestaProducto_cantidad" value="1" type="number">
                                <input type="hidden" id="propuestaProducto_productoID" name="propuestaProducto_productoID">
                                <input type="hidden" id="propuestaProducto_traslados" name="propuestaProducto_traslados" value="0">
                                <input type="hidden" id="propuestaProducto_retencion" name="propuestaProducto_retencion" value="0">
                                <input type="hidden" id="propuestaProducto_descuento" name="propuestaProducto_descuento" value="0">
                                <input type="hidden" id="propuestaProducto_promocion" name="propuestaProducto_promocion" value="0">
                            </div>
                            <div class="col-sm-2">
                                <label for="propuesta_precio">Precio</label>
                                <input class="form-control form-control-sm" placeholder="Precio (Reemplazar el precio configurado)" id="propuestaProducto_precio" name="propuestaProducto_precio">
                            </div>
                            <div class="col-sm-4">
                                <label for="propuesta_observaciones_producto">Observaciones</label>
                                <textarea class="form-control form-control-sm" id="propuestaProducto_observaciones" name="propuestaProducto_observaciones" cols="1"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <label for="propuesta_cicloFacturacion">Ciclo de Facturaci&oacute;n</label>
                                <select class="custom-select custom-select-sm" id="catalogo_8" name="catalogo_8">
                                </select>
                                <br><br>
                                <center><button class="btn btn-sm {{$btn}}" id="btnAgregaProductoPropuesta">Agregar Producto</button></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        Detalle propuesta:
                        <table class="table" id="containerProductosPropuesta">
                            <thead>
                                <tr>
                                    <th>Producto/Servicio</th>
                                    <th>Cantidad</th>
                                    <th>Unitario</th>
                                    <th>Importe</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                              <tr>
                                  <th colspan="5"></th>
                              </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <label for="propuesta_monto">Subtotal:</label>
                                <input type="text" class="form-control form-control-sm" id="propuesta_monto" name="propuesta_monto" value="0.00" readonly>
                            </div>
                            <div class="col-sm-7">
                                <label for="propuesta_promocion">Promoción:</label>
                                <select id="propuesta_promocion" name="propuesta_promocion" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-sm-5">
                                <label for="propuesta_descuento">Descuento:</label>
                                <input type="text" class="form-control form-control-sm" id="propuesta_descuento" name="propuesta_descuento" value="0.00" readonly>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <label for="propuesta_descuento">Traslados:</label>
                                <input type="text" class="form-control form-control-sm" id="propuesta_traslados" name="propuesta_traslados" value="0.00" readonly>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <label for="propuesta_descuento">Retenciones:</label>
                                <input type="text" class="form-control form-control-sm" id="propuesta_retenciones" name="propuesta_retenciones" value="0.00" readonly>
                            </div>
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <label for="propuesta_total">Total:</label>
                                <input type="text" class="form-control form-control-sm" id="propuesta_total" name="propuesta_total" value="0.00" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                  <button class="btn btn-sm {{$btn}}" id="btnRegresar" name="btnRegresar"><i class="fa fa-undo"></i> Regresar</button>
                  <button class="btn btn-sm {{$btn}}" id="btnGeneraPropuesta"><i class="fa fa-file-pdf"></i> Guardar Propuesta</button>
                </div>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
      $( function () {
          axios.post( '/carritoElimina' , {} , {headers:{'Accept':'application/json','Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) }} );

          $( '#propuesta_fechaVigencia' ).datepicker({
              format: "yyyy-mm-dd",
              language: "es",
              todayBtn: "linked",
              clearBtn: true,
              startDate: "today",
              daysOfWeekDisabled: "0,6",
              daysOfWeekHighlighted: "0,6"
          });

          axios.get( '/api/getPredefinido/3' , {headers:{'Accept':'application/json','Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) }} )
               .then( response => {
                   var dias = response.data.valor;
                   document.getElementById( 'propuesta_fechaVigencia' ).value = moment().add( dias , 'days').format("YYYY-MM-DD");
               })
               .catch( err => {
                 console.log( err );
               });

          cargaDatosComboCatalogo();

          $( '#listadoProductosPropuestaComercial' ).change( function() {
              $( '#formIndividual' ).show( 'slow' );
          });

          document.getElementById( 'btnAgregaProductoPropuesta' ).addEventListener( 'click' ,  function( e ) {
              e.preventDefault();
              var datos = {
                propuestaProducto_productoID    : document.getElementById( 'propuestaProducto_productoID' ).value,
                propuestaProducto_observaciones : document.getElementById( 'propuestaProducto_observaciones' ).value,
                propuestaProducto_cantidad      : document.getElementById( 'propuestaProducto_cantidad' ).value,
                propuestaProducto_precio        : document.getElementById( 'propuestaProducto_precio' ).value,
                propuestaProducto_descuento     : document.getElementById( 'propuestaProducto_descuento' ).value,
                propuestaProducto_promocion     : document.getElementById( 'propuestaProducto_promocion' ).value,
                propuestaProducto_traslados     : document.getElementById( 'propuestaProducto_traslados' ).value,
                propuestaProducto_retencion     : document.getElementById( 'propuestaProducto_retencion' ).value
              };

              var conf = { headers:{ "Accept"        : "application/json", "Authorization" : "Bearer " + sessionStorage.getItem( 'apiToken' ) } };

              axios.post( '/carrito' , datos , conf )
                   .then( response => {
                       var tabla   = document.getElementById( 'containerProductosPropuesta' ).getElementsByTagName( 'tbody' )[ 0 ];
                       var renglon = tabla.insertRow();
                       var idProd  = document.getElementById( 'propuestaProducto_productoID' ).value;
                       var sel     = document.getElementById( 'listadoProductosPropuestaComercial' );
                       var text    = sel.options[ sel.selectedIndex ].text;
                       renglon.insertCell(0).appendChild( document.createTextNode( text ) );
                       renglon.insertCell(1).appendChild( document.createTextNode( document.getElementById( 'propuestaProducto_cantidad' ).value ) );
                       var unitario = document.getElementById( 'propuestaProducto_precio' ).value;
                       renglon.insertCell(2).appendChild( document.createTextNode( unitario ) );
                       var importe = document.getElementById( 'propuestaProducto_precio' ).value*document.getElementById( 'propuestaProducto_cantidad' ).value;
                       renglon.insertCell(3).appendChild( document.createTextNode( importe ) );
                       renglon.insertCell(4).innerHTML = '<button type="button" class="btn btn-sm" onclick="return eliminaRenglon(event,this,\''+idProd+'\');return false;"><i class="fa fa-trash fa-sm"></i></button>';
                       var datos = response.data;
                       document.getElementById( 'propuesta_monto' ).value       = datos.subtotal.toFixed( 2 );
                       document.getElementById( 'propuesta_traslados' ).value   = datos.traslados.toFixed( 2 );
                       document.getElementById( 'propuesta_retenciones' ).value = datos.retenciones.toFixed( 2 );
                       document.getElementById( 'propuesta_total' ).value       = datos.total.toFixed( 2 );

                       aviso( 'Producto agregado correctamente' );
                       resetFormProductos();
                   })
                   .catch( err => {
                     console.log( err );
                   });

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
          document.getElementById( 'btnGeneraPropuesta' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              guardaDatosPropuesta();
          });
          document.getElementById( 'catalogo_12' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
              if( this.value != '' ) {
                document.getElementById( 'propuestaProducto_cantidad' ).value = 1;
                document.getElementById( 'propuestaProducto_precio' ).value = "";
                document.getElementById( 'catalogo_8' ).value = "";
                document.getElementById( 'propuestaProducto_productoID' ).value = "";
                document.getElementById( 'propuestaProducto_observaciones' ).value = "";
                comboProductos( this.value );
              }
          });
      });

      function resetFormProductos() {
          document.getElementById( 'propuestaProducto_cantidad' ).value = 1;
          document.getElementById( 'propuestaProducto_precio' ).value = "";
          document.getElementById( 'catalogo_8' ).value = "";
          document.getElementById( 'propuestaProducto_productoID' ).value = "";
          document.getElementById( 'propuestaProducto_observaciones' ).value = "";
          document.getElementById( 'listadoProductosPropuestaComercial' ).innerHTML = "";
          document.getElementById( 'catalogo_12' ).value = 0;
          $( '#formIndividual' ).hide( 'slow' );
      }

      async function comboProductos( grupo='' , producto='' ) {
          $( '#listadoProductosPropuestaComercial' ).empty();
          document.getElementById( 'listadoProductosPropuestaComercial' ).add( new Option( '-' , '' ) );
          var filtro = ( grupo != '' ) ? '/' + grupo : '';
          let promise = axios.get( '/api/utiles/listadoProductosServicios' + filtro );
          let result = await promise;
          result.data.forEach( ( item ) => {
              var selected = ( ( producto != '' ) ? ( ( producto == item.id ) ? true : false ) : false );
              document.getElementById( 'listadoProductosPropuestaComercial' ).add( new Option( item.nombre , item.id , false , selected ) );
          });
      }
      //comboProductos();

      async function comboContactos( clienteID = '' , contactoID = '' ) {
          document.getElementById( "propuesta_contactos" ).innerHTML = "";
          var cliente = ( clienteID == '' ? document.getElementById( 'clienteID' ).value : clienteID );
          let promise = axios.get( '/api/utiles/listadoContactos/' + cliente );
          let result = await promise;
          result.data.forEach( ( item ) => {
              var selected = ( ( contactoID != '' ) ? ( ( contactoID == item.id ) ? true : false ) : false );
              document.getElementById( 'propuesta_contactos' ).add( new Option( item.nombre , item.id , false , selected ) );
          });
      }

      if( document.getElementById( 'propuestaID' ) == null ) {
          comboContactos();
          cargaIdtyPropuesta();
      }

      function guardaDatosPropuesta() {
        var token  = sessionStorage.getItem( 'apiToken' );

        if( document.getElementById( 'propuestaID' ) == null ) {
              //var url = '/api/altaPropuesta';
              var url = '/altaPropuesta';
          } else {
              //var url = '/api/editaPropuesta';
              var url = '/editaPropuesta';
        }

        var datos  = new FormData( document.getElementById( 'form_altaPropuestaComercial' ) );
        var config = {
            headers:{
              "Accept"        : "application/json",
              "Authorization" : "Bearer " + token
            }
        };

        if( document.getElementById( 'propuesta_fechaVigencia' ).value == '' ) {
            aviso( 'No ha proporcionado la fecha de vigencia' , false );
          } else if( document.getElementById( 'containerProductosPropuesta' ).rows.length < 3 ) {
            aviso( 'No ha agregado productos a la propuesta' , false );
          } else {
            axios.post( url , datos , config )
                 .then( response => {
                    aviso( 'Propuesta guardada correctamente' );
                    contenidos( 'clientes_editapropuesta' , response.data.idty );
                 })
                 .catch( err => {
                   console.log( err );
                 });
        }

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
        return document.getElementById( 'propuestaProducto_cantidad' ).value;
      }

      function setMonto( precio ) {
        var cant = cantidad();
        var importe = cant * precio;
        document.getElementById( 'propuesta_monto' ).value = importe.toFixed(2);
        document.getElementById( 'propuesta_total' ).value = importe.toFixed(2);
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
                  document.getElementById( 'propuestaProducto_productoID' ).value    = datos.id;
                  document.getElementById( 'propuestaProducto_precio' ).value        = datos.precio;
                  document.getElementById( 'catalogo_8' ).value                      = datos.periodicidad;
                  document.getElementById( 'propuestaProducto_observaciones' ).value = datos.descripcion;
                  document.getElementById( 'propuestaProducto_traslados' ).value     = datos.impuesto;
                  document.getElementById( 'propuestaProducto_retencion' ).value     = datos.impuestoRetencion;
                  //setMonto( datos.precio );
               })
               .catch( err => {
                 console.log( err );
               });
      }

      function cargaIdtyPropuesta() {
          var token = sessionStorage.getItem( 'apiToken' );
          //var url   = '/api/idtyPropuesta/';
          var url   = '/idtyPropuesta/';
          var conf  = {
              headers: {
                'Accept' : 'application/json',
                'Authorization' : 'Bearer ' + token
              }
          };

          axios.get( url , conf )
               .then( response => {
                    document.getElementById( 'propuesta_identificador' ).value = response.data;
               })
               .catch( err => {
                  console.log( err );
          });
      }

      function eliminaRenglon( e , elemento , idProd ) {
          //axios.post( '/api/carritoEliminaProd/' + idProd , {} , {headers:{'Accept':'application/json','Authorization':'Bearer ' + sessionStorage.getItem('apiToken')}} )
          axios.post( '/carritoEliminaProd/' + idProd , {} , {headers:{'Accept':'application/json','Authorization':'Bearer ' + sessionStorage.getItem('apiToken')}} )
               .then( response => {
                   e.preventDefault();
                   var row = elemento.parentNode.parentNode;
                   row.parentNode.removeChild(row);

                   var datos = response.data;
                   document.getElementById( 'propuesta_monto' ).value       = datos.subtotal.toFixed( 2 );
                   document.getElementById( 'propuesta_traslados' ).value   = datos.traslados.toFixed( 2 );
                   document.getElementById( 'propuesta_retenciones' ).value = datos.retenciones.toFixed( 2 );
                   document.getElementById( 'propuesta_total' ).value       = datos.total.toFixed( 2 );

                   aviso( 'Producto eliminado correctamente' );

               })
               .catch( err => {
                 console.log( err );
               });
      }
</script>
