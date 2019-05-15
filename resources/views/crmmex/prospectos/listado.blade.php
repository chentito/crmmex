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

<script>
    $(document).ready( function() {
        $('#example').DataTable({
            ajax   :{
                url: '/api/listadoProspectos',
                dataSrc: 'prospectos',
                'beforSend' : function( request ) {
                    request.setRequestHeader( "Accept" , "application/json" );
                    request.setRequestHeader( "Authorization" , "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjkxZWY1MTcxYWQxMmIwMzc1MjhhMTJiNWFlYWUzNzFhZmQ0N2ZhNTg2Mzg0NWIxMTVmODBjNDdmNGNiNmRiYmFmYTM3YTQyM2E1NzBjZDAxIn0.eyJhdWQiOiI1IiwianRpIjoiOTFlZjUxNzFhZDEyYjAzNzUyOGExMmI1YWVhZTM3MWFmZDQ3ZmE1ODYzODQ1YjExNWY4MGM0N2Y0Y2I2ZGJiYWZhMzdhNDIzYTU3MGNkMDEiLCJpYXQiOjE1NTc5NTgyMTksIm5iZiI6MTU1Nzk1ODIxOSwiZXhwIjoxNTg5NTgwNjE5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.ap8fVkgdMc8wQXze9cSt9wWicQplF985fnUKQi2_sHSDiGCWJVCQgBb4Jq2cNoK_6JoBYshB65Sdw1Nj-PmQoJyhg_d1neyqt-C3QeGoPQZDwk9jOeLTlpMCxE9vutCn12QMFdl4Q9huhxEK664B_C_pr5O4Hth06tLhP6aMgmXG2myZOB2hv9r58EKl0qqxg71oNGAmHgjjowSX9BXRM12yHCe7oqjYAbKTNaG8dUrM9jTsbAinEKidsQeVh_t8_gYLKlmSZMnipIFkomSwp_gtT5MgHkKwGXdhXoxot93hK_RHFpbJVVIy0RzOmR1wW_QIpEH5APqDnaxVT4Iup3Qnlw8yaHnw5kTWlVOcAftWH-TV-VP18FqR4SCBX1VW5VXYoVvYprFm52CrErwLyXWBq5KYpUqO8Retzd7NdstMIgTsxxNpfsm1l4evmXUW3dvktY3Lh58oyjCb0LeMPrnxFHx8EPuQC-rP5zh7-6K0iaGuDAw4PA4KzRrvxlHmVCQ4ntm_6QFURHwDNm8zXocvZLu5juEvf9P6cgaKi4FdAvxi5VL4_pQGl-N_tQ1FS07lBeZrr-5ORa9wDMhmR73srMdyuC1etkp9BwfKXzMzrh-sUPX8UNMdTyUb99vhObkbOezx5uWiNe3JNUiZc-pyFILoGI_QWLFoTcmRkKs" );
                }
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
