<div class="card card-small w-100">
    <div class="card-body">
        <table id="clientes22" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>ID Factura</th>
                  <th>ID Cliente</th>
                  <th>ID Propuesta</th>
                  <th>Monto</th>
                  <th>Banco</th>
                  <th>Forma Pago</th>
                  <th>Fecha Pago</th>
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
                  <th>Banco</th>
                  <th>Forma Pago</th>
                  <th>Fecha Pago</th>
                  <th>Status</th>
                  <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        var token = sessionStorage.getItem( 'apiToken' );
        $('#clientes22').DataTable({
            ajax: {
                url: '/api/listadoFacturas',
                dataSrc: 'facturas',
                beforeSend: function( request ) {
                  request.setRequestHeader( 'Accept' , 'application/json' );
                  request.setRequestHeader( 'Authorization' , 'Bearer ' + token );
                }
            },
            columns: [
                { data: 'facturaID' },
                { data: 'clienteID' },
                { data: 'propuestaID' },
                { data: 'monto' },
                { data: 'banco' },
                { data: 'formaPago' },
                { data: 'fechaEmision' },
                { data: 'status' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
