
<input type="hidden" id="propuestaEliminarID" name="propuestaEliminarID" value="{{$param}}">
<input type="hidden" id="clienteID" name="clienteID" value="">

<div class="row">
  <div class="col-sm-12 text-center">
      Se eliminará la propuesta seleccionada, desdea continuar?
      <br />
      <br />
      <button type="button" class="btn btn-sm {{$btn}}" id="btnEliminaPropuestaRegresar"><i class="fa fa-undo fa-sm"></i>  Regresar</button>
      <button type="button" class="btn btn-sm {{$btn}}" id="btnEliminaPropuestaEliminarPropuesta"><i class="fa fa-trash fa-sm"></i>  Eliminar propuesta</button>
  </div>
</div>

<script>
    axios.get( '/obtieneDatosPropuesta/' + document.getElementById( 'propuestaEliminarID' ).value , {headers:{'Accept':'application/json','Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            document.getElementById( 'clienteID' ).value = response.data.cliente;
         })
         .catch( err => {
            console.log( err );
         });

    document.getElementById( 'btnEliminaPropuestaRegresar' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'prospectos_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
    });

    document.getElementById( 'btnEliminaPropuestaEliminarPropuesta' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var propuestaID = document.getElementById( 'propuestaEliminarID' ).value;
        axios.post( '/eliminaPropuesta/' + propuestaID )
             .then( response => {
               contenidos( 'prospectos_listadoPropuestas' , document.getElementById( 'clienteID' ).value )
               aviso( 'Propuesta eliminada correctamente' );
             })
             .catch( err => {
               console.log( err );
             });
    });
</script>
