<form id="form_alta_productoservicio" name="form_alta_productoservicio">

  <input type="hidden" id="confProductos_id" name="confProductos_id" value="">

  <div style="position:absolute; right: 10px; z-index: 900">
    <button id="btnNvoProdRegresar" class="btn btn-sm {{$btn}}"><i class="fa fa-undo fa-lg"></i><span class="d-none d-sm-inline">  Regresar</span></button>
    <button id="btnGuardaProducto" class="btn btn-sm {{$btn}}"><i class="fa fa-users fa-lg">save</i><span class="d-none d-sm-inline">  Guardar</span></button>
  </div>

  <div class="row">
    {{ csrf_field() }}
    <div class="col-sm-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">
            <i class="fa fa-info fa-sm"></i><span class="d-none d-sm-inline">  Detalles</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
            <i class="fa fa-cog fa-sm"></i><span class="d-none d-sm-inline">  Configuraciones</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
            <i class="fa fa-wrench fa-sm"></i><span class="d-none d-sm-inline">  Adicionales</span>
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="home-tab">
          <div class="container border-left border-bottom border-right p-1">
            <div class="row">
              <div class="col-sm-3">
                <label for="confProductos_clave">Clave</label>
                <input type="text" maxlength="45" placeholder="Clave" class="form-control form-control-sm" id="confProductos_clave" name="confProductos_clave" onblur="verificaDisponibilidadProducto( this.value );">
                <input type="hidden" name="confProductos_claveDisp" id="confProductos_claveDisp" value="0">
              </div>
              <div class="col-sm-3">
                <label for="confProductos_nombre">Nombre</label>
                <input type="text" maxlength="45" placeholder="Nombre" class="form-control form-control-sm" id="confProductos_nombre" name="confProductos_nombre">
              </div>
              <div class="col-sm-6">
                <label for="confProductos_descripcion">Descripción</label>
                <textarea class="form-control form-control-sm" id="confProductos_descripcion" name="confProductos_descripcion" rows="1"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="catalogo_8">Ciclo de Facturación</label>
                <select class="custom-select custom-select-sm" id="catalogo_8" name="catalogo_8"></select>
              </div>
              <div class="col-sm-3">
                <label for="catalogo_9">Tipo</label>
                <select class="custom-select custom-select-sm" id="catalogo_9" name="catalogo_9"></select>
              </div>
              <div class="col-sm-3">
                <label for="catalogo_12">Grupo</label>
                <select class="custom-select custom-select-sm" id="catalogo_12" name="catalogo_12"></select>
              </div>
              <div class="col-sm-3">
                <label for="confProductos_status">Estatus</label>
                <select class="custom-select custom-select-sm" id="confProductos_status" name="confProductos_status"></select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="confProductos_clave">Precio</label>
                <input type="text" maxlength="45" placeholder="Precio" class="form-control form-control-sm" id="confProductos_precio" name="confProductos_precio">
              </div>
              <div class="col-sm-3">
                <label for="catalogo_10">Divisa</label>
                <select class="custom-select custom-select-sm" id="catalogo_10" name="catalogo_10"></select>
              </div>
              <div class="col-sm-3">
                <label for="confProductos_marca">Marca</label>
                <input type="text" maxlength="45" placeholder="Marca" class="form-control form-control-sm" id="confProductos_marca" name="confProductos_marca">
              </div>
              <div class="col-sm-3">
                <label for="confProductos_modelo">Modelo</label>
                <input type="text" maxlength="45" placeholder="Modelo" class="form-control form-control-sm" id="confProductos_modelo" name="confProductos_modelo">
              </div>
              <div class="col-sm-12"><hr></div>
              <div class="col-sm-3">
                  Usa traslados:
              </div>
              <div class="col-sm-3">
                  <select class="custom-select custom-select-sm" id="confProductos_tasaTraslados" name="confProductos_tasaTraslados">
                      <option value="0">-</option>
                      <option value="16">IVA 16%</option>
                      <option value="8">IVA 8%</option>
                  </select>
                  <br>
                  O usar otra tasa:
                  <input type="number" class="form-control form-control-sm" id="confProductos_tasaTrasladosOtra" name="confProductos_tasaTrasladosOtra" placeholder="Tasa traslados">
              </div>
              <div class="col-sm-3">
                  Retenciones:
              </div>
              <div class="col-sm-3">
                  <input type="number" class="form-control form-control-sm" id="confProductos_tasaRetencionesOtra" name="confProductos_tasaRetencionesOtra" placeholder="Tasa retenciones">
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="container border-left border-bottom border-right p-1">
            <div class="row">
                <div class="col-sm-12 mt-2">
                  <b>Carga históricos:</b>
                </div>
                <div class="col-sm-4 mt-2">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input custom-file-input-sm" id="confHistoricosProducto_file" name="confHistoricosProducto_file" aria-describedby="inputGroupFileAddon01" accept=".csv">
                      <label class="custom-file-label" for="confHistoricosProducto_file">Seleccione archivo (.csv)</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label for="confHistoricosProducto_mes">Columna mes:</label>
                  <input type="number" name="confHistoricosProducto_mes" id="confHistoricosProducto_mes" class="form-control form-control-sm" value="0">
                </div>
                <div class="col-sm-2">
                  <label for="confHistoricosProducto_mes">Columna año:</label>
                  <input type="number" name="confHistoricosProducto_anio" id="confHistoricosProducto_anio" class="form-control form-control-sm" value="1">
                </div>
                <div class="col-sm-2">
                  <label for="confHistoricosProducto_mes">Columna importe vendido:</label>
                  <input type="number" name="confHistoricosProducto_monto" id="confHistoricosProducto_monto" class="form-control form-control-sm" value="2">
                </div>
                <div class="col-sm-2">
                  <label for="confHistoricosProducto_unidades">Columna unidades vendidas:</label>
                  <input type="number" name="confHistoricosProducto_unidades" id="confHistoricosProducto_unidades" class="form-control form-control-sm" value="3">
                </div>

                <div class="col-sm-12 text-center mt-2 mb-2">
                  <button type="submit" name="confHistoricosProducto_btn" id="confHistoricosProducto_btn" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-upload"></i> Cargar históricos</button>
                </div>

                <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-3 mt-1">
                        <b>Datos Históricos:</b>
                      </div>
                      <div class="col-sm-9 mt-1">
                        <hr>
                      </div>
                      <div class="col-sm-12">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Importe Vendido</th>
                                <th>Unidades Vendidas</th>
                              </tr>
                            </thead>
                            <tbody id="contenedorInfoHistoricosProducto"></tbody>
                          </table>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="container border-left border-bottom border-right p-1">
            <div class="row" id="containerCamposAdicionalesProductos">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  cargaDatosComboCatalogo();

  $(function () {
    $( '#btnNvoProdRegresar' ).click( function( e ){
      e.preventDefault();
      contenidos( 'configuraciones_catalogos_productos' );
    });

    $( '#btnGuardaProducto' ).click( function( e ){
      e.preventDefault();
      guardaProductoNuevo();
    });

    cargaDatosHistoricos();
  });

  document.getElementById( 'confHistoricosProducto_btn' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    var config = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ),'content-type': 'multipart/form-data'}};

    if( document.getElementById( 'confHistoricosProducto_file' ).value == '' ) {
      aviso( 'No ha proporcionado un layout' , false );
    } else {
      var datos  = new FormData( document.getElementById( 'form_alta_productoservicio' ) );
      datos.append( 'productoID' , document.getElementById( 'idProductoEditar' ).value );
      axios.post( '/api/cargaHistoricosProducto' , datos , config )
            .then( response => {
              aviso( response.data.msj );
              cargaDatosHistoricos();
            })
            .catch( err => {
              console.log( err );
            });
    }
  });

  function calculoPronosticoPromedio( meses , productoID ) {
    var config     = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}};
    axios.get( '/api/obtienePromedioHistoricos/' + productoID + '/' + meses , config )
        .then( response => {
          document.getElementById( 'calculoPomedio_promedioCalculado' ).value = response.data.promedio;
        })
        .catch( err => {
          console.log( err );
        });
  }

  function cargaDatosHistoricos() {
    if( document.getElementById( 'idProductoEditar' ) == null )return false;
    var productoID = document.getElementById( 'idProductoEditar' ).value;
    var config     = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}};

    axios.get( '/api/obtieneHistoricos/' + productoID , config )
        .then( response => {
          var contenedor = document.getElementById( 'contenedorInfoHistoricosProducto' );
          response.data.forEach( function( e , i ){
            var row = contenedor.insertRow( 0 );
            var cell1 = row.insertCell( 0 );
            var cell2 = row.insertCell( 1 );
            var cell3 = row.insertCell( 2 );
            var cell4 = row.insertCell( 3 );
            cell1.innerHTML = e.anio;
            cell2.innerHTML = e.mes;
            cell3.innerHTML = e.monto;
            cell4.innerHTML = e.unidades;
          });
        })
        .catch( err => {
          console.log( err );
        });
  }

  function guardaProductoNuevo() {
    var datos      = $( '#form_alta_productoservicio' ).serialize();
    var movimiento = 'alta';
    if( document.getElementById( 'confProductos_id' ).value != '' ) { // Edita registro
        ruta       = '/api/actualizaProducto';
        movimiento = 'actualiza';
    } else { // Nuevo registro
        ruta  = '/api/guardaProducto';
    }

    if( document.getElementById( 'confProductos_clave' ).value == '' || document.getElementById( 'confProductos_clave' ).value.length < 6 ) {
      aviso( 'No ha proporcionado una clave válida' , false );
      document.getElementById( 'confProductos_clave' ).focus();
    } else if( document.getElementById( 'confProductos_claveDisp' ).value > 0 ) {
      aviso( 'La clave proporcionada ya se encuentra en uso por otro producto' , false );
      document.getElementById( 'confProductos_clave' ).focus();
    } else if( document.getElementById( 'confProductos_nombre' ).value == '' ) {
      aviso( 'No ha proporcionado un nombre para el producto' , false );
      document.getElementById( 'confProductos_nombre' ).focus();
    } else if( document.getElementById( 'confProductos_precio' ).value == '' || isNaN( document.getElementById( 'confProductos_precio' ).value ) ) {
      aviso( 'No ha proporcionado un precio válido para el producto' , false );
      document.getElementById( 'confProductos_precio' ).focus();
    } else {
      axios.post( ruta , datos , { headers: {'Accept': 'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
          .then( response => {
            if( movimiento == 'alta' ) {
              aviso( 'Producto agregado correctamente' );
              contenidos( 'configuraciones_catalogos_productos' );
            } else {
              aviso( 'Producto actualizado correctamente' );
              contenidos( 'configuraciones_catalogos_editaProducto' , document.getElementById( 'confProductos_id' ).value );
            }
          })
          .catch( err => {
            console.log( err );
          });
    }
  }

  async function comboEstatus() {
    $( '#confProductos_status' ).empty();
    let promise = axios.get( '/api/utiles/estatus' );
    let result = await promise;
    result.data.forEach( ( item ) => {
      $( '#confProductos_status' ).append( '<option value="'+item.id+'">'+item.status+'</option>' );
    });
  }

  comboEstatus();
  if( document.getElementById( 'idProductoEditar' ) === null ) {
    cargaCamposAdicionales( '3' );
  }

  function verificaDisponibilidadProducto( val ) {
    if( val.length > 5 ) {
      axios.get( '/api/disponibilidadClave/' + val , { headers: {'Accept': 'application/json', 'Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
        .then( response => {
          document.getElementById( 'confProductos_claveDisp' ).value = response.data;
          if( response.data > 0 ) {
            aviso( 'La clave proporcionada ya se encuentra en uso por otro producto' , false );
          }
        })
        .catch( err => {
          console.log( err );
        });
    }
  }

</script>
