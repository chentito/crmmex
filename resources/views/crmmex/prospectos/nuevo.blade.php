<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100 mb-3">
            <div class="card-header border-bottom"><h6 class="m-0">Datos Generales</h6></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_nombre_compania" class="form-control form-control-sm" placeholder="Compa&ntilde;&iacute;a">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_nombre_rfc" class="form-control form-control-sm" placeholder="RFC">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <combo-box id-cat="5" nombre-select="combo_giro"></combo-box>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-1">
                        <combo-box id-cat="1" nombre-select="combo_categorias"></combo-box>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <combo-box id-cat="2" nombre-select="combo_subcategorias"></combo-box>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <combo-box id-cat="3" nombre-select="combo_mediodecontacto"></combo-box>
                    </div>
                    <div class="col-sm-3 mb-1">
                        <combo-box id-cat="4" nombre-select="combo_empleados"></combo-box>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card card-small w-100">
            <div class="card-header border-bottom"><h6 class="m-0">Direcci&oacute;n</h6></div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_calle" class="form-control form-control-sm" placeholder="Calle">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_exterior" class="form-control form-control-sm" placeholder="No.Exterior">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_interior" class="form-control form-control-sm" placeholder="No.Interior">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_colonia" class="form-control form-control-sm" placeholder="Colonia">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_cp" class="form-control form-control-sm" placeholder="Codigo Postal">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_delegacion" class="form-control form-control-sm" placeholder="Delegacion/Municipio">
                    </div>
                    <div class="col-sm-3 mb-1">
                        <input type="text" id="alta_prospecto_direccion_ciudad" class="form-control form-control-sm" placeholder="Ciudad">
                    </div>
                    <div class="col-sm-3 mb-1">
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
            <div class="card-header">
                <button class="btn btn-sm btn-dark">Guardar</button>
            </div>
        </div>
    </div>
</div>
