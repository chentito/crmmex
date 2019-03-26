
@extends( 'principales.prospectos' )

@section( 'individual' )

<div class="container mt-2 pt-2">
    
    <table id="seguimientos" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
            <tr>
                <th>Prospecto/Cliente</th>
                <th>Contacto</th>
                <th>Actividad</th>
                <th>Estado</th>
                <th>Fecha Alta</th>
                <th>Fecha Conclusi&oacute;n</th>
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

<script>
    $(document).ready( function() {
        $('#seguimientos').DataTable({
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
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>

@endsection

