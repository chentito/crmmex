
<h4>Producto ID {{$param}} <span id="nombreProducto"></span></h4>
<input type="hidden" id="idProductoEditar" name="idProductoEditar" value="{{$param}}">

@include( 'crmmex.configuraciones.catalogos.nuevoProducto' )

<script>
  document.getElementById( 'confProductos_id' ).value = document.getElementById( 'idProductoEditar' ).value;
  var productoID = document.getElementById( 'confProductos_id' ).value;
  var path       = '/api/obtieneProducto/' + productoID;
  var config     = { headers: { 'Accept':'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
  axios( path , config )
    .then( datos => {
      d = datos.data;
      document.getElementById( 'confProductos_clave' ).value               = d.clave;
      document.getElementById( 'confProductos_nombre' ).value              = d.nombre;
      document.getElementById( 'confProductos_descripcion' ).value         = d.descripcion;
      document.getElementById( 'catalogo_8' ).value                        = d.periodicidad;
      document.getElementById( 'catalogo_9' ).value                        = d.tipo;
      document.getElementById( 'catalogo_12' ).value                       = d.grupo;
      document.getElementById( 'confProductos_precio' ).value              = d.precio;
      document.getElementById( 'confProductos_marca' ).value               = d.marca;
      document.getElementById( 'confProductos_modelo' ).value              = d.modelo;
      if( d.impuesto != '0' && d.impuesto != '16' && d.impuesto != '8' ) {
          document.getElementById( 'confProductos_tasaTrasladosOtra' ).value= d.impuesto;
        } else {
          document.getElementById( 'confProductos_tasaTraslados' ).value   = d.impuesto;
      }
      document.getElementById( 'confProductos_tasaRetencionesOtra' ).value = d.impuestoRetencion;
      document.getElementById( 'catalogo_10' ).value                       = d.divisa;
      document.getElementById( 'confProductos_status' ).value              = d.status;
      adicionales = datos.data.adicionales;
      cargaCamposAdicionales( '3' , adicionales );
      setSelectedIndex( document.getElementById( 'catalogo_8' )  , d.periodicidad );
      setSelectedIndex( document.getElementById( 'catalogo_9' )  , d.tipo );
      setSelectedIndex( document.getElementById( 'catalogo_12' ) , d.grupo );
    });

</script>
