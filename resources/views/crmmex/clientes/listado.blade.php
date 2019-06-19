<div class="card card-small w-100">
    <div class="card-body">
        <div id="listadoClientes_config"></div>
        <table id="listadoClientes" class="table table-striped table-bordered" style="width:100%">
        </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        generaDataGrid( 'listadoClientes' );
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
