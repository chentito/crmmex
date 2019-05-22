/*
 * Funcionalidades JS para las peticiones al API desarrollada
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */


 /* Funcion que realiza la peticion a una accion del api */
 async function mexagonApiRequest( url , token ) {
    //var token  = sessionStorage.getItem( 'apiToken' );
    var result = '';
    var config = {
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer ' + token
        }
    };

    let solicitud = await axios( url , config )
                  .then ( response => { result =  response.data; } )
                  .catch( err => { console.log( 'MexagonErrRequest ' + err ); } );

    return result;
 }
