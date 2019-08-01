<h5><span id="nombreSeguimiento"></span></h5>
<input type="hidden" name="seguimientoID" id="seguimientoID" value="{{$param}}">
<input type="hidden" name="edicionSeguimiento" id="edicionSeguimiento" value="edicion">

@include( 'crmmex.prospectos.nuevoseguimiento' )

<script>
    document.getElementById( 'btnGuardaSeguimiento' ).outerHTML = "";
    var segID  = document.getElementById( 'seguimientoID' ).value;
    axios.get( '/api/obtieneSeguimiento/' + segID , { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
      .then( datos => {
          d = datos.data;
          document.getElementById( 'seguimiento_idty' ).value                    = d.segID;
          document.getElementById( 'prospectos_nuevoseguimiento_titulo' ).value  = d.titulo;
          document.getElementById( 'prospectos_nuevoseguimiento_fecha' ).value   = d.fechaEjecucion;
          setSelectedIndex( document.getElementById( 'prospectos_nuevoseguimiento_hora' ) , d.horaEjecucion );
          document.getElementById( 'prospectos_nuevoseguimiento_minutos' ).value = d.minutoEjecucion;
          document.getElementById( 'catalogo_16' ).value                         = d.tipo;
          document.getElementById( 'catalogo_17' ).value                         = d.estado;
          document.getElementById( 'prospectos_nuevoseguimiento_texto' ).value   = d.descripcion;
          document.getElementById( 'clienteID' ).value                           = d.clienteID;
          cargaContactos( d.contacto );
          nombreSeguimiento();
      })
      .catch( err => {
          console.error( err );
      });

      document.getElementById( 'btnActualizaSeguimiento' ).addEventListener( 'click' , function( e ) {
          e.preventDefault();
          guardaSeguimiento();
      });

      function nombreSeguimiento() {
        var nSeguimiento = document.getElementById( 'seguimientoID' ).value;
        var url          = '/api/seguimientoIdty/' + nSeguimiento;

        axios.post( url , {} , { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                document.getElementById( 'nombreSeguimiento' ).innerHTML = response.data;
             })
             .catch( err => {
               console.log( err );
             });

      }

</script>
