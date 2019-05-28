<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-cogs fa-sm"></i><span class="d-none d-sm-inline">  Configuraciones</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row">
        <div class="col-sm-3">
          <label for="inputGroupSelect04">Periodo de cálculo</label>
          <select class="custom-select custom-select-sm" id="inputGroupSelect04">
              <option id="1">Semanal</option>
              <option id="2">Quincenal</option>
              <option id="3">Mensual</option>
              <option id="4">Trimestral</option>
              <option id="5">Semestral</option>
              <option id="6">Anual</option>
          </select>
        </div>
        <div class="col-sm-3">
          <label>Crecimiento</label>
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline1">Expresado en porcentaje</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">Expresado en cantidad</label>
          </div>
        </div>
        <div class="col-sm-3">
          <label for="montotasa">Monto/Tasa</label>
          <input type="number" step=".01" class="form-control form-control-sm" value="0.00" id="montotasa">
        </div>
        <div class="col-sm-3">
          <label for="campoobjetivo">Campo Objetivo</label>
          <select class="custom-select custom-select-sm" id="campoobjetivo">
              <option>Importe</option>
              <option>Ingresos Esperados</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <label>C&aacute;lculo de Previsi&oacute;n</label>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <input class="form-control form-control-sm" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked">
          <label for="inlineRadio1">Media (promedio)</label>
        </div>
        <div class="col-sm-3">
          <input class="form-control form-control-sm" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label for="inlineRadio2">Moda</label>
        </div>
        <div class="col-sm-3">
          <input class="form-control form-control-sm" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
          <label for="inlineRadio3">Mediana</label>
        </div>
        <div class="col-sm-3">
          <label for="inlineRadio4">Formula:</label>
          <input class="form-control form-control-sm" type="text" name="inlineRadioOptions" id="inlineRadio4" size="20">
        </div>
      </div>
    </div>
  </div>
</div>
