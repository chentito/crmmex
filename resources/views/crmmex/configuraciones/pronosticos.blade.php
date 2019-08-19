<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
      <i class="fa fa-sm fa-database"></i> <span class="d-none d-sm-inline">Históricos</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-sm fa-edit"></i> <span class="d-none d-sm-inline">Fórmula</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="ejecuciones-tab" data-toggle="tab" href="#ejecuciones" role="tab" aria-controls="ejecuciones" aria-selected="false">
      <i class="fa fa-sm fa-cogs"></i> <span class="d-none d-sm-inline">Ejecuciones</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <form id="pronosticosCargaDocumetoHistoricos_form" form="pronosticosCargaDocumetoHistoricos_form">
        <div class="row mt-2">
            <div class="col-sm-2">
                <b>Generar layout</b>
            </div>
            <div class="col-sm-10">
                <hr>
            </div>
            <div class="col-sm-2">Periodo inicial:</div>
            <div class="col-sm-1">
              <select id="layoutFechaMes_inicial" name="layoutFechaMes_inicial" class="custom-select custom-select-sm">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="col-sm-2">
              <select id="layoutFechaAnio_inicial" name="layoutFechaAnio_inicial" class="custom-select custom-select-sm">
                @for ($i = date('Y'); $i >=2000 ; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="col-sm-2">Periodo final:</div>
            <div class="col-sm-1">
              <select id="layoutFechaMes_final" name="layoutFechaMes_final" class="custom-select custom-select-sm">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="col-sm-2">
              <select id="layoutFechaAnio_final" name="layoutFechaAnio_final" class="custom-select custom-select-sm">
                @for ($i = date('Y'); $i >=2000 ; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
            <div class="col-sm-2">
                <button type="button" name="pronosticosDescargaDocHistoricos_layout" id="pronosticosDescargaDocHistoricos_layout" class="btn btn-sm {{$btn}}">
                  <i class="fa fa-sm fa-download"></i> Descargar layout
                </button>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-2">
              <b>Cargar datos historicos</b>
          </div>
          <div class="col-sm-10">
              <hr>
          </div>
          <div class="col-sm-2 mt-2">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input custom-file-input-sm" id="confHistoricosProducto_file" name="confHistoricosProducto_file" aria-describedby="inputGroupFileAddon01" accept=".csv">
                <label class="custom-file-label" for="confHistoricosProducto_file">Archivo (.csv)</label>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <label for="confHistoricosProducto_clave">Columna clave producto:</label>
            <input type="number" name="confHistoricosProducto_clave" id="confHistoricosProducto_clave" class="form-control form-control-sm" value="0" min="0">
          </div>
          <div class="col-sm-2">
            <label for="confHistoricosProducto_mes">Columna mes:</label>
            <input type="number" name="confHistoricosProducto_mes" id="confHistoricosProducto_mes" class="form-control form-control-sm" value="1" min="0">
          </div>
          <div class="col-sm-2">
            <label for="confHistoricosProducto_mes">Columna año:</label>
            <input type="number" name="confHistoricosProducto_anio" id="confHistoricosProducto_anio" class="form-control form-control-sm" value="2" min="0">
          </div>
          <div class="col-sm-2">
            <label for="confHistoricosProducto_mes">Columna importe:</label>
            <input type="number" name="confHistoricosProducto_monto" id="confHistoricosProducto_monto" class="form-control form-control-sm" value="3" min="0">
          </div>
          <div class="col-sm-2">
            <label for="confHistoricosProducto_unidades">Columna unidades:</label>
            <input type="number" name="confHistoricosProducto_unidades" id="confHistoricosProducto_unidades" class="form-control form-control-sm" value="4" min="0">
          </div>
          <div class="col-sm-12 mt-2 mb-2 text-center">
              <button type="button" name="confHistoricosProducto_btnGuarda" id="confHistoricosProducto_btnGuarda" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-upload"></i> Cargar Layout</button>
          </div>
        </div>
      </form>
      <div class="row mt-3">
        <div class="col-sm-12">
          <div id="listadoHistoricos_config"></div>
          <table id="listadoHistoricos" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <form id="formula_form" name="formula_form">
        <div class="row mt-2">
          <div class="col-sm-2"><b>Periodo:</b></div>
          <div class="col-sm-10"><hr></div>
          <div class="col-sm-6">
            <select class="custom-select custom-select-sm" name="formula_periodo" id="formula_periodo">
              <option value="1">Ultimos 3 meses</option>
              <option value="2">Ultimos 3 periodos</option>
            </select>
          </div>
          <div class="col-sm-5">
            <select class="custom-select custom-select-sm" name="formula_operacion" id="formula_operacion">
              <option value="1">Promedio</option>
              <option value="2">Mediana</option>
            </select>
          </div>
          <div class="col-sm-1">
            <button type="button" name="formula_agregaOperacion" id="formula_agregaOperacion" class="btn btn-sm btn-info"><i class="fa fa-sm fa-link"></i></button>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-sm-2"><b>Indicadores/Métricas:</b></div>
          <div class="col-sm-10"><hr></div>
          <div class="col-sm-2"></div>
          <div class="col-sm-8 text-center">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-secondary" id="calculoImporte">
                <input type="radio" name="formula_objetivoCalculo" value="1" checked> Importe
              </label>
              <label class="btn btn-secondary" id="calculoUnidades">
                <input type="radio" name="formula_objetivoCalculo" value="2"> Unidades
              </label>
              <label class="btn btn-secondary" id="calculoAmbasUnidades">
                <input type="radio" name="formula_objetivoCalculo" value="3"> Ambas
              </label>
            </div>
          </div>
          <div class="col-sm-2"></div>
        </div>

        <div class="row mt-1">
          <div class="col-sm-2">
            <b>Valores Constantes:</b>
            <br>
            <button class="btn btn-sm {{$btn}} mt-1 mb-1" id="btnDeshaceCambios" title="Recargar listado de constantes"><i class="fa fa-sm fa-sync"></i></button>
            <button class="btn btn-sm {{$btn}} mt-1 mb-1" id="btnAgregaNuevaConstante" title="Agregar Constante"><i class="fa fa-sm fa-plus"></i></button>
          </div>
          <div class="col-sm-10"><hr></div>
          <div class="col-sm-12">
            <div class="row" id="formula_constantes_container"></div>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-sm-2"><b>Formula:</b></div>
          <div class="col-sm-10"><hr></div>
          <div class="col-sm-12">
            <div class="input-group mb-3">
              <input type="hidden" name="formula_calculadaOriginal" id="formula_calculadaOriginal" >
              <input type="text" class="form-control form-control-sm" name="formula_calculada" id="formula_calculada" placeholder="Formula" aria-label="Formula" aria-describedby="basic-addon2" readonly>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Insertar Operador</button>
                <div class="dropdown-menu list-unstyled {{$borde}}">
                  <a class="dropdown-item" href="javascript:void(0)" onclick="agregaOperador('+')">Suma</a>
                  <a class="dropdown-item" href="javascript:void(0)" onclick="agregaOperador('-')">Resta</a>
                  <a class="dropdown-item" href="javascript:void(0)" onclick="agregaOperador('*')">Multiplicaci&oacute;n</a>
                  <a class="dropdown-item" href="javascript:void(0)" onclick="agregaOperador('/')">Divisi&oacute;n</a>
                </div>
                <button class="btn btn-outline-secondary btn-sm {{$btn}}" type="button" id="formula_agrupaFormula"><i class="fa fa-sm fa-eraser"></i> <span class="d-none d-sm-inline">Agrupar</span></button>
                <button class="btn btn-outline-secondary btn-sm {{$btn}}" type="button" id="formula_cargaOriginal"><i class="fa fa-sm fa-sync"></i> <span class="d-none d-sm-inline">Reestablecer</span></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-1 mb-2">
          <div class="col-sm-12 text-center">
            <button type="submit" name="formula_guardaDetalleFormula" id="formula_guardaDetalleFormula" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> <span class="d-none d-sm-inline">Guardar configuración</span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="ejecuciones" role="tabpanel" aria-labelledby="contact-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th width="20%">Año</th>
                <th width="20%">Mes</th>
                <th width="20%">Importe</th>
                <th width="20%">Unidades</th>
                <th width="20%">Opciones</th>
              </tr>
            </thead>
            <tbody id="contenedorProcesamientos">
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  generaDataGrid( 'listadoHistoricos' );
  cargaConfiguracion();
  cargaConstantes();

  // Creacion de formula
  function agregaOperador( operador ) {
    document.getElementById( 'formula_calculada' ).value = document.getElementById( 'formula_calculada' ).value + operador;
  }

  function cargaConstante( constante ) {
    document.getElementById( 'formula_calculada' ).value = document.getElementById( 'formula_calculada' ).value + constante;
  }

  function cargaConfiguracion() {
    axios.get( '/api/getConfiguration' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        var datos = response.data;
        if( datos.objetivoCalculo == 1 ) {
          document.getElementById( 'calculoImporte' ).classList.add( 'active' );
        }
        if( datos.objetivoCalculo == 2 ) {
          document.getElementById( 'calculoUnidades' ).classList.add( 'active' );
        }
        if( datos.objetivoCalculo == 3 ) {
          document.getElementById( 'calculoAmbasUnidades').classList.add( 'active' );
        }

        document.getElementById( 'formula_periodo' ).value = datos.periodo;
        document.getElementById( 'formula_operacion' ).value = datos.operacion;
        document.getElementById( 'formula_calculada' ).value = datos.formula;
        document.getElementById( 'formula_calculadaOriginal' ).value = datos.formula;
      })
      .catch( err => { console.log( err ); });
  }

  function cargaConstantes() {
    document.getElementById( 'formula_constantes_container' ).innerHTML = '';
    axios.get( '/api/getConstants' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
     .then( response => {
        response.data.forEach( function( e , i ) {
          axios.get( '/api/addConstantStructure/'+e.nombre+'/'+e.descripcion+'/'+e.valor+'/'+e.id+'/'+e.tipo , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}})
           .then( response2 => {
             $( '#formula_constantes_container' ).append( response2.data );
           })
           .catch( err => { console.log( err ); });
        });
      })
     .catch( err => { console.log( err ); });
  }

  document.getElementById( 'btnDeshaceCambios' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    cargaConstantes();
  });

  document.getElementById( 'btnAgregaNuevaConstante' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    axios.get( '/api/addConstantStructure' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
     .then( response => {
       $( '#formula_constantes_container' ).append( response.data );
     })
     .catch( err => { console.log( err ); });
  });

  document.getElementById( 'formula_guardaDetalleFormula' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    var datos = new FormData( document.getElementById( 'formula_form' ) );
    axios.post( '/api/setConfiguration' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        aviso( 'Configuracion guardada correctamente.' );
        document.getElementById( 'formula_calculadaOriginal' ).value = document.getElementById( 'formula_calculada' ).value;
      })
      .catch( err => { console.log( err ); });
  });

  document.getElementById( 'formula_cargaOriginal' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    document.getElementById( 'formula_calculada' ).value = document.getElementById( 'formula_calculadaOriginal' ).value;
  });

  document.getElementById( 'formula_agregaOperacion' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    document.getElementById( 'formula_calculada' ).value = '';
    var periodo = document.getElementById( 'formula_periodo' ).value;
    var p = '';
    if( periodo == 1 ) {
        p = 'MESES_3';
      } else {
        p = 'PERIODOS_3';
    }

    var opcion = document.getElementById( 'formula_operacion' ).value;
    var operacion = '';
    if( opcion == 1 ) {
        operacion += 'PROMEDIO_' + p;
      } else {
        operacion += 'MEDIANA_' + p;
    }

    document.getElementById( 'formula_calculada' ).value = document.getElementById( 'formula_calculada' ).value + '(' + operacion + ')';
  });

  document.getElementById( 'formula_agrupaFormula' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    document.getElementById( 'formula_calculada' ).value = '('+ document.getElementById( 'formula_calculada' ).value + ')';
  });

  // CARGA HISTORICOS
  document.getElementById( 'confHistoricosProducto_btnGuarda' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    if( document.getElementById( 'confHistoricosProducto_file' ).value == '' ) {
      aviso( 'No ha seleccionado ningun archivo' , false );
    } else {
      var datos = new FormData( document.getElementById( 'pronosticosCargaDocumetoHistoricos_form' ) );
      var headers = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ),'content-type':'multipart/form-data'}};
      axios.post( '/api/cargaHistoricosLayout' , datos , headers )
       .then( response => {
          aviso( response.data.msj );
          document.getElementById( 'confHistoricosProducto_file' ).value = '';
       })
       .catch( err => {
         console.log( err );
       });
    }
  });

  document.getElementById( 'pronosticosDescargaDocHistoricos_layout' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    var fi = document.getElementById( 'layoutFechaAnio_inicial' ).value + '-' + document.getElementById( 'layoutFechaMes_inicial' ).value;
    var ff = document.getElementById( 'layoutFechaAnio_final' ).value + '-' + document.getElementById( 'layoutFechaMes_final' ).value;
    axios.get( '/api/generaLayoutHistoricos/' + fi + '/' + ff , {} , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken') } } )
     .then( response => {
         const url = window.URL.createObjectURL(new Blob([response.data]));
         const link = document.createElement('a');
         link.href = url;
         link.setAttribute( 'download' , 'ejemplo_layout.csv' );
         document.body.appendChild(link);
         link.click();
     })
     .catch( err => {
        console.log( err );
     });
  });

  // Listado de procesamientos
  axios.get( '/api/listadoProcesamientos' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
       .then( response => {
         var container = document.getElementById( 'contenedorProcesamientos' );
         response.data.forEach( function( e , i ) {
          var row = container.insertRow(0);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          cell1.innerHTML = e.anio;
          cell2.innerHTML = e.mes;
          cell3.innerHTML = e.cantidad;
          cell4.innerHTML = e.importe;
          cell5.innerHTML = '<a title="Volver a ejecutar" href="javascript:void(0)" onclick=""><i class="fa fa-sm fa-cogs"></i> <span class="d-none d-sm-inline">Volver a ejecutar</span></a>';
        });
       })
       .catch( err => {
         console.log( err );
       });


</script>
