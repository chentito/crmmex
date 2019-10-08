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
                    <a class="nav-link" id="adicionales-tab" data-toggle="tab" href="#adicionales" role="tab" aria-controls="adicionales" aria-selected="false">
                        <i class="fa fa-chart-line fa-sm"></i><span class="d-none d-sm-inline">  Seguimiento a propuestas</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="adicionales" role="tabpanel" aria-labelledby="adicionales-tab">
                    <div class="{{$container}} border-left border-bottom border-right p-1">
                        <div id="contendorPipeline"></div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="{{$container}} border-left border-bottom border-right p-1" >
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
                          <input type="hidden" id="contacto_celular_compania" name="contacto_celular_compania[]" value="">
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_telefono">Teléfono</label>
                              <input type="text" id="contacto_telefono" name="contacto_telefono[]" class="form-control form-control-sm" value="" placeholder="Tel&eacute;fono" maxlength="10">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="contacto_extension">Extensión</label>
                              <input type="text" id="contacto_extension" name="contacto_extension[]" class="form-control form-control-sm" value="" placeholder="Extensi&oacute;n">
                          </div>
                          <div class="col-sm-3 mb-1 text-center my-auto">
                            <button class="btn btn-sm {{$btn}}" id="btnAgregaEstructuraCliente"><i class="fa fa-user-plus fa-lg"></i><span class="d-none d-sm-inline"> Agregar otro contacto</span></button>
                          </div>
                      </div>
                      <div class="row" id="containerCamposAdicionalesContactos"></div>
                      <div class="row" id="contenedorContactos"></div>
                      <div class="row mt-2">
                        <div class="col-sm-2">
                          <b>Producto de interés</b>
                        </div>
                        <div class="col-sm-10">
                          <hr>
                        </div>
                        <div class="col-sm-12">
                            <select class="custom-select custom-select-sm" name="cliente_producto_interes" id="cliente_producto_interes"></select>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-2">
                          <b>Campos Adicionales</b>
                        </div>
                        <div class="col-sm-10">
                          <hr>
                        </div>
                      </div>
                      <div class="row" id="containerCamposAdicionalesClientes">
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="{{$container}} border-left border-bottom border-right p-1">
                      <div class="row">
                          <div class="col-sm-6 mb-1">
                              <label for="cliente_razon_social">Raz&oacute;n Social</label>
                              <input type="text" id="cliente_razon_social" name="cliente_razon_social" class="form-control form-control-sm" placeholder="Compa&ntilde;&iacute;a">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="cliente_rfc">RFC</label>
                              <input type="text" id="cliente_rfc" name="cliente_rfc" class="form-control form-control-sm" placeholder="RFC" onkeyup="validaRFC(this.value);this.value = this.value.toUpperCase();" maxlength="13">
                              <input type="hidden" id="statusValidacionRFC" name="statusValidacionRFC" value="-1">
                          </div>
                          <div class="col-sm-3 mb-1">
                              <label for="catalogo_11">Cuenta</label>
                              <select id="cliente_tipo" name="cliente_tipo" class="custom-select custom-select-sm">
                                  <!--option value="2">Prospecto</option-->
                                  <option value="1">Cliente</option>
                              </select>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-6 mb-1">
                              <label for="catalogo_2">Observaciones</label>
                              <textarea class="form-control" id="cliente_observaciones" name="cliente_observaciones" rows="1"></textarea>
                          </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-sm-2">
                          <b>Dirección</b>
                        </div>
                        <div class="col-sm-10">
                          <hr>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_calle">Calle</label>
                            <input type="text" id="direccion_calle" name="direccion_calle" class="form-control form-control-sm" placeholder="Calle">
                        </div>
                        <div class="col-sm-2 mb-1">
                            <label for="direccion_no_exterior">No. Exterior</label>
                            <input type="text" id="direccion_no_exterior" name="direccion_no_exterior" class="form-control form-control-sm" placeholder="No.Exterior">
                        </div>
                        <div class="col-sm-2 mb-1">
                            <label for="direccion_no_interior">No. Interior</label>
                            <input type="text" id="direccion_no_interior" name="direccion_no_interior" class="form-control form-control-sm" placeholder="No.Interior">
                        </div>
                        <div class="col-sm-2 mb-1">
                            <label for="direccion_cp">CP</label>
                            <input type="text" id="direccion_cp" name="direccion_cp" class="form-control form-control-sm" placeholder="Codigo Postal">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_colonia">Colonia</label>
                            <input type="text" id="direccion_colonia" name="direccion_colonia" class="form-control form-control-sm" placeholder="Colonia">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_delegacion">Delegación</label>
                            <input type="text" id="direccion_delegacion" name="direccion_delegacion" class="form-control form-control-sm" placeholder="Delegacion/Municipio">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_ciudad">Ciudad</label>
                            <input type="text" id="direccion_ciudad" name="direccion_ciudad" class="form-control form-control-sm" placeholder="Ciudad">
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_estado">Estado</label>
                            <select id="direccion_estado" name="direccion_estado" class="custom-select custom-select-sm"></select>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <label for="direccion_pais">País</label>
                            <select id="direccion_pais" name="direccion_pais" class="custom-select custom-select-sm">
                            </select>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="{{$container}} border-left border-bottom border-right p-1"></div>
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
            cargaCamposAdicionales( '4' );
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
            agregaEstructuraContacto( [] , true );
          });
    });

  function guardaInfoExpediente() {
    var token = sessionStorage.getItem( 'apiToken' );
    var datos = new FormData( document.getElementById( 'form_alta_expediente' ) );
    if( $( '#idCargaInfo' ).length == 0 ) {
      var ruta  = '/api/altaExpediente';
      var mov = 'alta';
    } else {
      var ruta  = '/api/editaExpediente';
      var mov = 'edicion';
    }

    if( document.getElementById( 'contacto_nombre' ).value == '' ) {
      aviso( 'No ha proporcionado el nombre del contacto' , false );
      document.querySelector('a[href="#home"]').click();
      document.getElementById( 'contacto_nombre' ).focus();
    } else if( document.getElementById( 'contacto_email' ).value == '' || !correoElectronicoRx.test( document.getElementById( 'contacto_email' ).value ) ) {
      aviso( 'No ha proporcionado un correo electrónico válido para el contacto' , false );
      document.querySelector('a[href="#home"]').click();
      document.getElementById( 'contacto_email' ).focus();
    } else if( document.getElementById( 'cliente_producto_interes' ).value == '' ) {
      document.querySelector('a[href="#home"]').click();
      aviso( 'No ha proporcionado el producto de interes para el cliente' , false );
      document.getElementById( 'cliente_producto_interes' ).focus();
    } else if( document.getElementById( 'cliente_razon_social' ).value == '' ) {
      aviso( 'No ha proporcionado la razón social para el cliente' , false );
      document.querySelector('a[href="#profile"]').click();
      document.getElementById( 'cliente_razon_social' ).focus();
    } else if( document.getElementById( 'cliente_rfc' ).value == '' || !rfcRx.test( document.getElementById( 'cliente_rfc' ).value ) ) {
      aviso( 'No ha proporcionado un RFC valido para el cliente' , false );
      document.querySelector('a[href="#profile"]').click();
      document.getElementById( 'cliente_rfc' ).focus();
    } else if( document.getElementById( 'statusValidacionRFC' ).value == '-1' ) {
      aviso( 'Se está validando la disponibilidad del RFC, espere por favor.' );
    } else if( document.getElementById( 'statusValidacionRFC' ).value > 0 ) {
      aviso( 'El RFC ya se encuentra registrado.' , false );
    } else {
      axios.post( ruta , datos , { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } } )
        .then( response => {
          aviso( 'Cliente actualizado correctamente' );
          if( mov == 'alta' ) {
            contenidos( 'clientes_listado' );
          } else {
            contenidos( 'clientes_edicion' , $( '#idCargaInfo' ).val() );
          }
        })
        .catch( err => {
          console.log( err );
        });
    }
  }

  function agregaEstructuraContacto( b=[] , nuevo=false ) {
    var token = sessionStorage.getItem( 'apiToken' );
    var datos = new FormData();
    datos.append( 'idty'        , ( nuevo ) ? '' : b.idty );
    datos.append( 'nombre'      , ( nuevo ) ? '' : b.nombre );
    datos.append( 'appat'       , ( nuevo ) ? '' : b.apellidoPaterno );
    datos.append( 'apmat'       , ( nuevo ) ? '' : b.apellidoMaterno );
    datos.append( 'correo'      , ( nuevo ) ? '' : b.correoElectronico );
    datos.append( 'celular'     , ( nuevo ) ? '' : b.celular );
    datos.append( 'telefono'    , ( nuevo ) ? '' : b.telefono );
    datos.append( 'extension'   , ( nuevo ) ? '' : b.extension );
    datos.append( 'adicionales' , ( nuevo ) ? '{}' : JSON.stringify( b.adicionales[ 'adicionales' ] , null ) );

    axios.post( '/api/estructuraContacto' , datos , { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } } )
      .then( response => {
        $( "#contenedorContactos" ).append( response.data );
      })
      .catch( err => {
        console.log( err );
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

  async function comboProductos( grupo='' , producto='' ) {
    $( '#cliente_producto_interes' ).empty();
    document.getElementById( 'cliente_producto_interes' ).add( new Option( '-' , '' ) );
    var filtro = ( grupo != '' ) ? '/' + grupo : '';
    let promise = axios.get( '/api/utiles/listadoProductosServicios' + filtro );
    let result = await promise;
    result.data.forEach( ( item ) => {
      var selected = ( ( producto != '' ) ? ( ( producto == item.id ) ? true : false ) : false );
      document.getElementById( 'cliente_producto_interes' ).add( new Option( item.nombre , item.id , false , selected ) );
    });
  }
  comboProductos();

  function validaRFC( rfc ) {
    if( rfc.length == 12 || rfc.length == 13 ) {
      aviso( 'Validando estatus RFC...' );
      axios.get( '/api/validaRFC/' + rfc )
          .then( response => {
            if( response.data == 0 ) {
              document.getElementById( 'statusValidacionRFC' ).value = '0';
              aviso( 'El RFC no ha sido registrado anteriormente' );
            } else {
              aviso( 'El RFC ya fué registrado' , false );
              document.getElementById( 'statusValidacionRFC' ).value = '1';
            }
          })
          .catch( err => {
            console.log( err );
          });
    }
  }

</script>
