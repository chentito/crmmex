<form id="edicionUsuariosForm">
  <input type="hidden" id="edicionUsuariosID" name="edicionUsuariosID" value="" >
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
        <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Datos del Ejecutivo</span>
      </a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container border-left border-bottom border-right p-1">
          <div class="row">
            <div class="col-sm-3">
              <label for="edicionUsuariosNombre">Nombre:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosNombre" name="edicionUsuariosNombre" placeholder="Nombre" />
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
                  <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="edicionUsuariosEmail">Email:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosEmail" name="edicionUsuariosEmail" placeholder="Email" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosContrasena">Contrase&ntilde;a:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosContrasena" name="edicionUsuariosContrasena" placeholder="Contrase&ntilde;a" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosRepiteContrasena">Repetir Contrase&ntilde;a:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosRepiteContrasena" name="edicionUsuariosRepiteContrasena" placeholder="Repetir Contrase&ntilde;a" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosRol">Rol:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosRol" name="edicionUsuariosRol" placeholder="Repetir Contrase&ntilde;a" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12"><hr></div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="edicionUsuariosCalle">Calle:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosCalle" name="edicionUsuariosCalle" placeholder="Calle" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosExterior">No Exterior:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosExterior" name="edicionUsuariosExterior" placeholder="No. Exterior" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosInterior">No Interior:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosInterior" name="edicionUsuariosInterior" placeholder="No. Interior" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosColonia">Colonia:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosColonia" name="edicionUsuariosColonia" placeholder="Colonia" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label for="edicionUsuariosCiudad">Ciudad:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosCiudad" name="edicionUsuariosCiudad" placeholder="Ciudad" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosEstado">Estado:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosEstado" name="edicionUsuariosEstado" placeholder="Estado" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosCP">CP:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosCP" name="edicionUsuariosCP" placeholder="Codigo Postal" />
            </div>
            <div class="col-sm-3">
              <label for="edicionUsuariosPais">Pais:</label>
              <input type="text" class="form-control form-control-sm" id="edicionUsuariosPais" name="edicionUsuariosPais" placeholder="Pais" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label for="edicionUsuariosComentarios">Comentarios</label>
              <textarea id="edicionUsuariosComentarios" name="edicionUsuariosComentarios" class="form-control form-control-sm"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 text-center mt-3">
              <button class="btn btn-sm {{$btn}}" id="btnRegresaListadoEjecutivos"><i class="fa fa-undo fa-sm"></i> Regresar</button>
              <button class="btn btn-sm {{$btn}}" id="btnAltaEjecutivo"><i class="fa fa-save fa-sm"></i> Guardar</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</form>

<script>
  $( '#btnRegresaListadoEjecutivos' ).click( function( e ) {
    e.preventDefault();
    contenidos( 'ejecutivos_listado' );
  });

  $( '#btnAltaEjecutivo' ).click( function( e ) {
    e.preventDefault();
    altaEjecutivo();
  });

  function altaEjecutivo() {
    var token  = sessionStorage.getItem( 'apiToken' );
    var datos  = $( '#edicionUsuariosForm' ).serialize();
    if( $( '#edicionUsuariosIdAdmin' ).length == 0 ) {
        var url = '/api/altaEjecutivo';
    } else {
        var url = '/api/editaEjecutivo';
    }
    var config = {
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      }
    };

    axios.post( url , datos , config )
         .then( resp => {
           contenidos( 'ejecutivos_listado' );
         })
         .catch( err => {
           console.log( err );
         });
  }
</script>
