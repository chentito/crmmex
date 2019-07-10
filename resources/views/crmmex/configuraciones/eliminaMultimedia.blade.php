<input type="hidden" name="multimediaID" id="multimediaID" value="{{$param}}">

<div class="row">
  <div class="col-sm-12 mt-3 text-center">
      Desea eliminar el elemento seleccionado?
  </div>
  <div class="col-sm-12 mt-3 text-center">
      <button type="button" name="btnEliminaMultimedia_regresar" id="btnEliminaMultimedia_regresar" class="btn btn-sm {{$btn}}"><i class="fa fa-undo fa-sm"></i> Regresar</button>
      <button type="button" name="btnEliminaMultimedia_deshabilita" id="btnEliminaMultimedia_deshabilita" class="btn btn-sm {{$btn}}"><i class="fa fa-undo fa-sm"></i> Deshabilitar</button>
      <button type="button" name="btnEliminaMultimedia_elimina" id="btnEliminaMultimedia_elimina" class="btn btn-sm {{$btn}}"><i class="fa fa-trash fa-sm"></i> Eliminar</button>
  </div>
</div>

<script>

  // Regresar
  document.getElementById( 'btnEliminaMultimedia_regresar' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'configuraciones_multimedia' );
  });

  // Deshabilitar
  document.getElementById( 'btnEliminaMultimedia_deshabilita' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      axios.post( '/api/eliminaMultimedia/' + document.getElementById( 'multimediaID' ).value + '/2' , {} ,
                  {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              aviso( 'Archivo deshabilitado correctamente' );
              contenidos( 'configuraciones_multimedia' );
           })
           .catch( err => {
              console.log( err );
           });
  });

  // Eliminar
  document.getElementById( 'btnEliminaMultimedia_elimina' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      axios.post( '/api/eliminaMultimedia/' + document.getElementById( 'multimediaID' ).value + '/3' , {} ,
                  {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              aviso( 'Archivo eliminado correctamente' );
              contenidos( 'configuraciones_multimedia' );
           })
           .catch( err => {
              console.log( err );
           });
  });

</script>
