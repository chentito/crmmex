@extends( 'crm.layout.principal' , ['seccion' => 'ejecutivos'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'ejecutivos' , 'subseccion' => 'Alta Ejecutivo' ] )
@endsection

@section( 'seccionContenido' )
<div id="app">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-small">
                <div class="card-header border-bottom"><h6 class="m-0">Datos</h6></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre (s)">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Apellido Paterno">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Apellido Materno">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre (s)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 input-group mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="usuario">
                            <div class="input-group-append">
                                <span class="input-group-text">@mexagon.net</span>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <select class="custom-select custom-select-sm">
                                <option>Rol</option>
                                <option>Administrador</option>
                                <option>Ejecutivo comercial</option>
                            </select>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <select class="custom-select custom-select-sm">
                                <option>Status</option>
                                <option>Habilitado</option>
                                <option>Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-1"><input type="text" class="form-control form-control-sm" placeholder="Teléfono fijo"></div>
                        <div class="col-sm-3 mb-1"><input type="text" class="form-control form-control-sm" placeholder="Extensión"></div>
                        <div class="col-sm-3 mb-1"><input type="text" class="form-control form-control-sm" placeholder="Teléfono móvil"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1"><input type="text" class="form-control form-control-sm" placeholder="Dirección"></div>
                        <div class="col-sm-3 mb-1"><input type="text" class="form-control form-control-sm" placeholder="Ciudad"></div>
                        <div class="col-sm-3 mb-1"><input type="text" class="form-control form-control-sm" placeholder="CP"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea class="form-control form-control-sm" rows="1" placeholder="Observaciones/Comentarios"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <boton-regresar></boton-regresar>
                    <div class="float-right">
                        <button class="btn btn-sm btn-outline-accent float-right"><i class="material-icons">save</i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.ejecutivos.ejecutivosFooter' )
@endSection
