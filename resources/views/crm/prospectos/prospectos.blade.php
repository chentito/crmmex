@extends( 'crm.layout.principal' )

@section( 'seccionHeader' ) 
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Prospectos</span>
        <h3 class="page-title">Listado</h3>
      </div>
    </div>
@endsection

@section( 'seccionContenido' )

<div class="row">
    <div class="col-sm-12">
        <div class="card card-small w-100">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Giro</th>
                            <th>Ejecutivo</th>
                            <th>Fecha Alta</th>
                            <th>M&aacute;s</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>Giro</th>
                            <th>Ejecutivo</th>
                            <th>Fecha Alta</th>
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
        $('#example').DataTable({
            ajax   :{
                url: '/api/listadoProspectos',
                dataSrc: 'prospectos'
            },
            columns: [
                { data: 'razonSocial' },
                { data: 'rfc' },
                { data: 'giro' },
                { data: 'ejecutivo' },
                { data: 'fechaAlta' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>

@endsection

@section( 'seccionFooter' )
    <footer class="main-footer d-flex p-2 px-3 bg-white border-top sticky">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link active" href="/prospecto">Listado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/prospectoAlta">Nuevo Prospecto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/prospectoSeguimiento">Seguimientos</a>
          </li>
        </ul>
        <span class="copyright ml-auto my-auto mr-2"><a href="/home3" rel="nofollow">.:: CRM Mexagon ::.</a></span>
    </footer>
@endsection
