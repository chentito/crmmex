
<input type="hidden" id="propuestaID" name="propuestaID" value="{{$param}}" />
<input type="hidden" id="clienteID" name="clienteID" value="" />

  <form id="formDestinatarioEnviaPropuesta" name="formDestinatarioEnviaPropuesta">
    <div class="row mt-3">
      <div class="col-sm-3">
        <label for="nombreDestinatarioEnvioPropuesta">Nombre Destinatario:</label>
        <input type="text" id="nombreDestinatarioEnvioPropuesta" name="nombreDestinatarioEnvioPropuesta" class="form-control form-control-sm" readonly>
      </div>
      <div class="col-sm-3">
        <label for="emailDestinatarioEnvioPropuesta">Correo Destinatario:</label>
        <input type="text" id="emailDestinatarioEnvioPropuesta" name="emailDestinatarioEnvioPropuesta" class="form-control form-control-sm" readonly>
      </div>
      <div class="col-sm-3">
        <label for="idtyDestinatarioEnvioPropuesta">Identificador:</label>
        <input type="text" id="idtyDestinatarioEnvioPropuesta" name="idtyDestinatarioEnvioPropuesta" class="form-control form-control-sm" readonly>
      </div>
      <div class="col-sm-3">
        <label for="idtyDestinatarioEnvioPropuesta">Fecha creación:</label>
        <input type="text" id="fechaCreacionDestinatarioEnvioPropuesta" name="fechaCreacionDestinatarioEnvioPropuesta" class="form-control form-control-sm" readonly>
      </div>

      <div class="col-sm-12 mt-2">
        <label for="mensajeDestinatarioEnvioPropuesta">Mensaje:</label>
        <div id="mensajeDestinatarioEnvioPropuesta" name="mensajeDestinatarioEnvioPropuesta" class="border p-2"></div>
      </div>

      <div class="col-sm-6 mt-2">
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input custom-file-input-sm" id="adjuntoDestinatarioEnvioPropuesta" name="adjuntoDestinatarioEnvioPropuesta" aria-describedby="inputGroupFileAddon01" accept=".pdf">
            <label class="custom-file-label" for="adjuntoDestinatarioEnvioPropuesta">Aduntar Brochure (.pdf)</label>
          </div>
        </div>
      </div>

      <div class="col-sm-6 mt-2">
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input custom-file-input-sm" id="adjuntoAdicionalDestinatarioEnvioPropuesta" name="adjuntoAdicionalDestinatarioEnvioPropuesta" aria-describedby="inputGroupFileAddon01" accept=".pdf">
            <label class="custom-file-label" for="adjuntoAdicionalDestinatarioEnvioPropuesta">Adjunto adicional (.pdf)</label>
          </div>
        </div>
      </div>

      <div class="col-sm-12 mt-2 text-center">
        <button class="btn btn-sm {{$btn}}" id="btnRegresarListadoPropuestas"><i class="fa fa-undo fa-sm"></i> Regresar</button>
        <button class="btn btn-sm {{$btn}}" id="btnEnviarPropuesta"><i class="fa fa-paper-plane fa-sm"></i> Enviar</button>
      </div>
    </div>
  </form>

<script>
  datosPropuesta();

  document.getElementById( 'btnRegresarListadoPropuestas' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
  });

  document.getElementById( 'btnEnviarPropuesta' ).addEventListener( 'click' , function( e ){
    abreModal();
    e.preventDefault();
    var datos = new FormData( document.getElementById( 'formDestinatarioEnviaPropuesta' ) );
    axios.post('/api/enviaPropuesta/'+document.getElementById('propuestaID').value , datos , { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) ,'content-type':'multipart/form-data' } } )
      .then( response => {
        contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
        aviso( 'Propuesta enviada correctamente' );
      })
      .catch( err => {
        console.log( err );
      });
  });

  function datosPropuesta() {
    var url   = '/api/obtieneDatosPropuesta/' + document.getElementById( 'propuestaID' ).value;
    axios.get( url , { headers:{ 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
      .then( response => {
        var contacto = response.data.contactoTxtEnvio.split( '[' );
        document.getElementById( 'clienteID' ).value                               = response.data.cliente;
        document.getElementById( 'nombreDestinatarioEnvioPropuesta' ).value        = contacto[ 0 ];
        document.getElementById( 'emailDestinatarioEnvioPropuesta' ).value         = contacto[ 1 ].replace( ']' , '' );
        document.getElementById( 'idtyDestinatarioEnvioPropuesta' ).value          = response.data.propuestaIDTY;
        document.getElementById( 'fechaCreacionDestinatarioEnvioPropuesta' ).value = response.data.fechaCreacion;

        axios.get( '/api/obtieneDatosTemplate/1' , { headers:{ 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
          .then( response2 => {
            var mensaje = response2.data.cuerpo.replace( '{cliente}'        , response.data.contactoTxt )
                                               .replace( '{fechaSolicitud}' , response.data.fechaCreacion )
                                               .replace( '{propuestaIDTY}'  , response.data.propuestaIDTY )
                                               .replace( '{fechaVigencia}'  , response.data.fechaVigencia );
            document.getElementById( 'mensajeDestinatarioEnvioPropuesta' ).innerHTML = mensaje;
          })
          .catch( err => {
            console.log( err );
          });

      })
      .catch( err => {
        console.log( err );
      });
  }

  function enviaPropuesta() {
    var url   = '/api/enviaPropuesta/' + document.getElementById( 'propuestaID' ).value;
    var config = { headers:{ 'Accept' : 'application/json', 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } };

    axios.get( url , config )
      .then( response => {
        contenidos( 'clientes_listadoPropuestas' , document.getElementById( 'clienteID' ).value );
      })
      .catch( err => {
        console.log( err );
      });
  }

</script>
