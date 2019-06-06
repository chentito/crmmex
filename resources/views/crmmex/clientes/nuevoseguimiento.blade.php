<h3>Seguimiento ID {{$param}} <span id="nombreCliente"></span></h3>
<form id="formSeguimiento" name="formSeguimiento">
  <input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">
  <input type="hidden" name="seguimiento_idty" id="seguimiento_idty" value="">
  <div class="row">
      <div class="col-sm-3">
          <label for="prospectos_nuevoseguimiento_titulo">Título</label>
          <input class="form-control form-control-sm" id="prospectos_nuevoseguimiento_titulo" name="prospectos_nuevoseguimiento_titulo">
      </div>
      <div class="col-sm-3">
          <label for="prospectos_nuevoseguimiento_fecha">Fecha Ejecución</label>
          <input class="form-control form-control-sm" id="prospectos_nuevoseguimiento_fecha" name="prospectos_nuevoseguimiento_fecha">
      </div>
      <div class="col-sm-3">
          <label for="prospectos_nuevoseguimiento_tipo">Tipo</label>
          <select class="custom-select custom-select-sm" id="prospectos_nuevoseguimiento_tipo" name="prospectos_nuevoseguimiento_tipo">
              <option value="1">Llamada telefónica</option>
              <option value="2">Correo electrónico</option>
              <option value="3">Reunión</option>
              <option value="4">Conferencia</option>
              <option value="5">Envío de propuesta</option>
              <option value="6">Envío de prefactura</option>
              <option value="7">Envío de factura</option>
              <option value="8">Soporte</option>
              <option value="9">Otro</option>
          </select>
      </div>
      <div class="col-sm-3">
          <label for="prospectos_nuevoseguimiento_estado">Estado</label>
          <select class="custom-select custom-select-sm" id="prospectos_nuevoseguimiento_estado" name="prospectos_nuevoseguimiento_estado">
              <option value="1">Abierto</option>
              <option value="2">En proceso</option>
              <option value="3">Detenido</option>
              <option value="4">Detenido por el cliente</option>
              <option value="5">Cerrado</option>
          </select>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-6 mb-2">
          <label for="prospectos_nuevoseguimiento_involucrados">Involucrados</label>
          <select id="prospectos_nuevoseguimiento_involucrados" name="prospectos_nuevoseguimiento_involucrados" class="custom-select custom-select-sm" >
          </select>
      </div>
      <div class="col-sm-6 mb-2">
          <label for="prospectos_nuevoseguimiento_texto">Texto</label>
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

<script>

  if( document.getElementById( 'edicionSeguimiento' ) == undefined ) {
      document.getElementById( 'btnActualizaSeguimiento' ).outerHTML = "";
  }

  cargaContactos();

  document.getElementById( 'btnGuardaSeguimiento' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      guardaSeguimiento();
  });

  document.getElementById( 'btnRegresaListadoSeguimientosPorCliente' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( 'clientes_seguimiento' , document.getElementById( 'clienteID' ).value );
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
              contactos = d[ 'contactos' ];
              contactos.forEach( function( b ) {
                document.getElementById( 'prospectos_nuevoseguimiento_involucrados' ).add( new Option( b.contacto , b.id , '' , ( ( selected == b.id ) ? true : false ) ) );
              });
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

      axios.post( ruta , datos , config )
           .then( response => {
             contenidos( 'clientes_seguimiento' , $( '#clienteID' ).val() );
           })
           .catch( err => {
              console.log( err );
           });

  }
</script>
