
<fieldset class="mt-2 pt-2">
    <div class="container">
        
        <div class="row">
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom">Tabla de mediciones:</h6>
                <div class="card-text input-group">
                    <select class="custom-select custom-select-sm" id="inputGroupSelect04">
                        <option id="1">Poco probable</option>
                        <option id="2">Probable</option>
                        <option id="3">Muy probable</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#agregaRubroMedicion" data-whatever="@mdo">+</button>
                    </div>
                </div>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Indicadores que ayudan a realizar la medici&oacute;n de viabilidad de un prospecto
                </small>
            </div>
            
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom"><div class="form-inline"><input type="checkbox" class="form-control form-control-sm mr-2"> USAR BANT:</div></h6>
                <div class="card-text input-group">
                    <ul class="list-group list-group-flush w-100">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">Budget</div>
                                <div class="col-sm"><input type="number" value="0.00" class="form-control form-control-sm"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">Authority</div>
                                <div class="col-sm"><input type="number" value="0.00" class="form-control form-control-sm"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">Need</div>
                                <div class="col-sm"><input type="number" value="0.00" class="form-control form-control-sm"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">Timeframe</div>
                                <div class="col-sm"><input type="number" value="0.00" class="form-control form-control-sm"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                <h6 class="card-title border-bottom"></h6>
                
            </div>
            
            
            
        </div>
        
    </div>
    <br />
    <div class="col-xs-1" align="center">
        <button type="button" class="btn btn-sm btn-success">Guardar Configuraci&oacute;n</button>
    </div>
</fieldset>

<div class="modal fade" id="agregaRubroMedicion" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar medici&oacute;n</h5>
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
