@extends( 'crm.layout.principal' , ['seccion' => 'clientes'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'clientes' , 'subseccion' => 'Alta Seguimiento' ] )
@endsection

@section( 'seccionContenido' )
<div id="app">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-small">
                <div class="card-header border-bottom"><h6 class="m-0">A</h6></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Cliente">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-1">
                            <select class="custom-select custom-select-sm">
                                <option>Tipo de seguimiento</option>
                                <option>Llamada telefónica</option>
                                <option>Envío de propuesta/información</option>
                                <option>Cita</option>
                                <option>Conferencia</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="col-sm-4 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Fecha">
                        </div>
                        <div class="col-sm-4 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Horario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea class="form-control form-control-sm" rows="2" placeholder="Comentarios"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <boton-regresar></boton-regresar>
                    <div class="float-right">
                        <button class="btn btn-sm btn-outline-accent" id="abreAltaSeguimiento"><i class="material-icons">add</i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.clientes.clientesFooter' )
@endSection
