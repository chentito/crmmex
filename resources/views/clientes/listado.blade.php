
<div class="container mt-2 pt-2">
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

<script>
    $(document).ready( function() {
        $('#clientes').DataTable({
            ajax   :{
                url: '/clientes/listado',
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
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>
