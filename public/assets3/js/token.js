/*
 * Creacion del token de acceso
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */
 async function generaToken() {
   if( sessionStorage.getItem("apiToken") === null ) {
     try{
            const response = await axios.get("/generaToken");
            const data = await response.json();
            sessionStorage.setItem( 'apiToken', data.apiToken );
       } catch( error ) {
            console.log( 'ERROR TOKEN ' + e );
     }
     /*axios
       .get( '/generaToken' )
       .then( response => {
         console.log( 'Token generado...' );

       }).
       catch( function( e ){
         console.log( 'ERROR TOKEN ' + e );
       });*/
   } else {
       console.log( 'Token previamente generado...' );
   }
 }
