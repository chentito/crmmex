
@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'Campos Adicionales' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-12">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Campos Adicionales</div>
            <div class="card-body">
                <select multiple="" class="form-control form-control-sm" id="exampleFormControlSelect1">
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
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Agregar Campo</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <input id="conf_datosAdicionales_nombre" type="text" class="form-control form-control-sm" required placeholder="Nombre del campo">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <select id="conf_datosAdicionales_tipoDato" class="form-control form-control-sm">
                            <option>Tipo de Dato</option>
                            <option>Num&eacute;rico entero</option>
                            <option>Num&eacute;rico flotante</option>
                            <option>Alfanum&eacute;rico</option>
                            <option>Alfabetico</option>
                            <option>Fecha</option>
                        </select>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <select id="conf_datosAdicionales_seccion" class="form-control form-control-sm">
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
            <div class="card-footer">
                <div id="app"><boton-regresar></boton-regresar></div>
                <button class="btn btn-sm btn-outline-accent float-right"><i class="material-icons">save</i> Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
