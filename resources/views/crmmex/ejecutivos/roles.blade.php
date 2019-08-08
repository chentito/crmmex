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
      <div class="{{$container}} border-left border-right border-bottom p-1">
          <div id="listadoPerfiles_config"></div>
          <table id="listadoPerfiles" class="table table-striped nowrap response" style="width:100%"></table>
      </div>
  </div>
  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="{{$container}} border-left border-right border-bottom p-1">
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
      <div class="{{$container}} border-left border-right border-bottom p-1">
        <div class="row">
          <div class="col-sm-3">
            <label for="roles_listadoPerfiles">Seleccione Perfil</label>
            <select id="roles_listadoPerfiles" name="roles_listadoPerfiles" class="custom-select custom-select-sm">
                <option value="-">Seleccione Perfil</option>
            </select>
          </div>
          <div class="col-sm-9 text-right">
              <input type="checkbox" name="configuracionPrivilegios_btnSelTodos" id="configuracionPrivilegios_btnSelTodos" disabled>
              <label for="configuracionPrivilegios_btnSelTodos">Todos</label>
              <button class="btn btn-sm {{$btn}} ml-3" disabled id="configuracionPrivilegios_btnGuarda" name="configuracionPrivilegios_btnGuarda"><i class="fa fa-sm fa-save"></i> Guardar</button>
          </div>
          <div class="col-sm-12">
              <hr>
          </div>
        </div>
        <form id="configuracionPrivilegios_form" name="configuracionPrivilegios_form">
            <input type="hidden" id="perfilIDConf" name="perfilIDConf" value="">
            <div class="row" id="contenedorCajasModulosSecciones"></div>
        </form>
      </div>
  </div>
</div>

<script>
    generaDataGrid( 'listadoPerfiles' );
    cargaRoles();
    cargaSeccionesPorModulo();

    document.getElementById( 'configuracionPrivilegios_btnGuarda' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'configuracionPrivilegios_form' ) );
        var fields = 0;
        for ( var [key, value] of datos.entries() ) { fields ++; }

        if( fields <= 1 ) {
          aviso( 'Debe habilitar al menos un privilegio para el perfil seleccionado' , false );
        } else {
          var conf  = {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
          axios.post( '/api/guardaPrivilegios' , datos , conf )
               .then( response => {
                  aviso( 'Privilegio actualizado correctamente' );
                  contenidos( 'ejecutivos_roles' );
               })
               .catch( err => {
                    console.log( err );
               });
        }
    });

    document.getElementById( 'configuracionPrivilegios_btnSelTodos' ).addEventListener( 'click' , function( e ){
        estadoCheckBoxes( document.getElementById( 'configuracionPrivilegios_btnSelTodos' ).checked );
    });

    document.getElementById( 'roles_listadoPerfiles' ).addEventListener( 'change' , function( e ) {
        document.getElementById( 'configuracionPrivilegios_btnSelTodos' ).checked=false;
        e.preventDefault();
        var perfilID = this.value;
        if( perfilID != '-' ) {
            cargaPrivilegiosPorPerfil( this.value );
            document.getElementById( 'configuracionPrivilegios_btnSelTodos' ).disabled = false;
            document.getElementById( 'configuracionPrivilegios_btnGuarda' ).disabled = false;
            document.getElementById( 'perfilIDConf' ).value = this.value;
        } else {
           estadoCheckBoxes( false , true );
           document.getElementById( 'configuracionPrivilegios_btnSelTodos' ).disabled = true;
           document.getElementById( 'configuracionPrivilegios_btnGuarda' ).disabled = true;
        }
    });

    document.getElementById( 'btnGuardaPerfil' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'roles_form' ) );
        if( document.getElementById( 'roles_idPerfil' ).value == '0' ) {
              var url = '/api/altaPerfil';
              var msj = 'agregado';
          } else {
              var url = '/api/actualizaPerfil';
              var msj = 'modificado';
        }

        axios.post( url , datos , {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                  aviso( 'El perfil se ha ' + msj + ' correctamente' );
                  contenidos( 'ejecutivos_roles' );
             })
             .catch( err => {
                  console.log( err );
             });
    });

    function cargaRoles() {
        axios.get( '/api/listadoPerfiles' , {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                response.data.perfiles.forEach( function( e , i ){
                    document.getElementById( 'roles_listadoPerfiles' ).add( new Option( e.nombre , e.id , false , false ) );
                });
             })
             .catch( err => {
                console.log( err );
             });
    }

    function cargaPrivilegiosPorPerfil( perfilID ) {
        estadoCheckBoxes( false );
        var header = {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
        axios.get( '/api/listadoPrivilegios/' + perfilID , header )
             .then( response => {
                response.data.secciones.forEach( function( e , i ){
                    document.getElementById( 'seccion_' + e.idSeccion ).checked = true;
                });
                response.data.modulos.forEach( function( e , i ){
                    document.getElementById( 'modulo_' + e.moduloID ).checked = true;
                });
             })
             .catch( err => {
                console.log( err );
             });
    }

    function estadoCheckBoxes( estado , deshabilitado=false) {
        var checkboxes = new Array();
        checkboxes = document.getElementById( 'configuracionPrivilegios_form' ).getElementsByTagName( 'input' );
        for (var i=0; i<checkboxes.length; i++)  {
            if ( checkboxes[ i ].type == 'checkbox' ) {
                 checkboxes[ i ].checked  = estado;
                 checkboxes[ i ].disabled = deshabilitado;
            }
        }
    }

    function cargaSeccionesPorModulo() {
        var headers = {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
        axios.get( '/api/listadoModulos' , headers )
             .then( response => {
                  response.data.forEach( function( e , i ){
                      var div = document.createElement( 'div' );
                      div.className = 'col-sm-4 mt-2';
                      var card = document.createElement( 'div' );
                      card.className = 'card card-sm';
                      var header = document.createElement( 'div' );
                      header.className = 'card-header';
                      header.innerHTML = e.nombre + '<div class="float-right"><input type="checkbox" id="modulo_'+e.id+'" name="modulo_'+e.id+'" onclick="privilegiosPorSeccion(\'modulo_'+e.id+'\')"></div>';
                      var body = document.createElement( 'div' );
                      body.className = 'card-body';
                      var ul = document.createElement( 'ul' );

                      axios.get( '/api/listadoSecciones/' + e.id , headers )
                           .then( response => {
                                response.data.forEach( function( el , il ) {
                                    var li = document.createElement( 'li' );
                                    var x = document.createElement( 'input' );
                                    x.className = 'ml-2 mr-2';
                                    x.setAttribute( 'value'    , el.id );
                                    x.setAttribute( 'type'     , 'checkbox' );
                                    x.setAttribute( 'disabled' , true );
                                    x.setAttribute( 'name'     , 'seccion_' + el.id );
                                    x.setAttribute( 'id'       , 'seccion_' + el.id );
                                    x.setAttribute( 'title'    , el.descripcion );

                                    var label = document.createElement( 'label' );
                                    label.setAttribute( 'for'   , 'seccion_' + el.id );
                                    label.setAttribute( 'title' , el.descripcion );
                                    label.innerHTML = el.nombre;

                                    li.appendChild( x );
                                    li.appendChild( label );
                                    ul.appendChild( li );
                                });
                           })
                           .catch( err => {
                              console.log( err );
                           });
                      body.appendChild( ul ) ;

                      card.appendChild( header );
                      card.appendChild( body );
                      div.appendChild( card );
                      document.getElementById( 'contenedorCajasModulosSecciones' ).appendChild( div );
                  });

                  estadoCheckBoxes( false , true );
             })
             .catch( err => {
                  console.log( err );
             });
    }

    function privilegiosPorSeccion( moduloID ) {
        var id     = moduloID.split( '_' );
        var header = {headers:{ 'Accept':'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };
        axios.get( '/api/listadoSecciones/' + id[ 1 ] , header )
             .then( response => {
                  response.data.forEach( function( e , i ){
                      document.getElementById( 'seccion_' + e.id ).checked = document.getElementById( moduloID ).checked;
                  });
             })
             .catch( err => {
                console.log( err );
             });
    }

</script>
