
<div class="card card-small w-100">
    <div class="card-body">
        <table id="seguimientos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Prospecto/Cliente</th>
                    <th>Contacto</th>
                    <th>Actividad</th>
                    <th>Estado</th>
                    <th>Alta</th>
                    <th>Conclusi&oacute;n</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Prospecto/Cliente</th>
                    <th>Contacto</th>
                    <th>Actividad</th>
                    <th>Estado</th>
                    <th>Fecha Alta</th>
                    <th>Fecha Conclusi&oacute;n</th>
                    <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        var token = sessionStorage.getItem( 'apiToken' );
        $.fn.dataTable.ext.errMode = 'throw';

        $('#seguimientos').DataTable({
            ajax   : {
                url: '/api/listadoSeguimientos',
                dataSrc: 'seguimientos',
                beforeSend: function( request ) {
                  request.setRequestHeader( "Accept" , "application/json" );
                  request.setRequestHeader( "Authorization" , "Bearer " + token );
                }
            },
            columns: [
                { data: 'clienteID' },
                { data: 'contactoID' },
                { data: 'nombreActividad' },
                { data: 'estado' },
                { data: 'fechaAlta' },
                { data: 'fechaEjecucion' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
