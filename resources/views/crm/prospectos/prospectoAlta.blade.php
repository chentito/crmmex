@extends( 'crm.layout.principal' )

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Prospectos</span>
        <h3 class="page-title">Nuevo Prospecto</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )

<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100 mb-3">
            <div class="card-header border-bottom">Datos Generales</div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-sm-3">
                        <input type="text" id="alta_prospecto_nombre_compania" class="form-control form-control-sm" placeholder="Compa&ntilde;&iacute;a">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="alta_prospecto_nombre_rfc" class="form-control form-control-sm" placeholder="RFC">
                    </div>
                    <div class="col-sm-3">
                        <select id="alta_prospecto_nombre_giro" class="custom-select custom-select-sm">
                            <option>Giro</option>
                            <option>Educaci&oacute;n</option>
                            <option>Alimentos</option>
                            <option>Tecnolog&iacute;a</option>
                            <option>Servicios</option>
                            <option>Telecomunicaciones</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-sm-3">
                        <select id="alta_prospecto_nombre_categoria" class="custom-select custom-select-sm">
                            <option>Categor&iacute;a</option>
                            <option>Categor&iacute;a 1</option>
                            <option>Categor&iacute;a 2</option>
                            <option>Categor&iacute;a 3</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select id="alta_prospecto_nombre_subCategoria" class="custom-select custom-select-sm">
                            <option>Sub-categor&iacute;a</option>
                            <option>Categor&iacute;a 1</option>
                            <option>Categor&iacute;a 2</option>
                            <option>Categor&iacute;a 3</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select id="alta_prospecto_nombre_medioContacto" class="custom-select custom-select-sm">
                            <option>Medio de contacto</option>
                            <option>Internet</option>
                            <option>Publicidad impresa</option>
                            <option>Recomendaci&oacute;n</option>
                            <option>501 a 1000</option>
                            <option>M&aacute;s de 1000</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select id="alta_prospecto_nombre_subCategoria" class="custom-select custom-select-sm">
                            <option>Empleados</option>
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
    <div class="col-sm-12">
        <div class="card card-small w-100 mb-3">
            <div class="card-header border-bottom">Direcci&oacute;n</div>
            <div class="card-body">
                <div class="row mb-1">
                         <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_calle" class="form-control form-control-sm" placeholder="Calle">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_exterior" class="form-control form-control-sm" placeholder="No.Exterior">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_interior" class="form-control form-control-sm" placeholder="No.Interior">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_colonia" class="form-control form-control-sm" placeholder="Colonia">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_cp" class="form-control form-control-sm" placeholder="Codigo Postal">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_delegacion" class="form-control form-control-sm" placeholder="Delegacion/Municipio">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="alta_prospecto_direccion_ciudad" class="form-control form-control-sm" placeholder="Ciudad">
                        </div>
                        <div class="col-sm-3">
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
                        <div class="col-sm-3">
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

@endsection

@section( 'seccionFooter' )
    <footer class="main-footer d-flex p-2 px-3 bg-white border-top sticky">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/prospecto">Listado</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="/prospectoAlta">Nuevo Prospecto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/prospectoSeguimiento">Seguimientos</a>
          </li>
        </ul>
        <span class="copyright ml-auto my-auto mr-2"><a href="/home3" rel="nofollow">.:: CRM Mexagon ::.</a></span>
    </footer>
@endsection
