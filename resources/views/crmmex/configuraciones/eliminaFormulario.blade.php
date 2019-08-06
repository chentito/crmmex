<input type="hidden" name="formularioID" id="formularioID" value="{{$param}}">

<div class="row mt-2">
    <div class="col-sm-12 mb-2 text-center">
      Desea eliminar el formulario seleccionado?
    </div>
    <div class="col-sm-12 text-center">
      <button type="button" name="eliminaFormBtnRegresar" id="eliminaFormBtnRegresar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
      <button type="button" name="eliminaFormBtnElimina" id="eliminaFormBtnElimina" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Eliminar</button>
    </div>
</div>

<script>
    document.getElementById( 'eliminaFormBtnRegresar' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        contenidos( 'configuraciones_formularios' );
    });

    document.getElementById( 'eliminaFormBtnElimina' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        axios.get( '/api/eliminaFormulario/' + document.getElementById( 'formularioID' ).value , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                aviso( 'Formulario eliminado correctamente' );
                contenidos( 'configuraciones_formularios' );
             })
             .catch( err => {
                console.log( err );
             });
    });
</script>
