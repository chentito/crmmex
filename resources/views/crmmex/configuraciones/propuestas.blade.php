<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-cogs fa-sm"></i><span class="d-none d-sm-inline">  Configuraciones</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-image fa-sm"></i><span class="d-none d-sm-inline">  Imagen Propuesta</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
      <i class="fa fa-inbox fa-sm"></i><span class="d-none d-sm-inline">  Template Envio</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="{{$container}} border-left border-right border-bottom p-1">
          <div class="row mt-3">
              <div class="col-sm-12">
                  <i class="fa fa-sm fa-key"></i> Nomenclatura a utilizar para el identificador de las propuestas:
              </div>
              <div class="col-sm-12">
                  <hr>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12 text-center">
                <form id="frmPropNom" name="frmPropNom">
                  <input type="hidden" id="nomenclatura_id" name="nomenclatura_id" value="1">
                  <table width="100%">
                      <tr>
                          <td>
                            <input class="form-control form-control-sm" type="text" id="nomenclatura_prefijo" name="nomenclatura_prefijo" max="15" value="" placeholder="Prefijo para el nombre de la propuesta">
                          </td>
                          <td>_</td>
                          <td>
                            <select class="custom-select custom-select-sm" id="nomenclatura_variable" name="nomenclatura_variable"></select>
                          </td>
                          <td>_</td>
                          <td>
                            <select class="custom-select custom-select-sm" id="nomenclatura_identificador" name="nomenclatura_identificador"></select>
                          </td>
                          <td>.pdf</td>
                      </tr>
                  </table>
                </form>
              </div>
          </div>
          <div class="row mt-1">
              <div class="col-sm-12 text-center">
                  <button class="btn btn-sm {{$btn}}" id="btnGdaNomenclatura"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-sm-12">
                  <i class="fa fa-sm fa-handshake"></i> Texto políticas y condiciones de uso:
              </div>
              <div class="col-sm-12">
                  <hr>
              </div>
          </div>
          <form id="frmPoliticasCondiciones" name="frmPoliticasCondiciones">
          <input type="hidden" id="politicasCondiciones_id" name="politicasCondiciones_id" value="2">
            <div class="row">
              <div class="col-sm-12">
                  <textarea rows="6" class="form-control form-control-sm" id="propuesta_politicasCondiciones" name="propuesta_politicasCondiciones"></textarea>
              </div>
              <div class="col-sm-12 mt-1 text-center">
                  <button class="btn btn-sm {{$btn}}" id="btnGdaPoliticasCondiciones"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
            </div>
          </form>
          <div class="row">
            <div class="col-sm-12">
                <i class="fa fa-sm fa-calendar-alt"></i> Dias de vigencia:
            </div>
            <div class="col-sm-12">
                <hr>
            </div>
            <div class="col-sm-3">
                <input type="number" class="form-control form-control-sm" name="propuesta_diasVigencia" id="propuesta_diasVigencia" value="">
            </div>
            <div class="col-sm-12 mt-1 text-center">
                <button class="btn btn-sm {{$btn}}" id="btnDiasVigenciaPropuesta"><i class="fa fa-save fa-sm"></i> Guardar</button>
            </div>
          </div>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="{{$container}} border-left border-right border-bottom p-1">
      </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <form id="formTemplateEnvioPropuesta" name="formTemplateEnvioPropuesta">
        <input type="hidden" id="template_id" name="template_id" value="1" >
        <div class="row">
            <div class="col-sm-8">
              <label for="template_subject">Asunto:</label>
              <input type="text" id="template_subject" name="template_subject" placeholder="Asunto" class="form-control form-control-sm">
            </div>
            <div class="col-sm-8 mt-1">
              <label for="template_body">Mensaje:</label>
              <textarea class="form-control form-control-sm" id="template_body" name="template_body"></textarea>
              <script>var editor = new Jodit('#template_body');</script>
              <input type="hidden" id="detalleTemplate_contenidoPieza" name="detalleTemplate_contenidoPieza" value="" >
            </div>
            <div class="col-sm-4 mt-1">
                Palabras reservadas
                <ul class="list-group">
                  <li class="list-group-item"><b>{cliente}</b> Nombre del cliente / contacto (Nombre y Apellido)</li>
                  <li class="list-group-item"><b>{propuestaIDTY}</b> Identificador de la propuesta</li>
                  <li class="list-group-item"><b>{fechaSolicitud}</b> Fecha en que solicitó la propuesta</li>
                  <li class="list-group-item"><b>{fechaVigencia}</b> Fecha de vigencia de la propuesta</li>
                  <li class="list-group-item"><b>{producto}</b> Nombre del producto o servicio solicitado</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-3 text-center">
              <button class="btn btn-sm {{$btn}}" id="btnGuardaTemplateEnvio" name="btnGuardaTemplateEnvio"><i class="fa fa-save fa-sm"></i> Guardar</button>
            </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <form id="imgPropuestaForm" name="imgPropuestaForm">
        <div class="row">
          <div class="col-sm-3 mt-2 text-center">
              <img src="{{ asset( '/imagenParaPropuesta' ) }}" width="200px" id="logoImgPropuesta" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file mt-2">
              <input type="file" class="custom-file-input" id="logotipoPropuesta" name="logotipoPropuesta" required>
              <label class="custom-file-label" for="logotipoPropuesta">Seleccione Imagen...</label>
            </div>
          </div>
          <div class="col-sm-12 mt-2 text-center">
            <button type="submit" name="btnGdaImgPropuesta" id="btnGdaImgPropuesta" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    var config = {headers: {'Accept' : 'application/json','Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) }};

    document.getElementById( 'btnGdaImgPropuesta' ).addEventListener( 'click' , function( e ) {
        e.preventDefault();

        if( document.getElementById( 'logotipoPropuesta' ).value == "" ) {
            aviso( 'No ha seleccionado un archivo' , false );
        } else {
            var datos = new FormData( document.getElementById( 'imgPropuestaForm' ) );
            axios.post( '/api/logoPropuesta' , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem('apiToken'),'content-type':'multipart/form-data'}})
              .then( response => {
                  aviso( 'Logotipo actualizado correctamente.' );
                  document.getElementById( 'logoImgPropuesta' ).src = '/imagenParaPropuesta?'+ new Date().getTime();
              })
              .catch( err => {
                  console.log( err );
              });
        }
    });

    document.getElementById( 'btnGuardaTemplateEnvio' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        document.getElementById('detalleTemplate_contenidoPieza').value = editor.getEditorValue();
        axios.post( '/api/actualizaDatosTemplate' , new FormData( document.getElementById( 'formTemplateEnvioPropuesta' ) )  , config )
             .then( response => {
                aviso( 'Template actualizado correctamente' );
                contenidos( 'configuraciones_propuestas' );
             })
             .catch( err => {
               console.log( err );
             });
    });

    document.getElementById( 'btnDiasVigenciaPropuesta' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var url = '/api/setPredefinido/3';
        axios.post( url , { valorPredefinido_3:document.getElementById( 'propuesta_diasVigencia' ).value } , config )
             .then( response => {
                 aviso( 'Valor actualizado correctamente' );
                 contenidos( 'configuraciones_propuestas' );
             })
             .catch( err => {
                  console.log( err );
             });
    });

    document.getElementById( 'btnGdaPoliticasCondiciones' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var url = '/api/setPredefinido/' + document.getElementById( 'politicasCondiciones_id' ).value;
        axios.post( url , {valorPredefinido_2:document.getElementById( 'propuesta_politicasCondiciones' ).value} , config )
             .then( response => {
                aviso( 'Politicas actualizadas correctamente' );
                contenidos( 'configuraciones_propuestas' );
             })
             .catch( err => {
                console.log( err );
             });
    });

    document.getElementById( 'btnGdaNomenclatura' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var valor = document.getElementById( 'nomenclatura_prefijo' ).value + '_'
                  + document.getElementById( 'nomenclatura_variable' ).value + '_'
                  + document.getElementById( 'nomenclatura_identificador' ).value;
        var url = '/api/setPredefinido/' + document.getElementById( 'nomenclatura_id' ).value;
        axios.post( url , {valorPredefinido_1:valor} , config )
             .then( response => {
                aviso( 'Nomenclatura actualizada correctamente' );
                contenidos( 'configuraciones_propuestas' );
             })
             .catch( err => {
               console.log( err );
             });
    });

    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/getPredefinido/1';
    axios.get( url , config )
         .then( response => {
             valor = response.data.valor.split( '_' );
             document.getElementById( 'nomenclatura_prefijo' ).value       = valor[ 0 ];
             document.getElementById( 'nomenclatura_variable' ).value      = valor[ 1 ];
             document.getElementById( 'nomenclatura_identificador' ).value = valor[ 2 ];

             var opciones = [ 'inicialesEjecutivo' , 'fechaCreacion' , 'categoria' ];
             var select1  = document.getElementById( 'nomenclatura_variable' );
             opciones.forEach( function( e , ll ) {
                select1.appendChild( new Option( e , e , false , ( ( valor[ 1 ] == e ) ? true : false ) ) );
             });

             var opciones2 = [ 'autoincremento' ];
             var select2   = document.getElementById( 'nomenclatura_identificador' );
             opciones2.forEach( function( e , ll ){
                select2.appendChild( new Option( e , e , false , ( ( valor[ 2 ] == e ) ? true : false ) ) );
             });

         })
         .catch( err => {
           console.log( err );
         });

     var url2 = '/api/getPredefinido/2';
     axios.get( url2 , config )
          .then( response => {
              document.getElementById( 'propuesta_politicasCondiciones' ).value=response.data.valor;
          })
          .catch( err => {
            console.log( err );
          });

     var url3 = '/api/getPredefinido/3';
     axios.get( url3 , config )
          .then( response => {
              document.getElementById( 'propuesta_diasVigencia' ).value=response.data.valor;
          })
          .catch( err => {
            console.log( err );
          });

     var url3 = '/api/obtieneDatosTemplate/1';
     axios.get( url3 , config )
          .then( response => {
              document.getElementById( 'template_subject' ).value = response.data.asunto;
              editor.setEditorValue( response.data.cuerpo );
          })
          .catch( err => {
            console.log( err );
          });

</script>
