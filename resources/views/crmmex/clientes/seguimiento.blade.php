
<h4><span id="clienteIdty"></span></h4>
<input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">

<div id="listadoSeguimientos_config"></div>
<table id="listadoSeguimientos" class="table table-striped table-bordered" style="width:100%"></table>

<div class="row mt-1">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('clientes_listado')"><i class="fa fa-undo-alt fa-lg"></i> Regresar</button>
    <button class="btn btn-sm {{$btn}}" id="abreAltaSeguimiento"><i class="fa fa-plus fa-lg"></i> Agregar Seguimiento</button>
  </div>
</div>
<script>
    $( document ).ready( function() {
        var clienteID = document.getElementById( 'clienteID' ).value;
        generaDataGrid( 'listadoSeguimientos' , clienteID );
        cargaNombre();
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
