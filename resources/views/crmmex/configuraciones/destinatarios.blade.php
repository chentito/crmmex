
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
            <div id="editorHTML" style="height:500px">

                <h1 style="float:right"><b>Titulo</b></h1>

            </div>
        </div>
        <div class="col-sm-3">
          <div class="row">
            <div class="col-sm-12">
                <label for="listadoTemplatesDefault">Diseños default:</label>
                <select class="custom-select custom-select-sm" name="listadoTemplatesDefault" id="listadoTemplatesDefault">
                    <option></option>
                </select>
            </div>
            <div class="col-sm-12 mt-2">
                <label for="">Nombre para el template:</label>
                <input type="text" name="nombreTemplate" id="nombreTemplate" placeholder="Nombre" class="form-control form-control-sm">
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
  var toolbarOptions = [
      ['bold', 'italic', 'underline', 'strike','table'],
      ['blockquote', 'code-block'],
      [{ 'header': 1 }, { 'header': 2 }],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'indent': '-1'}, { 'indent': '+1' }],
      ['image'],
      [{ 'size': ['small', false, 'large', 'huge'] }],
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      [{ 'color': [] }, { 'background': [] }],
      [{ 'align': [] }]
  ];

  var contenedor = document.getElementById( 'editorHTML' );
  var quill = new Quill( contenedor , {
      modules: {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });

  quill.setHTML = (html) => {
    contenedor.innerHTML = html;
  };

  quill.getHTML = () => {
    return contenedor.innerHTML;
  };
</script>

<script>

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
        quill.setHTML( '<br>' );
    });

    document.getElementById( 'guardaTemplate' ).addEventListener( 'click' , function( e ) {
          e.preventDefault();
          alert( quill.getHTML() );
    });

    document.getElementById( 'listadoTemplatesDefault' ).addEventListener( 'change' , function( e ) {
          axios.get( '/api/detallePiezaTemplate/' + this.value , { headers: { 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
               .then( response => {
                  var contenido = response.data.pieza;
                  quill.setHTML( contenido );
               })
               .catch( err => {
                  console.log( err );
               });
     });

</script>
