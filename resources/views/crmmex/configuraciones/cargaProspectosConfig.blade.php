<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-sm fa-cogs"></i><span class="d-none d-sm-inline">  Configuración</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row">
        <div class="col-sm-3 border-right">
          <label for="fieldsLayout">CAMPOS LAYOUT:</label>
          <select class="custom-select custom-select-sm" multiple id="fieldsLayout" style="height: 350px;"></select>
        </div>
        <div class="col-sm-3">
          <label for="fieldsDireccion">DIRECCION:</label>
          <select class="custom-select custom-select-sm" multiple id="fieldsDireccion" style="height: 200px;">
            <option value="calle">Calle</option>
            <option value="noExterior">No. Exterior</option>
            <option value="noInterior">No. Interior</option>
            <option value="colonia">Colonia</option>
            <option value="cp"><b>Codigo Postal</b></option>
            <option value="delegacion">Delegacion</option>
            <option value="ciudad">Ciudad</option>
            <option value="estado">Estado</option>
            <option value="pais">Pais</option>
          </select>
        </div>
        <div class="col-sm-3">
          <label for="fieldsContacto">CONTACTO:</label>
          <select class="custom-select custom-select-sm" multiple id="fieldsContacto" style="height: 200px;">
            <option value="nombre">Nombre</option>
            <option value="apellidoPaterno">Apellido Paterno</option>
            <option value="apellidoMaterno">Apellido Materno</option>
            <option value="correoElectronico">Correo Electrónico</option>
            <option value="celular">No. Celular</option>
            <option value="telefono">Teléfono</option>
            <option value="extension">Extension</option>
          </select>
        </div>
        <div class="col-sm-3">
          <label for="fieldsDatosFiscales">DATOS FISCALES:</label>
          <select class="custom-select custom-select-sm" multiple id="fieldsDatosFiscales" style="height: 200px;">
            <option value="id">ID</option>
            <option value="razonSocial">Razón Social</option>
            <option value="rfc">RFC</option>
            <option value="Observaciones">Observaciones</option>
          </select>
        </div>
      </div>
      <div class="row mt-3 mb-3">
        <div class="col-sm-12 text-center">
          <button type="button" class="btn btn-sm {{$btn}}" id="btnRegresaAltaLayout" name="btnRegresaAltaLayout"><i class="fa fa-sm fa-undo"></i> Cancelar Configuración y regresar</button>
          <button type="button" class="btn btn-sm {{$btn}}" id="btnRestablecer" name="btnRestablecer"><i class="fa fa-sm fa-eraser"></i> Restablecer campos</button>
          <button type="button" class="btn btn-sm {{$btn}}" id="btnGuardarDatos" name="btnGuardarDatos"><i class="fa fa-sm fa-save"></i> Guardar Información</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  cargaConfiguracion();
  function cargaConfiguracion() {
    var datos = JSON.parse( sessionStorage.getItem( 'layoutClientes' ) );
    datos.titles.forEach( function( t , ti ){
      document.getElementById( 'fieldsLayout' ).add( new Option( t , ti , false , false ) );
    });
  }

  document.getElementById( 'btnRegresaAltaLayout' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'configuraciones_cargaProspectos' );
  });

</script>
