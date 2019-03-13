@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Configuraciones</span>
        <h3 class="page-title">Forecast</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-4">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Periodos:</div>
            <div class="card-body">
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
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Crecimiento:</div>
            <div class="card-body">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Expresado en porcentaje</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Expresado en cantidad</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Monto/Tasa</div>
            <div class="card-body">
                <input type="number" step=".01" class="form-control form-control-sm" value="0.00">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Campo Objetivo:</div>
            <div class="card-body">
                <select class="custom-select custom-select-sm">
                    <option>Importe</option>
                    <option>Ingresos Esperados</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#agregaCampoObjetivo" data-whatever="@mdo">+</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">C&aacute;lculo de Previsi&oacute;n</div>
            <div class="card-body">
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
                        <input class="form-control form-control-sm" type="text" name="inlineRadioOptions" id="inlineRadio4" size="20" >
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modalFormula" data-whatever="@mdo">?</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
