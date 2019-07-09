<style>
  $custom-file-text: (
    en: "Browse",
    es: "Elegir"
  );
</style>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-desktop fa-sm"></i><span class="d-none d-sm-inline">  Templates</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-list fa-sm"></i><span class="d-none d-sm-inline">  Listas de envío</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-cogs fa-sm"></i><span class="d-none d-sm-inline">  Servicios Externos</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container border-left border-right border-bottom p-1">
          <div class="row mt-3">
              <div class="col-sm-2 mt-1">
                <label for="listaTemplatesDisponibles">Templates disponibles:</label>
              </div>
              <div class="col-sm-4 mt-1">
                <select class="custom-select custom-select-sm" name="listaTemplatesDisponibles" id="listaTemplatesDisponibles">
                </select>
              </div>
              <div class="col-sm-4 mt-1">
                <label for="btnEditaTemplateSeleccionado">&nbsp;</label>
                <button class="btn btn-sm {{$btn}}" id="btnEditaTemplateSeleccionado" name="btnEditaTemplateSeleccionado"><i class="fa fa-edit fa-sm"></i> Editar Seleccionado</button>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                <hr>
              </div>
          </div>
          <form id="editaDisenoTemplate_form" name="editaDisenoTemplate_form">
          <div class="row">
              <div class="col-sm-3 mt-1">
                  <label for="nombreNuevoTemplate">Nombre del template:</label>
                  <input type="text" name="nombreNuevoTemplate" id="nombreNuevoTemplate" value="" placeholder="Nombre Template" class="form-control form-control-sm">
                  <input type="hidden" name="idTemplateEditado" id="idTemplateEditado" value="0" >
              </div>
              <div class="col-sm-12 mt-2">
                <textarea name="disenoTemplate" id="disenoTemplate" rows="8" cols="80" class="form-control form-control-sm"></textarea>
                <script>var editorTemplate = new Jodit('#disenoTemplate');</script>
              </div>
              <div class="col-sm-12 mt-2 text-center">
                <button class="btn btn-sm {{$btn}}" id="guardaTemplateEditado"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
          </div>
          </form>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-right border-bottom p-1">
        <div class="row">
            <div class="col-sm-4">
              Listados
            </div>
            <div class="col-sm-8">
              Contactos
            </div>
            <div class="col-sm-4">
              <select class="custom-select custom-select-sm" id="listadoAudiencias" name="listadoAudiencias" multiple style="height:200px"></select>
            </div>
            <div class="col-sm-8">
              <select class="custom-select custom-select-sm" id="listadoContactos" name="listadoContactos" multiple style="height:200px"></select>
            </div>
        </div>
        <div class="row mt-3"><div class="col-sm-2">Cargar Listado</div><div class="col-sm-10"><hr></div></div>
        <form id="altaAudiencia_form" name="altaAudiencia_form">
        <div class="row">
            <div class="col-sm-4">
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input custom-file-input-sm" id="altaAudiencia_file" name="altaAudiencia_file" aria-describedby="inputGroupFileAddon01" accept=".csv">
                  <label class="custom-file-label" for="altaAudiencia_file">Seleccione archivo (formato CSV)</label>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-3">
                  <label for="altaAudiencia_posEmail">Posición columna email:</label>
                  <input type="number" class="form-control form-control-sm" name="altaAudiencia_posEmail" id="altaAudiencia_posEmail" value="0">
                </div>
                <div class="col-sm-3">
                  <label for="altaAudiencia_posNom">Posición columna nombre:</label>
                  <input type="number" class="form-control form-control-sm" name="altaAudiencia_posNom" id="altaAudiencia_posNom" value="1">
                </div>
                <div class="col-sm-3">
                  <label for="altaAudiencia_posTel">Posición columna teléfono:</label>
                  <input type="number" class="form-control form-control-sm" name="altaAudiencia_posTel" id="altaAudiencia_posTel" value="2">
                </div>
                <div class="col-sm-3">
                  <label for="altaAudiencia_posEmpresa">Posición columna empresa:</label>
                  <input type="number" class="form-control form-control-sm" name="altaAudiencia_posEmpresa" id="altaAudiencia_posEmpresa" value="3">
                </div>
              </div>
            </div>
            <div class="col-sm-4 mt-3">
              <label for="altaAudiencia_nombreListado">Nombre Listado:</label>
              <input type="text" class="form-control form-control-sm" name="altaAudiencia_nombreListado" id="altaAudiencia_nombreListado" placeholder="Nombre Listado">
            </div>
            <!--div class="col-sm-4 mt-3">
              <label for="altaAudiencia_delimitador">Delimitador de campos:</label>
              <select id="altaAudiencia_delimitador" name="altaAudiencia_delimitador" class="custom-select custom-select-sm">
                <option value="\t">{tabulador}</option>
                <option value="\s">{espacios}</option>
                <option value=",">,</option>
                <option value=";">;</option>
                <option value=":">:</option>
              </select>
            </div>
            <div class="col-sm-4 mt-3">
              <label for="altaAudiencia_delimitadorCadena">Delimitador de cadena:</label>
              <select id="altaAudiencia_delimitadorCadena" name="altaAudiencia_delimitadorCadena" class="custom-select custom-select-sm">
                <option value="">Sin delimitador</option>
                <option value='"'>"</option>
                <option value="'">'</option>
              </select>
            </div-->
            <div class="col-sm-12 text-center mt-3">
              <button type="button" name="altaAudiencia_btnGuarda" id="altaAudiencia_btnGuarda" class="btn btn-sm {{$btn}}"><i class="fa fa-save fa-sm"></i> Guardar</button>
            </div>
      </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container border-left border-right border-bottom p-1">
        Conexiones
    </div>
  </div>
</div>

<script>

    cargaListados();
    listadoPiezas();

    document.getElementById( 'guardaTemplateEditado' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'editaDisenoTemplate_form' ) );
        datos.append( 'diseno_template_editor' , editorTemplate.getEditorValue() );

        abreModal();
        axios.post( '/api/altaPiezaTemplate' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
               aviso( 'Template agregado correctamente' );
               listadoPiezas();
               cierraModal();
             })
             .catch( err => {
               cierraModal();
               console.log( err );
             });
    });

    document.getElementById( 'btnEditaTemplateSeleccionado' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var piezaID = document.getElementById( 'listaTemplatesDisponibles' ).value;
        if( piezaID == 0 ) {
          document.getElementById( 'nombreNuevoTemplate' ).value = "";
          document.getElementById( 'idTemplateEditado' ).value = "";
          editorTemplate.setEditorValue( "" );
        } else {
          axios.get( '/api/detallePiezaTemplate/' + piezaID , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
               .then( response => {
                  datos = response.data;
                  document.getElementById( 'nombreNuevoTemplate' ).value = datos.nombrePieza;
                  document.getElementById( 'idTemplateEditado' ).value = datos.id;
                  editorTemplate.setEditorValue( datos.pieza );
               })
               .catch( err => {
                 console.log( err );
               });
       }
    });

    document.getElementById( 'altaAudiencia_btnGuarda' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        altaAudiencia();
    });

    document.getElementById( 'listadoAudiencias' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        listadoContactosEnvio( this.value );
    });

    function listadoPiezas() {
        axios.get( '/api/listadoPiezasDisponibles/' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                document.getElementById( 'listaTemplatesDisponibles' ).add( new Option( '-' , '0' , false, false ) );
                response.data.forEach( function( e , i ){
                    document.getElementById( 'listaTemplatesDisponibles' ).add( new Option( e.nombrePieza , e.id, false, false ) );
                });
             })
             .catch( err => {
               console.log( err );
             });
    }

    function limpiaForm() {
        cargaListados();
        document.getElementById( 'listadoContactos' ).innerHTML        = '';
        document.getElementById( 'altaAudiencia_nombreListado' ).value = '';
        document.getElementById( 'altaAudiencia_file' ).value          = '';
        document.getElementById( 'altaAudiencia_posEmail' ).value      = '0';
        document.getElementById( 'altaAudiencia_posNom' ).value        = '1';
        document.getElementById( 'altaAudiencia_posTel' ).value        = '2';
        document.getElementById( 'altaAudiencia_posEmpresa' ).value    = '3';
    }

    function altaAudiencia() {
        if( document.getElementById( 'altaAudiencia_file' ).value == '' ) {
          aviso( 'No ha seleccionado un archivo a procesar' , false );
        } else if( document.getElementById( 'altaAudiencia_nombreListado' ).value == '' ) {
          aviso( 'No ha proporcionado un nombre para el nuevo listado' , false );
        } else if(
            document.getElementById( 'altaAudiencia_posEmail' ).value == '' ||
            document.getElementById( 'altaAudiencia_posNom' ).value == '' ||
            document.getElementById( 'altaAudiencia_posTel' ).value == '' ||
            document.getElementById( 'altaAudiencia_posEmpresa' ).value == ''
         ) {
          aviso( 'Debe asignar el nombre de la columna para todos los campos enlistados' );
        } else {
          abreModal();
          var datos = new FormData( document.getElementById( 'altaAudiencia_form' ) );
          axios.post( '/api/altaAudiencia' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ),'content-type': 'multipart/form-data'}})
               .then( response => {
                  cierraModal();
                  aviso( response.data.msj );
                  limpiaForm();
               })
               .catch( err => {
                 cierraModal();
                 console.log( err );
               });

        }
    }

    function listadoContactosEnvio( audienciaID ) {
        document.getElementById( 'listadoContactos' ).innerHTML = '';
        axios.get( '/api/listadoContactosAudiencia/' + audienciaID , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
               response.data.forEach( function( e , i ) {
                  document.getElementById( 'listadoContactos' ).add( new Option( e.nombre + '|Email ' + e.email + ' |Telefono ' + e.telefono + ' |Empresa ' + e.empresa , e.id , false , false ) );
               });
             })
             .catch( err => {
               console.log( err );
             });
     }

     function cargaListados() {
       document.getElementById( 'listadoAudiencias' ).innerHTML = '';
       var config = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}};
       axios.get( '/api/listadoListas' , config )
            .then( response => {
               response.data.forEach( function( e , i ){
                   document.getElementById( 'listadoAudiencias' ).add( new Option( e.nombre , e.id , false , false ) );
               });
            })
            .catch( err => {
              console.log( err );
            });
     }

</script>
