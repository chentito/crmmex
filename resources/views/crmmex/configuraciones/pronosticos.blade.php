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
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4"><b>El cálculo se realiza sobre:</b></div>
              <div class="col-sm-8"><hr></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="formula_objetivoCalculo" id="calculoImporte" value="1" checked>
                  <label class="form-check-label" for="calculoImporte">Importe</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="formula_objetivoCalculo" id="calculoUnidades" value="2">
                  <label class="form-check-label" for="calculoUnidades">Unidades vendidas</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4"><b>Datos históricos:</b></div>
              <div class="col-sm-8"><hr></div>
              <div class="col-sm-6">
                <select class="custom-select custom-select-sm" name="formula_periodo" id="formula_periodo">
                  <option value="1">Ultimos 3 meses</option>
                  <option value="2">Ultimos 3 periodos</option>
                </select>
              </div>
              <div class="col-sm-6">
                <select class="custom-select custom-select-sm" name="formula_operacion" id="formula_operacion">
                  <option value="1">Promedio</option>
                  <option value="2">Media</option>
                </select>
              </div><div class="col-sm-1"></div>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-sm-2"><b>Constantes:</b></div>
          <div class="col-sm-6"><hr></div>
          <div class="col-sm-4 text-right">
            <button class="btn btn-sm {{$btn}}" id="btnDeshaceCambios"><i class="fa fa-sm fa-undo"></i> <span class="d-none d-sm-inline">Recarga constantes</span></button>
            <button class="btn btn-sm {{$btn}}" id="btnAgregaNuevaConstante"><i class="fa fa-sm fa-plus"></i> <span class="d-none d-sm-inline">Agregar constante</span></button>
          </div>
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
                <button class="btn btn-outline-secondary btn-sm {{$btn}}" type="button" id="formula_limpiaFormula"><i class="fa fa-sm fa-eraser"></i> <span class="d-none d-sm-inline">Limpiar</span></button>
                <button class="btn btn-outline-secondary btn-sm {{$btn}}" type="button" id="formula_cargaOriginal"><i class="fa fa-sm fa-sync"></i> <span class="d-none d-sm-inline">Cargar</span></button>
                <button class="btn btn-outline-secondary btn-sm {{$btn}}" type="button" id="formula_creaFormula"><i class="fa fa-sm fa-cog"></i> <span class="d-none d-sm-inline">Crear</span></button>
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
</div>

<script>
  generaDataGrid( 'listadoHistoricos' );
  cargaConfiguracion();
  cargaConstantes();

  // Creacion de formula
  function cargaConfiguracion() {
    axios.get( '/api/getConfiguration' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        //alert( JSON.stringify( response.data ) );
        var datos = response.data;
        if( datos.objetivoCalculo == 1 ) {
            document.getElementById( 'calculoImporte' ).checked = true;
          } else {
            document.getElementById( 'calculoUnidades' ).checked = true;
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
          axios.get( '/api/addConstantStructure/'+e.nombre+'/'+e.descripcion+'/'+e.valor+'/'+e.id , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}})
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
      })
      .catch( err => { console.log( err ); });
  });

  document.getElementById( 'formula_creaFormula' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    alert("calculaaa");
  });

  document.getElementById( 'formula_limpiaFormula' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    document.getElementById( 'formula_calculada' ).value = '';
  });

  document.getElementById( 'formula_cargaOriginal' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    document.getElementById( 'formula_calculada' ).value = document.getElementById( 'formula_calculadaOriginal' ).value;
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

</script>
