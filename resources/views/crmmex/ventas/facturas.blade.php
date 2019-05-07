<div class="card card-small w-100">
    <div class="card-body">
        <table id="clientes22" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>ID Factura</th>
                  <th>ID Cliente</th>
                  <th>ID Propuesta</th>
                  <th>Monto</th>
                  <th>Fecha Emision</th>
                  <th>Status</th>
                  <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                  <th>ID Factura</th>
                  <th>ID Cliente</th>
                  <th>ID Propuesta</th>
                  <th>Monto</th>
                  <th>Fecha Emision</th>
                  <th>Status</th>
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
                url: '/api/listadoFacturas',
                dataSrc: 'facturas'
            },
            columns: [
                { data: 'facturaID' },
                { data: 'clienteID' },
                { data: 'propuestaID' },
                { data: 'monto' },
                { data: 'fechaEmision' },
                { data: 'status' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
