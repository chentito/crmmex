
@extends( 'principales.prospectos' )

@section( 'individual' )

<div class="container">
    <div class="row pt-2">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Datos Generales</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_compania">Compa&ntilde;&iacute;a</label>
                            <input type="text" id="alta_prospecto_nombre_compania" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_compania">RFC</label>
                            <input type="text" id="alta_prospecto_nombre_rfc" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_giro">Giro</label>
                            <select id="alta_prospecto_nombre_giro" class="custom-select custom-select-sm">
                                <option>-</option>
                                <option>Educaci&oacute;n</option>
                                <option>Alimentos</option>
                                <option>Tecnolog&iacute;a</option>
                                <option>Servicios</option>
                                <option>Telecomunicaciones</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_categoria">Categor&iacute;a</label>
                            <select id="alta_prospecto_nombre_categoria" class="custom-select custom-select-sm">
                                <option>-</option>
                                <option>Categor&iacute;a 1</option>
                                <option>Categor&iacute;a 2</option>
                                <option>Categor&iacute;a 3</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_subCategoria">Sub-categor&iacute;a</label>
                            <select id="alta_prospecto_nombre_subCategoria" class="custom-select custom-select-sm">
                                <option>-</option>
                                <option>Categor&iacute;a 1</option>
                                <option>Categor&iacute;a 2</option>
                                <option>Categor&iacute;a 3</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_medioContacto">Medio de contacto</label>
                            <select id="alta_prospecto_nombre_medioContacto" class="custom-select custom-select-sm">
                                <option>-</option>
                                <option>Internet</option>
                                <option>Publicidad impresa</option>
                                <option>Recomendaci&oacute;n</option>
                                <option>501 a 1000</option>
                                <option>M&aacute;s de 1000</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="alta_prospecto_nombre_subCategoria">Empleados</label>
                            <select id="alta_prospecto_nombre_subCategoria" class="custom-select custom-select-sm">
                                <option>-</option>
                                <option>1 a 10</option>
                                <option>11 a 50</option>
                                <option>51 a 100</option>
                                <option>101 a 500</option>
                                <option>501 a 1000</option>
                                <option>M&aacute;s de 1000</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 pt-2">
            <div class="card">
                <div class="card-header">Direcci&oacute;n</div>
                <div class="card-body">
                    <div class="row">
                         <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_calle">Calle</label>
                            <input type="text" id="alta_prospecto_direccion_calle" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_exterior">No.Exterior</label>
                            <input type="text" id="alta_prospecto_direccion_exterior" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_interior">No.Interior</label>
                            <input type="text" id="alta_prospecto_direccion_interior" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_colonia">Colonia</label>
                            <input type="text" id="alta_prospecto_direccion_colonia" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_cp">CP</label>
                            <input type="text" id="alta_prospecto_direccion_cp" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_delegacion">Delegacion/Municipio</label>
                            <input type="text" id="alta_prospecto_direccion_delegacion" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_ciudad">Ciudad</label>
                            <input type="text" id="alta_prospecto_direccion_ciudad" class="form-control form-control-sm">
                        </div>
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_estado">Estado</label>
                            <select id="alta_prospecto_direccion_estado" class="custom-select custom-select-sm">
                                <option>Aguascalientes</option>
                                <option>Baja California</option>
                                <option>Baja California Sur</option>
                                <option>Aguascalientes</option>
                                <option>Aguascalientes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="alta_prospecto_direccion_pais">Pa&iacute;s</label>
                            <select id="alta_prospecto_direccion_pais" class="custom-select custom-select-sm">
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
    
    <div class="row pt-2">
        <div class="col-sm-6" align="center">
            <button class="btn btn-sm btn-info" id="btnRegresar">Regresar al listado</button>
        </div>
        <div class="col-sm-6" align="center">
            <button class="btn btn-sm btn-info" id="btnGuardar">Guardar Registro</button>
        </div>
    </div>
    
</div>

<script>
    $( '#btnRegresar' ).click( function(){
        location.replace( '/prospectos/contactos/{{$id}}' );
    });
</script>

@endsection

