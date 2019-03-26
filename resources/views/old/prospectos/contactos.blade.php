@extends( 'principales.prospectos' )

@section( 'individual' )

<div class='container'>
    <div class="row pt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Datos Generales</div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-3">
                            <label for="info_contactos_nombre">Nombre(s)</label>
                            <input type="text" id="info_contactos_nombre" class="form-control form-control-sm" value="{{$nombre}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_paterno">Apellido Paterno</label>
                            <input type="text" id="info_contactos_paterno" class="form-control form-control-sm" value="{{$paterno}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_materno">Apellido Materno</label>
                            <input type="text" id="info_contactos_materno" class="form-control form-control-sm" value="{{$materno}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_email">Correo Electr&oacute;nico</label>
                            <input type="text" id="info_contactos_email" class="form-control form-control-sm" value="{{$email}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="info_contactos_celular">Celular</label>
                            <input type="text" id="info_contactos_celular" class="form-control form-control-sm" value="{{$celular}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_celular_compania">Compa&ntilde;ia</label>
                            <select id="info_contactos_celular_compania" class="custom-select custom-select-sm">
                                <option>AT&T</option>
                                <option>Telcel</option>
                                <option>Unefon</option>
                                <option>Movistar</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_telefono">Tel&eacute;fono</label>
                            <input type="text" id="info_contactos_telefono" class="form-control form-control-sm" value="{{$telefono}}">
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_extension">Extensi&oacute;n</label>
                            <input type="text" id="info_contactos_extension" class="form-control form-control-sm" value="{{$extension}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="info_contactos_celular_area">Area</label>
                            <select id="info_contactos_celular_area" class="custom-select custom-select-sm">
                                <option>Finanzas</option>
                                <option>Ventas</option>
                                <option>TI</option>
                                <option>Administraci&oacute;n</option>
                                <option>Recursos Humanos</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="info_contactos_puesto">Puesto</label>
                            <input type="text" id="info_contactos_puesto" class="form-control form-control-sm" value="{{$puesto}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-sm-12" align="center">
            <button class="btn btn-sm btn-info">Guardar Informaci&oacute;n</button>
        </div>
    </div>
</div>

@endsection
