
<div class="container mt-2 pt-2">
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
        <tbody>
           
        </tbody>
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

<script>
    $(document).ready( function() {
        $('#example').DataTable({
            ajax   :{
                url: '/productos/listado',
                dataSrc: 'productos'
            },
            columns: [
                { data: 'nombreProducto' },
                { data: 'categoriaProducto' },
                { data: 'periodicidad' },
                { data: 'tipo' },
                { data: 'costo' },
                { data: 'configuracion' }
            ]
        });
    });
</script>