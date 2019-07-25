
<div id="listadoClientes_config"></div>
<table id="listadoClientes" class="table table-striped table-bordered responsive nowrap" style="width:100%"></table>

<script>
    generaDataGrid( 'listadoClientes' , '1' );

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
               aviso( 'Cliente habilitado correctamente' );
               contenidos( 'clientes_listado' );
             })
             .catch( err => {
               console.log( err );
             });
    }
</script>
