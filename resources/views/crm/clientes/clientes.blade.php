@extends( 'crm.layout.principal' , ['seccion' => 'clientes'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'clientes' , 'subseccion' => 'Listado' ] )
@endsection

@section( 'seccionContenido' )
<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100">
            <div class="card-body">
                <table id="clientes" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Giro</th>
                            <th>Ejecutivo</th>
                            <th>Fecha Alta</th>
                            <th>M&aacute;s</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Giro</th>
                            <th>Ejecutivo</th>
                            <th>Fecha Alta</th>
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
        $('#clientes').DataTable({
            ajax   :{
                url: '/api/listadoClientes',
                dataSrc: 'clientes'
            },
            columns: [
                { data: 'razonSocial' },
                { data: 'rfc' },
                { data: 'giro' },
                { data: 'ejecutivo' },
                { data: 'fechaAlta' },
                { data: 'opciones',align: 'center' }
            ],
            responsive: true
        });
    });
</script>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.clientes.clientesFooter' )
@endSection
