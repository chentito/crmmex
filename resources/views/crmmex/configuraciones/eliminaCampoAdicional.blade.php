
<div class="row">
  <div class="col-sm-12 text-center">
    Desea eliminar el campo adicional seleccionado?
    <input type="hidden" id="campoAdicionalID" name="campoAdicionalID" value="{{$param}}">
  </div>
  <div class="col-sm-12 text-center mt-3">
      <button class="btn btn-sm {{$btn}}" id="eliminaCampoAdicional_btnEliminar">Eliminar Campo Adicional</button>
      <button class="btn btn-sm {{$btn}}" id="eliminaCampoAdicional_regresarListado">Regresar al listado</button>
  </div>
</div>

<script>
  // Evento para Eliminar
  document.getElementById( 'eliminaCampoAdicional_btnEliminar' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var campoAdicionalID = document.getElementById( 'campoAdicionalID' ).value;
      var url = '/api/eliminaCampoAdicional/' + campoAdicionalID;

      axios.post( url , {} )
           .then( response => {
             contenidos( 'configuraciones_clientesListado' );
           })
           .catch( err => {
             console.log( err );
           });
  });

  document.getElementById( 'eliminaCampoAdicional_regresarListado' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      alert("click");
  });

</script>
