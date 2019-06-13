<input type="hidden" id="edicionUsuariosIdAdmin" name="edicionUsuariosIdAdmin" value="{{$param}}" />

@include( 'crmmex.ejecutivos.nuevo' )

<script>
  function obtieneDatosEjecutivo() {
    var token       = sessionStorage.getItem( 'apiToken' );
    var idEjecutivo = document.getElementById( 'edicionUsuariosIdAdmin' ).value;
    document.getElementById( 'edicionUsuariosID' ).value = idEjecutivo;
    var path        = '/api/datosEjecutivo/' + idEjecutivo;

    var config = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };

    axios( path , config )
        .then( datos => {
            document.getElementById( 'edicionUsuariosNombre' ).value      = datos.data.nombre;
            document.getElementById( 'edicionUsuariosAPaterno' ).value    = datos.data.apPat;
            document.getElementById( 'edicionUsuariosAMaterno' ).value    = datos.data.apMat;
            document.getElementById( 'edicionUsuariosEmail' ).value       = datos.data.email;
            document.getElementById( 'edicionUsuariosComentarios' ).value = datos.data.comentarios;
            document.getElementById( 'edicionUsuariosCalle' ).value       = datos.data.calle;
            document.getElementById( 'edicionUsuariosExterior' ).value    = datos.data.exterior;
            document.getElementById( 'edicionUsuariosInterior' ).value    = datos.data.interior;
            document.getElementById( 'edicionUsuariosColonia' ).value     = datos.data.colonia;
            document.getElementById( 'edicionUsuariosCiudad' ).value      = datos.data.municipio;
            document.getElementById( 'edicionUsuariosEstado' ).value      = datos.data.estado;
            document.getElementById( 'edicionUsuariosCP' ).value          = datos.data.cp;
            document.getElementById( 'edicionUsuariosPais' ).value        = datos.data.pais;
            document.getElementById( 'edicionUsuariosRol' ).value         = datos.data.rol;
            document.getElementById( 'edicionUsuariosExtension' ).value   = datos.data.extension;
        })
        .catch( err => {
            console.log( err );
        });

  }
  obtieneDatosEjecutivo();


</script>
