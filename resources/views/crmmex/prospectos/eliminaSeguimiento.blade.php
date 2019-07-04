<input type="hidden" name="seguimientoIDelimina" id="seguimientoIDelimina" value="{{$param}}">
<input type="hidden" name="clienteID" id="clienteID" value="" >

<div class="row">
  <div class="col-sm-12 text-center">
      Desea eliminar el seguimiento seleccionado?
      <br />
      <br />
      <button type="button" class="btn btn-sm {{$btn}} mr-2" id="btnEliminaSeguimientoRegresa"><i class="fa fa-undo fa-sm"></i>  Regresar</button>
      <button type="button" class="btn btn-sm {{$btn}}" id="btnEliminaSeguimientoElimina"><i class="fa fa-trash fa-sm"></i>  Eliminar</button>
  </div>
</div>

<script>
  clienteID();
  document.getElementById( 'btnEliminaSeguimientoRegresa' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'prospectos_seguimiento' , document.getElementById( 'clienteID' ).value );
  });

  document.getElementById( 'btnEliminaSeguimientoElimina' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      axios.post( '/api/eliminaSeguimiento/' + document.getElementById( 'seguimientoIDelimina' ).value , {} , {headers:{'Accept':'application/json','Authorization':'Bearer ' + sessionStorage.getItem('apiToken')}})
          .then( response => {
              aviso( 'Seguimiento eliminado correctamente' );
              contenidos( 'prospectos_seguimiento' , document.getElementById( 'clienteID' ).value );
          })
          .catch( err => {
              console.log( err );
          });
  });

  function clienteID() {
    axios.get( '/api/obtieneSeguimiento/' + document.getElementById( 'seguimientoIDelimina' ).value , {headers:{'Accept':'application/json','Authorization':'Bearer ' + sessionStorage.getItem('apiToken')}} )
         .then( response => {
            document.getElementById( 'clienteID' ).value = response.data.clienteID;
         })
         .catch( err => {
           console.log( err );
         });
  }
</script>
