<input type="hidden" id="formularioID" name="formularioID" value="{{$param}}">

@include( 'crmmex.configuraciones.formularios' )

<script>
  axios.get( '/api/editaFormulario/' + document.getElementById( 'formularioID' ).value , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      var datos = response.data;
      document.getElementById( 'formularios_nombreForm' ).value = datos.nombreForm;
      document.getElementById( 'formularios_idForm' ).value     = datos.idForm;
      datos.campos.forEach( function( e , i ) {
        if( i == 0 ) {
          document.getElementById( 'formularios_campoID' ).value      = e.id;
          document.getElementById( 'formularios_nombreCampo' ).value  = e.nombre;
          document.getElementById( 'formularios_tipoCampo' ).value    = e.tipo;
          document.getElementById( 'formularios_oblCampo' ).value     = e.obligatoriedad;
          document.getElementById( 'formularios_valCampo' ).value     = e.validacion;
          document.getElementById( 'formularios_valoresCampo' ).value = e.valores;
        } else {
          axios.get('/api/formsNuevoCampo/'+e.id+'/'+e.nombre+'/'+e.tipo+'/'+e.obligatoriedad+'/'+e.validacion+'/'+e.valores , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}})
            .then( response => {
              $( '#contenedorCamporFormulario' ).append( response.data.contenido );
            })
            .catch( err => {
              console.log( err );
            });
        }
      });
    })
    .catch( err => {
      console.log( err );
    });

   setTimeout( function(){ document.querySelector('a[href="#profile"]').click(); } , 500 );
</script>
