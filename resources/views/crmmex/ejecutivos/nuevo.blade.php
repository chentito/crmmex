
<input type="hidden" id="usuarioID" name="usuarioID" value="{{$param}}">

@include( 'crmmex.ejecutivos.listado' )

<script>

  document.querySelector('a[href="#profile"]').click();

  var usuarioID = document.getElementById( 'usuarioID' ).value;
  axios.get( '/api/datosEjecutivo/' + usuarioID , { headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
       .then( response => {
          var datos = response.data;
          document.getElementById( 'edicionUsuariosID' ).value               = datos.id;
          document.getElementById( 'edicionUsuariosNombre' ).value           = datos.nombre;
          document.getElementById( 'edicionUsuariosAPaterno' ).value         = datos.apPat;
          document.getElementById( 'edicionUsuariosAMaterno' ).value         = datos.apMat;
          document.getElementById( 'edicionUsuariosEstatus' ).value          = datos.active;
          document.getElementById( 'edicionUsuariosEmail' ).value            = datos.email;
          document.getElementById( 'edicionUsuariosContrasena' ).value       = "";
          document.getElementById( 'edicionUsuariosRepiteContrasena' ).value = "";
          document.getElementById( 'edicionUsuariosRol' ).value              = datos.rol;
          document.getElementById( 'edicionUsuariosExtension' ).value        = datos.extension;
          document.getElementById( 'edicionUsuariosComentarios' ).value      = datos.comentarios;
       })
       .catch( err => {
          console.log( err );
       });

</script>
