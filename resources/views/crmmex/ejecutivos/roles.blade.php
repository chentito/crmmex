<div class="row mb-2">
    <div class="col-sm-3">Seleccione Rol</div>
    <div class="col-sm-3">
        <select class="custom-select custom-select-sm" id="catRoles">
            <option value="-">Seleccione una opción</option>
            <option value="0">Nuevo Rol</option>
        </select>
    </div>
</div>

<div class="row"><div class="col-sm-12"><hr /></div></div>

<div class="row" id="rolDetalleContenedor"></div>

<script>
    $(function() {
        $( '#catRoles' ).change( function() {
            if( $(this).val() == '-' ) return false;
            if( $(this).val() > 0 ) {
                datosRoles( $(this).val() , ($(this).val() == 1) ? '' : 'C' );
            } else {
                datosRoles( 'N' , 'C' );
            }
        });
        datosRoles('','');
        roles();
    });

    function datosRoles( idRol , s ) {
        $( '#rolDetalleContenedor' ).html( '' );
        url  = ( ( idRol == '' || idRol == 'N' ) ?  '/api/configuracionRoles' : '/api/configuracionRoles/'+idRol );
        axios
            .get( url )
            .then( response => {
                response.data.forEach( ( elemento ) => {
                    html = '<div class="col-sm-3 mb-2">';
                        html += '<div class="card card-small">';
                            html += '<div class="card-header">'+elemento.nombre+'</div>';
                            html += '<div class="card-body">';
                                html += '<ul class="list-group list-group-flush">';
                                elemento.secciones.forEach( ( secc ) => {
                                    estado  = ( ( s == '' ) ? ' disabled="disabled" ' : '' );
                                    checado = ( ( secc.privilegio == '1' ) ? 'checked="checked"' : ''  );
                                    html += '<li class="list-group-item">';
                                    html += '<input class="form-check-input" type="checkbox" id="rolCheck_'+secc.id+'" '+estado+' '+checado+'>';
                                    html += '<label class="form-check-label" for="rolCheck_'+secc.id+'">'+secc.nombre+'</label>';
                                    html += '</li>';
                                });
                                html += '</ul>';
                            html += '</div>';
                        html += '</div>';
                    html += '</div>';
                    $( '#rolDetalleContenedor' ).append( html );
                });

                if( idRol != '' && idRol != 1 ) {
                    btn = '<div class="col-sm-12 text-center"><button class="btn btn-sm {{$btn}}">Guardar rol</button></div>';
                    $( '#rolDetalleContenedor' ).append( btn );
                }
            });
    }

    function roles() {
        url = '/api/rolesDisponibles';
        axios
            .get( url )
            .then( response => {
                response.data.forEach( ( elemento ) => {
                    html  = '<option value="'+elemento.idty+'">'+elemento.nombre+'</option>';
                    $( '#catRoles' ).append( html );
                });
            });
    }
</script>
