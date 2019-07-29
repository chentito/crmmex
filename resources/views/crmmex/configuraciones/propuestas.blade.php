<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-user fa-sm"></i><span class="d-none d-sm-inline">  Nombre Propuesta</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-handshake fa-sm"></i><span class="d-none d-sm-inline">  Políticas/Condiciones</span>
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
      <div class="container border-left border-right border-bottom p-1">
          <div class="row mt-3">
              <div class="col-sm-12">
                  Nomenclatura a utilizar para el identificador de las propuestas:
              </div>
          </div>
          <div class="row mt-3">
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
          <div class="row mt-3">
              <div class="col-sm-12 text-center">
                  <button class="btn btn-sm {{$btn}}" id="btnGdaNomenclatura"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
          </div>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="container border-left border-right border-bottom p-1">
          <form id="frmPoliticasCondiciones" name="frmPoliticasCondiciones">
              <input type="hidden" id="politicasCondiciones_id" name="politicasCondiciones_id" value="2">
              <div class="row">
                  <div class="col-sm-12">
                      <label for="propuesta_politicasCondiciones">Texto de condiciones:</label>
                      <textarea rows="6" class="form-control form-control-sm" id="propuesta_politicasCondiciones" name="propuesta_politicasCondiciones"></textarea>
                      <br />
                  </div>
                  <div class="col-sm-12 text-center">
                      <button class="btn btn-sm {{$btn}}" id="btnGdaPoliticasCondiciones"><i class="fa fa-save fa-sm"></i> Guardar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="container border-left border-right border-bottom p-1">
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
                  <li class="list-group-item"><b>{cliente}</b> Nombre del cliente/contacto</li>
                  <li class="list-group-item"><b>{propuestaIDTY}</b> Identificador de la propuesta</li>
                  <li class="list-group-item"><b>{fechaSolicitud}</b> Fecha en que solicitó la propuesta</li>
                  <li class="list-group-item"><b>{fechaVigencia}</b> Fecha de vigencia de la propuesta</li>
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
</div>

<script>
    var config = {headers: {'Accept' : 'application/json','Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) }};

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
        //var valor = new FormData( document.getElementById( 'frmPropNom' ) );
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
