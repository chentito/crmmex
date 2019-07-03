
<input type="hidden" name="editaPromoID" id="editaPromoID" value="{{$param}}">

<div class="row">
  <div class="col-sm-12 text-center">
      La promoción se eliminará, desea continuar?
      <br />
      <br />
      <button type="button" class="btn btn-sm {{$btn}}" id="btnEliminaRegresarListado"><i class="fa fa-undo fa-sm"></i> Regresar</button>
      <button type="button" class="btn btn-sm {{$btn}}" id="btnEliminaEliminarPromocion"><i class="fa fa-trash fa-sm"></i> Eliminar promoción</button>
  </div>
</div>

<script>

    document.getElementById( 'btnEliminaRegresarListado' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        contenidos( 'configuraciones_promociones' );
    });

    document.getElementById( 'btnEliminaEliminarPromocion' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        var promoID = document.getElementById( 'editaPromoID' ).value;
        axios.post( '/api/eliminaPromocion/' + promoID )
             .then( request => {
                contenidos( 'configuraciones_promociones' );
                aviso( 'La promocion se ha eliminado correctamente' );
             })
             .catch( err => {
               console.log( err );
             });
    });

</script>
