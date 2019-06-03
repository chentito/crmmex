<div class="card card-small w-100">
    <div class="card-body">
        <table id="campanias" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>URL</th>
                    <th>Fecha Envío</th>
                    <th>Subject</th>
                    <th>Destinatarios</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>URL</th>
                    <th>Fecha Envío</th>
                    <th>Subject</th>
                    <th>Destinatarios</th>
                    <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row pt-2">
    <div class="col-sm-12 text-center"><button class="mt-1 btn btn-sm {{$btn}}" onclick="contenidos('mercadotecnia_campanias')"><i class="fa fa-sm fa-plus"></i> Nueva campaña</button></div>
</div>

<script>
    $(document).ready( function() {
        var token = sessionStorage.getItem( 'apiToken' );
        $.fn.dataTable.ext.errMode = 'throw';
        $('#campanias').DataTable({
            ajax   :{
                url: '/api/listadoCampanias',
                dataSrc: 'campanias',
                beforeSend : function( request ) {
                    request.setRequestHeader( "Accept" , "application/json" );
                    request.setRequestHeader( "Authorization" , "Bearer " + token );
                }
            },
            columns: [
                { data: 'nombre' },
                { data: 'url' },
                { data: 'fechaEnvio' },
                { data: 'subject' },
                { data: 'destinatarios' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
