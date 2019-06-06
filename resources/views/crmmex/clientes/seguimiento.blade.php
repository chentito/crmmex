<div class="card card-small w-100">
    <h4><span id="clienteIdty"></span></h4>
    <input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">
    <div class="card-body">
        <table id="seguimientosCli" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>

                    <th>Contacto</th>
                    <th>Actividad</th>
                    <th>Tipo</th>
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

                  <th>Contacto</th>
                  <th>Actividad</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Alta</th>
                  <th>Conclusi&oacute;n</th>
                  <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row mt-1">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('clientes_listado')"><i class="fa fa-undo-alt fa-lg"></i> Regresar</button>
    <button class="btn btn-sm {{$btn}}" id="abreAltaSeguimiento"><i class="fa fa-plus fa-lg"></i> Agregar Seguimiento</button>
  </div>
</div>
<script>
    $( document ).ready( function() {
        var token     = sessionStorage.getItem( 'apiToken' );
        var clienteID = document.getElementById( 'clienteID' ).value;
        $.fn.dataTable.ext.errMode = 'throw';

        $('#seguimientosCli').DataTable({
            ajax   : {
                url: '/api/listadoSeguimientos/'+clienteID,
                dataSrc: 'seguimientos',
                beforeSend: function( request ) {
                  request.setRequestHeader( "Accept" , "application/json" );
                  request.setRequestHeader( "Authorization" , "Bearer " + token );
                  cargaNombre();
                }
            },
            columns: [
              //  { data: 'clienteID' },
                { data: 'contactoID' },
                { data: 'nombreActividad' },
                { data: 'tipoActividad' },
                { data: 'estado' },
                { data: 'fechaAlta' },
                { data: 'fechaEjecucion' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });

    function cargaNombre() {
        var token  = sessionStorage.getItem( 'apiToken' );
        var url    = '/api/clienteIdty/' + document.getElementById( 'clienteID' ).value;
        var config = {
          headers: {
            "Accept" : "application/json",
            "Authorization" : "Bearer " + token
          }
        };

        axios.post( url , {} , config )
             .then( response => {
                document.getElementById( 'clienteIdty' ).innerHTML = response.data;
             })
             .catch( err => {
               console.log( err );
             });
    }

    document.getElementById( 'abreAltaSeguimiento' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        contenidos( "clientes_nuevoseguimiento" , document.getElementById( 'clienteID' ).value );
    });

</script>
