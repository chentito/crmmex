
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
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="{{$container}} border-left border-right border-bottom p-1">
          <div id="listadoTemplates_config"></div>
          <table id="listadoTemplates" class="table table-striped nowrap responsive" style="width:100%"></table>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  </div>
  <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row">
        <div class="col-sm-9">
            <input type="hidden" name="idTemplateEditado" id="idTemplateEditado" value="0">
            <div id="editorHTML" style="height:500px"></div>
            <script>
              var editor = new Jodit("#editorHTML", {
                "autofocus": true,
                "uploader": {
                  "insertImageAsBase64URI": true
                },
                "language": "es",
                "toolbarButtonSize": "small",
                "toolbarSticky": false,
                "height": 500,
                "extraButtons": [
                  {
                    name: "insertForm",
                    iconURL: "{{asset('assets3/icons/form.png')}}",
                    exec: function (editor) {
                      if( document.getElementById( 'nuevoTemplateForm' ).value == "-" ) {
                        aviso( "No ha seleccionado un formulario" , false );
                      } else{
                        var link = "<a href=\"{{ url('/') }}/campania/{campaniaID}/{contactoID}\">Click aqu&iacute;</a>";
                        editor.selection.insertHTML( link );
                      }
                    }
                  }
                ]
              });
            </script>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-12">
                <label for="listadoTemplatesDefault">Diseños:</label>
                <select class="custom-select custom-select-sm" name="listadoTemplatesDefault" id="listadoTemplatesDefault">
                    <option></option>
                </select>
            </div>
            <div class="col-sm-12 mt-2">
                <label for="">Nombre para el template:</label>
                <input type="text" name="nombreTemplate" id="nombreTemplate" placeholder="Nombre" class="form-control form-control-sm">
            </div>
            <div class="col-sm-12 mt-2">
                <label for="">Usa Formulario?</label>
                <select name="nuevoTemplateForm" id="nuevoTemplateForm" class="custom-select custom-select-sm">
                </select>
            </div>
            <div class="col-sm-12 mt-2 text-center">
                <button type="button" name="limpiaTemplate" id="limpiaTemplate" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-trash-alt"></i> Limpiar</button>
                <button type="button" name="guardaTemplate" id="guardaTemplate" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">

    </div>
  </div>
</div>

<script>
  generaDataGrid( 'listadoTemplates' );
</script>

<script>
  axios.get( '/api/listadoFormularios' , { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      document.getElementById( 'nuevoTemplateForm' ).add( new Option( '-' , '-' , false, false ) );
      response.data.formularios.forEach( function( e , i ){
        document.getElementById( 'nuevoTemplateForm' ).add( new Option( e.nombreForm , e.id , false, false ) );
      });
    })
    .catch( err => {
      console.log( err );
    });

  axios.get( '/api/listadoPiezasDisponibles/false' , { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      response.data.forEach( function( e , i ){
        document.getElementById( 'listadoTemplatesDefault' ).add( new Option( e.nombrePieza , e.id , false , false ) );
      });
    })
    .catch( err => {
      console.log( err );
    });

  document.getElementById( 'limpiaTemplate' ).addEventListener( 'click' , function( e ) {
    editor.value = "";
    document.getElementById( 'idTemplateEditado' ).value       = 0;
    document.getElementById( 'listadoTemplatesDefault' ).value = "";
    document.getElementById( 'nombreTemplate' ).value          = "";
    document.getElementById( 'nuevoTemplateForm' ).value       = 0;
  });

  document.getElementById( 'guardaTemplate' ).addEventListener( 'click' , function( e ) {
    e.preventDefault();
    var datos = new FormData();
    datos.append( 'idTemplateEditado'      , document.getElementById( 'idTemplateEditado' ).value );
    datos.append( 'nombreNuevoTemplate'    , document.getElementById( 'nombreTemplate' ).value );
    datos.append( 'diseno_template_editor' , editor.value );
    datos.append( 'nuevoTemplateForm'      , document.getElementById( 'nuevoTemplateForm' ).value );

    if( editor.value == "" ) {
      aviso( 'No ha agregado contenidos a la pieza de correo' , false );
    } else if( document.getElementById( 'nombreTemplate' ).value == "" ) {
      aviso( 'No ha asignado un nombre a la pieza de correo' , false );
    } else {
      axios.post( '/api/altaPiezaTemplate' , datos , { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
        .then( response => {
          aviso( 'Template guardado correctamente' );
          document.getElementById( 'idTemplateEditado' ).value = "0";
          document.getElementById( 'nombreTemplate' ).value = "";
          document.getElementById( 'listadoTemplatesDefault' ).value = "";
          editor.value = "";
        })
        .catch( err => {
          console.log( err );
        });
    }
  });

  document.getElementById( 'listadoTemplatesDefault' ).addEventListener( 'change' , function( e ) {
    axios.get( '/api/detallePiezaTemplate/' + this.value , { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
      .then( response => {
        var datos = response.data;
        var contenido = datos.pieza;
        editor.value = contenido;
        document.getElementById( 'idTemplateEditado' ).value = datos.id;
        document.getElementById( 'nombreTemplate' ).value = datos.nombrePieza;
        document.getElementById( 'nuevoTemplateForm' ).value = datos.formID;
      })
      .catch( err => {
        console.log( err );
      });
   });

</script>
