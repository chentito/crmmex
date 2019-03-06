
@extends( 'principales.prospectos' )

@section( 'individual' )

<div class="container mt-2 pt-2">
    
    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
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
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>

@endsection
