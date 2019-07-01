
<input type="hidden" id="propuestaID" name="propuestaID" value="{{$param}}" />
<input type="hidden" id="clienteID" name="clienteID" value="" />

<div class="row">

  <div class="col-sm-12 text-center"><h6 id="textoEnvioPropuesta"></h6></div>

  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" id="btnRegresarListadoPropuestas"><i class="fa fa-undo fa-sm"></i> Regresar</button>
    <button class="btn btn-sm {{$btn}}" id="btnEnviarPropuesta"><i class="fa fa-paper-plane fa-sm"></i> Enviar</button>
  </div>

</div>

<script>

  datosPropuesta();

  document.getElementById( 'btnRegresarListadoPropuestas' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
  });

  document.getElementById( 'btnEnviarPropuesta' ).addEventListener( 'click' , function( e ){
      e.preventDefault();

  });

  function datosPropuesta() {
      var token = sessionStorage.getItem( 'apiToken' );
      var url   = '/api/obtieneDatosPropuesta/' + document.getElementById( 'propuestaID' ).value;
      var config = {
          headers:{
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token
          }
      };

      axios.get( url , config )
           .then( response => {
              document.getElementById( 'clienteID' ).value = response.data.cliente;
              var msj = 'La propuesta se enviará a ' + response.data.contactoTxt;
              document.getElementById( 'textoEnvioPropuesta' ).innerHTML = msj;
            })
           .catch( err => {
              console.log( err );
           });
  }

  function enviaPropuesta() {
    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/enviaPropuesta/' + document.getElementById( 'propuestaID' ).value;
    var config = {
        headers:{
          'Accept' : 'application/json',
          'Authorization' : 'Bearer ' + token
        }
    };

    axios.get( url , config )
         .then( response => {
            contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
          })
         .catch( err => {
            console.log( err );
         });
  }

</script>
