@extends( 'principales.ventas' )

@section( 'individual' )

<div class="container mt-2 pt-2">
    <table id="listadoPropuestas" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Fecha Env&iacute;o</th>
                <th>Monto</th>
                <th>Descuento</th>
                <th>Observaciones</th>
                <th>Ejecutivo</th>
                <th>Estatus</th>
                <th>M&aacute;s</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Cliente</th>
                <th>Contacto</th>
                <th>Fecha Env&iacute;o</th>
                <th>Monto</th>
                <th>Descuento</th>
                <th>Observaciones</th>
                <th>Ejecutivo</th>
                <th>Estatus</th>
                <th>M&aacute;s</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    $(document).ready( function() {
        $('#listadoPropuestas').DataTable({
            ajax   :{
                url: '/ventas/listadoPropuestas',
                dataSrc: 'propuestas'
            },
            columns: [
                { data: 'cliente' },
                { data: 'contacto' },
                { data: 'fechaEnvio' },
                { data: 'monto' },
                { data: 'descuento' },
                { data: 'observaciones' },
                { data: 'idEjecutivo' },
                { data: 'status' },
                { data: 'opciones',align: 'center' }
            ],
            select: {
                items: 'rows',
                info: false
            }
        });
    });
</script>

@endsection