<h5><span id="clienteIdty"></span></h5>

<input type="hidden" id="idClienteElimnar" name="idClienteElimnar" value="{{$param}}">
<div class="row">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" id="btnDeshabilitaCliente" value="2">Deshabilitar</button>
    <button class="btn btn-sm {{$btn}}" id="btnEliminaCliente" value="3">Eliminar definitivamente</button>
  </div>
</div>

<div class="row mt-3">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" id="btnRegresaListadoClientes">Regresar al listado</button>
  </div>
</div>

<script>
  cargaNombre();

  document.getElementById( 'btnRegresaListadoClientes' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    regresarListadoClientes();
  });

  document.getElementById( 'btnDeshabilitaCliente' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    eliminaCliente( 2 );
  });

  document.getElementById( 'btnEliminaCliente' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    eliminaCliente( 3 );
  });

  function regresarListadoClientes() {
    contenidos( 'clientes_listado' );
  }

  function eliminaCliente( mov ) {
      var token     = sessionStorage.getItem( 'apiToken' );
      var clienteID = document.getElementById( 'idClienteElimnar' ).value;
      var url       = '/api/eliminaCliente/' + clienteID + '/' + mov;
      var config    = {
        headers:{
          'Accept' : 'application/json',
          'Authorization' : 'Bearer ' + token
        }
      };

      axios.post( url , {} , config )
           .then( response => {
             aviso( 'Cliente ' + ( ( mov==2 ) ? 'deshabilitado' : 'eliminado' ) + ' correctamente' );
             contenidos( 'clientes_listado' );
           })
           .catch( err => {
             console.log( err );
           });
  }

  function cargaNombre() {
      var token  = sessionStorage.getItem( 'apiToken' );
      var url    = '/api/clienteIdty/' + document.getElementById( 'idClienteElimnar' ).value;
      var config = {
        headers: {
          "Accept" : "application/json",
          "Authorization" : "Bearer " + token
        }
      };

      axios.post( url , {} , config )
           .then( response => {
              document.getElementById( 'clienteIdty' ).innerHTML = response.data;
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
