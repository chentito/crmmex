<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="conf-tab" data-toggle="tab" href="#home" role="tab" aria-controls="conf" aria-selected="true">
      <i class="fa fa-cogs fa-sm"></i><span class="d-none d-sm-inline">  Configuraci&oacute;n</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="conf" role="tabpanel" aria-labelledby="conf-tab">
    <div class="{{$container}} border-left border-bottom border-right p-1">
      <form id="conf_smtp_form" name="conf_smtp_form">
        <div class="row">
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_host">Servidor (Host)</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_host" name="conf_smtp_host" required placeholder="Servidor SMTP (host)">
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_usuario">Usuario</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_usuario" name="conf_smtp_usuario" required placeholder="Usuario">
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_passwd">Contrase&ntilde;a</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_passwd" name="conf_smtp_passwd" required placeholder="Contrase&ntilde;a">
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_port">Puerto</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_port" name="conf_smtp_port" required placeholder="Puerto">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_security">Seguridad</label>
              <select class="custom-select custom-select-sm" id="conf_smtp_security" name="conf_smtp_security">
                  <option value="">Ninguna</option>
                  <option value="TLS">TLS</option>
                  <option value="SSL">SSL</option>
              </select>
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_from">De</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_from" name="conf_smtp_from" required placeholder="De">
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_copy">Copia</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_copy" name="conf_smtp_copy" placeholder="Para">
            </div>
        </div>
      </form>
      <div class="row">
        <div class="col-sm-12 mb-1 mt-3 text-center">
          <button class="btn btn-sm {{$btn}}"><i class="fa fa-paper-plane fa-sm"></i> Probar Configuraci&oacute;n</button>
          <button id="btnGuardaConfSMTP" class="btn btn-sm {{$btn}}"><i class="fa fa-save fa-sm"></i> Guardar Configuraci&oacute;n</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  obtieneDatosSMTP();

  $( '#btnGuardaConfSMTP' ).click( function( e ) {
    e.preventDefault();
    actualizaDatos();
  });

  function actualizaDatos() {
    var datos = $( '#conf_smtp_form' ).serialize();
    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/actualizaSMTP';
    var config = {
      headers: {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + token
      }
    };

    axios.post( url , datos , config )
         .then( response => {
            contenidos( 'configuraciones_smtp' );
         })
         .catch( err => {
           console.log( err );
         });
  }

  function obtieneDatosSMTP() {
    var url   = '/api/obtieneSMTP';
    var token = sessionStorage.getItem( 'apiToken' );
    var config = {
      headers: {
        'Accept' : 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };

    axios.get( url , config )
        .then( response => {
            document.getElementById( 'conf_smtp_host' ).value = response.data.servidor;
            document.getElementById( 'conf_smtp_usuario' ).value = response.data.usuario;
            document.getElementById( 'conf_smtp_passwd' ).value = response.data.contrasena;
            document.getElementById( 'conf_smtp_port' ).value = response.data.puerto;
            document.getElementById( 'conf_smtp_security' ).value = response.data.seguridad;
            document.getElementById( 'conf_smtp_from' ).value = response.data.de;
            document.getElementById( 'conf_smtp_copy' ).value = response.data.copia;
        })
        .catch( err => {
            console.log( err );
        });

  }

</script>
