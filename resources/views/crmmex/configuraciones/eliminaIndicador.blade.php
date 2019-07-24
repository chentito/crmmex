<input type="hidden" name="indicadorID" id="indicadorID" value="{{$param}}">

<div class="row mt-2">
    <div class="col-sm-12 text-center">
        Esta a punto de eliminar el indicador seleccionado, desea continuar?
    </div>
    <div class="col-sm-12 mt-2 text-center">
        <button type="button" name="eliminaIndicadorRegresar" id="eliminaIndicadorRegresar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
        <button type="button" name="eliminaIndicadorDeshabilita" id="eliminaIndicadorDeshabilita" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Deshabilitar</button>
        <button type="button" name="eliminaIndicadorElimina" id="eliminaIndicadorElimina" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Eliminar</button>
    </div>
</div>

<script>
    document.getElementById( 'eliminaIndicadorRegresar' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        contenidos( 'configuraciones_pipeline' );
    });

    document.getElementById( 'eliminaIndicadorDeshabilita' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        axios.post( '/api/deshabilitaIndicador/' + document.getElementById( 'indicadorID' ).value , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                aviso( 'Indicador deshabilitado correctamente' );
                contenidos( 'configuraciones_pipeline' );
             })
             .catch( err => {
                console.log( err );
             });
    });

    document.getElementById( 'eliminaIndicadorElimina' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        axios.post( '/api/eliminaIndicador/' + document.getElementById( 'indicadorID' ).value , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                aviso( 'Indicador eliminado correctamente' );
                contenidos( 'configuraciones_pipeline' );
             })
             .catch( err => {
                console.log( err );
             });
    });

</script>
