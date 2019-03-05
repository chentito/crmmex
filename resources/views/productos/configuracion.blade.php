
@extends( 'principales.productos' )

@section( 'individual' )

<div class="container">
    <div class="row pt-2">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Cargar datos hist&oacute;ricos</div>
                <div class="card-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Seleccione archivo...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">Seleccionar tabla de medici&oacute;n</div>
                <div class="card-body">
                    <div class="custom-file">
                        <select class="custom-select custom-select-sm">
                            <option>Mediciones globales</option>
                            <option>Mediciones Productos Pyme</option>
                            <option>Mediciones Productos Corporativos</option>
                            <option>Mediciones Productos con promociones</option>
                            <option>Mediciones productos facturaci&oacute;n electr&oacute;nica</option>
                            <option>Mediciones Productos desarrollos a la medida</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Periodos</div>
                <div class="card-body">
                    <div class="custom-file">
                        <select class="custom-select custom-select-sm" id="inputGroupSelect04">
                            <option id="1">Semanal</option>
                            <option id="2">Quincenal</option>
                            <option id="3">Mensual</option>
                            <option id="4">Trimestral</option>
                            <option id="5">Semestral</option>
                            <option id="6">Anual</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">C&aacute;lculo de previsi&oacute;</div>
                <div class="card-body">
                    <div class="custom-file">
                        <div class="card-text">
                            <div class="row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked">
                                    <label class="form-check-label" for="inlineRadio1">Media (promedio)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Moda</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Mediana</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="inlineRadio4">Formula:</label>
                                    <input class="form-control form-control-sm" type="text" name="inlineRadioOptions" id="inlineRadio4" size="10" >
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modalFormula" data-whatever="@mdo">?</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pr-2 pt-2">
    <button class="btn btn-sm btn-info float-lg-right" id="btnRegresar">Regresar al listado</button>
</div>

<div class="modal fade" id="modalFormula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Instrucciones</h5>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="conf_forecast_btn_addPeriodo">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $( '#btnRegresar' ).click( function(){
        history.back();
    });
</script>

@endsection
