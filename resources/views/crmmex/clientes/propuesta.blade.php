Se va a agregar una propuesta al cliente con id {{$param}}
<form id="form_altaPropuestaComercial">
  <input type="hidden" id="clienteID" name="clienteID" value="{{$param}}">
  <div class="row">
      <div class="col-sm-12">
          <div class="row">
              <div class="col-sm-4 mb-1">
                  <label for="catalogo_13">Categor&iacute;a</label>
                  <select class="custom-select custom-select-sm" id="catalogo_13" nombre="catalogo_13"></select>
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
                    <label for="propuesta_grupoProducto">Grupo</label>
                    <select class="custom-select custom-select-sm" id="propuesta_grupoProducto" name="propuesta_grupoProducto">
                        <option>Grupo</option>
                        <option>Consumibles</option>
                        <option>Equipos de cómputo</option>
                        <option>Facturación electrónica</option>
                        <option>Servicios de internet</option>
                        <option>Servicios profesionales</option>
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
          <div class="text-center mt-3">
            <button class="btn btn-sm {{$btn}}" id="btnGeneraVistaPrevia"><i class="fa fa-file"></i> Vista Previa</button>
            <button class="btn btn-sm {{$btn}}" id="btnGeneraPropuesta"><i class="fa fa-file-pdf"></i> Generar Propuesta</button>
            <button class="btn btn-sm {{$btn}}" id="btnRegresar"><i class="fa fa-undo"></i> Regresar</button>
          </div>
      </div>
  </div>
</form>

<script>
      $( function () {
          cargaDatosComboCatalogo();
          $( '#listadoProductosPropuestaComercial' ).change( function() {
              $( '#formIndividual' ).show( 'slow' );
          });
          $( '#btnRegresar' ).click( function( e ) {
              e.preventDefault();
              contenidos('clientes_listadoPropuestas',document.getElementById('clienteID').value)
          });
          $( '#btnAgregaEstructuraProducto' ).click( function( e ) {
              e.preventDefault();
          });
          $( '#btnGeneraPropuesta' ).click( function( e ){
              e.preventDefault();alert("genera propuesta");
          });
          $( '#btnGeneraVistaPrevia' ).click( function( e ){
              e.preventDefault();alert("vista previa");
          });
      });

      async function comboProductos() {
          $( '#listadoProductosPropuestaComercial' ).empty();
          let promise = axios.get( '/api/utiles/listadoProductosServicios' );
          let result = await promise;
          result.data.forEach( ( item ) => {
              $( '#listadoProductosPropuestaComercial' ).append( '<option value="'+item.id+'">'+item.nombre+'</option>' );
          });
      }
      comboProductos();
      async function comboContactos() {
          $( '#propuesta_contactos' ).empty();
          let promise = axios.get( '/api/utiles/listadoContactos/'+document.getElementById( 'clienteID' ).value );
          let result = await promise;
          result.data.forEach( ( item ) => {
              $( '#propuesta_contactos' ).append( '<option value="'+item.id+'">'+item.nombre+'</option>' );
          });
      }
      comboContactos();
</script>
