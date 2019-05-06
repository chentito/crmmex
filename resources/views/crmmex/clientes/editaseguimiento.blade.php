
<input type="hidden" name="seguimientoID" id="seguimientoID" value="{{$param}}">
<input type="hidden" name="edicionSeguimiento" id="edicionSeguimiento" value="edicion">

@include( 'crmmex.clientes.nuevoseguimiento' )

<script>
    document.getElementById( 'btnGuardaSeguimiento' ).outerHTML = "";
    segID = document.getElementById( 'seguimientoID' ).value;
    path  = '/api/obtieneSeguimiento/' + segID;
    axios( path )
      .then( datos => {
          d = datos.data;
          document.getElementById( 'seguimiento_idty' ).value                         = d.segID;
          document.getElementById( 'prospectos_nuevoseguimiento_titulo' ).value       = d.titulo;
          document.getElementById( 'prospectos_nuevoseguimiento_fecha' ).value        = d.fechaEjecucion;
          document.getElementById( 'prospectos_nuevoseguimiento_tipo' ).value         = d.tipo;
          document.getElementById( 'prospectos_nuevoseguimiento_estado' ).value       = d.estado;
          document.getElementById( 'prospectos_nuevoseguimiento_texto' ).value        = d.descripcion;
          document.getElementById( 'clienteID' ).value                                = d.clienteID;
          cargaContactos();
          document.getElementById( 'prospectos_nuevoseguimiento_involucrados' ).value = d.contacto;
      })
      .catch( err => {
          console.error( err );
      });

      $( '#btnActualizaSeguimiento' ).click( function( e ){
          e.preventDefault();
          guardaSeguimiento();
      });
</script>
