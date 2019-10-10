
<div id="listadoClientes_config"></div>
<table id="listadoClientes" class="table table-striped responsive" style="width:100%"></table>

<script>
  generaDataGrid( 'listadoClientes' , '1' );

  function habilitaCliente( clienteID ) {
    var url    = '/api/habilitaCliente/' + clienteID;
    var config = { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
    axios.post( url , {} , config )
      .then( response => {
        aviso( 'Cliente habilitado correctamente' );
        contenidos( 'clientes_listado' );
      })
      .catch( err => { console.log( err ); });
  }
</script>
