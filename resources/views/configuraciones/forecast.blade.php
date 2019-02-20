<br />
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="input-group">
                <select class="custom-select" id="inputGroupSelect04">
                    <option id="1">Semanal</option>
                    <option id="2">Quincenal</option>
                    <option id="3">Mensual</option>
                    <option id="4">Trimestral</option>
                    <option id="5">Semestral</option>
                    <option id="6">Anual</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Es el periodo de tiempo predefinido para hacer el c&aacute;lculo del Forecast
                </small>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Crecimiento expresado en porcentaje</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Crecimiento expresado en cantidad</label>
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
                Par&aacute;metro utilizado para la previsi&oacute;n
            </small>
        </div>
        <div class="col-sm-2">
            Monto/Tasa
            <input type="text" class="form-control form-control-sm">
        </div>
    </div>
</div>
<div class="col-xs-1" align="center">
    <button type="button" class="btn btn-success">Guardar Configuraci&oacute;n</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo periodo</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre Periodo:</label>
            <input type="text" class="form-control form-control-sm" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">D&iacute;as:</label>
            <input type="text" class="form-control form-control-sm" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-sm btn-primary" id="conf_forecast_btn_addPeriodo">Agregar</button>
      </div>
    </div>
  </div>
</div>
