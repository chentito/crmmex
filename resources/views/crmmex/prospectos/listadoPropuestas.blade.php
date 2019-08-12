
<h5><span id="clienteIdty"></span></h5>
<input type="hidden" id="clienteID" name="clienteID" value="{{$param}}">

<div id="listadoPropuestas_config"></div>
<table id="listadoPropuestas" class="table table-striped responsive nowrap" style="width:100%"></table>

<div class="row mt-1">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('prospectos_listado')"><i class="fa fa-undo-alt fa-lg"></i> Regresar</button>
    <button class="btn btn-sm {{$btn}}" id="abreAltaPropuesta"><i class="fa fa-plus fa-lg"></i> Agregar Propuesta</button>
  </div>
</div>
<script>
  $(document).ready( function() {
    var clienteID = document.getElementById( 'clienteID' ).value;
    generaDataGrid( 'listadoPropuestas' , clienteID );
    cargaNombre();

    /* Evento para abrir la alta de propuestas */
    document.getElementById( 'abreAltaPropuesta' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'prospectos_propuesta' , clienteID );
    });

    function cargaNombre() {
      var token  = sessionStorage.getItem( 'apiToken' );
      var url    = '/api/clienteIdty/' + document.getElementById( 'clienteID' ).value;
      var config = { headers: { "Accept" : "application/json", "Authorization" : "Bearer " + token } };

      axios.post( url , {} , config )
           .then( response => {
              document.getElementById( 'clienteIdty' ).innerHTML = response.data;
           })
           .catch( err => {
              console.log( err );
           });
    }
  });

  function generaPDF( propuestaID , propuestaIDTY ) {
    abreModal();
    var token  = sessionStorage.getItem( 'apiToken' );
    var url    = '/generaPDF/' + propuestaID;
    var config = { headers: { "Accept" : "application/json", "Authorization" : "Bearer " + token } };

    axios({ url: url, method: 'GET', responseType: 'blob'}, config )
            .then((response) => {
            cierraModal();
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute( 'download' , propuestaIDTY );
            document.body.appendChild(link);
            link.click();
          })
            .catch( err => {
            console.log( err );
          });
  }

  function envioPropuestaProspecto( propuestaID ) {
    abreModal();
    var config = {headers: {"Accept" : "application/json","Authorization" : "Bearer " + sessionStorage.getItem( 'apiToken' )}};
    axios.get( '/api/enviaPropuesta/' + propuestaID , config )
         .then( response => {
            contenidos( 'prospectos_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
            aviso( 'Propuesta enviada correctamente' );
         })
         .catch( err => {
            console.log( err );
         });
  }
</script>
