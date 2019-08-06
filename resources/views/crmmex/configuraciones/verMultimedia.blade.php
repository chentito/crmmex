<input type="hidden" name="multimediaID" id="multimediaID" value="{{$param}}">

<div class="row mt-2">
  <div class="col-sm-12 text-center">
      <img src="/visualizaMultimedia/{{$param}}" class="rounded img-fluid" >
  </div>
  <div class="col-sm-12 text-center mt-2">
      <button type="button" name="verMultimediaBtnRegresar" id="verMultimediaBtnRegresar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
      <button type="button" name="verMultimediaBtnDescargar" id="verMultimediaBtnDescargar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-download"></i> Descargar</button>
  </div>
</div>



<script>

    document.getElementById( 'verMultimediaBtnRegresar' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'configuraciones_multimedia' );
    });

    document.getElementById( 'verMultimediaBtnDescargar' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        contenidos( 'configuraciones_multimedia' );
    });

</script>
