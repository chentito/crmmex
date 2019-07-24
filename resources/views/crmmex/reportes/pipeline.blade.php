<div class="row mt-2">

    <div class="col-sm-2">
        Por Indicadores
    </div>
    <div class="col-sm-10">
        <hr>
    </div>

    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">

    </div>
</div>

<script>
    var config = { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
    axios.get( '/api/reporteIndicadores' , config )
         .then( response => {
            var indicador = response.data['indicador'];
            alert( JSON.stringify( response.data[1] ) );
            var DatosClientes   = [];
            var DatosProspectos = [];
            var clientes = response.data[1];
            var prospectos = response.data[2];

            clientes.forEach( function( e ){
                e.detalles.forEach( function( e2 ){
                  alert( e2.tituloDetalle );
                });
            });


         })
         .catch( err => {
           console.log( err );
         });
</script>
