
<h3>Producto ID {{$param}} <span id="nombreProducto"></span></h3>

<input type="hidden" id="idProductoEditar" name="idProductoEditar" value="{{$param}}">

@include( 'crmmex.configuraciones.catalogos.nuevoProducto' )

<script>

    document.getElementById( 'confProductos_id' ).value = document.getElementById( 'idProductoEditar' ).value;
    productoID = document.getElementById( 'confProductos_id' ).value;
    path       = '/api/obtieneProducto/' + productoID;
    axios( path )
      .then( datos => {
          d = datos.data;
          document.getElementById( 'confProductos_clave' ).value       = d.clave;
          document.getElementById( 'confProductos_nombre' ).value      = d.nombre;
          document.getElementById( 'confProductos_descripcion' ).value = d.descripcion;
          document.getElementById( 'catalogo_8' ).value                = d.periodicidad;
          document.getElementById( 'catalogo_9' ).value                = d.tipo;
          document.getElementById( 'catalogo_13' ).value               = d.categoria;
          document.getElementById( 'catalogo_12' ).value               = d.grupo;
          document.getElementById( 'confProductos_precio' ).value      = d.precio;
          document.getElementById( 'catalogo_14' ).value               = d.impuesto;
          document.getElementById( 'catalogo_10' ).value               = d.divisa;
      });

</script>
