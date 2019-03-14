@extends( 'crm.layout.principal' , ['seccion' => 'ejecutivos'] )

@section( 'seccionHeader' )
    @include( 'crm.ejecutivos.ejecutivosHeader' , [ 'seccion' => 'ejecutivos' , 'subseccion' => 'Roles' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header border-bottom">
                Configuración Rol
                <div class="float-right">
                    <select class="custom-select custom-select-sm">
                        <option value="" selected="false" disabled="true">Seleccione Rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Ejecutivo Comercial</option>
                        <option value="N">+ Nuevo Rol</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom"><b>Prospectos</b></div>
                            <div class="card-body">
                                <ul class="list-group list-group-small list-group-flush">
                                    <li class="list-group-item d-flex px-3">
                                        <div class="custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault">
                                            <label class="custom-control-label" for="formsCheckboxDefault">Listado</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <div class="custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault2">
                                            <label class="custom-control-label" for="formsCheckboxDefault2">Nuevo Prospecto</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex px-3">
                                        <div class="custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input" id="formsCheckboxDefault3">
                                            <label class="custom-control-label" for="formsCheckboxDefault3">Seguimiento</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom">Clientes</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom">Ventas</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom">Productos/Servicios</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom"><b>Mercadotecnia</b></div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom">Reportes</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <div class="card">
                            <div class="card-header border-bottom">Configuraciones</div>
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3">
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
    @include( 'crm.ejecutivos.ejecutivosFooter' )
@endSection

