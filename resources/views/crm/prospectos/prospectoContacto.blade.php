@extends( 'crm.layout.principal' , ['seccion' => 'prospectos'] )

@section( 'seccionHeader' )
    @include( 'crm.prospectos.prospectoHeader' , [ 'seccion' => 'prospectos' , 'subseccion' => 'Agrega Contacto' ] )
@endsection

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Prospectos</span>
        <h3 class="page-title">Agrega Contacto</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )

<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100 mb-3">
            <div class="card-header border-bottom"> Datos Generales </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_nombre" class="form-control form-control-sm" value="" placeholder="Nombre(s)">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_paterno" class="form-control form-control-sm" value="" placeholder="Apellido Paterno">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_materno" class="form-control form-control-sm" value="" placeholder="Apellido Materno">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_email" class="form-control form-control-sm" value="" placeholder="Correo Electr&oacute;nico">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_celular" class="form-control form-control-sm" value="" placeholder="Celular">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <select id="info_contactos_celular_compania" class="custom-select custom-select-sm">
                            <option>Compa&ntilde;ia</option>
                            <option>AT&T</option>
                            <option>Telcel</option>
                            <option>Unefon</option>
                            <option>Movistar</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_telefono" class="form-control form-control-sm" value="" placeholder="Tel&eacute;fono">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_extension" class="form-control form-control-sm" value="" placeholder="Extensi&oacute;n">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <select id="info_contactos_celular_area" class="custom-select custom-select-sm">
                            <option>Area</option>
                            <option>Finanzas</option>
                            <option>Ventas</option>
                            <option>TI</option>
                            <option>Administraci&oacute;n</option>
                            <option>Recursos Humanos</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="info_contactos_puesto" class="form-control form-control-sm" value="" placeholder="Puesto">
                    </div>
                </div>
            </div>
            <div class="card-footer right">
                <div id="app"><boton-regresar></boton-regresar></div>
                <button class="btn btn-sm btn-outline-accent float-right"><i class="material-icons">save</i> Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section( 'seccionFooter' )
    @include( 'crm.prospectos.prospectoFooter' )
@endsection

