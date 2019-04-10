<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">Contacto</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                    <i class="fa fa-briefcase fa-sm"></i><span class="d-none d-sm-inline">Razón Social</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                    <i class="fa fa-address-book fa-sm"></i><span class="d-none d-sm-inline">Dirección</span>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card card-small w-100 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_nombre">Nombre(s)</label>
                                <input type="text" id="info_contactos_nombre" class="form-control form-control-sm" value="" placeholder="Nombre(s)">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_paterno">Apellido Paterno</label>
                                <input type="text" id="info_contactos_paterno" class="form-control form-control-sm" value="" placeholder="Apellido Paterno">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_materno">Apellido Materno</label>
                                <input type="text" id="info_contactos_materno" class="form-control form-control-sm" value="" placeholder="Apellido Materno">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_email">Correo Electrónico</label>
                                <input type="text" id="info_contactos_email" class="form-control form-control-sm" value="" placeholder="Correo Electr&oacute;nico">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_celular">No. Celular</label>
                                <input type="text" id="info_contactos_celular" class="form-control form-control-sm" value="" placeholder="Celular">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_celular_compania">Compañia</label>
                                <select id="info_contactos_celular_compania" class="custom-select custom-select-sm">
                                    <option>Compa&ntilde;ia</option>
                                    <option>AT&T</option>
                                    <option>Telcel</option>
                                    <option>Unefon</option>
                                    <option>Movistar</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_telefono">Teléfono</label>
                                <input type="text" id="info_contactos_telefono" class="form-control form-control-sm" value="" placeholder="Tel&eacute;fono">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_extension">Extensión</label>
                                <input type="text" id="info_contactos_extension" class="form-control form-control-sm" value="" placeholder="Extensi&oacute;n">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="info_contactos_celular_area">Área</label>
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
                                <label for="info_contactos_telefono">Puesto</label>
                                <input type="text" id="info_contactos_puesto" class="form-control form-control-sm" value="" placeholder="Puesto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card card-small w-100 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_nombre_compania">Raz&oacute;n Social</label>
                                <input type="text" id="alta_prospecto_nombre_compania" class="form-control form-control-sm" placeholder="Compa&ntilde;&iacute;a">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_nombre_rfc">RFC</label>
                                <input type="text" id="alta_prospecto_nombre_rfc" class="form-control form-control-sm" placeholder="RFC">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <!-- Combo giro -->
                                <label for="catalogo_5">Giro</label>
                                <select id="catalogo_5" class="custom-select custom-select-sm"></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="catalogo_1">Categoría</label>
                                <select id="catalogo_1" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="catalogo_2">Sub-Categoría</label>
                                <select id="catalogo_2" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="catalogo_3">Medio de Contacto</label>
                                <select id="catalogo_3" class="custom-select custom-select-sm"></select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="catalogo_4">Empleados</label>
                                <select id="catalogo_4" class="custom-select custom-select-sm"></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card card-small w-100">
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_calle">Calle</label>
                                <input type="text" id="alta_prospecto_direccion_calle" class="form-control form-control-sm" placeholder="Calle">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_exterior">No. Exterior</label>
                                <input type="text" id="alta_prospecto_direccion_exterior" class="form-control form-control-sm" placeholder="No.Exterior">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_interior">No. Interior</label>
                                <input type="text" id="alta_prospecto_direccion_interior" class="form-control form-control-sm" placeholder="No.Interior">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_colonia">Colonia</label>
                                <input type="text" id="alta_prospecto_direccion_colonia" class="form-control form-control-sm" placeholder="Colonia">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_cp">CP</label>
                                <input type="text" id="alta_prospecto_direccion_cp" class="form-control form-control-sm" placeholder="Codigo Postal">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_delegacion">Delegació</label>
                                <input type="text" id="alta_prospecto_direccion_delegacion" class="form-control form-control-sm" placeholder="Delegacion/Municipio">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_ciudad">Ciudad</label>
                                <input type="text" id="alta_prospecto_direccion_ciudad" class="form-control form-control-sm" placeholder="Ciudad">
                            </div>
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_estado">Estado</label>
                                <select id="alta_prospecto_direccion_estado" class="custom-select custom-select-sm">
                                    <option disabled="disabled">Estado</option>
                                    <option>Aguascalientes</option>
                                    <option>Baja California</option>
                                    <option>Baja California Sur</option>
                                    <option>Chiapas</option>
                                    <option>Estado de Mexico</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 mb-1">
                                <label for="alta_prospecto_direccion_pais">País</label>
                                <select id="alta_prospecto_direccion_pais" class="custom-select custom-select-sm">
                                    <option disabled="disabled">Pa&iacute;s</option>
                                    <option>M&eacute;xico</option>
                                    <option>Estados Unidos</option>
                                    <option>Espa&ntilde;a</option>
                                    <option>Argentina</option>
                                    <option>Inglaterra</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 text-center">
        <button class="text-small btn btn-sm {{$btn}}"><i class="fa fa-users fa-lg">save</i> Guardar</button>
    </div>
</div>

<script>
    $('#myTab a').on( 'click', function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
    });
    cargaDatosComboCatalogo();
</script>
