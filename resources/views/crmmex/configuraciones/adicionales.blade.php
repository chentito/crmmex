<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-keyboard fa-sm"></i><span class="d-none d-sm-inline">  Campos Adicionales</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-plus fa-sm"></i><span class="d-none d-sm-inline">  Agregar Campo</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row mt-1">
        <div class="col-sm-12">
          <select multiple="" class="custom-select custom-select-sm" id="exampleFormControlSelect1" style="height:'150px'">
              <option>Campo adicional 1</option>
              <option>Campo adicional 2</option>
              <option>Campo adicional 3</option>
              <option>Campo adicional 4</option>
              <option>Campo adicional 5</option>
              <option>Campo adicional 6</option>
          </select>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-12 mt-3 text-center">
              <button class="btn btn-sm {{$btn}}">Editar Seleccionado</button>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row mt-3">
          <div class="col-sm-4">
              <label for="conf_datosAdicionales_nombre">Nombre del campo</label>
              <input id="conf_datosAdicionales_nombre" name="conf_datosAdicionales_nombre" type="text" class="form-control form-control-sm" required placeholder="Nombre del campo">
          </div>
          <div class="col-sm-4">
              <label for="conf_datosAdicionales_tipoDato">Tipo de dato</label>
              <select id="conf_datosAdicionales_tipoDato" name="conf_datosAdicionales_tipoDato" class="custom-select custom-select-sm">
                  <option>Tipo de Dato</option>
                  <option>Num&eacute;rico entero</option>
                  <option>Num&eacute;rico flotante</option>
                  <option>Alfanum&eacute;rico</option>
                  <option>Alfabetico</option>
                  <option>Fecha</option>
              </select>
          </div>
          <div class="col-sm-4">
              <label for="conf_datosAdicionales_seccion">Sección</label>
              <select id="conf_datosAdicionales_seccion" name="conf_datosAdicionales_seccion" class="custom-select custom-select-sm">
                  <option>Seccion</option>
                  <option>Registro de Clientes</option>
                  <option>Seguimientos</option>
                  <option>Propuestas</option>
                  <option>Registro de productos</option>
                  <option>...</option>
              </select>
          </div>
      </div>
      <div class="row mt-3">
          <div class="col-sm-4">
              <div class="custom-control custom-checkbox mb-1 text-center">
                  <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault">
                  <label class="custom-control-label" for="formsCheckboxDefault">Es obligatorio?</label>
              </div>
          </div>
          <div class="col-sm-4">
              <label for="conf_datosAdicionales_validacion">Validación (Expresión regular)</label>
              <input id="conf_datosAdicionales_validacion" name="conf_datosAdicionales_validacion" type="text" class="form-control form-control-sm" placeholder="Validaci&oacute;n (Expresi&oacute;n Regular)">
          </div>
          <div class="col-sm-4">
          </div>
      </div>
      <div class="row mt-3">
          <div class="col-sm-12 text-center">
              <button class="btn btn-sm {{$btn}}">Guardar Campo</button>
          </div>
      </div>
    </div>
  </div>
</div>
