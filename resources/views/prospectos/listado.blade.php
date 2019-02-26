
<div class="container mt-2 pt-2">
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direcci&oacute;n</th>
                <th>Correo</th>
                <th>Tel&eacute;fono</th>
                <th>Compa&ntilde;&iacute;a</th>
                <th>M&aacute;s</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Compa&ntilde;ia</th>
                <th>M&aacute;s</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    $(document).ready( function() {
        $('#example').DataTable({
            ajax   :{
                url: '/prospectos/listado',
                dataSrc: 'prospectos'
            },
            columns: [
                { data: 'name' },
                { data: 'position' },
                { data: 'salary' },
                { data: 'start_date' },
                { data: 'office' },
                { data: 'extn' }
            ],
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>