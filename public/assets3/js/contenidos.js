/*
 * Funciones utiles para la carga de contenidos sobre la plataforma
 * Solicita la vista a traves de una llamada ajax y la asigna al contenedor principal
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Marzo 2019
 */

function contenidos( idContenido , param='' ) {
    abreModal();
    path  = '/contenidos/' + idContenido;
    path += ( param != '' ) ? '/'+param : '';
    axios( path )
        .then( datos => {
            $( '#contenidosPrincipales' ).html( datos.data.body );
            $( '#contenedorBreadCrumb' ).html( datos.data.breadcrumb );
            cierraModal();
        })
        .catch( err => {
            console.error( err );
        });
}

function cargaDatosComboCatalogo() {
    $( 'select' ).each( function() {
        idty = $( this ).attr( 'id' );
        if( idty.substring( 0 , 8 ) === 'catalogo' ) {
            id = idty.split( '_' );
            axios
            .get( '/api/opcionesCombosPorId/' + id[ 1 ] )
            .then(response => {
                response.data.forEach((item) => {
                    $( "#" + $( this ).attr( 'id' ) ).append( '<option value="' + item.id + '">' + item.nombre + '</option>' );
                });
            });
        }
    });
}

function generaToken() {
  if( sessionStorage.getItem("apiToken") === null ) {
    axios
      .get( '/generaToken' )
      .then( response => {
        console.log( 'Token generado...' );
        sessionStorage.setItem( 'apiToken', response.data.apiToken );
      }).
      catch( function( e ){
        console.log( 'ERROR TOKEN ' + e );
      });
  } else {
      console.log( 'Token previamente generado...' );
  }
}

function eliminaToken() {
  var token  = sessionStorage.getItem( 'apiToken' );
  var config = {
    headers: {
      'Accept': 'application/json',
      'Authorization': 'Bearer ' + token
    }
  };
  axios.get( '/api/auth/delToken' , config )
       .then( request => {
         sessionStorage.removeItem( 'apiToken' );
         console.log( 'Token eliminado' );
       })
       .catch( err => {
         console.log( 'Error al eliminar token ' + err );
       });
}

async function utiles( accion ) {
    let promise = axios.get( '/api/utiles/' + accion );
    let result = await promise;
    return result.data;
}

function abreModal() {
    $( '.modal' ).modal( 'show' );
}

function cierraModal() {
    $( '.modal' ).modal( 'hide' );
    $( '#sidebar' ).removeClass( 'active' );
}

async function solicitud( metodo, token, url, datos ) {
  var config  = { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } };
  if( metodo == 'get' ) {
    let promesa = axios.get;
    promesa( url, config );
  } else if( metodo == 'post' ) {
    let promesa = axios.post;
    promesa( url, datos , config );
  }
  let result  = await promesa;
  return result;
}

function aplicaPromo( promoID , monto , input ) {
    if( promoID == '' ) {
      document.getElementById( input ).value = '0.00';
      return monto;
    }
    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/utiles/aplicaPromo/' + promoID + '/' + monto;
    var datos = {};
    var config = {
      headers: {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + token
      }
    };

    axios.post( url , datos , config )
         .then( response => {
           document.getElementById( input ).value = response.data;
         })
         .catch( err => {
           console.log( err );
         });

}
