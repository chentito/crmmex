
<div class="row">
  <div class="col-sm-12 text-center">
    Desea eliminar el campo adicional seleccionado?
    <input type="hidden" id="campoAdicionalID" name="campoAdicionalID" value="{{$param}}">
    <input type="hidden" id="campoAdicionalIDSeccion" name="campoAdicionalIDSeccion" value="">
  </div>
  <div class="col-sm-12 text-center mt-3">
      <button class="btn btn-sm {{$btn}}" id="eliminaCampoAdicional_btnEliminar">Eliminar Campo Adicional</button>
      <button class="btn btn-sm {{$btn}}" id="eliminaCampoAdicional_regresarListado">Regresar al listado</button>
  </div>
</div>

<script>

  verificaSeccion( document.getElementById( 'campoAdicionalID' ).value );

  // Evento para Eliminar
  document.getElementById( 'eliminaCampoAdicional_btnEliminar' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var campoAdicionalID = document.getElementById( 'campoAdicionalID' ).value;
      var url = '/api/eliminaCampoAdicional/' + campoAdicionalID;

      axios.post( url , {} , {headers:{'Accept':'application\json','Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
             contenidos( 'configuraciones_camposAdicionales' , document.getElementById( 'campoAdicionalIDSeccion' ).value );
           })
           .catch( err => {
             console.log( err );
           });
  });

  document.getElementById( 'eliminaCampoAdicional_regresarListado' ).addEventListener( 'click' , function( e ) {
      e.preventDefault();
      contenidos( 'configuraciones_camposAdicionales' , document.getElementById( 'campoAdicionalIDSeccion' ).value );
  });

  function verificaSeccion( campoAdicionalID ) {
      axios.get( '/api/datosCampoAdicional/'+campoAdicionalID , {headers:{'Accept':'application\json','Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
             document.getElementById( 'campoAdicionalIDSeccion' ).value = response.data.seccion;
           })
           .catch( err => {
             console.log( err );
           });
  }

</script>
