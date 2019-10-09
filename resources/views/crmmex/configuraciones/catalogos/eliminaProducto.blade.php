<input type="hidden" name="eliminaProductoID" id="eliminaProductoID" value="{{$param}}">

<div class="row">
  <div class="col-sm-12 text-center mt-2">
    <button type="button" name="btnEliminaProdDeshab" id="btnEliminaProdDeshab" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Deshabilitar</button>
    <button type="button" name="btnEliminaProdDelDef" id="btnEliminaProdDelDef" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash"></i> Eliminar definitivamente</button>
  </div>
  <div class="col-sm-12 text-center mt-2">
    <button type="button" name="btnEliminaProdReturn" id="btnEliminaProdReturn" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
  </div>
</div>

<script>
  document.getElementById( 'btnEliminaProdReturn' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'configuraciones_catalogos_productos' );
  });

  document.getElementById( 'btnEliminaProdDeshab' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    cambiaEstadoProducto( 2 );
  });

  document.getElementById( 'btnEliminaProdDelDef' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    cambiaEstadoProducto( 3 );
  });

  function cambiaEstadoProducto( accion ) {
    var productoID = document.getElementById( 'eliminaProductoID' ).value;
    var msj = ( accion == 2 ) ? 'Producto deshabilitado correctamente' : 'Producto eliminado correctamente';
    axios.post( '/api/eliminaProducto/' + productoID + '/' + accion , {} , { headers:{ 'Accept' : 'application\json' , 'Authentication' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } })
        .then( response => {
          aviso( msj );
          contenidos( 'configuraciones_catalogos_productos' );
        })
        .catch( error => {
          console.log( error );
        });
  }
</script>
