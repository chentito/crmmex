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
           //document.getElementById( 'catalogo_15' ).value              = response.data.formaPago;
           document.getElementById( 'propuesta_identificador' ).value  = response.data.propuestaIDTY;
           document.getElementById( 'propuesta_contactos' ).value      = response.data.contactoID;
           document.getElementById( 'propuesta_requerimientos' ).value = response.data.requerimientos;
           document.getElementById( 'propuesta_observaciones' ).value  = response.data.observaciones;
           document.getElementById( 'catalogo_18' ).value              = response.data.categoria;
           document.getElementById( 'propuesta_fechaVigencia' ).value  = response.data.fechaVigencia;
           document.getElementById( 'propuesta_monto' ).value          = response.data.monto;
           document.getElementById( 'propuesta_total' ).value          = response.data.total;
           document.getElementById( 'propuesta_descuento' ).value      = response.data.descuento;
           document.getElementById( 'propuesta_promocion' ).value      = response.data.promocion;
           document.getElementById( 'propuestaIdty' ).innerHTML        = 'Propuesta comercial # ' + response.data.id;
           document.getElementById( 'pID' ).value                      = document.getElementById( 'propuestaID' ).value;
           comboContactos( response.data.cliente , response.data.contactoID );

           response.data.detalle.forEach( function( e , i ){
              $( '#formIndividual' ).show( 'slow' );
              document.getElementById( 'propuesta_cantidad' ).value                 = e.cantidad;
              document.getElementById( 'propuesta_precio' ).value                   = e.unitario;
              document.getElementById( 'propuesta_observaciones_producto' ).value   = e.comentarios;
              document.getElementById( 'catalogo_12' ).value                        = e.grupoID;
              comboProductos( e.grupoID , e.productoID );
              document.getElementById( 'listadoProductosPropuestaComercial' ).value = e.productoID;
           });

         })
         .catch( err => {
           console.log( err );
         });
  }
</script>
