<input type="hidden" name="editaCuentaBancaria" id="editaCuentaBancaria" value="{{$param}}">

@include( 'crmmex.configuraciones.altaCuentaBancaria' )

<script>
  axios.get( '/api/obtieneCuentaBancaria/' + document.getElementById( 'editaCuentaBancaria' ).value , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        document.getElementById( 'catalogo_19' ).value = response.data.bancoID;
        document.getElementById( 'altaCuentaBancaria_nombreCuenta' ).value = response.data.nombreCuenta;
        document.getElementById( 'altaCuentaBancaria_numeroCuenta' ).value = response.data.numeroCuenta;
      })
      .catch( err => {
        console.log( err );
      });
</script>
