Listado de propuestas del cliente {{$param}}

<input type="hidden" id="clienteID" name="clienteID" value="{{$param}}">
<div class="card card-small w-100">
    <div class="card-body">
        <table id="listadoPropuestas" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ejecutivo</th>
                    <th>Cliente</th>
                    <th>Contacto</th>
                    <th>Fecha Envio</th>
                    <th>Observaciones</th>
                    <th>Monto</th>
                    <th>Descuento</th>
                    <th>Promoción</th>
                    <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Ejecutivo</th>
                  <th>Cliente</th>
                  <th>Contacto</th>
                  <th>Fecha Envio</th>
                  <th>Observaciones</th>
                  <th>Monto</th>
                  <th>Descuento</th>
                  <th>Promoción</th>
                  <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="row mt-1">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('clientes_listado')"><i class="fa fa-undo-alt fa-lg"></i> Regresar</button>
    <button class="btn btn-sm {{$btn}}" id="abreAltaPropuesta"><i class="fa fa-plus fa-lg"></i> Agregar Propuesta</button>
  </div>
</div>
<script>
    $(document).ready( function() {
        clienteID = document.getElementById( 'clienteID' ).value;
        $('#listadoPropuestas').DataTable({
            "lengthMenu" : [[8, 16, 24, -1], [8, 16, 24, "All"]],
            ajax   :{
                url: '/api/listadoPropuestas/' + clienteID,
                dataSrc: 'propuestas'
            },
            columns: [
                { data: 'id' },
                { data: 'ejecutivo' },
                { data: 'cliente' },
                { data: 'contacto' },
                { data: 'fechaEnvio' },
                { data: 'observaciones' },
                { data: 'monto' },
                { data: 'descuento' },
                { data: 'promocion' },
                { data: 'opciones',align: 'center', "width": "50px", }
            ],
            responsive: true
        });

        /* Evento para abrir la alta de propuestas */
        $( '#abreAltaPropuesta' ).click( function(){
            contenidos( 'clientes_propuesta' , clienteID );
        });
    });
</script>
