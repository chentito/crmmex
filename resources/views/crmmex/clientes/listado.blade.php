<div class="card card-small w-100">
    <div class="card-body">
        <table id="clientes22" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razón Social</th>
                    <th>RFC</th>
                    <th>Giro</th>
                    <th>Ejecutivo</th>
                    <th>Fecha Alta</th>
                    <th>Condición</th>
                    <th>Estatus</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Razón Social</th>
                    <th>RFC</th>
                    <th>Giro</th>
                    <th>Ejecutivo</th>
                    <th>Fecha Alta</th>
                    <th>Condición</th>
                    <th>Estatus</th>
                    <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        var token = sessionStorage.getItem( 'apiToken' );
        $.fn.dataTable.ext.errMode = 'throw';
        $('#clientes22').DataTable({
            "lengthMenu" : [[8, 16, 24, -1], [8, 16, 24, "All"]],
            ajax   : {
                url: '/api/listadoClientes',
                dataSrc: 'clientes',
                beforeSend : function( request ) {
                    request.setRequestHeader( "Accept" , "application/json" );
                    request.setRequestHeader( "Authorization" , "Bearer " + token );
                }
            },
            columns: [
                { data: 'id' },
                { data: 'razonSocial' },
                { data: 'rfc' },
                { data: 'giro' },
                { data: 'ejecutivo' },
                { data: 'fechaAlta' },
                { data: 'tipo' },
                { data: 'status' },
                { data: 'opciones',align: 'center', "width": "50px", }
            ],
            responsive: true
        });
    });

    function habilitaCliente( clienteID ) {
        var token = sessionStorage.getItem( 'apiToken' );
        var url = '/api/habilitaCliente/' + clienteID;
        var config = {
            headers:{
              'Accept' : 'application/json',
              'Authorization' : 'Bearer ' + token
            }
        };
        axios.post( url , {} , config )
             .then( response => {
               contenidos( 'clientes_listado' );
             })
             .catch( err => {
               console.log( err );
             });
    }
</script>
