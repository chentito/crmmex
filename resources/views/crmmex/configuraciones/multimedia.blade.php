<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-list fa-sm"></i><span class="d-none d-sm-inline">  Archivos disponibles</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-upload fa-sm"></i><span class="d-none d-sm-inline">  Alta archivo</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-right border-left border-bottom p-1">
      <div id="listadoMultimedia_config"></div>
      <table id="listadoMultimedia" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-right border-left border-bottom p-1">
      <form id="altaMultimedia_form" name="altaMultimedia_form">
        <div class="row mt-3 mb-3">
          <div class="col-sm-10">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input custom-file-input-sm" id="altaMultimedia_file" name="altaMultimedia_file" aria-describedby="inputGroupFileAddon01" accept=".jpg,.png,.gif,.jpeg">
                <label class="custom-file-label" for="altaMultimedia_file">Seleccione archivo</label>
              </div>
            </div>
          </div>
          <div class="col-sm-2 text-center">
            <button class="btn btn-sm {{$btn}}" id="altaMultimedia_guarda"><i class="fa fa-upload fa-sm"></i> Adjuntar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    generaDataGrid( 'listadoMultimedia' );

    document.getElementById( 'altaMultimedia_guarda' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var datos = new FormData( document.getElementById( 'altaMultimedia_form' ) );

      if( document.getElementById( 'altaMultimedia_file' ).value == '' ) {
          aviso( 'No ha seleccionado una imagen a adjuntar' , false );
        } else {
          axios.post( '/api/nuevoMultimedia' , datos ,
                  { headers:{ 'Accept':'application\json', 'Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' ) , 'content-type': 'multipart/form-data' } } )
             .then( response => {
                aviso( response.data.mensaje );
                contenidos( 'configuraciones_multimedia' );
             })
             .catch( err => {
                console.log( err );
             });
       }

    });

    function habilitarMultimedia( multimediaID ) {
      axios.post( '/api/habilitaMultimedia/' + multimediaID , {} ,
                  {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              aviso( 'Archivo habilitado correctamente' );
              contenidos( 'configuraciones_multimedia' );
           })
           .catch( err => {
              console.log( err );
           });
    }

</script>
