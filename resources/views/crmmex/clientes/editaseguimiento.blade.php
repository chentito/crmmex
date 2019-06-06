
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
          document.getElementById( 'prospectos_nuevoseguimiento_tipo' ).value   = d.tipo;
          document.getElementById( 'prospectos_nuevoseguimiento_estado' ).value = d.estado;
          document.getElementById( 'prospectos_nuevoseguimiento_texto' ).value  = d.descripcion;
          document.getElementById( 'clienteID' ).value                          = d.clienteID;
          cargaContactos( d.contacto );
      })
      .catch( err => {
          console.error( err );
      });

      btnGuardaActualizacion = document.getElementById( 'btnActualizaSeguimiento' );
      btnGuardaActualizacion.addEventListener( 'click' , function( e ) {
          e.preventDefault();
          guardaSeguimiento();
      });

</script>
