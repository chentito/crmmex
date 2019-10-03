<h5><span id="propuestaIdty"></span></h5>
<input type="hidden" id="propuestaID" name="propuestaID" value="{{$param}}">

@include( 'crmmex.prospectos.propuesta' )

<script>
  datosPropuesta();
  function datosPropuesta() {
    var token       = sessionStorage.getItem( 'apiToken' );
    var propuestaID = document.getElementById( 'propuestaID' ).value;
    var url         = '/obtieneDatosPropuesta/' + propuestaID;
    var config      = { headers: { "Accept" : "application/json", "Authorization" : "Bearer " + token } };

    axios.get( url , config )
      .then( response => {
        document.getElementById( 'clienteID' ).value                = response.data.cliente;
        document.getElementById( 'propuesta_identificador' ).value  = response.data.propuestaIDTY;
        document.getElementById( 'propuesta_contactos' ).value      = response.data.contactoID;
        document.getElementById( 'propuesta_requerimientos' ).value = response.data.requerimientos;
        document.getElementById( 'propuesta_observaciones' ).value  = response.data.observaciones;
        document.getElementById( 'catalogo_12' ).value              = response.data.categoriaID;
        document.getElementById( 'propuesta_fechaVigencia' ).value  = response.data.fechaVigencia;
        document.getElementById( 'propuesta_ordenCompra' ).value    = response.data.ordenCompra;
        document.getElementById( 'propuesta_monto' ).value          = response.data.monto;
        document.getElementById( 'propuesta_total' ).value          = response.data.total;
        document.getElementById( 'propuesta_descuento' ).value      = response.data.descuento;
        document.getElementById( 'propuesta_promocion' ).value      = response.data.promocion;
        document.getElementById( 'propuestaIdty' ).innerHTML        = 'Propuesta comercial # ' + response.data.id;
        document.getElementById( 'pID' ).value                      = document.getElementById( 'propuestaID' ).value;
        comboContactos( response.data.cliente , response.data.contacto );
        comboProductos( response.data.categoriaID );
        setSelectedIndex( document.getElementById( 'catalogo_12' ) , response.data.categoriaID );

        var tabla = document.getElementById( 'containerProductosPropuesta' ).getElementsByTagName( 'tbody' )[ 0 ];
        response.data.detalle.forEach( function( e , i ) {
          var renglon = tabla.insertRow();
          renglon.insertCell(0).appendChild( document.createTextNode( e.productoTxt ) );
          renglon.insertCell(1).appendChild( document.createTextNode( e.cantidad ) );
          renglon.insertCell(2).appendChild( document.createTextNode( e.unitario ) );
          var importe = ( e.unitario * e.cantidad );
          renglon.insertCell(3).appendChild( document.createTextNode( importe.toFixed( 2 ) ) );
          renglon.insertCell(4).innerHTML = '<button type="button" class="btn btn-sm" onclick="eliminaRenglon(event,this,\''+e.productoID+'\')"><i class="fa fa-trash fa-sm"></i></button>';
          var porcTraslado = ( e.traslados / 100 ) * importe;
          document.getElementById( 'propuesta_traslados' ).value   = parseInt( document.getElementById( 'propuesta_traslados' ).value ) + porcTraslado;
          var porcRet = ( e.retenciones / 100 ) * importe;
          document.getElementById( 'propuesta_retenciones' ).value = parseInt( document.getElementById( 'propuesta_retenciones' ).value ) + porcRet;
          axios.post( '/carritoCarga/' + propuestaID , {} , {headers:{'Accept':'application/json','Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) }} );
        });
      })
      .catch( err => {
        console.log( err );
      });
  }
</script>
