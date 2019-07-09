
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
              //editor.setEditorValue( response.data.pieza );
              document.getElementById( 'detalleCampania_nombre' ).value         = response.data.nombre;
              //document.getElementById( 'detalleCampania_tipo' ).value           = response.data.tipo;
              document.getElementById( 'detalleCampania_fechaEnvio' ).value     = response.data.fechaEnvio;
              //document.getElementById( 'detalleCampania_landingPage' ).value    = response.data.url;
              //document.getElementById( 'detalleCampania_remitente' ).value      = response.data.from;
              //document.getElementById( 'detalleCampania_remitenteEmail' ).value = response.data.email;
              document.getElementById( 'detalleCampania_asunto' ).value         = response.data.subject;
              document.getElementById( 'detalleCampania_destinatarios' ).value  = response.data.destinatarios;
              document.getElementById( 'detalleCampania_templates' ).value      = response.data.pieza;
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
