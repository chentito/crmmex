@extends( 'crm.layout.principal' , ['seccion' => 'ejecutivos'] )

@section( 'seccionHeader' )
    @include( 'crm.ejecutivos.ejecutivosHeader' , [ 'seccion' => 'ejecutivos' , 'subseccion' => 'Edición Información' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small mb-3">
            <div class="card-header border-bottom">Datos del ejecutivo</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <input type="texto" id="admin_altaAdmin_nombre" name="admin_altaAdmin_nombre" class="form-control form-control-sm" placeholder="Nombre(s)">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <input type="texto" id="admin_altaAdmin_apPaterno" name="admin_altaAdmin_apPaterno" class="form-control form-control-sm" placeholder="Ap. Paterno">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <input type="texto" id="admin_altaAdmin_apMaterno" name="admin_altaAdmin_apMaterno" class="form-control form-control-sm" placeholder="Ap. Materno">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <input type="texto" id="admin_altaAdmin_email" name="admin_altaAdmin_email" class="form-control form-control-sm" placeholder="Email">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <input type="texto" id="admin_altaAdmin_extension" name="admin_altaAdmin_extension" class="form-control form-control-sm" placeholder="Extensi&oacute;n">
                    </div>
                    <div class="col-sm-4 mb-3">
                        <select id="admin_altaAdmin_rol" name="admin_altaAdmin_rol" class="form-control form-control-sm" >
                            <option value="" disabled="true" selected="true">Seleccione Rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                            <option value="3">Otro</option>
                    </select>
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

