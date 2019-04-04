
<div class="row" id="contenedorCatalogosConfig">
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
                                html += '<button class="btn btn-sm {{$btn}}"><i class="fa fa-plus fa-sm"></i></button>';
                                html += '<button class="btn btn-sm {{$btn}} ml-1"><i class="fa fa-times fa-sm"></i></button>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    $( '#contenedorCatalogosConfig' ).append( html );
                });
            });
    }
    cargaCatalogosAdmin();
</script>
