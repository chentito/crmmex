
<input type="hidden" name="idSeccionConsultar" id="idSeccionConsultar" value="{{$param}}">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="field-tab" data-toggle="tab" href="#field" role="tab" aria-controls="field" aria-selected="true">
      <i class="fa fa-plus fa-sm"></i><span class="d-none d-sm-inline">  Agregar Campo</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-code fa-sm"></i><span class="d-none d-sm-inline">  Campos Adicionales</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="field" role="tabpanel" aria-labelledby="field-tab">
      <div class="container border-left border-right border-bottom p-1">
        <form id="formAltaCampoAdicional" name="formAltaCampoAdicional">
          <input type="hidden" id="adicional_clientes_id" name="adicional_clientes_id" value="">
          <input type="hidden" id="adicional_clientes_seccion" name="adicional_clientes_seccion" value="">
          <div class="row">
              <div class="col-sm-12">
                  <h6 id="nombreSeccionAdicionales"></h6>
              </div>
          </div>
          <div class="row">
            <div class="col-sm-3 mt-1">
              <label for="adicional_clientes_nombre">Nombre del campo:</label>
              <input type="text" id="adicional_clientes_nombre" name="adicional_clientes_nombre" placeholder="Nombre del campo" class="form-control form-control-sm">
            </div>
            <div class="col-sm-3 mt-1">
              <label for="adicional_clientes_tipoDato">Tipo de dato:</label>
              <select id="adicional_clientes_tipoDato" name="adicional_clientes_tipoDato" class="custom-select custom-select-sm">
                <option value="1">Texto Libre</option>
                <!--option value="2">Numérico</option-->
                <option value="3">Opción múltiple</option>
                <!--option value="4">Lista</option-->
              </select>
            </div>
            <div class="col-sm-3 mt-1">
              <div class="form-check">
                <input type="radio" id="adicional_clientes_opcional" name="adicional_clientes_obligatoriedad" class="form-check-input" value="0" checked>
                <label for="adicional_clientes_opcional" class="form-check-label">Opcional:</label>
              </div>
              <div class="form-check">
                <input type="radio" id="adicional_clientes_obligatorio" name="adicional_clientes_obligatoriedad" value="1" class="form-check-input">
                <label for="adicional_clientes_obligatorio" class="form-check-label">Obligatorio:</label>
              </div>
            </div>
            <div class="col-sm-3 mt-1">
              <label for="adicional_clientes_valores">Valores:</label>
              <input type="text" id="adicional_clientes_valores" name="adicional_clientes_valores" placeholder="Valores" class="form-control form-control-sm">
            </div>
            <div class="col-sm-3 mt-1">
              <label for="adicional_clientes_validacion">Validación (Expresión regular):</label>
              <select id="adicional_clientes_validacion" name="adicional_clientes_validacion" class="custom-select custom-select-sm">
                  <option value="1">Sin validación</option>
                  <option value="2">Correo electrónico</option>
                  <option value="3">Número telefónico</option>
                  <option value="4">RFC</option>
                  <option value="5">Solo números</option>
              </select>
            </div>

          </div>
          <div class="row mt-2 mb-1">
            <div class="col-sm-12 text-center">
              <button class="btn btn-sm {{$btn}}" id="btnGuardaCampoAdicional">Guardar</button>
            </div>
          </div>
        </form>
      </div>
  </div>
  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-right border-bottom p-1">
      <div id="listadoCamposAdicionales_config"></div>
      <table id="listadoCamposAdicionales" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
    </div>
  </div>
</div>

<script>

  if( typeof document.getElementById( 'campoAdicionalID' ) === 'undefined' || document.getElementById( 'campoAdicionalID' ) == null ) {
      generaDataGrid( 'listadoCamposAdicionales' , document.getElementById( 'idSeccionConsultar' ).value );
  }

  document.getElementById( 'adicional_clientes_seccion' ).value=document.getElementById( 'idSeccionConsultar' ).value;
  nombreSeccion();

  document.getElementById( 'btnGuardaCampoAdicional' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    var datos = new FormData( document.getElementById( 'formAltaCampoAdicional' ) );
    if( document.getElementById( 'adicional_clientes_id' ).value == '' ) {
        var url = '/api/nuevoCampoAdicional';// Alta
        var msj = 'Campo agregado correctamente';
    } else {
        var url = '/api/editaCampoAdicional';// Edita
        var msj = 'Campo actualizado correctamente';
    }

    axios.post( url , datos )
         .then( response => {
            aviso( msj );
            contenidos( 'configuraciones_camposAdicionales' , document.getElementById( 'idSeccionConsultar' ).value );
         })
         .catch( err => {
           console.log( err );
         });
  });

  function nombreSeccion() {
      axios.get( '/api/nombreSeccionCampoAdicional/' + document.getElementById( 'idSeccionConsultar' ).value )
           .then( response => {
              if( typeof response.data.nombreSeccion === 'undefined' ){
                  document.getElementById( 'nombreSeccionAdicionales' ).innerHTML = '';
              } else {
                  document.getElementById( 'nombreSeccionAdicionales' ).innerHTML = response.data.nombreSeccion;
              }
           })
           .catch( err => {
              console.log( err );
         });
  }

</script>
