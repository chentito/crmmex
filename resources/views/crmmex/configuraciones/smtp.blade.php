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
              <label for="conf_smtp_port">Puerto</label>
              <input type="text" class="form-control form-control-sm" id="conf_smtp_port" name="conf_smtp_port" required placeholder="Puerto">
            </div>
            <div class="col-sm-3 mb-1">
              <label for="conf_smtp_security">Seguridad</label>
              <select class="custom-select custom-select-sm" id="conf_smtp_security" name="conf_smtp_security">
                  <option value="">Ninguna</option>
                  <option value="tls">TLS</option>
                  <option value="ssl">SSL</option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_from">De Nombre</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_fromName" name="conf_smtp_fromName" required placeholder="De (Nombre)">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_usuario">Usuario</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_usuario" name="conf_smtp_usuario" required placeholder="Usuario">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_passwd">Contrase&ntilde;a</label>
            <input type="password" class="form-control form-control-sm" id="conf_smtp_passwd" name="conf_smtp_passwd" required placeholder="Contrase&ntilde;a">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_copy">Copia</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_copy" name="conf_smtp_copy" placeholder="Para">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_copy">Copia Nombre</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_copyName" name="conf_smtp_copyName" placeholder="Para (Nombre)">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_copy">Responder a</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_replyTo" name="conf_smtp_replyTo" placeholder="Responder a">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_copy">Copia</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_replyToName" name="conf_smtp_replyToName" placeholder="Responder a (Nombre)">
          </div>
          <div class="col-sm-3 mb-1">
            <label for="conf_smtp_copy">Destinatario Prueba</label>
            <input type="text" class="form-control form-control-sm" id="conf_smtp_destinatarioPrueba" name="conf_smtp_destinatarioPrueba" placeholder="Destinatario prueba">
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-sm-12 mb-1 mt-3 text-center">
          <button id="btnPruebaConfiguracion" class="btn btn-sm {{$btn}}"><i class="fa fa-paper-plane fa-sm"></i> Probar Configuraci&oacute;n</button>
          <button id="btnGuardaConfSMTP" class="btn btn-sm {{$btn}}" disabled><i class="fa fa-save fa-sm"></i> Guardar Configuraci&oacute;n</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  obtieneDatosSMTP();

  document.getElementById( 'btnPruebaConfiguracion' ).addEventListener( 'click' , function(){
    var datos  = new FormData( document.getElementById( 'conf_smtp_form' ) );
    var config = { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };

    if( document.getElementById( 'conf_smtp_destinatarioPrueba' ).value == "" ) {
      aviso( 'No ha proporcionado una cuenta de recepción para el envio de la prueba' , false );
      document.getElementById( 'conf_smtp_destinatarioPrueba' ).focus();
    } else {
      axios.post( '/api/testSMTP' , datos , config )
          .then( response => {
            if( response.data == 'true' ) {
              aviso( 'Los datos configurados son correctos, puede guardar la infromación' );
              document.getElementById( 'btnGuardaConfSMTP' ).disabled = false;
            } else {
              aviso( 'Los datos configurados no son correctos, verifique su información' , false );
              document.getElementById( 'btnGuardaConfSMTP' ).disabled = true;
            }
          })
          .catch( err => {
            console.log( err );
          });
    }

  });

  $( '#btnGuardaConfSMTP' ).click( function( e ) {
    e.preventDefault();
    actualizaDatos();
  });

  function actualizaDatos() {
    var datos = $( '#conf_smtp_form' ).serialize();
    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/actualizaSMTP';
    var config = { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + token } };

    axios.post( url , datos , config )
        .then( response => {
          aviso( 'Configuracion guardada correctamente' );
          contenidos( 'configuraciones_smtp' );
        })
        .catch( err => {
          console.log( err );
        });
  }

  function obtieneDatosSMTP() {
    var url    = '/api/obtieneSMTP';
    var token  = sessionStorage.getItem( 'apiToken' );
    var config = { headers: { 'Accept' : 'application/json', 'Authorization': 'Bearer ' + token } };

    axios.get( url , config )
      .then( response => {
        document.getElementById( 'conf_smtp_host' ).value        = response.data.servidor;
        document.getElementById( 'conf_smtp_usuario' ).value     = response.data.usuario;
        document.getElementById( 'conf_smtp_passwd' ).value      = response.data.contrasena;
        document.getElementById( 'conf_smtp_port' ).value        = response.data.puerto;
        document.getElementById( 'conf_smtp_security' ).value    = response.data.seguridad;
        document.getElementById( 'conf_smtp_fromName' ).value    = response.data.nombre;
        document.getElementById( 'conf_smtp_copy' ).value        = response.data.copia;
        document.getElementById( 'conf_smtp_copyName' ).value    = response.data.copiaNombre;
        document.getElementById( 'conf_smtp_replyTo' ).value     = response.data.replyTo;
        document.getElementById( 'conf_smtp_replyToName' ).value = response.data.replyToNombre;
      })
      .catch( err => {
        console.log( err );
      });
  }

</script>
