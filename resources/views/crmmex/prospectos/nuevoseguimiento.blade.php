<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-edit fa-sm"></i><span class="d-none d-sm-inline">  Datos Seguimiento</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

      <div class="{{$container}} border-left border-bottom border-right p-1">
        <form id="formSeguimiento" name="formSeguimiento">
          <input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">
          <input type="hidden" name="seguimiento_idty" id="seguimiento_idty" value="">
          <div class="row">
              <input type="hidden" id="prospectos_nuevoseguimiento_titulo" name="prospectos_nuevoseguimiento_titulo">
              <div class="col-sm-3">
                  <label for="prospectos_nuevoseguimiento_fecha">Fecha Ejecución:</label>
                  <input class="form-control form-control-sm" id="prospectos_nuevoseguimiento_fecha" name="prospectos_nuevoseguimiento_fecha" readonly>
              </div>
              <div class="col-sm-3">
                  <div class="row">
                      <div class="col-sm-6">
                          <label for="prospectos_nuevoseguimiento_hora">Hora:</label>
                          <select class="custom-select custom-select-sm" name="prospectos_nuevoseguimiento_hora" id="prospectos_nuevoseguimiento_hora">
                            @for ($i = 0; $i <= 23; $i++)
                                <option value="@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif">@if(strlen($i)===1) {{ '0'.$i }} @else {{$i}} @endif</option>
                            @endfor
                          </select>
                      </div>
                      <div class="col-sm-6">
                        <label for="prospectos_nuevoseguimiento_minutos">Minuto:</label>
                        <select class="custom-select custom-select-sm" name="prospectos_nuevoseguimiento_minutos" id="prospectos_nuevoseguimiento_minutos"></select>
                      </div>
                  </div>
              </div>
              <div class="col-sm-3">
                  <label for="catalogo_16">Tipo:</label>
                  <select class="custom-select custom-select-sm" id="catalogo_16" name="catalogo_16">
                  </select>
              </div>
              <div class="col-sm-3">
                  <label for="catalogo_17">Estado:</label>
                  <select class="custom-select custom-select-sm" id="catalogo_17" name="catalogo_17">
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6 mb-2">
                  <label for="prospectos_nuevoseguimiento_involucrados">Contactos:</label>
                  <select id="prospectos_nuevoseguimiento_involucrados" name="prospectos_nuevoseguimiento_involucrados" class="custom-select custom-select-sm" >
                  </select>
              </div>
              <div class="col-sm-6 mb-2">
                  <label for="prospectos_nuevoseguimiento_texto">Descripción:</label>
                  <textarea id="prospectos_nuevoseguimiento_texto" name="prospectos_nuevoseguimiento_texto" class="form-control form-control-sm" cols="3"></textarea>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12 text-center" id="seguimientos_contenedor_botones">
                  <button class="btn btn-sm {{$btn}}" id="btnRegresaListadoSeguimientosPorCliente"><i class="fa fa-undo-alt fa-lg"></i> Regresar</button>
                  <button class="btn btn-sm {{$btn}}" id="btnGuardaSeguimiento"><i class="fa fa-save fa-lg"></i> Guardar Seguimiento</button>
                  <button class="btn btn-sm {{$btn}}" id="btnActualizaSeguimiento"><i class="fa fa-edit fa-lg"></i> Actualizar Seguimiento</button>
              </div>
          </div>
        </form>
      </div>

  </div>
</div>

<script>

  cargaDatosComboCatalogo();
  cargaContactos();

  $( '#prospectos_nuevoseguimiento_fecha' ).datepicker({
    format: "yyyy-mm-dd",
    language: "es",
    todayBtn: "linked",
    clearBtn: true,
    startDate: "today",
    daysOfWeekDisabled: "0,6",
    daysOfWeekHighlighted: "0,6"
  });

  if( document.getElementById( 'edicionSeguimiento' ) == undefined ) {
    document.getElementById( 'btnActualizaSeguimiento' ).outerHTML = "";
  }

  document.getElementById( 'btnGuardaSeguimiento' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    guardaSeguimiento();
  });

  document.getElementById( 'btnRegresaListadoSeguimientosPorCliente' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'prospectos_seguimiento' , document.getElementById( 'clienteID' ).value );
  });

  async function cargaContactos( selected='' ) {
    var token     = sessionStorage.getItem( 'apiToken' );
    var clienteID = document.getElementById( 'clienteID' ).value;
    var path      = '/api/listadoContactos/' + clienteID;
    var config    = {
        headers: {
          'Accept' : 'application/json',
          'Authorization' : 'Bearer ' + token
        }
    };

    await axios( path , config )
      .then( datos => {
        d         = datos.data;
        if(typeof d[ 'contactos' ] != 'undefined') {
          contactos = d[ 'contactos' ];
          contactos.forEach( function( b ) {
            document.getElementById( 'prospectos_nuevoseguimiento_involucrados' ).add( new Option( b.contacto , b.id , '' , ( ( selected == b.id ) ? true : false ) ) );
          });
        }
      })
      .catch( err => {
        console.error( err );
      });
  }

  function guardaSeguimiento() {
    var token = sessionStorage.getItem( 'apiToken' );
    var datos = new FormData( document.getElementById( 'formSeguimiento' ) );
    var config = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };

    if( document.getElementById( 'seguimiento_idty' ).value == '' ) {
        var ruta  = '/api/guardaSeguimiento'; // Se da de alta
      } else {
        var ruta  = '/api/actualizaSeguimiento'; // Se actualiza
    }

    if( document.getElementById( 'prospectos_nuevoseguimiento_fecha' ).value == '' ) {
      aviso( 'No ha proporcionado una fecha de ejecución' , false );
    } else {
      axios.post( ruta , datos , config )
         .then( response => {
            aviso( 'Seguimiento agregado correctamente' );+
            contenidos( 'prospectos_editaseguimiento' , response.data.idty );
         })
         .catch( err => {
            console.log( err );
         });
    }
  }

  axios.get( '/api/getPredefinido/4' , { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      var minutos = response.data.valor.split( ',' );
      minutos.forEach( function( e , i ){
        document.getElementById( 'prospectos_nuevoseguimiento_minutos' ).add( new Option( e , e , false , false ) );
      });
    })
    .catch( err => {
      console.log( err );
    });
</script>
