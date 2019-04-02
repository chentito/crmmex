
<div class="card card-small mb-3">
    <div class="card-body">
        <table id="administradores" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Extensi&oacute;n</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Extensi&oacute;n</th>
                    <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        $('#administradores').DataTable({
            ajax   :{
                url: '/api/listadoEjecutivos',
                dataSrc: 'administradores'
            },
            columns: [
                { data: 'nombres' },
                { data: 'appat' },
                { data: 'apmat' },
                { data: 'email' },
                { data: 'rol' },
                { data: 'extension' },
                { data: 'opciones',align: 'center' }
            ],
            responsive: true
        });
    });
</script>
