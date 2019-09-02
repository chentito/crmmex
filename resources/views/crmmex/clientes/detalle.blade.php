
<h5 id="tituloCliente"></h5>
<input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">

<div class="row">

    <div class="col-sm-6 mt-3">
      <div class="row">

        <div class="col-sm-12">
          <div class="card card-sm">
              <div class="card-header">Datos Principales</div>
              <div class="card-body">
                <table class="table">
                  <tr>
                    <td width="30%">Razón Social</td>
                    <td><span id="detalleCliente_razonSocial"></span></td>
                  </tr>
                  <tr>
                    <td>RFC</td>
                    <td><span id="detalleCliente_rfc"></span></td>
                  </tr>
                  <tr>
                    <td>Ejecutivo</td>
                    <td><span id="detalleCliente_ejecutivo"></span></td>
                  </tr>
                  <tr>
                    <td>Fecha de Alta</td>
                    <td><span id="detalleCliente_fechaAlta"></span></td>
                  </tr>
                  <tr>
                    <td>Fecha de Modificacion</td>
                    <td><span id="detalleCliente_fechaModificacion"></span></td>
                  </tr>
                  <tr>
                    <td>Tipo</td>
                    <td><span id="detalleCliente_tipo"></span></td>
                  </tr>
                  <tr>
                    <td>Observaciones</td>
                    <td><span id="detalleCliente_observaciones"></span></td>
                  </tr>
                </table>
              </div>
          </div>
        </div>

        <div class="col-sm-12 mt-3">
            <div class="card card-sm">
                <div class="card-header">Informacion Adicional</div>
                <div class="card-body">
                    <div id="contenedorAdicionales"></div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 mt-3">
      <div class="row">
        <div class="col-sm-12">
            <div class="card card-sm">
                <div class="card-header">Contactos</div>
                <div class="card-body">
                    <div id="contenedorContactos"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 mt-3">
            <div class="card card-sm">
                <div class="card-header">Direccion</div>
                <div class="card-body">
                  <table class="table">
                    <tr>
                      <td width="30%">Calle</td>
                      <td><span id="detalleCliente_calle"></span></td>
                    </tr>
                    <tr>
                      <td>No. Exterior</td>
                      <td><span id="detalleCliente_noExterior"></span></td>
                    </tr>
                    <tr>
                      <td>No. Interior</td>
                      <td><span id="detalleCliente_noInterior"></span></td>
                    </tr>
                    <tr>
                      <td>Colonia</td>
                      <td><span id="detalleCliente_colonia"></span></td>
                    </tr>
                    <tr>
                      <td>CP</td>
                      <td><span id="detalleCliente_cp"></span></td>
                    </tr>
                    <tr>
                      <td>Delegación</td>
                      <td><span id="detalleCliente_delegacion"></span></td>
                    </tr>
                    <tr>
                      <td>Ciudad</td>
                      <td><span id="detalleCliente_ciudad"></span></td>
                    </tr>
                    <tr>
                      <td>Estado</td>
                      <td><span id="detalleCliente_estado"></span></td>
                    </tr>
                    <tr>
                      <td>Pais</td>
                      <td><span id="detalleCliente_pais"></span></td>
                    </tr>
                    <tr>
                      <td>Fecha Alta</td>
                      <td><span id="detalleCliente_fechaAltaDireccion"></span></td>
                    </tr>
                    <tr>
                      <td>Fecha Modificación</td>
                      <td><span id="detalleCliente_fechaModificacionDireccion"></span></td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Seguimientos</div>
            <div class="card-body">
              <div id="contenedorSeguimientos"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Propuestas <span class="badge badge-primary float-right"><a href="javascript:void(0)" id="clickVerPipeline">Ver estatus</a></span></div>
            <div class="card-body">
              <div id="contenedorPropuestas"></div>
            </div>
        </div>
    </div>

</div>

<div class="row mt-3">
  <div class="col-sm-12 text-center">
      <button class="btn btn-sm {{$btn}}" id="btnRegresarListadoClientes">Regresar</button>
  </div>
</div>

<script>
  document.getElementById( 'btnRegresarListadoClientes' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( "clientes_listado" );
  });

  document.getElementById( 'clickVerPipeline' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      contenidos( "consulta_cliente_pipeline" , document.getElementById( 'clienteID' ).value );
  });

  datosCliente();
  function datosCliente() {
      var clienteID = document.getElementById( 'clienteID' ).value
      var url = '/api/obtieneExpediente/' + clienteID;

      axios.get( url , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {

             var razonSocial = response.data.cliente;
             var direccion   = response.data.direccion;
             var titulo = '<a style="cursor:pointer" onclick="javascript:contenidos(\'clientes_edicion\',\'' + razonSocial[ 'id' ] + '\')">Cliente # ' + razonSocial[ 'id' ] + ' ' + razonSocial[ 'razonSocial' ] + '</a>';
             document.getElementById( 'tituloCliente' ).innerHTML = titulo;
              // Razon Social
              document.getElementById( 'detalleCliente_razonSocial' ).innerHTML       = razonSocial[ 'razonSocial' ];
              document.getElementById( 'detalleCliente_rfc' ).innerHTML               = razonSocial[ 'rfc' ];
              document.getElementById( 'detalleCliente_ejecutivo' ).innerHTML         = razonSocial[ 'ejecutivo' ];
              document.getElementById( 'detalleCliente_fechaAlta' ).innerHTML         = razonSocial[ 'fechaAlta' ];
              document.getElementById( 'detalleCliente_fechaModificacion' ).innerHTML = razonSocial[ 'fechaModificacion' ];
              document.getElementById( 'detalleCliente_tipo' ).innerHTML              = ( razonSocial[ 'tipo' ] == 1 ) ? 'Cliente' : 'Prospecto';
              document.getElementById( 'detalleCliente_observaciones' ).innerHTML     = razonSocial[ 'observaciones' ];
              // contactos
              var contactos = '<ul class="list-group">';
              response.data.contactos.forEach( function( e , p ){
                  contactos += '<li class="list-group-item py-1">'+e['nombre']+' '+e['apellidoPaterno']+' '+e['apellidoMaterno'];
                  contactos += '<br> Email: <a href="mailto:'+e['correoElectronico']+'">' + e['correoElectronico']+'</a>';
                  contactos += ' Tel: <a href="tel:'+e['celular']+'">' +e['celular']+'</a> / <a href="tel:'+e['telefono']+'">'+e['telefono']+'</a>';
                  contactos += '<span class="float-right">'
                  contactos += '<button class="btn btn-sm btn-info ml-1" onclick="contenidos(\'clientes_edicion\',\''+clienteID+'\')"><i class="fa fa-edit fa-sm"></i></button>';
                  contactos += '</span>';
                  contactos += '</li>';
              });
              contactos += '</ul>';
              document.getElementById( 'contenedorContactos' ).innerHTML = contactos;
              // Direccion
              document.getElementById( 'detalleCliente_calle' ).innerHTML                      = direccion[ 'calle' ];
              document.getElementById( 'detalleCliente_noExterior' ).innerHTML                 = direccion[ 'noExterior' ];
              document.getElementById( 'detalleCliente_noInterior' ).innerHTML                 = direccion[ 'noInterior' ];
              document.getElementById( 'detalleCliente_colonia' ).innerHTML                    = direccion[ 'colonia' ];
              document.getElementById( 'detalleCliente_cp' ).innerHTML                         = direccion[ 'cp' ];
              document.getElementById( 'detalleCliente_delegacion' ).innerHTML                 = direccion[ 'delegacion' ];
              document.getElementById( 'detalleCliente_ciudad' ).innerHTML                     = direccion[ 'ciudad' ];
              document.getElementById( 'detalleCliente_estado' ).innerHTML                     = direccion[ 'estado' ];
              document.getElementById( 'detalleCliente_pais' ).innerHTML                       = direccion[ 'pais' ];
              document.getElementById( 'detalleCliente_fechaAltaDireccion' ).innerHTML         = direccion[ 'fechaAlta' ];
              document.getElementById( 'detalleCliente_fechaModificacionDireccion' ).innerHTML = direccion[ 'fechaModificacion' ];
              // seguimientos
              if( Symbol.iterator in Object( response.data.seguimientos ) ) {
                var seguimientos  = '<ul class="list-group">';
                response.data.seguimientos.forEach( function( e , p ) {
                  seguimientos += '<li class="list-group-item py-1">';
                  seguimientos += '['+e['fechaAlta']+'] ' + e['nombreActividad'] + ' / ' + e['estado'];
                  seguimientos += '<br>' + ' Contacto '+e[ 'contactoID' ];
                  seguimientos += '<span class="float-right">'
                  seguimientos += '<button class="btn btn-sm btn-info ml-1" onclick="contenidos(\'clientes_editaseguimiento\',\''+e['id']+'\')"><i class="fa fa-search fa-sm"></i></button>';
                  seguimientos += '</span>';
                  seguimientos += '</li>';
                });
                seguimientos += '</ul>';
                document.getElementById( 'contenedorSeguimientos' ).innerHTML = seguimientos;
              }
              // Propuestas
              if( Symbol.iterator in Object( response.data.propuestas ) ) {
                var propuestas = '<ul class="list-group">';
                response.data.propuestas.forEach( function( e , p ){
                    propuestas += '<li class="list-group-item py-1">';
                    propuestas += '[Vigencia '+ e[ 'fechaVigencia' ] +'] ' + e[ 'contactoID' ];
                    propuestas += '<br>' + 'ID ' + e[ 'idty' ];
                    propuestas += '<span class="float-right">';
                    propuestas += '<button class="btn btn-sm btn-info ml-1" onclick="contenidos(\'clientes_editapropuesta\',\''+e['id']+'\')"><i class="fa fa-edit fa-sm"></i></button>';
                    propuestas += '</span>';
                    propuestas += '</li>';
                });
                propuestas += '</ul>';
                document.getElementById( 'contenedorPropuestas' ).innerHTML = propuestas;
              }
              // adicionales
              if( Symbol.iterator in Object( response.data.adicionalesEdicion ) ) {
                var adicionales = '<ul class="list-group">';
                response.data.adicionalesEdicion.forEach( function( k , v ) {
                  adicionales += '<li class="list-group-item py-2">';
                  adicionales += k[ 'id' ] + ": " + k[ 'valor' ];
                  adicionales += '</li>';
                });
                adicionales += '</ul>';
                document.getElementById( 'contenedorAdicionales' ).innerHTML = adicionales;
              }
           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
