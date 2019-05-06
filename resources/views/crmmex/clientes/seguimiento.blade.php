<div class="card card-small w-100">
    <h3>Cliente ID {{$param}} <span id="nombreCliente"></span></h3>
    <input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">
    <div class="card-body">
        <table id="seguimientosCli" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cliente</th>
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
                  <th>Cliente</th>
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
        clienteID = document.getElementById( 'clienteID' ).value;
        $('#seguimientosCli').DataTable({
            ajax   : {
                url: '/api/listadoSeguimientos/'+clienteID,
                dataSrc: 'seguimientos'
            },
            columns: [
                { data: 'clienteID' },
                { data: 'contactoID' },
                { data: 'nombreActividad' },
                { data: 'tipoActividad' },
                { data: 'status' },
                { data: 'fechaAlta' },
                { data: 'fechaEjecucion' },
                { data: 'opciones' }
            ],
            responsive: true
        });

        $( '#abreAltaSeguimiento' ).click(function( e ) {
            e.preventDefault();
            contenidos( "clientes_nuevoseguimiento" , clienteID );
        });
    });
</script>
