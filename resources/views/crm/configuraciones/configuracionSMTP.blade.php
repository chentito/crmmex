
@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'SMTP' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header border-bottom">Datos Conexi&oacute;n</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_host" required placeholder="Servidor SMTP (host)">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_usuario" required placeholder="Usuario">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_passwd" required placeholder="Contrase&ntilde;a">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_port" required placeholder="Puerto">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <select class="custom-select custom-select-sm" id="conf_smtp_security">
                            <option>Seguridad</option>
                            <option>Ninguna</option>
                            <option>TLS</option>
                            <option>SSL</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_from" required placeholder="De">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control form-control-sm" id="conf_smtp_copy" placeholder="Para">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <button class="btn btn-sm btn-outline-accent float-right"><i class="material-icons">send</i> Probar Configuraci&oacute;n</button>
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
