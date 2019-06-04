Desea eliminar la campaña seleccionada?
<input type="hidden" id="idCampaniaEliminar" name="idCampaniaEliminar" value="{{$param}}">

<br /><br />
<div class="row">
  <div class="col-sm-12 text-center">
    <button id="regresarListadoCampanias" class="btn btn-sm {{$btn}}">Regresar</button>
    <button id="eliminarCampaniaSeleccionada" class="btn btn-sm {{$btn}}">Eliminar</button>
  </div>
</div>

<script>
  $( '#regresarListadoCampanias' ).click( function(){
    contenidos( 'mercadotecnia_listado' );
  });

  $( '#eliminarCampaniaSeleccionada' ).click( function(){
    var token      = sessionStorage.getItem( 'apiToken' );
    var config     = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };
    var campaniaID = document.getElementById( 'idCampaniaEliminar' ).value;
    var url = '/api/eliminaCampania/' + campaniaID;

    axios.post( url , {} , config )
         .then( resp => {
           contenidos( 'mercadotecnia_listado' );
         })
         .catch( err => {
           console.log( err );
         });

  });
</script>
