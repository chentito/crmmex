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
            $( '#contenidosPrincipales' ).html( datos.data.body );
            $( '#contenedorBreadCrumb' ).html( datos.data.breadcrumb );
            cierraModal();
        })
        .catch( err => {
            console.error(err);
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

function abreModal() {
    $( '.modal' ).modal( 'show' );
}

function cierraModal() {
    $( '.modal' ).modal( 'hide' );
    $( '#sidebar' ).removeClass( 'active' );
}
