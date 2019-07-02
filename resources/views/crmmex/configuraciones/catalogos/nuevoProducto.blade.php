<form id="form_alta_productoservicio" name="form_alta_productoservicio">

  <input type="hidden" id="confProductos_id" name="confProductos_id" value="">

  <div style="position:absolute; right: 10px; z-index: 900">
    <button id="btnNvoProdRegresar" class="btn btn-sm {{$btn}}"><i class="fa fa-undo fa-lg"></i><span class="d-none d-sm-inline">  Regresar</span></button>
    <button id="btnGuardaProducto" class="btn btn-sm {{$btn}}"><i class="fa fa-users fa-lg">save</i><span class="d-none d-sm-inline">  Guardar</span></button>
  </div>

  <div class="row">
    {{ csrf_field() }}
    <div class="col-sm-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">
            <i class="fa fa-info fa-sm"></i><span class="d-none d-sm-inline">  Detalles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
            <i class="fa fa-cog fa-sm"></i><span class="d-none d-sm-inline">  Configuraciones</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
            <i class="fa fa-wrench fa-sm"></i><span class="d-none d-sm-inline">  Adicionales</span>
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="home-tab">
          <div class="container border-left border-bottom border-right p-1">
            <div class="row">
              <div class="col-sm-3">
                <label for="confProductos_clave">Clave</label>
                <input type="text" maxlength="45" placeholder="Clave" class="form-control form-control-sm" id="confProductos_clave" name="confProductos_clave">
              </div>
              <div class="col-sm-3">
                <label for="confProductos_nombre">Nombre</label>
                <input type="text" maxlength="45" placeholder="Nombre" class="form-control form-control-sm" id="confProductos_nombre" name="confProductos_nombre">
              </div>
              <div class="col-sm-6">
                <label for="confProductos_descripcion">Descripción</label>
                <textarea class="form-control form-control-sm" id="confProductos_descripcion" name="confProductos_descripcion" rows="1"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="catalogo_8">Ciclo de Facturación</label>
                <select class="custom-select custom-select-sm" id="catalogo_8" name="catalogo_8"></select>
              </div>
              <div class="col-sm-3">
                <label for="catalogo_9">Tipo</label>
                <select class="custom-select custom-select-sm" id="catalogo_9" name="catalogo_9"></select>
              </div>
              <div class="col-sm-3">
                <label for="catalogo_13">Categoría</label>
                <select class="custom-select custom-select-sm" id="catalogo_13" name="catalogo_13"></select>
              </div>
              <div class="col-sm-3">
                <label for="catalogo_12">Grupo</label>
                <select class="custom-select custom-select-sm" id="catalogo_12" name="catalogo_12"></select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="confProductos_clave">Precio</label>
                <input type="text" maxlength="45" placeholder="Precio" class="form-control form-control-sm" id="confProductos_precio" name="confProductos_precio">
              </div>
              <!--div class="col-sm-3">
                <label for="confProductos_clave">Impuestos</label>
                <select class="custom-select custom-select-sm" id="catalogo_14" name="catalogo_14"></select>
              </div-->
              <div class="col-sm-3">
                <label for="catalogo_10">Divisa</label>
                <select class="custom-select custom-select-sm" id="catalogo_10" name="catalogo_10"></select>
              </div>
              <div class="col-sm-3">
                <label for="confProductos_status">Estatus</label>
                <select class="custom-select custom-select-sm" id="confProductos_status" name="confProductos_status">
                </select>
              </div>
              <div class="col-sm-12"><hr></div>
              <div class="col-sm-3">
                  Usa traslados:
              </div>
              <div class="col-sm-3">
                  <select class="custom-select custom-select-sm" id="confProductos_tasaTraslados" name="confProductos_tasaTraslados">
                      <option value="0">-</option>
                      <option value="16">IVA 16%</option>
                      <option value="8">IVA 8%</option>
                  </select>
                  <br>
                  O usar otra tasa:
                  <input type="number" class="form-control form-control-sm" id="confProductos_tasaTrasladosOtra" name="confProductos_tasaTrasladosOtra" placeholder="Tasa traslados">
              </div>
              <div class="col-sm-3">
                  Retenciones:
              </div>
              <div class="col-sm-3">
                  <input type="number" class="form-control form-control-sm" id="confProductos_tasaRetencionesOtra" name="confProductos_tasaRetencionesOtra" placeholder="Tasa retenciones">
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="container border-left border-bottom border-right p-1">

          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="container border-left border-bottom border-right p-1">
            <div class="row" id="camposAdicionalesContainer">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>

  $(function () {
      $( '#btnNvoProdRegresar' ).click( function( e ){
          e.preventDefault();
          contenidos( 'configuraciones_catalogos_productos' );
      });

      $( '#btnGuardaProducto' ).click( function( e ){
          e.preventDefault();
          guardaProductoNuevo();
      });

      cargaDatosComboCatalogo();
  });

  function guardaProductoNuevo() {
    var token      = sessionStorage.getItem( 'apiToken' );
    var datos      = $( '#form_alta_productoservicio' ).serialize();
    var movimiento = 'alta';
    if( document.getElementById( 'confProductos_id' ).value != '' ) { // Edita registro
          ruta       = '/api/actualizaProducto';
          movimiento = 'actualiza';
      } else { // Nuevo registro
          ruta  = '/api/guardaProducto';
    }

    var config = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };

    axios.post( ruta , datos , config )
       .then( response => {
         if( movimiento == 'alta' ) {
              aviso( 'Producto agregado correctamente' );
              contenidos( 'configuraciones_catalogos_productos' );
           } else {
              aviso( 'Producto actualizado correctamente' );
              contenidos( 'configuraciones_catalogos_editaProducto' , document.getElementById( 'confProductos_id' ).value );
         }
       })
       .catch( err => {
         console.log( err );
       });
  }

  async function comboEstatus() {
      $( '#confProductos_status' ).empty();
      let promise = axios.get( '/api/utiles/estatus' );
      let result = await promise;
      result.data.forEach( ( item ) => {
          $( '#confProductos_status' ).append( '<option value="'+item.id+'">'+item.status+'</option>' );
      });
  }
  comboEstatus();
  if( document.getElementById( 'idProductoEditar' ) === null ) {
      cargaCamposAdicionales( '3' );
  }
</script>
