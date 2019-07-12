<form id="form_alta_expediente" name="form_alta_expediente">
    <input type="hidden" name="expediente_id" id="expediente_id" value="0">
    <input type="hidden" name="idsContactos" id="idsContactos" value="" />

    <div style="position:absolute; right: 10px; z-index: 900">
      <button id="btnGuardaExpediente" class="btn btn-sm {{$btn}}"><i class="fa fa-users fa-lg">save</i><span class="d-none d-sm-inline">  Guardar</span></button>
    </div>

    <div class="row">
        {{ csrf_field() }}
        <div class="col-sm-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Contacto</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="fa fa-briefcase fa-sm"></i><span class="d-none d-sm-inline">  Razón Social</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                        <i class="fa fa-address-book fa-sm"></i><span class="d-none d-sm-inline">  Dirección</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="adicionales-tab" data-toggle="tab" href="#adicionales" role="tab" aria-controls="adicionales" aria-selected="false">
                        <i class="fa fa-paperclip fa-sm"></i><span class="d-none d-sm-inline">  Campos Adicionales</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="adicionales" role="tabpanel" aria-labelledby="adicionales-tab">
                    <div class="container border-left border-bottom border-right p-1">
                        <div class="row" id="camposAdicionalesContainer">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container border-left border-bottom border-right p-1" id="contenedorContactos">
                      <div class="row">
                          <div class="col-sm-2">
                            <b>Contacto Principal</b>
                          </div>
                          <div class="col-sm-10">
                              <hr>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_nombre">Nombre(s)</label>
                              <input type="text" id="contacto_nombre" name="contacto_nombre[]" class="form-control form-control-sm" value="" placeholder="Nombre(s)">
                              <input type="hidden" id="contacto_idty" name="contacto_idty[]" value="">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_paterno">Apellido Paterno</label>
                              <input type="text" id="contacto_paterno" name="contacto_paterno[]" class="form-control form-control-sm" value="" placeholder="Apellido Paterno">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_materno">Apellido Materno</label>
                              <input type="text" id="contacto_materno" name="contacto_materno[]" class="form-control form-control-sm" value="" placeholder="Apellido Materno">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_email">Correo Electrónico</label>
                              <input type="text" id="contacto_email" name="contacto_email[]" class="form-control form-control-sm" value="" placeholder="Correo Electr&oacute;nico">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_celular">No. Celular</label>
                              <input type="text" id="contacto_celular" name="contacto_celular[]" class="form-control form-control-sm" value="" placeholder="Celular" maxlength="10">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_celular_compania">Compañia</label>
                              <select id="contacto_celular_compania" name="contacto_celular_compania[]" class="custom-select custom-select-sm">
                                  <option value="1">AT&T</option>
                                  <option value="2">Telcel</option>
                                  <option value="3">Unefon</option>
                                  <option value="4">Movistar</option>
                              </select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_telefono">Teléfono</label>
                              <input type="text" id="contacto_telefono" name="contacto_telefono[]" class="form-control form-control-sm" value="" placeholder="Tel&eacute;fono" maxlength="10">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_extension">Extensión</label>
                              <input type="text" id="contacto_extension" name="contacto_extension[]" class="form-control form-control-sm" value="" placeholder="Extensi&oacute;n">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_area">Área</label>
                              <select id="contacto_area" name="contacto_area[]" class="custom-select custom-select-sm">
                                  <option value="1">Finanzas</option>
                                  <option value="2">Ventas</option>
                                  <option value="3">TI</option>
                                  <option value="4">Administraci&oacute;n</option>
                                  <option value="5">Recursos Humanos</option>
                              </select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_puesto">Puesto</label>
                              <input type="text" id="contacto_puesto" name="contacto_puesto[]" class="form-control form-control-sm" value="" placeholder="Puesto">
                          </div>
                          <div class="col-sm-3 mb-1"></div>
                          <div class="col-sm-3 mb-1 text-center my-auto">
                            <button class="btn btn-sm {{$btn}}" id="btnAgregaEstructuraCliente"><i class="fa fa-user-plus fa-lg"></i><span class="d-none d-sm-inline"> Agregar otro contacto</span></button>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container border-left border-bottom border-right p-1">
                      <div class="row">
                          <div class="col-sm-6 mb-1">
                              <label for="cliente_razon_social">Raz&oacute;n Social</label>
                              <input type="text" id="cliente_razon_social" name="cliente_razon_social" class="form-control form-control-sm" placeholder="Compa&ntilde;&iacute;a">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="cliente_rfc">RFC</label>
                              <input type="text" id="cliente_rfc" name="cliente_rfc" class="form-control form-control-sm" placeholder="RFC" onchange="validaRFC(this.value)" maxlength="13">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_5">Giro</label>
                              <select id="catalogo_5" name="catalogo_5" class="custom-select custom-select-sm"></select>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_1">Categoría</label>
                              <select id="catalogo_1" name="catalogo_1" class="custom-select custom-select-sm"></select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_2">Sub-Categoría</label>
                              <select id="catalogo_2" name="catalogo_2" class="custom-select custom-select-sm"></select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_3">Medio de Contacto</label>
                              <select id="catalogo_3" name="catalogo_3" class="custom-select custom-select-sm"></select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_4">Empleados</label>
                              <select id="catalogo_4" name="catalogo_4" class="custom-select custom-select-sm"></select>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6 mb-1">
                              <label for="catalogo_2">Observaciones</label>
                              <textarea class="form-control" id="cliente_observaciones" name="cliente_observaciones"></textarea>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_11">Cuenta</label>
                              <select id="cliente_tipo" name="cliente_tipo" class="custom-select custom-select-sm">
                                  <!--option value="2">Prospecto</option-->
                                  <option value="1">Cliente</option>
                              </select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_11">Grupo</label>
                              <select id="cliente_grupo" name="cliente_grupo" class="custom-select custom-select-sm">
                                  <option value="1">Ocasional</option>
                                  <option value="2">Frecuente</option>
                                  <option value="3">VIP</option>
                              </select>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="container border-left border-bottom border-right p-1">
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_calle">Calle</label>
                              <input type="text" id="direccion_calle" name="direccion_calle" class="form-control form-control-sm" placeholder="Calle">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_no_exterior">No. Exterior</label>
                              <input type="text" id="direccion_no_exterior" name="direccion_no_exterior" class="form-control form-control-sm" placeholder="No.Exterior">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_no_interior">No. Interior</label>
                              <input type="text" id="direccion_no_interior" name="direccion_no_interior" class="form-control form-control-sm" placeholder="No.Interior">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_colonia">Colonia</label>
                              <input type="text" id="direccion_colonia" name="direccion_colonia" class="form-control form-control-sm" placeholder="Colonia">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_cp">CP</label>
                              <input type="text" id="direccion_cp" name="direccion_cp" class="form-control form-control-sm" placeholder="Codigo Postal">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_delegacion">Delegación</label>
                              <input type="text" id="direccion_delegacion" name="direccion_delegacion" class="form-control form-control-sm" placeholder="Delegacion/Municipio">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_ciudad">Ciudad</label>
                              <input type="text" id="direccion_ciudad" name="direccion_ciudad" class="form-control form-control-sm" placeholder="Ciudad">
                          </div>
                          <div class="col-sm-3 mb-1"></div>
                      </div>
                      <div class="row">
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_pais">País</label>
                              <select id="direccion_pais" name="direccion_pais" class="custom-select custom-select-sm">
                              </select>
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="direccion_estado">Estado</label>
                              <select id="direccion_estado" name="direccion_estado" class="custom-select custom-select-sm">
                              </select>
                          </div>
                          <div class="col-sm-3 mb-1"></div>
                          <div class="col-sm-3 mb-1"></div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(function () {

        cargaDatosComboCatalogo();
        if( $( '#idCargaInfo' ).length == 0 ) {
            cargaCamposAdicionales( '1' );
        }

        $('#myTab a').on( 'click', function ( e ) {
            e.preventDefault();
            $( this ).tab( 'show' );
        });

        $( '#btnGuardaExpediente' ).click( function( e ) {
            e.preventDefault();
            guardaInfoExpediente();
        });

        $( '#btnAgregaEstructuraCliente' ).button().click( function( e ) {
            e.preventDefault();
            agregaEstructuraContacto();
          });
    });

    function guardaInfoExpediente() {
        var token = sessionStorage.getItem( 'apiToken' );
        var datos = $( '#form_alta_expediente' ).serialize();
        var mov   = '';
        if( $( '#idCargaInfo' ).length == 0 ) {
          var ruta  = '/api/altaExpediente';
          mov = 'alta';
        } else {
          var ruta  = '/api/editaExpediente';
          mov = 'edicion';
        }

        $.ajaxSetup({ headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer ' + token
          }
        });
        $.ajax({
            type  : "post",
            url   : ruta,
            data  : datos,
            cache : false,
            beforeSend : function() {},
            success : function(d) {
                aviso( 'Cliente actualizado correctamente' );
                if( mov == 'alta' ) {
                    contenidos( 'clientes_listado' );
                } else {
                    contenidos( 'clientes_edicion' , $( '#idCargaInfo' ).val() );
                }
            },
            error : function() {}
        });
    }

    function agregaEstructuraContacto(nom='',idty='',appat='',apmat='',correo='',celular='',compania='',tel='',ext='',area='',puesto='') {
        ruta  = '/estructuraContacto/';
        ruta += ( nom!='' )      ? nom+'/'      : '';
        ruta += ( idty!='' )     ? idty+'/'     : '';
        ruta += ( appat!='' )    ? appat+'/'    : '';
        ruta += ( apmat!='' )    ? apmat+'/'    : '';
        ruta += ( correo!='' )   ? correo+'/'   : '';
        ruta += ( celular!='' )  ? celular+'/'  : '';
        ruta += ( compania!='' ) ? compania+'/' : '';
        ruta += ( tel!='' )      ? tel+'/'      : '';
        ruta += ( ext!='' )      ? ext+'/'      : '';
        ruta += ( area!='' )     ? area+'/'     : '';
        ruta += ( puesto!='' )   ? puesto+'/'   : '';
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            type       : "get",
            url        : ruta,
            cache      : false,
            beforeSend : function() {},
            success    : function( d ) {
                $( "#contenedorContactos" ).append( d );
            },
            error : function() { }
        });
    }

    async function comboEstados() {
        $( '#direccion_estado' ).empty();
        let promise = axios.get( '/api/utiles/comboEstados' );
        let result = await promise;
        result.data.forEach( ( item ) => {
            $( '#direccion_estado' ).append( '<option value="'+item.id+'">'+item.entidad+'</option>' );
        });
    }
    comboEstados();

    async function comboPaises() {
        $( '#direccion_pais' ).empty();
        let promise2 = axios.get( '/api/utiles/comboPaises' );
        let result2 = await promise2;
        result2.data.forEach( ( item ) => {
            $( '#direccion_pais' ).append( '<option value="'+item.id+'">'+item.nombre+'</option>' );
        });
    }
    comboPaises();

    async function validaRFC( rfc ) {
      if( rfc.length == 12 || rfc.length == 13 ) {
        let promise3 = axios.get( '/api/validaRFC/' + rfc );
        let result3  = await promise3;
        if( result3.data > 0 ) {

        }
      }
    }
</script>
