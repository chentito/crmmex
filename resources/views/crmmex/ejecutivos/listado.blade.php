
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-users fa-sm"></i><span class="d-none d-sm-inline">  Listado Usuarios</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-user-plus fa-sm"></i><span class="d-none d-sm-inline">  Nuevo Usuario</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="{{$container}} border-left border-right border-bottom p-2">
        <div id="listadoEjecutivos_config"></div>
        <table id="listadoEjecutivos" class="table table-striped responsive nowrap" style="width:100%"></table>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="{{$container}} border-left border-right border-bottom p-2">
        <form id="edicionUsuariosForm" class="needs-validation" novalidate>
          <input type="hidden" id="edicionUsuariosID" name="edicionUsuariosID" value="" >
            <div class="form-row">
              <div class="col-sm-3">
                <label for="edicionUsuariosNombre">Nombre:</label>
                <input type="text" class="form-control form-control-sm" id="edicionUsuariosNombre" name="edicionUsuariosNombre" placeholder="Nombre" value="" required>
                <div class="invalid-feedback">
                    No ha proporcionado el nombre del usuario.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosAPaterno">A.Paterno:</label>
                <input type="text" class="form-control form-control-sm" id="edicionUsuariosAPaterno" name="edicionUsuariosAPaterno" placeholder="Apellido Paterno" />
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosAMaterno">A.Materno:</label>
                <input type="text" class="form-control form-control-sm" id="edicionUsuariosAMaterno" name="edicionUsuariosAMaterno" placeholder="Apellido Materno" />
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosAMaterno">Estatus:</label>
                <select id="edicionUsuariosEstatus" name="edicionUsuariosEstatus" class="custom-select custom-select-sm">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-3">
                <label for="edicionUsuariosEmail">Email:</label>
                <input type="text" class="form-control form-control-sm" id="edicionUsuariosEmail" name="edicionUsuariosEmail" placeholder="Email" value="" required>
                <div class="invalid-feedback">
                  No ha proporcionado el email del usuario.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosContrasena">Contrase&ntilde;a:</label>
                <input type="password" class="form-control form-control-sm" id="edicionUsuariosContrasena" name="edicionUsuariosContrasena" placeholder="Contrase&ntilde;a" value="" required>
                <div class="invalid-feedback">
                  No ha proporcionado una contraseña.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosRepiteContrasena">Repetir Contrase&ntilde;a:</label>
                <input type="password" class="form-control form-control-sm" id="edicionUsuariosRepiteContrasena" name="edicionUsuariosRepiteContrasena" placeholder="Repetir Contrase&ntilde;a" value="" required>
                <div class="invalid-feedback">
                  Debe repetir la contraseña.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosRol">Perfil:</label>
                <select id="edicionUsuariosRol" name="edicionUsuariosRol" class="custom-select custom-select-sm">
                </select>
              </div>
              <div class="col-sm-3">
                <label for="edicionUsuariosExtension">Extensión:</label>
                <input type="text" class="form-control form-control-sm" id="edicionUsuariosExtension" name="edicionUsuariosExtension" placeholder="Extension" />
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-12">
                <label for="edicionUsuariosComentarios">Comentarios</label>
                <textarea id="edicionUsuariosComentarios" name="edicionUsuariosComentarios" class="form-control form-control-sm"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 text-center mt-3">
                <button class="btn btn-sm {{$btn}}" id="btnAltaEjecutivo" type="submit"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
            </div>
        </form>
      </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <div class="container border-left border-right border-bottom p-2">
      </div>
  </div>
</div>

<script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
      }, false);
    })();

    generaDataGrid( 'listadoEjecutivos' );
    listadoPerfiles();

    document.getElementById( 'btnAltaEjecutivo' ).addEventListener( 'click' , function( e ){
          e.preventDefault();
          altaEjecutivo();
    });

  function altaEjecutivo() {
    var datos  = new FormData( document.getElementById( 'edicionUsuariosForm' ) );
    if( $( '#edicionUsuariosIdAdmin' ).length == 0 ) {
      var url = '/api/altaEjecutivo';
      var mensaje = 'agregado';
    } else {
      var url = '/api/editaEjecutivo';
      var mensaje = 'editado';
    }

    if( document.getElementById( 'edicionUsuariosNombre' ).value == '' ) {
      aviso( 'No ha proporcionado el nombre del usuario' , false );
    } else if( document.getElementById( 'edicionUsuariosAPaterno' ).value == '' ) {
      aviso( 'No ha proporcionado el apellido paterno del usuario' , false );
    } else if( document.getElementById( 'edicionUsuariosEmail' ).value == '' ) {
      aviso( 'No ha proporcionado el correo electrónico del usuario' , false );
    } else if( mensaje == 'agregado' && document.getElementById( 'edicionUsuariosContrasena' ).value == '' ) {
      aviso( 'No ha proporcionado una contraseña' , false );
    } else if( document.getElementById( 'edicionUsuariosContrasena' ).value !=  document.getElementById( 'edicionUsuariosRepiteContrasena' ).value ) {
      aviso( 'Las contraseñas no coinciden' , false );
    } else {
      var config = { headers: {'Accept': 'application/json','Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
      axios.post( url , datos , config )
        .then( resp => {
          contenidos( 'ejecutivos_listado' );
          aviso( 'Usuario ' + mensaje + ' correctamente' );
        })
        .catch( err => {
          console.log( err );
       });
    }
  }

    function listadoPerfiles() {
        var config = {headers: {'Accept': 'application/json','Authorization': 'Bearer ' + sessionStorage.getItem( 'apiToken' )}};
        axios.get( '/api/listadoPerfiles' , config )
             .then( response => {
                response.data.perfiles.forEach( function( e , i ){
                    document.getElementById( 'edicionUsuariosRol' ).add( new Option( e.nombre , e.id , false , false ) );
                });
             })
             .catch( err => {
                console.log( err );
             });
    }

</script>
