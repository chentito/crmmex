<input type="hidden" id="clienteID" name="clienteID" value="">
<input type="hidden" id="propuestaID" name="propuestaID" value="{{$param}}">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pagos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agregar Pago</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    <div class="{{$container}} border-left border-right border-bottom p-1">

      <div id="listadoPagos_config"></div>
      <table id="listadoPagos" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>

      <div class="row">
        <div class="col-sm-12 text-center">
          <button class="btn btn-sm {{$btn}}" id="btnAltaPagoRegresar"><i class="fa fa-undo fa-sm"></i> Regresar</button>
        </div>
      </div>

    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

    <div class="{{$container}} border-left border-right border-bottom p-1">
      <form id="pagoPropuesta_from" name="pagoPropuesta_from">
        <input type="hidden" id="pagoPropuesta_propuestaID" name="pagoPropuesta_propuestaID" value="{{$param}}">
        <input type="hidden" id="pagoPropuesta_pagado" name="pagoPropuesta_pagado" value="">
        <input type="hidden" id="pagoPropuesta_totalActual" name="pagoPropuesta_totalActual" value="">
        <input type="hidden" id="pagoPropuesta_restante" name="pagoPropuesta_restante" value="">
        <div class="row">
            <div class="col-sm-3">
              <label for="pagoPropuesta_monto">Monto:</label>
              <input type="number" min="0.00" max="1000000000.00" step="0.01" id="pagoPropuesta_monto" name="pagoPropuesta_monto" class="form-control form-control-sm">
            </div>
            <div class="col-sm-3">
              <label for="catalogo_19">Banco:</label>
              <select class="custom-select custom-select-sm" id="catalogo_19" name="catalogo_19"></select>
            </div>
            <div class="col-sm-3">
              <label for="pagoPropuesta_cuenta">Cuenta:</label>
              <!--input type="text" id="pagoPropuesta_cuenta" name="pagoPropuesta_cuenta" class="form-control form-control-sm"-->

              <select class="custom-select custom-select-sm" name="pagoPropuesta_cuenta" id="pagoPropuesta_cuenta"></select>

            </div>
            <div class="col-sm-3">
              <label for="catalogo_15">Forma de Pago:</label>
              <select class="custom-select custom-select-sm" id="catalogo_15" name="catalogo_15"></select>
            </div>
            <div class="col-sm-3">
              <label for="pagoPropuesta_fechaPago">Fecha de Pago:</label>
              <input type="text" id="pagoPropuesta_fechaPago" name="pagoPropuesta_fechaPago" class="form-control form-control-sm" readonly>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
            <button class="btn btn-sm {{$btn}}" id="btnAltaPagoGuardarPago"><i class="fa fa-save fa-sm"></i> Guardar</button>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>

<script>
  generaDataGrid( 'listadoPagos' , document.getElementById( 'propuestaID' ).value );
  datosPropuesta();
  cargaDatosComboCatalogo();

  $( '#pagoPropuesta_fechaPago' ).datepicker({
      format: "yyyy-mm-dd",
      language: "es",
      todayBtn: "linked",
      clearBtn: true,
      daysOfWeekDisabled: "0,6",
      daysOfWeekHighlighted: "0,6"
  });

  document.getElementById( 'catalogo_19' ).addEventListener( 'change' , function( e ){
    e.preventDefault();
    document.getElementById( 'pagoPropuesta_cuenta' ).innerHTML = '';
    axios.get( '/api/listadoCuentasBancarias/' + this.value , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
          .then( response => {
            response.data.ctasBancarias.forEach( function( e , i ){
              document.getElementById( 'pagoPropuesta_cuenta' ).add( new Option( e.numeroCuenta , e.id ) );
            });
          })
          .catch( err => {
            console.log( err );
          });

  });

  document.getElementById( 'btnAltaPagoGuardarPago' ).addEventListener( 'click' , function( e ){
      e.preventDefault();

      if( document.getElementById( 'pagoPropuesta_restante' ).value == 0 ) {
          aviso( 'La propuesta ya se encuentra pagada' , false );
      } else if( document.getElementById( 'pagoPropuesta_monto' ).value == '' || isNaN( document.getElementById( 'pagoPropuesta_monto' ).value ) ){
         aviso( 'No ha asignado un monto válido' , false );
      } else if( document.getElementById( 'pagoPropuesta_cuenta' ).value == '' ) {
        aviso( 'No ha asignado una cuenta válida' , false );
      } else if( document.getElementById( 'pagoPropuesta_fechaPago' ).value == '' ) {
        aviso( 'No ha asignado la fecha de pago' , false );
      } else if( document.getElementById( 'pagoPropuesta_monto' ).value > document.getElementById( 'pagoPropuesta_restante' ).value ) {
        aviso( 'El pago excede el monto restante de esta propuesta' , false );
      } else {
        axios.post( '/api/altaPago' , new FormData( document.getElementById( 'pagoPropuesta_from' ) ) , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
          .then( response => {
            contenidos( 'clientes_pagos' , document.getElementById( 'propuestaID' ).value );
            aviso( 'El pago se ha aplicado correctamente' );
          })
          .catch( err => {
            console.log( err );
          });
      }
  });

  document.getElementById( 'btnAltaPagoRegresar' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
  });

  function datosPropuesta() {
      var config = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken')}};
      axios.get( '/obtieneDatosPropuesta/'+document.getElementById( 'propuestaID' ).value , config )
           .then( response => {
                document.getElementById( 'clienteID' ).value = response.data.cliente;
                total = response.data.total;
                document.getElementById( 'pagoPropuesta_totalActual' ).value = total;
                axios.get( '/api/statusPago/' + document.getElementById( 'propuestaID' ).value , config )
                     .then( response => {
                        document.getElementById( 'pagoPropuesta_pagado' ).value = parseFloat( response.data );
                        document.getElementById( 'pagoPropuesta_monto' ).value = parseFloat( total ) - parseFloat( response.data );
                        document.getElementById( 'pagoPropuesta_restante' ).value = parseFloat( total ) - parseFloat( response.data );
                     })
                     .catch( err => {
                        console.log( err );
                     });
           })
           .catch( err => {
             console.log( err );
           });
  }

  function eliminaPago( pagoID ) {
      var config = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken')}};
      axios.post( '/api/eliminaPago/'+pagoID , {} , config )
           .then( response => {
              contenidos( 'clientes_pagos' , document.getElementById( 'propuestaID' ).value );
           })
           .catch( err => {
              console.log( err );
           });
  }
</script>
