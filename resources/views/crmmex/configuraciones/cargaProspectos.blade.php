<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-sm fa-upload"></i><span class="d-none d-sm-inline">  Carga layout</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-rigth border-bottom p-1">
      <form id="formCargaProspectos" method="post">
        <div class="row">
          <div class="col-sm-2 text-center mt-2">
            Seleccione layout:
          </div>
          <div class="col-sm-10 mt-2">
            <div class="custom-file mt-2">
              <input type="file" class="custom-file-input" id="layoutCargaProspectos" name="layoutCargaProspectos" required accept=".csv">
              <label class="custom-file-label" for="logotipoPropuesta">Seleccione Archivo</label>
              <small>Es recomendable colocar en la primer fila del layout el nombre de cada columna. El formato admitido es CSV</small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 mt-3 mb-3 text-center">
            <button type="button" name="btnCargaLayout" id="btnCargaLayout" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-upload"></i> Cargar Información</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById( 'btnCargaLayout' ).addEventListener( 'click' , function( e ){
    e.preventDefault();

    if( document.getElementById( 'layoutCargaProspectos' ).value == '' ) {
      aviso( 'No ha seleccionado un layout' , false );
    } else {
      var headers = { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) , 'content-type' : 'multipart/form-data' } };
      var data = new FormData( document.getElementById( 'formCargaProspectos' ) );
      axios.post( '/api/importaCatalogoContactosMexagon' , data , headers )
            .then( response => {
              sessionStorage.setItem( 'layoutClientes', JSON.stringify( response.data ) );
              contenidos( 'configuraciones_cargaProspectosConfig' );
            })
            .catch( err => {
              console.log(err );
            });
    }
  });
</script>
