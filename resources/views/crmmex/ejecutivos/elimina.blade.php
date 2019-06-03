<div class="row">
  <div class="col-sm-12 text-center">
    Desea eliminar al ejecutivo seleccionado?
    <br />
    <br />
    <input type="hidden" id="eliminaEjecutivoID" name="eliminaEjecutivoID" value="{{$param}}" />
    <button id="btnEliminaAdminRegresar" class="btn btn-sm {{$btn}}">Regresar</button>
    <button id="btnEliminaAdminEliminar" class="btn btn-sm {{$btn}}" class="btn btn-sm {{$btn}}">Eliminar</button>
  </div>
</div>

<script>
  $( '#btnEliminaAdminRegresar' ).click( function( e ) {
      e.preventDefault();
      contenidos( 'ejecutivos_listado' );
  });

  $( '#btnEliminaAdminEliminar' ).click( function( e ){
      e.preventDefault();
      var token  = sessionStorage.getItem( 'apiToken' );
      var id  = document.getElementById( 'eliminaEjecutivoID' ).value;
      var url = '/api/eliminaEjecutivo/' + id;

      var config = {
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
        }
      };

      axios.post( url , {} , config )
           .then( resp => {
             contenidos( 'ejecutivos_listado' );
           })
           .catch( err => {
             console.log( err );
           });
  });
</script>
