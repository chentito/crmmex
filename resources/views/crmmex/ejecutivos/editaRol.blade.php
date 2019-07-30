
<input type="hidden" id="perfilID" name="perfilID" value={{$param}}>
@include( 'crmmex.ejecutivos.roles' )

<script>
    setTimeout( function(){ document.querySelector('a[href="#home"]').click(); } , 1500 );
    var perfilID = document.getElementById( 'perfilID' ).value;
    axios.get( '/api/detallePerfil/' + perfilID , {headers:{'Accept':'application\json','Authentication':'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
         .then( response => {
              document.getElementById( 'roles_idPerfil' ).value     = response.data.id;
              document.getElementById( 'roles_nombrePerfil' ).value = response.data.rol;
              document.getElementById( 'roles_statusPerfil' ).value = response.data.status;
         })
         .catch( err => {
              console.log( err );
         });
</script>
