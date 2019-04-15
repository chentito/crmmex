<div class="card card-small w-100">
    <div class="card-body">
        <table id="seguimientosCli" class="table table-striped table-bordered" style="width:100%">
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
    <div class="card-footer">
        <div class="text-center">
            <button class="btn btn-sm {{$btn}}" id="abreAltaSeguimiento"><i class="fa fa-plus fa-lg"></i> Agregar Actividad</button>
        </div>
    </div>
</div>
<script>
    $(document).ready( function() {
        $('#seguimientosCli').DataTable({
            ajax   :{
                url: '/api/listadoSeguimientos',
                dataSrc: 'seguimientos'
            },
            columns: [
                { data: 'cliente' },
                { data: 'contacto' },
                { data: 'actividad' },
                { data: 'estado' },
                { data: 'fechaAlta' },
                { data: 'fechaFin' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>