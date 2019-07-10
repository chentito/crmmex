<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-palette fa-sm"></i><span class="d-none d-sm-inline">  Temas</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-images fa-sm"></i><span class="d-none d-sm-inline">  Fondo</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-eye fa-sm"></i><span class="d-none d-sm-inline">  Transparencia</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="usuario-tab" data-toggle="tab" href="#usuario" role="tab" aria-controls="usuario" aria-selected="false">
      <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Razón Social</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="col-12">
          <div class="row mb-3 mt-3">
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-dark btn-block" onclick="return cambiaTema(1);">Tema Obscuro</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-primary btn-block" onclick="return cambiaTema(2);">Tema Azul 1</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-light btn-block" onclick="return cambiaTema(3);">Tema Gris</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-info btn-block" onclick="return cambiaTema(4);">Tema Azul 2</button></div>
          </div>
          <div class="row mb-3">
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-danger btn-block" onclick="return cambiaTema(5);">Tema Rojo</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-warning btn-block" onclick="return cambiaTema(6);">Tema Amarillo</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-success btn-block" onclick="return cambiaTema(7);">Tema Verde</button></div>
              <div class="col-sm-3 text-center mb-1"><button class="btn btn-white btn-block" onclick="return cambiaTema(8);">Tema Blanco</button></div>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="col-12">
          <div class="row mb-3 mt-3">
              <div class="col-sm-3 text-center mb-1">
                  <img src="{{asset( 'imgs/background/ciudad.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'ciudad.jpg' );">
              </div>
              <div class="col-sm-3 text-center mb-1">
                  <img src="{{asset( 'imgs/background/salajuntas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'salajuntas.jpg' );">
              </div>
              <div class="col-sm-3 text-center mb-1">
                  <img src="{{asset( 'imgs/background/edificios.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'edificios.jpg' );">
              </div>
              <div class="col-sm-3 text-center mb-1">
                  <img src="{{asset( 'imgs/background/plumas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'plumas.jpg' );">
              </div>
          </div>
      </div>
      <div class="col-12">
          <div class="row mb-3">
              <div class="col-sm-12 text-center">
                  <button class="btn btn-sm {{$btn}}" onclick="return quitaImagen();">Quitar imágen de fondo</button>
              </div>
          </div>
      </div>
      <div class="col-sm-12">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Seleccione</span>
              </div>
              <div class="custom-file">
                  <input type="file" class="custom-field-sm custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Imagen Personalizada</label>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="col-sm-12 mt-3">
          Transparencia
          <div class="input-group mb-3">
              <input type="number" min="1" max="10" id="transparenciaValor" class="form-control form-control-sm" value="{{$trans}}" placeholder="Transparencia" aria-label="Transparencia" aria-describedby="button-addon2">
              <div class="input-group-append">
                  <button class="btn btn-sm {{$btn}}" type="button" id="button-addon2" onclick="return guardaTransparencia()">Guardar</button>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="propietario_form" name="propietario_form">
        <div class="row">
          <div class="col-sm-3">
            <label for="razonSocial">Razón Social:</label>
            <input type="text" name="razonSocial" id="razonSocial" value="" class="form-control form-control-sm" placeholder="Razón Social">
          </div>
          <div class="col-sm-3">
            <label for="rfc">RFC:</label>
            <input type="text" name="rfc" id="rfc" value="" class="form-control form-control-sm" maxlength="13" placeholder="RFC">
          </div>
          <div class="col-sm-3">
            <label for="calle">Calle:</label>
            <input type="text" name="calle" id="calle" value="" class="form-control form-control-sm" placeholder="Calle">
          </div>
          <div class="col-sm-3">
            <label for="exterior">No.Exterior:</label>
            <input type="text" name="exterior" id="exterior" value="" class="form-control form-control-sm" placeholder="No. Exterior">
          </div>
          <div class="col-sm-3">
            <label for="interior">No.Interior:</label>
            <input type="text" name="interior" id="interior" value="" class="form-control form-control-sm" placeholder="No. Interior">
          </div>
          <div class="col-sm-3">
            <label for="colonia">Colonia:</label>
            <input type="text" name="colonia" id="colonia" value="" class="form-control form-control-sm" placeholder="Colonia">
          </div>
          <div class="col-sm-3">
            <label for="municipio">Municipio:</label>
            <input type="text" name="municipio" id="municipio" value="" class="form-control form-control-sm" placeholder="Municipio">
          </div>
          <div class="col-sm-3">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" value="" class="form-control form-control-sm" placeholder="No. Exterior">
          </div>
          <div class="col-sm-3">
            <label for="codigoPostal">Código Postal:</label>
            <input type="text" name="codigoPostal" id="codigoPostal" value="" class="form-control form-control-sm" placeholder="Código Postal">
          </div>
          <div class="col-sm-3">
            <label for="pais">Pais:</label>
            <input type="text" name="pais" id="pais" value="" class="form-control form-control-sm" placeholder="Código Postal">
          </div>
          <div class="col-sm-3">
            <label for="telefonos">Teléfonos:</label>
            <input type="text" name="telefonos" id="telefonos" value="" class="form-control form-control-sm" placeholder="Teléfonos">
          </div>
          <div class="col-sm-3">
            <label for="correoElectronico">Correo Electrónico:</label>
            <input type="text" name="correoElectronico" id="correoElectronico" value="" class="form-control form-control-sm" placeholder="Correl Electrónico">
          </div>
          <div class="col-sm-6">
            <label for="informacionAdicional">Información Adicional:</label>
            <textarea name="informacionAdicional" id="informacionAdicional" value="" class="form-control form-control-sm" placeholder="Informacion Adicional"></textarea>
          </div>
          <div class="col-sm-3">
            <label for="logotipo">Logotipo:</label>
            <input type="file" name="logotipo" id="logotipo" value="" class="form-control form-control-sm" placeholder="Locotipo">
          </div>
        </div>
        <div class="row mt-2 mb-2">
          <div class="col-sm-12 text-center">
              <button type="button" name="misDatosBtn" id="misDatosBtn" class="btn btn-sm {{$btn}}"><i class="fa fa-save fa-sm"></i> Guardar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>

    axios.get( '/api/obtieneDatosPropietario' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            var datos = response.data;
            document.getElementById( 'razonSocial' ).value          = datos.razonSocial;
            document.getElementById( 'rfc' ).value                  = datos.rfc;
            document.getElementById( 'calle' ).value                = datos.calle;
            document.getElementById( 'exterior' ).value             = datos.exterior;
            document.getElementById( 'interior' ).value             = datos.interior;
            document.getElementById( 'colonia' ).value              = datos.colonia;
            document.getElementById( 'municipio' ).value            = datos.municipio;
            document.getElementById( 'estado' ).value               = datos.estado;
            document.getElementById( 'codigoPostal' ).value         = datos.codigoPostal;
            document.getElementById( 'pais' ).value                 = datos.pais;
            document.getElementById( 'telefonos' ).value            = datos.telefonos;
            document.getElementById( 'correoElectronico' ).value    = datos.correoElectronico;
            document.getElementById( 'informacionAdicional' ).value = datos.informacionAdicional;
       })
       .catch( err => {
         console.log( err );
       });

    document.getElementById( 'misDatosBtn' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'propietario_form' ) );
        axios.post( '/api/actualizaDatosPropietario' , datos ,
                    { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) , 'content-type' : 'multipart/form-data' } } )
             .then( response => {
                if( response.data.mensaje == false ) {
                      aviso( 'Error al actualizar el registro' , false );
                  } else {
                      aviso( response.data.mensaje );
                }
             })
             .catch( err => {
                console.log( err );
             });
    });

    function cambiaTema( idT ) {
        axios( '/setTema/' + idT )
            .then( datos => { location.reload(); })
            .catch( err => { console.error(err); });
    }

    function cambiaFondo( imagen ) {
        axios( '/setImagen/' + imagen )
            .then( datos => { location.reload(); })
            .catch( err => { console.error(err); });
    }

    function quitaImagen() {
        axios( '/quitaImagen/' )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }

    function guardaTransparencia() {
        valor = $( '#transparenciaValor' ).val();
        axios( '/guardaTrans/' + valor )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }
</script>
