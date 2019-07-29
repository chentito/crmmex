
<div id="listadoProspectos_config"></div>
<table id="listadoProspectos" class="table table-striped responsive nowrap display" style="width:100%"></table>

<script>
  generaDataGrid( 'listadoProspectos' );

  function habilitaProspecto( clienteID ) {
      axios.post( '/api/habilitaCliente/' + clienteID , {} , { headers:{ 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
           .then( response => {
             aviso( 'Prospecto habilitado correctamente' );
             contenidos( 'prospectos_listado' );
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
