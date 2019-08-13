<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cargar Layout</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row mt-2">
        <div class="col-sm-2">
          Seleccione Layout
        </div>
        <div class="col-sm-8">
          <form id="layoutProductosForm" name="layoutProductosForm">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="layoutProductos" name="layoutProductos" required accept=".csv">
              <label class="custom-file-label" for="layoutProductos">Seleccione Archivo...</label>
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-center">
          <button type="button" name="btnCargaLayoutProductos" id="btnCargaLayoutProductos" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-upload"></i> Cargar</button>
          <button type="button" name="btnDescargaLayoutProductos" id="btnDescargaLayoutProductos" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-download"></i> Ejemplo</button>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-sm-12">
          <label for="informativoCargaLayout">Resultado de la carga:</label>
          <select name="informativoCargaLayout" id="informativoCargaLayout" class="custom-select custom-select-sm" multiple style="height:250px;"></select>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2">
  <div class="col-sm-12 text-center">
    <button type="button" name="btnRegresaListadoProductos" id="btnRegresaListadoProductos" class="btn btn-sm {{$btn}}" onclick="contenidos('configuraciones_catalogos_productos')"><i class="fa fa-sm fa-undo"></i> Regresar</button>
  </div>
</div>


<script>

  document.getElementById( 'btnDescargaLayoutProductos' ).addEventListener( 'click' , function( e ) {
    location.replace( '/download/LayoutProductos' );
  });

  document.getElementById( 'btnCargaLayoutProductos' ).addEventListener( 'click' , function( e ){
    var datos = new FormData( document.getElementById( 'layoutProductosForm' ) );
    var config = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ),'content-type': 'multipart/form-data'}};

    if( document.getElementById( 'layoutProductos' ).value == '' ) {
        aviso( 'No ha seleccionado un archivo a procesar' , false );
      } else {
        document.getElementById( 'informativoCargaLayout' ).innerHTML = "";
        axios.post( '/api/cargaMasivaProductos' , datos , config )
             .then( response => {
                response.data.forEach( function( e , i ) {
                  document.getElementById( 'informativoCargaLayout' ).add( new Option( e , e , false , false ) );
                });
                document.getElementById( 'layoutProductos' ).value = "";
              })
             .catch( err => {
                console.log( err );
              });
    }
  });
</script>
