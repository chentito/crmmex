
<input type="hidden" id="perfilID" name="perfilID" value={{$param}}>
@include( 'crmmex.ejecutivos.roles' )

<script>
    setTimeout( function(){ document.querySelector('a[href="#home"]').click(); } , 1000 );
    var perfilID = document.getElementById( 'perfilID' ).value;
    var conf  = {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
    axios.get( '/api/detallePerfil/' + perfilID , conf )
          .then( response => {
            document.getElementById( 'roles_idPerfil' ).value     = response.data.id;
            document.getElementById( 'roles_nombrePerfil' ).value = response.data.rol;
            document.getElementById( 'roles_statusPerfil' ).value = response.data.status;
          })
          .catch( err => {
            console.log( err );
          });
</script>
