<div class="card card-small w-100">
    <div class="card-body">
        <table id="clientes22" class="table table-striped table-bordered" style="width:100%">
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

<script>
    $(document).ready( function() {
        $('#clientes22').DataTable({
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