@extends( 'crm.layout.principal' , ['seccion' => 'prospectos'] )

@section( 'seccionHeader' )
    @include( 'crm.prospectos.prospectoHeader' , [ 'seccion' => 'prospectos' , 'subseccion' => 'Listado' ] )
@endsection

@section( 'seccionContenido' )

<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
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
        $('#example').DataTable({
            ajax   :{
                url: '/api/listadoProspectos',
                dataSrc: 'prospectos'
            },
            columns: [
                { data: 'razonSocial' },
                { data: 'rfc' },
                { data: 'giro' },
                { data: 'ejecutivo' },
                { data: 'fechaAlta' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>

@endsection

@section( 'seccionFooter' )
    @include( 'crm.prospectos.prospectoFooter' )
@endsection
