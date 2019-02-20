
<fieldset class="mt-2 pt-2">
    <div class="container">
        <div class="row">
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom">Periodos:</h6>
                <div class="card-text input-group">
                    <select class="custom-select custom-select-sm" id="inputGroupSelect04">
                        <option id="1">Semanal</option>
                        <option id="2">Quincenal</option>
                        <option id="3">Mensual</option>
                        <option id="4">Trimestral</option>
                        <option id="5">Semestral</option>
                        <option id="6">Anual</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+</button>
                    </div>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Es el periodo de tiempo predefinido para hacer el c&aacute;lculo del Forecast
                </small>
            </div>
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom">Crecimiento:</h6>
                <div class="card-text">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Expresado en porcentaje</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Expresado en cantidad</label>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Par&aacute;metro utilizado para la previsi&oacute;n
                    </small>
                </div>
            </div>
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom">Monto/Tasa</h6>
                <div class="card-text">
                    <input type="number" step=".01" class="form-control form-control-sm" value="0.00">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom">Campo Objetivo:</h6>
                <div class="card-text input-group">
                    <select class="custom-select custom-select-sm">
                        <option>Importe</option>
                        <option>Ingresos Esperados</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#agregaCampoObjetivo" data-whatever="@mdo">+</button>
                    </div>
                </div>
            </div>
            <div class="col-8"></div>
        </div>
    </div>
    <br />
    <div class="col-xs-1" align="center">
        <button type="button" class="btn btn-sm btn-success">Guardar Configuraci&oacute;n</button>
    </div>
</fieldset>

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

<div class="modal fade" id="agregaCampoObjetivo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Campo Objetivo</h5>
            </div>
            <div class="modal-body">
                <form>
                    <select class="custom-select custom-select-sm">
                        <option>Campo 1</option>
                        <option>Campo 2</option>
                        <option>Campo 3</option>
                        <option>Campo 4</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="conf_forecast_btn_addPeriodo">Agregar</button>
            </div>
        </div>
    </div>
</div>
