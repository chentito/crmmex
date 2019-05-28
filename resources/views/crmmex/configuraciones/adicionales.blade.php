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
          <select multiple="" class="custom-select custom-select-sm" id="exampleFormControlSelect1">
              <option>RFC</option>
              <option>R&eacute;gimen Fiscal</option>
              <option>Colonia</option>
              <option>ID Cliente</option>
              <option>Usuario Webservice</option>
              <option>Contrase&ntilde;a Webservice</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row mt-1">
          <div class="col-sm-4 mb-3">
              <input id="conf_datosAdicionales_nombre" type="text" class="form-control form-control-sm" required placeholder="Nombre del campo">
          </div>
          <div class="col-sm-4 mb-3">
              <select id="conf_datosAdicionales_tipoDato" class="custom-select custom-select-sm">
                  <option>Tipo de Dato</option>
                  <option>Num&eacute;rico entero</option>
                  <option>Num&eacute;rico flotante</option>
                  <option>Alfanum&eacute;rico</option>
                  <option>Alfabetico</option>
                  <option>Fecha</option>
              </select>
          </div>
          <div class="col-sm-4 mb-3">
              <select id="conf_datosAdicionales_seccion" class="custom-select custom-select-sm">
                  <option>Seccion</option>
                  <option>Prospectos/Alta</option>
                  <option>Prospectos/Edici&oacute;n</option>
                  <option>Clientes/Alta</option>
                  <option>Clientes/Edici&oacute;n</option>
                  <option>Productos/Alta</option>
                  <option>Productos/Edici&oacute;n</option>
              </select>
          </div>
      </div>
      <div class="row mb-3">
          <div class="col-sm-4 mb-3">
              <div class="custom-control custom-checkbox mb-1">
                  <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault">
                  <label class="custom-control-label" for="formsCheckboxDefault">Es obligatorio?</label>
              </div>
          </div>
          <div class="col-sm-4 mb-3">
              <input id="conf_datosAdicionales_validacion" type="text" class="form-control form-control-sm" placeholder="Validaci&oacute;n (Expresi&oacute;n Regular)">
          </div>
          <div class="col-sm-4  mb-3">
              <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                <label class="btn btn-white active">
                  <input type="radio" name="options" id="option1" autocomplete="off" checked> Habilitado </label>
                <label class="btn btn-white">
                  <input type="radio" name="options" id="option2" autocomplete="off"> Deshabilitado </label>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
