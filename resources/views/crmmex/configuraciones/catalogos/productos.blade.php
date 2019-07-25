
<div id="listadoProductos_config"></div>
<table id="listadoProductos" class="table table-striped responsive nowrap" style="width:100%"></table>

<div class="row">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="contenidos('configuraciones_catalogos_nuevoProducto')"><i class="fa fa-plus fa-sm"></i> Agregar Producto/Servicio</button>
  </div>
</div>

<script>
  generaDataGrid( 'listadoProductos' );
</script>
