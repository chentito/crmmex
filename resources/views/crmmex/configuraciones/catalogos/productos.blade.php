<div class="card card-small mb-3">
    <div class="card-body">
        <table id="listadoProductos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categor&iacute;a</th>
                    <th>Periodicidad Pago</th>
                    <th>Tipo</th>
                    <th>Precio Unitario</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Producto</th>
                    <th>Categor&iacute;a</th>
                    <th>Periodicidad Pago</th>
                    <th>Tipo</th>
                    <th>Precio Unitario</th>
                    <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="contenidos('configuraciones_catalogos_nuevoProducto')"><i class="fa fa-plus fa-sm"></i> Agregar Producto/Servicio</button>
  </div>
</div>

<script>
    $(document).ready( function() {
        $('#listadoProductos').DataTable({
            ajax   :{
                url: '/api/listadoProductos',
                dataSrc: 'Productos'
            },
            columns: [
                { data: 'nombre' },
                { data: 'categoria' },
                { data: 'periodicidad' },
                { data: 'tipo' },
                { data: 'precio' },
                { data: 'configuracion' }
            ],
            responsive: true
        });
    });
</script>
