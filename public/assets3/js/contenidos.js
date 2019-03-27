/* 
 * Funciones utiles para la carga de contenidos sobre la plataforma
 * Solicita la vista a traves de una llamada ajax y la asigna al contenedor principal
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Marzo 2019
 */

function contenidos( idContenido ) {
    abreModal();
    axios( '/contenidos/' + idContenido )
        .then( datos => {
            $( '#contenidosPrincipales' ).html(  datos.data.body );
            $( '#contenedorBreadCrumb' ).html(  datos.data.breadcrumb );
            cierraModal();
        })
        .catch( err => {
            console.error(err);
        });
}

function abreModal() {
    $( '.modal' ).modal( 'show' );
}

function cierraModal() {
    $( '.modal' ).modal( 'hide' );
}
