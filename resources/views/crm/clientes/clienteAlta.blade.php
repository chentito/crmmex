@extends( 'crm.layout.principal' , ['seccion' => 'clientes'] )

@section( 'seccionHeader' )
    @include( 'crm.clientes.clienteHeader' , [ 'seccion' => 'clientes' , 'subseccion' => 'Alta' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header border-bottom"><h6 class="m-0">Datos Generales</h6></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="Raz&oacute;n Social">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="RFC">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="Correo Electrónico">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="Número Telefónico Fijo">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="Extensión">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" class="form form-control form-control-sm" placeholder="Número Celular">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Sector</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Giro</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Grupo</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Forma Contacto</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Hora Contacto</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Dia Contacto</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select class="custom-select custom-select-sm">
                            <option>Ejecutivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <nav>
                <div class="card-header nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Contacto</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Direcci&oacute;n</a>
                </div>
            </nav>
            <div class="card-body tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Nombre">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Apellido paterno">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Apellido materno">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Teléfono">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Extensión">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <select class="custom-select custom-select-sm">
                                    <option>Area</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input type="text" class="form form-control form-control-sm" placeholder="Puesto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="Calle">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="No. Exterior">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="No. Interior">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="Delegacion/Municipio">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="Colonia">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <input class="form form-control form-control-sm" placeholder="Codigo Postal">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="custom-select custom-select-sm">
                                    <option>Estado</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="custom-select custom-select-sm">
                                    <option>País</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tabContactos a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.clientes.clientesFooter' )
@endSection

