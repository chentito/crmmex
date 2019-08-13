<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
      Carga Históricos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">
      Crear Formula
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      Formulas
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row mt-2">
        <div class="col-sm-12 mt-2 mb-1">
          <b>Parámetros prestablecidos:</b>
        </div>
        <div class="col-sm-3 text-center">
          <div class="row">
              <div class="col-sm-8">
                Periodo (mes) <button class="btn btn-sm {{$btn}}" onclick="formula( 'sys' , 'mes' , 'periodoMes_cantidad_form')">Usar</button>
              </div>
              <div class="col-sm-4">
                <input type="number" value="1" placeholder="Periodos" class="form-control form-control-sm" id="periodoMes_cantidad_form">
              </div>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="row">
            <div class="col-sm-8">
              Periodo (año) <button class="btn btn-sm {{$btn}}" onclick="formula( 'sys' , 'anio' , 'periodoAnio_cantidad_form')">Usar</button>
            </div>
            <div class="col-sm-4">
              <input type="number" value="1" placeholder="Periodos" class="form-control form-control-sm" id="periodoAnio_cantidad_form">
            </div>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="row">
            <div class="col-sm-8">
              Importe Vendido <button class="btn btn-sm {{$btn}}" onclick="formula( 'sys' , 'importe','periodoImporte_cantidad_form' )">Usar</button>
            </div>
            <div class="col-sm-4">
              <input type="number" value="1" placeholder="Periodos" class="form-control form-control-sm" id="periodoImporte_cantidad_form">
            </div>
          </div>
        </div>
        <div class="col-sm-3 text-center">
          <div class="row">
            <div class="col-sm-8">
              Unidades vendidas <button class="btn btn-sm {{$btn}}" onclick="formula( 'sys' , 'unidades' , 'periodoUnidades_cantidad_form' )">Usar</button>
            </div>
            <div class="col-sm-4">
              <input type="number" value="1" placeholder="Periodos" class="form-control form-control-sm" id="periodoUnidades_cantidad_form">
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <hr>
        </div>

        <div class="col-sm-12 mt-2 mb-1">
          <b>Operadores:</b>
        </div>
        <div class="col-sm-3 text-center">
            Entre <button class="btn btn-sm {{$btn}}" onclick="formula('oper','/')">Usar</button>
        </div>
        <div class="col-sm-3 text-center">
            Por <button class="btn btn-sm {{$btn}}" onclick="formula('oper','*')">Usar</button>
        </div>
        <div class="col-sm-3 text-center">
            Más <button class="btn btn-sm {{$btn}}" onclick="formula('oper','+')">Usar</button>
        </div>
        <div class="col-sm-3 text-center">
            Menos <button class="btn btn-sm {{$btn}}" onclick="formula('oper','-')">Usar</button>
        </div>
        <div class="col-sm-12">
          <hr>
        </div>

        <div class="col-sm-12 mt-2 mb-1">
          <b>Parámetros personalizados:</b>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-6">
              <label for="pronosticos_personalizado_cantidad">Cantidad</label>
              <input type="text" id="pronosticos_personalizado_cantidad" name="pronosticos_personalizado_cantidad" placeholder="Valor" class="form-control form-control-sm">
            </div>
            <div class="col-sm-6">
              <button class="btn btn-sm {{$btn}}" onclick="formula( 'pers' , 'cantidad' , 'pronosticos_personalizado_cantidad' )">Usar</button>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-6">
              <label for="pronosticos_personalizado_tasa">Tasa</label>
              <input type="text" id="pronosticos_personalizado_tasa" name="pronosticos_personalizado_tasa" placeholder="Valor" class="form-control form-control-sm">
            </div>
            <div class="col-sm-6">
              <button class="btn btn-sm {{$btn}}" onclick="formula( 'pers' , 'tasa' , 'pronosticos_personalizado_tasa' )">Usar</button>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <hr>
        </div>


        <div class="col-sm-12 mt-3 mb-2">
          <input type="text" class="form-control form-control-sm" id="pronosticos_personalizado_formula" name="pronosticos_personalizado_formula" placeholder="Formula" readonly>
        </div>
        <div class="col-sm-12 text-center">
          <button class="btn btn-sm btn-warning" onclick="restablece()"><i class="fa fa-sm fa-save"></i> Restablecer</button>
          <!--button class="btn btn-sm btn-success"><i class="fa fa-sm fa-save"></i> Borrar Último</button-->
          <button class="btn btn-sm btn-primary" onclick="guardaFormula()"><i class="fa fa-sm fa-save"></i> Guardar Formular</button>
        </div>
      </div>
    </div>
  </div>
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

    </div>
  </div>
</div>

<script>
  generaDataGrid( 'listadoHistoricos' );
  // CONFIGURACION DE FORMULAS
  function formula( tipo , valor , cantidad='' ) {
      var formula = document.getElementById( 'pronosticos_personalizado_formula' ).value;
      var err     = 0;

      if( cantidad != '' ) {
        if( document.getElementById(cantidad).value == "" ) {
            aviso( 'El valor del parámetro seleccionado no puede ser vacío' , false );
            err ++;
        } else {
            var cant = '|'+document.getElementById(cantidad).value;
            document.getElementById(cantidad).value = ( tipo == 'sys' ) ? '1' : '' ;
        }
      } else {
        var cant = '';
      }

      if( err == 0 ) {
        var add = '{'+tipo+':'+valor+cant+'}';
        document.getElementById( 'pronosticos_personalizado_formula' ).value = formula + add;
      }

  }

  function restablece() {
      document.getElementById( 'pronosticos_personalizado_formula' ).value = '';
  }

  function guardaFormula(){
      if( document.getElementById( 'pronosticos_personalizado_formula' ).value == '' ) {
        aviso( 'La formula está vacía' , false );
      }
  }

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

  document.getElementById( 'pronosticosDescargaDocHistoricos_layout' ).addEventListener( 'click' , function( e ){
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
