@extends( 'crm.layout.principal' , ['seccion' => 'productos'] )

@section( 'seccionHeader' ) 
    @include( 'crm.productos.productoHeader' , [ 'seccion' => 'productos' , 'subseccion' => 'Configuración Avanzada' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Par&aacute;metros adicionales</div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required placeholder="Carga Layout datos hist&oacute;ricos">
                        <label class="custom-file-label" for="validatedCustomFile">Seleccione archivo...</label>
                    </div>
                    <div class="col-sm-4">
                        <select class="custom-select custom-select-sm">
                            <option>Tabla de mediciones a utilizar</option>
                            <option>Mediciones globales</option>
                            <option>Mediciones Productos Pyme</option>
                            <option>Mediciones Productos Corporativos</option>
                            <option>Mediciones Productos con promociones</option>
                            <option>Mediciones productos facturaci&oacute;n electr&oacute;nica</option>
                            <option>Mediciones Productos desarrollos a la medida</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="custom-select custom-select-sm" id="inputGroupSelect04">
                            <option id="1">Periodo de cálculo a utilizar</option>
                            <option id="1">Semanal</option>
                            <option id="2">Quincenal</option>
                            <option id="3">Mensual</option>
                            <option id="4">Trimestral</option>
                            <option id="5">Semestral</option>
                            <option id="6">Anual</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
                          <label class="btn btn-white active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Media </label>
                          <label class="btn btn-white">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Moda </label>
                          <label class="btn btn-white">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Mediana </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-check-label" for="inlineRadio4">Formula:</label>
                        <input class="form-control form-control-sm" type="text" name="inlineRadioOptions" id="inlineRadio4" size="5" >
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modalFormula" data-whatever="@mdo">?</button>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="card-footer">
                    <div id="app"><boton-regresar></boton-regresar></div>
                    <button class="btn btn-sm btn-outline-accent float-right"><i class="material-icons">save</i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.productos.productoFooter' )
@endsection
