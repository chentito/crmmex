<div class="card card-small w-100">
    <div class="card-body">
        <table id="clientes22" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>ID Factura</th>
                  <th>ID Cliente</th>
                  <th>ID Propuesta</th>
                  <th>Monto</th>
                  <th>Fecha Emision</th>
                  <th>Status</th>
                  <th>M&aacute;s</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                  <th>ID Factura</th>
                  <th>ID Cliente</th>
                  <th>ID Propuesta</th>
                  <th>Monto</th>
                  <th>Fecha Emision</th>
                  <th>Status</th>
                  <th>M&aacute;s</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
  <div class="col-sm-12 text-center">
      <form id="formTest" name="formTest">
          <label for="field1">Campo no. 1</label>
          <input type="text" id="field1" name="field1" class="form-control">
          <br>
          <label for="field1">Campo no. 2</label>
          <input type="text" id="field2" name="field2" class="form-control">
          <br>
          <label for="field1">Campo no. 3</label>
          <input type="text" id="field3" name="field3" class="form-control">
          <br>
          <button id="botonDeEjemplo" class="btn btn-sm btn-info" >Ejemplo</button>
      </form>
  </div>
</div>

<script>
    var boton = document.getElementById( 'botonDeEjemplo' );
    boton.addEventListener( 'click' , function( e ){
        e.preventDefault();
        ejecutaFuncion();
    });

    function ejecutaFuncion() {
      var data = new FormData( document.getElementById('formTest') );
      alert(data['field1']);
      alert(data['field2']);
      alert(data['field3']);
    }
</script>

<script>
    $(document).ready( function() {
        var token = sessionStorage.getItem( 'apiToken' );
        $('#clientes22').DataTable({
            ajax   :{
                url: '/api/listadoFacturas',
                dataSrc: 'facturas',
                beforeSend: function( request ) {
                  request.setRequestHeader( 'Accept' , 'application/json' );
                  request.setRequestHeader( 'Authorization' , 'Bearer ' + token );
                }
            },
            columns: [
                { data: 'facturaID' },
                { data: 'clienteID' },
                { data: 'propuestaID' },
                { data: 'monto' },
                { data: 'fechaEmision' },
                { data: 'status' },
                { data: 'opciones' }
            ],
            responsive: true
        });
    });
</script>
