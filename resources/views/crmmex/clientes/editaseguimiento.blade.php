<h4><span id="nombreSeguimiento"></span></h4>
<input type="hidden" name="seguimientoID" id="seguimientoID" value="{{$param}}">
<input type="hidden" name="edicionSeguimiento" id="edicionSeguimiento" value="edicion">

@include( 'crmmex.clientes.nuevoseguimiento' )

<script>
    document.getElementById( 'btnGuardaSeguimiento' ).outerHTML = "";
    var token  = sessionStorage.getItem( 'apiToken' );
    var segID  = document.getElementById( 'seguimientoID' ).value;
    var path   = '/api/obtieneSeguimiento/' + segID;
    var config = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };
    axios( path , config )
      .then( datos => {
          d = datos.data;
          document.getElementById( 'seguimiento_idty' ).value                   = d.segID;
          document.getElementById( 'prospectos_nuevoseguimiento_titulo' ).value = d.titulo;
          document.getElementById( 'prospectos_nuevoseguimiento_fecha' ).value  = d.fechaEjecucion;
          document.getElementById( 'catalogo_16' ).value                        = d.tipo;
          document.getElementById( 'catalogo_17' ).value                        = d.estado;
          document.getElementById( 'prospectos_nuevoseguimiento_texto' ).value  = d.descripcion;
          document.getElementById( 'clienteID' ).value                          = d.clienteID;
          cargaContactos( d.contacto );
          nombreSeguimiento();
      })
      .catch( err => {
          console.error( err );
      });

      btnGuardaActualizacion = document.getElementById( 'btnActualizaSeguimiento' );
      btnGuardaActualizacion.addEventListener( 'click' , function( e ) {
          e.preventDefault();
          guardaSeguimiento();
      });

      function nombreSeguimiento() {
        var token        = sessionStorage.getItem( 'apiToken' );
        var nSeguimiento = document.getElementById( 'seguimientoID' ).value;
        var url          = '/api/seguimientoIdty/' + nSeguimiento;
        var config       = {
          headers: {
            'Accept' : 'application/json',
            'Authorization' : 'Bearer ' + token
          }
        };

        axios.post( url , {} , config )
             .then( response => {
                document.getElementById( 'nombreSeguimiento' ).innerHTML = response.data;
             })
             .catch( err => {
               console.log( err );
             });

      }

</script>
