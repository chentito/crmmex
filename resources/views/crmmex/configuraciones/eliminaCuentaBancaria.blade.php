<input type="hidden" id="cuentaBancaria_id" name="cuentaBancaria_id" value="{{$param}}">
<div class="row">
  <div class="col-sm-12 text-center mt-2">
    <button type="button" name="deshabilitaCuentaBancaria" id="deshabilitaCuentaBancaria" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash-alt"></i> Deshailitar cuenta</button>
    <button type="button" name="eliminarCuentaBancaria" id="eliminarCuentaBancaria" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Eliminar definitivamente cuenta</button>
  </div>
  <div class="col-sm-12 text-center mt-2">
    <button type="button" name="regresarCuentaBancaria" id="regresarCuentaBancaria" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
  </div>
</div>

<script>
  document.getElementById( 'regresarCuentaBancaria' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    contenidos( 'configuraciones_configuracionesAdicionales' );
  });

  document.getElementById( 'deshabilitaCuentaBancaria' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    movimientoCuentaBancaria( 2 );
  });

  document.getElementById( 'eliminarCuentaBancaria' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    movimientoCuentaBancaria( 3 );
  });


  function movimientoCuentaBancaria( mov ) {
    var msj = ( ( mov == 2 ) ? 'deshabilitado' : 'eliminado' );
    axios.post( '/api/eliminaCuentaBancaria/' + document.getElementById( 'cuentaBancaria_id' ).value + '/' + mov ,
                   {headers:{'Accept':'application\json','Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        aviso( 'La cuenta se ha ' + msj + ' correctamente' );
        contenidos( 'configuraciones_configuracionesAdicionales' );
      })
      .catch( err => {
        console.log( err );
      });
  }

</script>
