<div class="row">
  <div class="col-lg-4">
    <div class="card card-small mb-4 pt-3">
      <div class="card-body border-bottom text-center">
        <div class="mb-3 mx-auto">
          <img class="rounded-circle" src="{{ asset( 'assets2/img/saint.jpg' ) }}" alt="User Avatar" width="110">
        </div>
        <h4 class="mb-0">{{ Auth::user()->name }} {{ Auth::user()->apPat }}</h4>
        <span class="text-muted d-block mb-2">Ejecutivo comercial</span>
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
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" id="perfilDireccion" name="perfilDireccion" readonly placeholder="Direccion"
                  value="{{ Auth::user()->direccion->calle }} Int. {{ Auth::user()->direccion->interior }} Ext. {{ Auth::user()->direccion->exterior }}, Col {{ Auth::user()->direccion->colonia }}">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-control-sm" id="perfilCiudad" name="perfilCiudad" readonly placeholder="Ciudad" value="{{ Auth::user()->direccion->municipio }}">
                  </div>
                  <div class="form-group col-md-4">
                    <select id="perfilEstado" name="perfilCiudad" class="custom-select custom-select-sm" disabled>
                      <option>Estado</option>
                      <option value="1">Estado de Mexico</option>
                      <option value="2">Queretaro</option>
                      <option value="3">CDMX</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <input type="text" class="form-control form-control-sm" id="perfilCP" name="perfilCP" readonly placeholder="CP" value="{{ Auth::user()->direccion->cp }}">
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
    var token  = sessionStorage.getItem( 'apiToken' );
    var url    = '/api/shortEditaEjecutivo';
    var datos  = $( '#datosPerfil_form' ).serialize();
    var config = { headers: { 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + token } ;

    axios.post( url , datos , config )
       .then( response => {
         contenidos( 'ejecutivos_perfil' );
       })
       .catch( err => {
         console.log( err );
       });
  }
</script>
