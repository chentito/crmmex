<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="perfiles-tab" data-toggle="tab" href="#perfiles" role="tab" aria-controls="perfiles" aria-selected="true">Perfiles</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nuevo Perfil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Asignar Privilegios</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="perfiles" role="tabpanel" aria-labelledby="perfiles-tab">
      <div class="container border-left border-right border-bottom p-1">
          <div id="listadoPerfiles_config"></div>
          <table id="listadoPerfiles" class="table table-striped nowrap response" style="width:100%"></table>
      </div>
  </div>
  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container border-left border-right border-bottom p-1">
        <form id="roles_form" name="roles_form">
          <input type="hidden" id="roles_idPerfil" name="roles_idPerfil" value="0">
          <div class="row">
            <div class="col-sm-6">
                <label for="roles_nombrePerfil">Nombre del Perfil</label>
                <input type="text" id="roles_nombrePerfil" name="roles_nombrePerfil" placeholder="Nombre del perfil" class="form-control form-control-sm">
            </div>
            <div class="col-sm-6">
                <label for="roles_statusPerfil">Estatus</label>
                <select id="roles_statusPerfil" name="roles_statusPerfil" class="custom-select custom-select-sm">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-12 mt-2 mb-2 text-center"><button class="btn btn-sm {{$btn}}" id="btnGuardaPerfil"><i class="fa fa-sm fa-save"></i> Guardar Perfil</button></div>
          </div>
        </form>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="container border-left border-right border-bottom p-1">
        <div class="row">
          <div class="col-sm-3">
            <label for="roles_listadoPerfiles">Seleccione Perfil</label>
            <select id="roles_listadoPerfiles" name="roles_listadoPerfiles" class="custom-select custom-select-sm">
                <option value="-">Seleccione Perfil</option>
            </select>
          </div>
          <div class="col-sm-9"></div>
        </div>
        <hr>
        <div class="row mt-3">
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Clientes</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Alta</label></li>
                        <li><input type="checkbox" id="1_2_privilegio" name="1_2_privilegio" class="mr-2"><label for="1_2_privilegio">Listado</label></li>
                        <li><input type="checkbox" id="1_3_privilegio" name="1_3_privilegio" class="mr-2"><label for="1_3_privilegio">Edicion de registro</label></li>
                        <li><input type="checkbox" id="1_4_privilegio" name="1_4_privilegio" class="mr-2"><label for="1_4_privilegio">Seguimientos</label></li>
                        <li><input type="checkbox" id="1_5_privilegio" name="1_5_privilegio" class="mr-2"><label for="1_5_privilegio">Propuestas</label></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Ventas</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Reportes</label></li>
                        <li><input type="checkbox" id="1_2_privilegio" name="1_2_privilegio" class="mr-2"><label for="1_2_privilegio">Listado facturas</label></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Mercadotecnia</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Campañas</label></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Reportes</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Resumen</label></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Configuraciones</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Catalogos Generales</label></li>
                        <li><input type="checkbox" id="1_2_privilegio" name="1_2_privilegio" class="mr-2"><label for="1_2_privilegio">Productos/Servicios</label></li>
                        <li><input type="checkbox" id="1_3_privilegio" name="1_3_privilegio" class="mr-2"><label for="1_3_privilegio">Forecast</label></li>
                        <li><input type="checkbox" id="1_4_privilegio" name="1_4_privilegio" class="mr-2"><label for="1_4_privilegio">Pipeline</label></li>
                        <li><input type="checkbox" id="1_5_privilegio" name="1_5_privilegio" class="mr-2"><label for="1_5_privilegio">Campos Adicionales</label></li>
                        <li><input type="checkbox" id="1_5_privilegio" name="1_5_privilegio" class="mr-2"><label for="1_5_privilegio">SMTP</label></li>
                        <li><input type="checkbox" id="1_5_privilegio" name="1_5_privilegio" class="mr-2"><label for="1_5_privilegio">Branding</label></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="col-sm-3 mt-2">
              <div class="card card-sm">
                  <div class="card-header">Ejecutivos</div>
                  <div class="card-body">
                      <ul>
                        <li><input type="checkbox" id="1_1_privilegio" name="1_1_privilegio" class="mr-2"><label for="1_1_privilegio">Perfil</label></li>
                        <li><input type="checkbox" id="1_2_privilegio" name="1_2_privilegio" class="mr-2"><label for="1_2_privilegio">Actividades</label></li>
                        <li><input type="checkbox" id="1_3_privilegio" name="1_3_privilegio" class="mr-2"><label for="1_3_privilegio">Listado Ejecutivos</label></li>
                        <li><input type="checkbox" id="1_4_privilegio" name="1_4_privilegio" class="mr-2"><label for="1_4_privilegio">Roles</label></li>
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>

<script>
    generaDataGrid( 'listadoPerfiles' );
    cargaRoles();

    document.getElementById( 'btnGuardaPerfil' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'roles_form' ) );
        if( document.getElementById( 'roles_idPerfil' ).value == '0' ) {
              var url = '/api/altaPerfil';
              var msj = 'agregado';
          } else {
              var url = '/api/actualizaPerfil';
              var msj = 'modificado';
        }

        axios.post( url , datos , {header:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                  aviso( 'El perfil se ha ' + msj + ' correctamente' );
                  contenidos( 'ejecutivos_roles' );
             })
             .catch( err => {
                  console.log( err );
             });
    });

    function cargaRoles() {
        axios.get( '/api/listadoPerfiles' , {header:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                response.data.perfiles.forEach( function( e , i ){
                    document.getElementById( 'roles_listadoPerfiles' ).add( new Option( e.nombre , e.id , false , false ) );
                });
             })
             .catch( err => {
                console.log( err );
             });
    }
</script>
