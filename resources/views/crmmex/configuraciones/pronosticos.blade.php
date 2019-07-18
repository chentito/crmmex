<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Crear Formula
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      Formulas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      Carga Históricos
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-right border-bottom p-1">
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
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-right border-bottom p-1">

    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container border-left border-right border-bottom p-1">

    </div>
  </div>
</div>

<script>

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

</script>
