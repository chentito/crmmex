
<h5 id="tituloCliente"></h5>
<input type="hidden" name="clienteID" id="clienteID" value="{{$param}}">

<div class="row">

    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Datos Fiscales</div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Direccion</div>
            <div class="card-body">

            </div>
        </div>
    </div>

    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Contactos</div>
            <div class="card-body">
                <div id="contenedorContactos"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Informacion Adicional</div>
            <div class="card-body">

            </div>
        </div>
    </div>


    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Seguimientos</div>
            <div class="card-body">

            </div>
        </div>
    </div>
    <div class="col-sm-6 mt-3">
        <div class="card card-sm">
            <div class="card-header">Propuestas</div>
            <div class="card-body">

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

  datosCliente();
  function datosCliente() {
      var clienteID = document.getElementById( 'clienteID' ).value
      var url = '/api/obtieneExpediente/' + clienteID;

      axios.get( url )
           .then( response => {

             var razonSocial = response.data.cliente;
             var titulo = "Cliente # "+razonSocial[ 'id' ] + " " + razonSocial[ 'razonSocial' ];
             document.getElementById( 'tituloCliente' ).innerHTML = titulo;

              // contactos
              var contactos = '<ul class="list-group">';
              response.data.contactos.forEach( function( e , p ){


                  contactos += '<li class="list-group-item">'+e['nombre']+' '+e['apellidoPaterno']+' '+e['apellidoMaterno'];

                  contactos += '<span class="float-right">'
                  contactos += '<button class="btn btn-sm btn-info ml-1"><i class="fa fa-cogs fa-sm"></i></button>';
                  contactos += '<button class="btn btn-sm btn-info ml-1"><i class="fa fa-user fa-sm"></i></button>';
                  contactos += '</span>';
                  contactos += '</li>';

              });
              contactos += '</ul>';
              document.getElementById( 'contenedorContactos' ).innerHTML = contactos;

           })
           .catch( err => {
             console.log( err );
           });
  }
</script>
