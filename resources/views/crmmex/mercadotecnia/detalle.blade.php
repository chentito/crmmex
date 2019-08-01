
<input type="hidden" id="idCampaniaEdicion" name="idCampaniaEdicion" value="{{$param}}">
@include( 'crmmex.mercadotecnia.campanias' )

<script>

  document.getElementById( 'detalleCampania_id' ).value = document.getElementById( 'idCampaniaEdicion' ).value;
  consultaDatosCampania();

  function consultaDatosCampania() {
      var campaniaID = document.getElementById( 'idCampaniaEdicion' ).value;
      var token      = sessionStorage.getItem( 'apiToken' );
      var url        = '/api/buscaCampania/' + campaniaID;
      var config     = {
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
        }
      };

      axios.post( url , {} , config )
           .then( response => {
              var fecha = response.data.fechaEnvio.split( ' ' );
              var hora  = fecha[ 1 ].split( ':' );
              document.getElementById( 'detalleCampania_nombre' ).value        = response.data.nombre;
              document.getElementById( 'detalleCampania_fechaEnvio' ).value    = fecha[ 0 ];
              document.getElementById( 'detalleCampania_asunto' ).value        = response.data.subject;
              document.getElementById( 'detalleCampania_destinatarios' ).value = response.data.destinatarios;
              document.getElementById( 'detalleCampania_templates' ).value     = response.data.pieza;
              setSelectedIndex( document.getElementById( 'detalleCampania_horaEnvio' ) , hora[ 0 ] );
              setSelectedIndex( document.getElementById( 'detalleCampania_minutoEnvio' ) , hora[ 1 ] );
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
