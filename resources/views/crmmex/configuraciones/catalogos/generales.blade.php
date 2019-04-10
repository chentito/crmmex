
<div class="row" id="contenedorCatalogosConfig">
</div>

<div class="modal fade" id="modalAltaCatalogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_alta_opcion_catalogo" name="frm_alta_opcion_catalogo">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Opción a agregar:</label>
                    <input type="text" class="form-control" id="nombre_opcion_categoria">
                    <input type="hidden" class="form-control" id="id_categoria">
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="btnGuardaOpcionCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEliminaOpcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_alta_opcion_catalogo" name="frm_alta_opcion_catalogo">
                    <input type="hidden" class="form-control" id="idOpcion">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="btnGuardaOpcionCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
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
                                html += '<button class="btn btn-sm {{$btn}}" data-toggle="modal" data-target="#modalAltaCatalogo" data-catalogo="' + item.nombre + '" data-whatever="'+item.id+'"><i class="fa fa-plus fa-sm"></i></button>';
                                html += '<button class="btn btn-sm {{$btn}} ml-1" data-toggle="modal" data-target="#modalEliminaOpcion" data-idty="'+item.idOP+'" data-catalogo="' + item.nombre + '" data-whatever="'+item.id+'"><i class="fa fa-times fa-sm"></i></button>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    $( '#contenedorCatalogosConfig' ).append( html );
                });
            });
    }
    cargaCatalogosAdmin();
    
    $(document).ready(function() {
        $( '#modalEliminaOpcion' ).on( 'show.bs.modal' , function( event ){
            var button    = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var nCatalogo = button.data('catalogo');
            var idty      = button.data('idty');
            var modal = $(this);
            modal.find('.modal-title').text( "Desea eliminar la opcion " + recipient + " del catálogo " + nCatalogo );
            modal.find('#idOpcion').val(idty);
        });
    
        $( '#modalAltaCatalogo' ).on( 'show.bs.modal' , function ( event ) {
            var button    = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var nCatalogo = button.data('catalogo');
            var modal = $(this);
            modal.find('.modal-title').text(nCatalogo);
            modal.find('#id_categoria').val(recipient);
        });

        $( '#modalAltaCatalogo' ).on( 'hidden.bs.modal' , function (e) {
            $("#nombre_opcion_categoria").val("");
            $("#id_categoria").val("");
        });

        $( '#btnGuardaOpcionCategoria' ).click( function() {
            $.get( '/api/agregaOpcionCatalogo' , { 'id':$( '#id_categoria' ).val() , 'opcion':$( '#nombre_opcion_categoria' ).val() } , function(e){
                $("#nombre_opcion_categoria").val("");
                contenidos( 'configuraciones_catalogos_generales' );
            });
        });
    });
    
</script>
