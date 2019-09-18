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
      <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Propietario</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="otros-tab" data-toggle="tab" href="#otros" role="tab" aria-controls="otros" aria-selected="false">
      <i class="fa fa-ruler-combined fa-sm"></i><span class="d-none d-sm-inline">  Otros</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-bottom border-right p-1">
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
    <div class="{{$container}} border-left border-bottom border-right p-1">
      <div class="row mt-2">
        <div class="col-sm-3 text-center">
          <img src="{{asset( 'imgs/background/ciudad.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'ciudad.jpg' );">
        </div>
        <div class="col-sm-3 text-center">
          <img src="{{asset( 'imgs/background/salajuntas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'salajuntas.jpg' );">
        </div>
        <div class="col-sm-3 text-center">
          <img src="{{asset( 'imgs/background/edificios.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'edificios.jpg' );">
        </div>
        <div class="col-sm-3 text-center">
          <img src="{{asset( 'imgs/background/plumas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'plumas.jpg' );">
        </div>
        <div class="col-sm-12 text-center">
          <button class="btn btn-sm {{$btn}}" onclick="return quitaImagen();">Sin fondo</button>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-sm-12">
          <hr>
        </div>
      </div>
      <form name="guardaBackgroundPers_form" id="guardaBackgroundPers_form" action="" method="post">
        <div class="row mt-1">
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Seleccione</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-field-sm custom-file-input" id="imgBackgroundPersonalizado" name="imgBackgroundPersonalizado" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="imgBackgroundPersonalizado">Imagen Personalizada</label>
              </div>
            </div>
          </div>
          <div class="col-sm-2 text-center">
            <button type="button" name="guardaBackgroundPers" id="guardaBackgroundPers" class="btn bt-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="{{$container}} border-left border-bottom border-right p-1">
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
  <div class="tab-pane fade" id="otros" role="tabpanel" aria-labelledby="otros-tab">
    <div class="{{$container}} border-left border-bottom border-right p-1">
      <form id="formConfiguracione" name="formConfiguracione">
        <div class=row>
            <div class="col-sm-5 text-center">
                <h6>Configuracion</h6>
            </div>
            <div class="col-sm-5 text-center">
                <h6>Opciones</h6>
            </div>
            <div class="col-sm-2 text-center"></div>
            <div class="col-sm-5 text-center">
                Diseño del menu
            </div>
            <div class="col-sm-5">
                <select class="custom-select custom-select-sm" name="config_1" id="config_1">
                    <option value="1">Diseño Vertical</option>
                    <option value="2">Diseño Horizontal</option>
                </select>
            </div>
            <div class="col-sm-2 text-center"><button id="guardaDisenioMenu" type="submit" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button></div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
    <div class="{{$container}} border-left border-bottom border-right p-1">
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
            <select class="custom-select custom-select-sm" name="estado" id="estado"></select>
          </div>
          <div class="col-sm-3">
            <label for="codigoPostal">Código Postal:</label>
            <input type="text" name="codigoPostal" id="codigoPostal" value="" class="form-control form-control-sm" placeholder="Código Postal">
          </div>
          <div class="col-sm-3">
            <label for="pais">Pais:</label>
            <select class="custom-select custom-select-sm" name="pais" id="pais"></select>
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
          <div class="col-sm-6">
            <div class="input-group mt-4">
              <div class="custom-file custom-file-sm">
                <input type="file" class="custom-file-input custom-file-input-sm" aria-describedby="inputGroupFileAddon01" id="logotipo" name="logotipo" accept=".jpg,.png,.jpge,.gif" value="Buscar">
                <label class="custom-file-label custom-file-label-sm" for="logotipo">Seleccione imagen</label>
              </div>
            </div>
            <small>Para una mejor visibilidad de la imagen, se recomienda un tamaño de 200px X 100px</small>
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

    axios.get( '/api/listadoConfiguraciones' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
        .then( response => {
          var datos = response.data;
          datos.forEach( function( e , i ) {
            document.getElementById( 'config_' + e.id ).value = e.valor;
          });
        })
        .catch( err => {
          console.log( err );
        });

    axios.get( '/api/utiles/comboPaises' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            response.data.forEach( function( e , i ){
                document.getElementById( 'pais' ).add( new Option( e.nombre, e.id, false, false ) );
            });
         })
         .catch( err => {
           console.log( err );
         });

    axios.get( '/api/utiles/comboEstados' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
         .then( response => {
            response.data.forEach( function( e , i ) {
                document.getElementById( 'estado' ).add( new Option( e.entidad, e.id, false, false ) );
            });
         })
         .catch( err => {
           console.log( err );
         });

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

    document.getElementById( 'guardaBackgroundPers' ).addEventListener( 'click' , function( e ){
      var datos = new FormData( document.getElementById( 'guardaBackgroundPers_form' ) );
      axios.post( '/api/usaBackgroundPersonalizado' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken'),'content-type':'multipart/form-data'}})
        .then( response => {
          aviso( 'El fondo se ha actualizado correctamente' );
          location.reload();
        })
        .catch( err => {
          console.log( err );
        });
    });

    document.getElementById( 'guardaDisenioMenu' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'formConfiguracione' ) );
        //axios.post( '/api/configuraciones/1/' + document.getElementById( 'config_1' ).value , {} ,  { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) , 'content-type' : 'multipart/form-data' } })
        axios.post('/api/setConfiguraciones',datos,{headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken'),'content-type':'multipart/form-data'}})
              .then( response => {
                  aviso("Configuracion Guardada");
                  location.reload();
              })
              .catch( err => {
                console.log( err );
              });

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
                      document.getElementById( 'logoBrandingImg' ).src = '/imagenPropietario?'+ new Date().getTime();
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
