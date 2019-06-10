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
        <input type="hidden" id="propuestaIdty" name="propuestaIdty" value="0">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4 mb-1">
                        <label for="catalogo_18">Categor&iacute;a</label>
                        <select class="custom-select custom-select-sm" id="catalogo_18" nombre="catalogo_18"></select>
                    </div>
                    <div class="col-sm-4 mb-1">
                        <label for="catalogo_15">Forma Pago</label>
                        <select class="custom-select custom-select-sm" id="catalogo_15" nombre="catalogo_15"></select>
                    </div>
                    <div class="col-sm-4 mb-1">
                        <label for="catalogo_15">Contacto</label>
                        <select class="custom-select custom-select-sm" id="propuesta_contactos" nombre="propuesta_contactos"></select>
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
                    <div class="col-sm-2 mb-1">
                          <label for="catalogo_12">Grupo</label>
                          <select class="custom-select custom-select-sm" id="catalogo_12" name="catalogo_12">
                          </select>
                    </div>
                    <div class="col-sm-8 mb-1">
                        <label for="listadoProductosPropuestaComercial">Seleccione Producto/Servicio</label>
                        <select class="custom-select custom-select-sm" id="listadoProductosPropuestaComercial" name="listadoProductosPropuestaComercial"></select>
                    </div>
                    <div class="col-sm-2 mb-1 text-center">
                        <button class="btn btn-sm {{$btn}}" id="btnAgregaEstructuraProducto">Agregar Producto</button>
                    </div>
                    <div class="col-sm-12 mb-1 collapse" id="formIndividual">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="propuesta_cantidad">Cantidad</label>
                                <input class="form-control form-control-sm" placeholder="Cantidad" id="propuesta_cantidad[]" name="propuesta_cantidad[]">
                            </div>
                            <div class="col-sm-2">
                                <label for="propuesta_precio">Precio</label>
                                <input class="form-control form-control-sm" placeholder="Precio (Reemplazar el precio configurado)" id="propuesta_precio[]" name="propuesta_precio[]">
                            </div>
                            <div class="col-sm-2">
                                <label for="propuesta_descuento">Descuento</label>
                                <input class="form-control form-control-sm" placeholder="Descuento" id="propuesta_descuento[]" name="propuesta_descuento[]">
                            </div>
                            <div class="col-sm-2">
                                <label for="propuesta_promocion">Promoci&oacute;n</label>
                                <input class="form-control form-control-sm" placeholder="Cantidad" id="propuesta_promocion[]" name="propuesta_promocion[]">
                            </div>
                            <div class="col-sm-4">
                                <label for="propuesta_cicloFacturacion">Ciclo de Facturaci&oacute;n</label>
                                <select class="custom-select custom-select-sm" id="propuesta_cicloFacturacion[]" name="propuesta_cicloFacturacion[]">
                                    <option>Ciclo de facturación</option>
                                    <option>Bienal</option>
                                    <option>Anual</option>
                                    <option>Semestral</option>
                                    <option>Trimestral</option>
                                    <option>Mensual</option>
                                    <option>Un solo pago</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="propuesta_monto">Monto:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_monto" name="propuesta_monto" value="0.00" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="propuesta_promocion">Promocion:</label>
                        <select id="propuesta_promocion" name="propuesta_promocion" class="custom-select custom-select-sm"></select>
                    </div>
                    <div class="col-sm-4">
                        <label for="propuesta_descuento">Descuento:</label>
                        <input type="text" class="form-control form-control-sm" id="propuesta_descuento" name="propuesta_descuento" readonly>
                    </div>
                </div>
                <div class="text-center mt-3">
                  <button class="btn btn-sm {{$btn}}" id="btnGeneraVistaPrevia"><i class="fa fa-file"></i> Vista Previa</button>
                  <button class="btn btn-sm {{$btn}}" id="btnGeneraPropuesta"><i class="fa fa-file-pdf"></i> Generar Propuesta</button>
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
          cargaDatosComboCatalogo();

          $( '#listadoProductosPropuestaComercial' ).change( function() {
              $( '#formIndividual' ).show( 'slow' );
          });
          /*document.getElementById( 'listadoProductosPropuestaComercial' ).addEventListener( 'change' , function( e ) {
              e.preventDefault();
          });*/
          document.getElementById( 'propuesta_promocion' ).addEventListener( 'change' , function( e ) {alert(this.value);
              aplicaPromo( this.value , document.getElementById( 'propuesta_monto' ).value , 'propuesta_descuento' );
          });
          document.getElementById( 'btnRegresar' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
          });
          document.getElementById( 'btnAgregaEstructuraProducto' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
          });
          document.getElementById( 'btnGeneraPropuesta' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              guardaDatosPropuesta();
          });
          document.getElementById( 'btnGeneraVistaPrevia' ).addEventListener( 'click' , function( e ) {
              e.preventDefault();
              alert("vista previa");
          });
      });

      async function comboProductos() {
          $( '#listadoProductosPropuestaComercial' ).empty();
          let promise = axios.get( '/api/utiles/listadoProductosServicios' );
          let result = await promise;
          result.data.forEach( ( item ) => {
              document.getElementById( 'listadoProductosPropuestaComercial' ).add( new Option( item.nombre , item.id ) );
          });
      }
      comboProductos();

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
        var url    = '/api/altaPropuesta';
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

</script>
