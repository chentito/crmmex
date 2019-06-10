<h4><span id="propuestaIdty"></span></h4>
<input type="hidden" id="propuestaID" name="propuestaID" value="{{$param}}">

@include( 'crmmex.clientes.propuesta' )

<script>
  datosPropuesta();
  function datosPropuesta() {
    var token       = sessionStorage.getItem( 'apiToken' );
    var propuestaID = document.getElementById( 'propuestaID' ).value;
    var url         = '/api/obtieneDatosPropuesta/' + propuestaID;
    var config      = {
        headers: {
          "Accept" : "application/json",
          "Authorization" : "Bearer " + token
        }
    };
    comboContactos();

    axios.get( url , config )
         .then( response => {
           document.getElementById( 'clienteID' ).value                = response.data.cliente;
           comboContactos( response.data.cliente );
           document.getElementById( 'catalogo_15' ).value              = response.data.formaPago;
           document.getElementById( 'propuesta_contactos' ).value      = response.data.contactoID;
           document.getElementById( 'propuesta_requerimientos' ).value = response.data.requerimientos;
           document.getElementById( 'propuesta_observaciones' ).value  = response.data.observaciones;
           document.getElementById( 'catalogo_18' ).value              = response.data.categoria;
           document.getElementById( 'propuestaIdty' ).value            = response.data.id;
           document.getElementById( 'propuesta_monto' ).value          = response.data.monto;
           document.getElementById( 'propuesta_descuento' ).value      = response.data.descuento;
           document.getElementById( 'propuesta_promocion' ).value      = response.data.promocion;
           document.getElementById( 'propuestaIdty' ).innerHTML        = 'Edicion propuesta comercial # ' + response.data.id;
         })
         .catch( err => {
           console.log( err );
         });
  }
</script>
