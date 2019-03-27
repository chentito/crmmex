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

<script>
    $(document).ready( function() {
        $('#listadoProductos').DataTable({
            ajax   :{
                url: '/api/listadoProductos',
                dataSrc: 'productos'
            },
            columns: [
                { data: 'nombreProducto' },
                { data: 'categoriaProducto' },
                { data: 'periodicidad' },
                { data: 'tipo' },
                { data: 'costo' },
                { data: 'configuracion' }
            ],
            responsive: true
        });
    });
</script>