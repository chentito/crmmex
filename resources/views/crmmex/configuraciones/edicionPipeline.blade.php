<input type="hidden" name="indicadorID" id="indicadorID" value="{{$param}}">

@include( 'crmmex.configuraciones.pipeline' )

<script>
    cargaDatosIndicador();

    function cargaDatosIndicador() {
        document.querySelector('a[href="#nuevo"]').click();
        var indicadorID = document.getElementById( 'indicadorID' ).value;
        axios.get( '/api/detalleIndicador/' + indicadorID , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer '+ sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                var fases    = new Array();
                sessionStorage.setItem( 'fases'    , JSON.stringify( fases ) );
                var detalles = [];
                sessionStorage.setItem( 'detalles' , JSON.stringify( detalles ) );

                document.getElementById( 'nuevoIndicdor_nombre' ).value = response.data.nombreIndicador;
                document.getElementById( 'grupoProductosPerteneceIndicador' ).value = response.data.grupoID;

                response.data.detalle.forEach( function( e , i ) {
                    document.getElementById( 'nuevoIndicador_fases' ).add( new Option( e.fase, e.fase, false, false ) );
                    var nueva = { fase:e.fase, idty: e.faseID };
                    guardaArraySesion( 'fases' , nueva );
                    var nuevo = {fase:e.fase, detalle:e.detalle, peso:e.peso, proceso:e.proceso, idty: e.idty};
                    guardaArraySesion( 'detalles' , nuevo );
                });

             })
             .catch( err => {
                console.log( err );
             });
    }
</script>
