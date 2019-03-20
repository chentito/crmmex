@extends( 'crm.layout.principal' , ['seccion' => 'ventas'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'ventas' , 'subseccion' => 'Seguimiento Propuestas' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-body">
                <table id="listadoPropuestas" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Fecha Env&iacute;o</th>
                            <th>Monto</th>
                            <th>Descuento</th>
                            <th>Observaciones</th>
                            <th>Ejecutivo</th>
                            <th>Estatus</th>
                            <th>M&aacute;s</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Fecha Env&iacute;o</th>
                            <th>Monto</th>
                            <th>Descuento</th>
                            <th>Observaciones</th>
                            <th>Ejecutivo</th>
                            <th>Estatus</th>
                            <th>M&aacute;s</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {
        $('#listadoPropuestas').DataTable({
            ajax   :{
                url: '/api/listadoPropuestas',
                dataSrc: 'propuestas'
            },
            columns: [
                { data: 'cliente' },
                { data: 'contacto' },
                { data: 'fechaEnvio' },
                { data: 'monto' },
                { data: 'descuento' },
                { data: 'observaciones' },
                { data: 'idEjecutivo' },
                { data: 'status' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.ventas.ventaFooter' )
@endsection

