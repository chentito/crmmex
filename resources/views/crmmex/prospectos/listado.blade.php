
<div id="listadoProspectos_config"></div>
<table id="listadoProspectos" class="table table-striped responsive nowrap" style="width:100%"></table>

<script>
  generaDataGrid( 'listadoProspectos' );

  function habilitaProspecto( clienteID ) {
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
             aviso( 'Prospecto habilitado correctamente' );
             contenidos( 'prospectos_listado' );
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
