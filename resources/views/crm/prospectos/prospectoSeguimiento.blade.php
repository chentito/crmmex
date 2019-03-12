@extends( 'crm.layout.principal' )

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Prospectos</span>
        <h3 class="page-title">Seguimiento</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )

<div class="row">
    <div class="col-sm-12">
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
    </div>
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
            responsive: true
        });
    });
</script>

@endsection

@section( 'seccionFooter' )
    @include( 'crm.prospectos.prospectoFooter' )
@endsection

