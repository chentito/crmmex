
<input type="hidden" name="editaPromoID" id="editaPromoID" value="{{$param}}">

@include('crmmex.configuraciones.promociones')

<script>

    cargaDatosPromocion();

    function cargaDatosPromocion() {
      var promoID = document.getElementById( 'editaPromoID' ).value;
      axios.get( '/api/detallePromocion/' + promoID )
           .then( response => {
                var datos = response.data;
                document.getElementById( 'promociones_id' ).value             = datos.id
                document.getElementById( 'promociones_nombre' ).value         = datos.nombreDescuento
                document.getElementById( 'promociones_tipo' ).value           = datos.tipoDescuento
                document.getElementById( 'promociones_cantidad' ).value       = datos.cantidad
                document.getElementById( 'promociones_inicioVigencia' ).value = datos.inicioVigencia
                document.getElementById( 'promociones_finVigencia' ).value    = datos.finVigencia;
           })
           .catch( err => {
             console.log( err );
           });
    }

    setTimeout( function(){ document.querySelector('a[href="#profile"]').click(); } , 1500 );
</script>
