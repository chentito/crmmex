/* 
 * Funcionalidades necesarias para diversas secciones del sistema
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */

/*******************
 * CONFIGURACIONES GENERALES
 ******************/
function cargaCatalogosAdmin() {
    axios
        .get( '/api/listadoCatalogos' )
        .then( response => {
            response.data.forEach( ( item ) => {
                html  = '<div class="col-sm-3 mb-2">';
                    html += '<div class="card card-small">';
                        html += '<div class="card-header"><h6>' + item.nombre + '</h6></div>';
                        html += '<div class="card-body">';
                            html += '<select class="custom-select custom-select-sm" multiple="multiple" id="comboListado_' + item.id + '">';
                            item.opciones.forEach( ( item2 ) => {
                                html += '<option value="' + item2.idOP + '">' + item2.nombreOP + '</option>';
                            });
                            html += '</select>';
                        html += '</div>';
                        html += '<div class="card-footer text-right">';
                            html += '<button class="btn btn-sm {{$btn}}" data-toggle="modal" data-target="#modalAltaCatalogo" data-catalogo="' 
                                 + item.nombre + '" data-whatever="'+item.id+'"><i class="fa fa-plus fa-sm"></i></button>';
                            html += '<button class="btn btn-sm {{$btn}} ml-1" data-toggle="modal" data-target="#modalEliminaOpcion" data-catalogo="' 
                                 + item.nombre + '" data-whatever="'+item.id+'"><i class="fa fa-times fa-sm"></i></button>';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
                $( '#contenedorCatalogosConfig' ).append( html );
            });
        });
}

function configuracionesGenerales() {
    $( '#modalEliminaOpcion' ).on( 'show.bs.modal' , function( event ){
        var button    = $(event.relatedTarget);
        var opciones = button.data('whatever');
        var nCatalogo = button.data('catalogo');
        var val = '';
        $('#comboListado_'+opciones+' :selected').each(function(i, sel) {
            val += $(sel).text() + ' ';
        });
        var modal = $(this);
        val = ( val == '' ) ? 'No ha seleccionado ninguna opcion a eliminar' : "Desea eliminar la opcion(es) "+val+" del catálogo " + nCatalogo;
        modal.find('.modal-body').text( val );
        //modal.find('#idOpcion').val(idty);
    });

    $( '#modalAltaCatalogo' ).on( 'show.bs.modal' , function ( event ) {
        var button    = $(event.relatedTarget);
        var recipient = button.data('whatever');
        var nCatalogo = button.data('catalogo');
        var modal     = $(this);
        modal.find('.modal-title').text(nCatalogo);
        modal.find('#id_categoria').val(recipient);
    });

    $( '#modalAltaCatalogo' ).on( 'hidden.bs.modal' , function (e) {
        $("#nombre_opcion_categoria").val("");
        $("#id_categoria").val("");
    });

    $( '#btnGuardaOpcionCategoria' ).click( function() {
        $.get( '/api/agregaOpcionCatalogo' , { 'id':$( '#id_categoria' ).val() , 'opcion':$( '#nombre_opcion_categoria' ).val() } , function(e) {
            $("#nombre_opcion_categoria").val("");
            contenidos( 'configuraciones_catalogos_generales' );
        });
    });

    $( '#btnEliminaOpcionCategoria' ).click( function(){

    });
}

$(document).ready(function() {
    
});
