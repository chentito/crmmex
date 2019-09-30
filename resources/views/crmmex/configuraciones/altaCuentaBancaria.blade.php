<form name="altaCuentaBancaria_form" id="altaCuentaBancaria_form">
  <div class="row mt-3">
    <div class="col-sm-4">
      <label for="altaCuentaBancaria_banco">Seleccione Banco:</label>
      <select class="custom-select custom-select-sm" name="catalogo_19" id="catalogo_19"></select>
    </div>
    <div class="col-sm-4">
      <label for="altaCuentaBancaria_nombreCuenta">Nombre Cuenta:</label>
      <input type="text" name="altaCuentaBancaria_nombreCuenta" id="altaCuentaBancaria_nombreCuenta" maxlength="100" class="form-control form-control-sm">
    </div>
    <div class="col-sm-4">
      <label for="altaCuentaBancaria_numeroCuenta">Número Cuenta:</label>
      <input type="text" name="altaCuentaBancaria_numeroCuenta" id="altaCuentaBancaria_numeroCuenta" maxlength="50" class="form-control form-control-sm">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-sm-12 text-center">
      <button type="button" name="altaCuentaBancaria_guarda" id="altaCuentaBancaria_guarda" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
      <button type="button" name="altaCuentaBancaria_regresar" id="altaCuentaBancaria_regresar" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
    </div>
  </div>
</form>

<script>
  cargaDatosComboCatalogo();

  document.getElementById( 'altaCuentaBancaria_regresar' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'configuraciones_configuracionesAdicionales' );
  });

  document.getElementById( 'altaCuentaBancaria_guarda' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    var datos = new FormData( document.getElementById( 'altaCuentaBancaria_form' ) );

    if( document.getElementById( 'altaCuentaBancaria_nombreCuenta' ).value == '' ) {
      aviso( 'No ha proporcionado un nombre a la cuenta' , false );
    } else if( document.getElementById( 'altaCuentaBancaria_numeroCuenta' ).value == '' ) {
      aviso( 'No ha proporcionado el numero de cuenta' , false );
    } else {

      if( document.getElementById( 'editaCuentaBancaria' ) == null ) { // Alta
        var url = '/api/altaCuentaBancaria';
        var msj = 'agregada';
      } else { // Edicion
        var url = '/api/editaCuentaBancaria';
        var msj = 'actualizada';
        datos.append( 'cuentaBancaria_id' , document.getElementById( 'editaCuentaBancaria' ).value );
      }

      axios.post( url , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
        .then( response => {
         aviso( 'Cuenta ' + msj + ' correctamente' );
         contenidos( 'configuraciones_configuracionesAdicionales' );
        })
        .catch( err => {
         console.log( err );
        });
    }

  });
</script>
