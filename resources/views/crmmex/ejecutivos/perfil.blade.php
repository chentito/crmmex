<div class="row">
  <div class="col-lg-4">
    <div class="card card-small mb-4 pt-3">
      <div class="card-body border-bottom text-center">
        <div class="mb-3 mx-auto">
          <img class="rounded-circle" src="{{ asset( '/imagenEjecutivo/' . Auth::user()->id ) }}" alt="{{ Auth::user()->name }} {{ Auth::user()->apPat }}" id="imgEjecutivo" width="110">
        </div>
        <h4 class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->apPat }} {{ Auth::user()->apMat }}</h4>        
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="card card-small mb-4">
      <ul class="list-group list-group-flush">
        <li class="list-group-item p-3">
          <strong class="text-muted d-block mb-2 mt-2 ml-2">Datos Cuenta</strong>
          <div class="row">
            <div class="col">
              <form id="datosPerfil_form" name="datosPerfil_form">
                <input type="hidden" id="ejecutivoID" name="ejecutivoID" value="{{ Auth::user()->id }}">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" id="perfilNombre" name="perfilNombre" placeholder="Nombre (s)" value="{{ Auth::user()->name }}">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" id="perfilApPat" name="perfilApPat" placeholder="Apellido Paterno" value="{{ Auth::user()->apPat }}">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" id="perfilApMat" name="perfilApMat" placeholder="Apellido Materno" value="{{ Auth::user()->apMat }}">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control form-control-sm" id="perfilEmail" name="perfilEmail" placeholder="Email" value="{{ Auth::user()->email }}">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control form-control-sm" id="perfilPassword" name="perfilPassword" placeholder="Password">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <div class="input-group mt-4">
                      <div class="custom-file custom-file-sm">
                        <input type="file" class="custom-file-input custom-file-input-sm" aria-describedby="inputGroupFileAddon01" id="perfilLogo" name="perfilLogo" accept=".jpg,.png,.jpge,.gif" value="Buscar">
                        <label class="custom-file-label custom-file-label-sm" for="logotipo">Seleccione imagen</label>
                      </div>
                    </div>
                    <small>Para una mejor visibilidad de la imagen, se recomienda un tamaño de 70px X 70px</small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button id="btnActualizaPerfil" type="submit" class="btn btn-sm {{$btn}}">Actualiza Perfil</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<script>
  $( '#btnActualizaPerfil' ).click( function( e ){
    e.preventDefault();
    actualizaDatosEjecutivo();
  });

  function actualizaDatosEjecutivo() {
    var url    = '/api/shortEditaEjecutivo';
    var datos  = new FormData( document.getElementById( 'datosPerfil_form' ) );
    var config = { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) , 'content-type':'multipart/form-data' } };

    axios.post( url , datos , config )
        .then( response => {
          aviso( 'Datos actualizados correctamente' );
          document.getElementById( 'imgEjecutivo' ).src = '/imagenEjecutivo/{{ Auth::user()->id }}?'+ new Date().getTime();
          contenidos( 'ejecutivos_perfil' );
        })
        .catch( err => {
          console.log( err );
        });
  }
</script>
