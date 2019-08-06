
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-desktop fa-sm"></i><span class="d-none d-sm-inline">  Templates</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">
      <i class="fa fa-edit fa-sm"></i><span class="d-none d-sm-inline">  Crear Template</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-edit fa-sm"></i><span class="d-none d-sm-inline">  Contacto</span>
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
                <div class="col-sm-6 mt-1">
                    Palabras reservadas
                    <ul>
                      <li><b>{nombre}</b> Nombre del destinatario</li>
                      <li><b>{email}</b> Correo del destinatario</li>
                      <li><b>{telefono}</b> Teléfono del destinatario</li>
                      <li><b>{empresa}</b> Empresa donde labora el destinatario</li>
                      <li><b>{formulario}</b> Formulario</li>
                    </ul>
                </div>
                <div class="col-sm-3 mt-1">
                    <label for="nuevoTemplateForm">Formulario:</label>
                    <select id="nuevoTemplateForm" id="nuevoTemplateForm" class="custom-select custom-select-sm">
                    </select>
                </div>
                <div class="col-sm-12 mt-2">
                  <textarea name="disenoTemplate" id="disenoTemplate" rows="8" cols="80" class="form-control form-control-sm"></textarea>
                  <script>
                    var editorTemplate = new Jodit('#disenoTemplate', {enableDragAndDropFileToEditor: true });
                  </script>
                </div>
                <div class="col-sm-12 mt-2 text-center">
                  <button class="btn btn-sm {{$btn}}" id="cancelaEdicionTemplate"><i class="fa fa-save fa-sm"></i> Cancelar Edición</button>
                  <button class="btn btn-sm {{$btn}}" id="guardaTemplateEditado"><i class="fa fa-save fa-sm"></i> Guardar</button>
                  <button class="btn btn-sm {{$btn}}" id="eliminaTemplateEditado"><i class="fa fa-trash fa-sm"></i> Eliminar</button>
                </div>
            </div>
          </form>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  </div>
  <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
    <div class="container border-left border-right border-bottom p-1">
      <form id="altaNuevoTemplate_form" name="altaNuevoTemplate_form">
        <div class="row">
          <div class="col-sm-4 mt-3">
              <label for="">Nombre:</label>
              <input type="text" name="altaNuevoTemplate_nombre" id="altaNuevoTemplate_nombre" value="" placeholder="Nombre de la pieza" class="form-control form-control-sm">
          </div>
          <div class="col-sm-5 mt-3">
            Palabras reservadas
            <ul>
              <li><b>{nombre}</b> Nombre del destinatario</li>
              <li><b>{email}</b> Correo del destinatario</li>
              <li><b>{telefono}</b> Teléfono del destinatario</li>
              <li><b>{empresa}</b> Empresa donde labora el destinatario</li>
              <li><b>{formulario}</b> Formulario</li>
            </ul>
          </div>
          <div class="col-sm-3 mt-1">
              <label for="altaNuevoTemplate_formOpciones">Formulario:</label>
              <select id="altaNuevoTemplate_formOpciones" id="altaNuevoTemplate_formOpciones" class="custom-select custom-select-sm">
              </select>
          </div>
          <div class="col-sm-12 mt-1">
              <label for="altaNuevoTemplate_pieza">Contenido:</label>
              <textarea name="altaNuevoTemplate_pieza" id="altaNuevoTemplate_pieza" rows="16" cols="80" class="form-control form-control-sm"></textarea>
              <script>
                var nuevaPieza = new Jodit('#altaNuevoTemplate_pieza',{
                  height: 400
                });
              </script>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-sm-12 text-center">
            <button type="button" name="altaNuevoTemplate_btn" id="altaNuevoTemplate_btn" class="btn btn-sm {{$btn}}"><i class="fa fa-save fa-sm"></i> Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="formularios" role="tabpanel" aria-labelledby="formularios-tab">
    <div class="container border-left border-right border-bottom p-1">
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container border-left border-right border-bottom p-1">
        <textarea id="mytextarea">Hello, World!</textarea>
    </div>
  </div>
</div>

<script>

    tinymce.init({
        selector: '#mytextarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste tinycomments tinydrive tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter insertfile pageembed permanentpen',
        toolbar_drawer: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Mexagon.net'
    });

    cargaFormularios();
    listadoPiezas();

    document.getElementById( 'altaNuevoTemplate_btn' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'altaNuevoTemplate_form' ) );
        datos.append( 'contPieza' , nuevaPieza.getEditorValue() );

        if( document.getElementById( 'altaNuevoTemplate_nombre' ).value == '' ) {
            aviso( 'No ha proporcionado un nombre para identificar el template' , false );
          } else if( nuevaPieza.getEditorValue() == '' ) {
            aviso( 'El contenido está vacío' , false );
        } else {
          axios.post( '/api/altaPiezaCampana' , datos , { headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
               .then( response => {
                  aviso( response.data.mensaje );
                  contenidos( 'configuraciones_destinatarios' );
               })
               .catch( err => {
                 console.log( err );
               });
        }
    });

    document.getElementById( 'cancelaEdicionTemplate' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        listadoPiezas();
        document.getElementById( 'nombreNuevoTemplate' ).value = "";
        document.getElementById( 'idTemplateEditado' ).value = "0";
        editorTemplate.setEditorValue( "" );
    });

    document.getElementById( 'guardaTemplateEditado' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        if( document.getElementById( 'nombreNuevoTemplate' ).value == '' ) {
            aviso( 'No ha proporcionado un nombre para la pieza de correo' , false );
        } else {
            var datos = new FormData( document.getElementById( 'editaDisenoTemplate_form' ) );
            datos.append( 'diseno_template_editor' , editorTemplate.getEditorValue() );

            axios.post( '/api/altaPiezaTemplate' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
                 .then( response => {
                   if( document.getElementById( 'idTemplateEditado' ).value != 0 ){ mov = 'actualizado';} else { mov = 'agregado'; }
                   aviso( 'Template '+mov+' correctamente' );
                   contenidos( 'configuraciones_destinatarios' );
                   listadoPiezas();
                 })
                 .catch( err => {console.log( err );
                 });
        }
    });

    document.getElementById( 'eliminaTemplateEditado' ).addEventListener( 'click' , function( e ){
        e.preventDefault();

        if( document.getElementById('idTemplateEditado').value == 0 ) {
            aviso( "No ha seleccionado algun template a eliminar" , false );
        } else {
          axios.post( '/api/eliminaPiezaTemplate/' + document.getElementById('idTemplateEditado').value , {} ,
                      {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
               .then( response => {
                  aviso( response.data.mensaje );
                  listadoPiezas();
               })
               .catch( err => {
                 console.log( err );
               });
        }
    });

    document.getElementById( 'btnEditaTemplateSeleccionado' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var piezaID = document.getElementById( 'listaTemplatesDisponibles' ).value;
        if( piezaID == 0 ) {
          document.getElementById( 'nombreNuevoTemplate' ).value = "";
          document.getElementById( 'idTemplateEditado' ).value = "0";
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

    function listadoPiezas() {
        document.getElementById( 'listaTemplatesDisponibles' ).innerHTML = "";
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

    function cargaFormularios() {
       document.getElementById( 'altaNuevoTemplate_formOpciones' ).innerHTML = '';
       document.getElementById( 'nuevoTemplateForm' ).innerHTML = '';
       document.getElementById( 'altaNuevoTemplate_formOpciones' ).add( new Option( 'No usa formulario' , '0' , false , false ) );
       document.getElementById( 'nuevoTemplateForm' ).add( new Option( 'No usa formulario' , '0' , false , false ) );

       axios.get( '/api/listadoFormularios' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
          .then( response => {
              response.data.forEach( function( e , i ) {
                document.getElementById( 'altaNuevoTemplate_formOpciones' ).add( new Option( e.nombreForm , e.id , false , false ) );
                document.getElementById( 'nuevoTemplateForm' ).add( new Option( e.nombreForm , e.id , false , false ) );
              });
          })
          .catch( err => {
              console.log( err );
          });
    }

</script>
