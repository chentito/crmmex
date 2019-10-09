
<div id="listadoProductos_config"></div>
<table id="listadoProductos" class="table table-striped responsive nowrap" style="width:100%"></table>

<div class="row">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="contenidos('configuraciones_catalogos_nuevoProducto')"><i class="fa fa-plus fa-sm"></i> Agregar Producto/Servicio</button>
    <button class="btn btn-sm {{$btn}}" onclick="contenidos('configuraciones_catalogos_productosCargaMasiva')"><i class="fa fa-upload fa-sm"></i> Carga Masiva</button>
  </div>
</div>

<script>
  generaDataGrid( 'listadoProductos' );

  function habilitaProducto( productoID ) {
    axios.post( '/api/eliminaProducto/' + productoID + '/1' , {} , { headers:{ 'Accept' : 'application\json' , 'Authentication' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } })
        .then( response => {
          aviso( 'Producto habilitado correctamente' );
          contenidos( 'configuraciones_catalogos_productos' );
        })
        .catch( error => {
          console.log( error );
        });
  }

</script>
