
<input type="hidden" id="idCargaInfo" name="idCargaInfo" value="{{$param}}" />

<h5>Prospecto ID {{$param}} <span id="nombreCliente"></span></h5>

<div style="position:absolute; right: 90px; z-index: 900">
  <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('prospectos_listado')"><i class="fa fa-undo-alt fa-lg">undo</i><span class="d-none d-sm-inline">  Regresar</span></button>
</div>

@include( 'crmmex.prospectos.nuevo' )

<script>
    var token = sessionStorage.getItem( 'apiToken' );
    var idContenido = document.getElementById( 'idCargaInfo' ).value;
    document.getElementById( 'expediente_id' ).value = idContenido;
    cargaPipeline( idContenido );
    comboEstados();
    comboPaises();
    var path  = '/api/obtieneExpediente/' + idContenido;

    axios( path , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
        .then( datos => {
            // Direccion
            d = datos.data;
            direccion = d[ 'direccion' ];
            document.getElementById( 'direccion_calle' ).value       = direccion[ 'calle' ];
            document.getElementById( 'direccion_no_exterior' ).value = direccion[ 'noExterior' ];
            document.getElementById( 'direccion_no_interior' ).value = direccion[ 'noInterior' ];
            document.getElementById( 'direccion_colonia' ).value     = direccion[ 'colonia' ];
            document.getElementById( 'direccion_cp' ).value          = direccion[ 'cp' ];
            document.getElementById( 'direccion_delegacion' ).value  = direccion[ 'delegacion' ];
            document.getElementById( 'direccion_ciudad' ).value      = direccion[ 'ciudad' ];
            document.getElementById( 'direccion_estado' ).value      = direccion[ 'estado' ];
            document.getElementById( 'direccion_pais' ).value        = direccion[ 'pais' ];
            // Cliente
            cliente = d[ 'cliente' ];
            document.getElementById( 'cliente_razon_social' ).value     = cliente[ 'razonSocial' ];
            document.getElementById( 'nombreCliente' ).innerHTML        = cliente[ 'razonSocial' ];
            document.getElementById( 'cliente_rfc' ).value              = cliente[ 'rfc' ];
            //document.getElementById( 'catalogo_5' ).value               = cliente[ 'giro' ];
            //document.getElementById( 'catalogo_1' ).value               = cliente[ 'categoria' ];
            //document.getElementById( 'catalogo_2' ).value               = cliente[ 'subcategoria' ];
            document.getElementById( 'cliente_observaciones' ).value    = cliente[ 'observaciones' ];
            document.getElementById( 'cliente_tipo' ).value             = cliente[ 'tipo' ];
            //document.getElementById( 'cliente_grupo' ).value            = cliente[ 'grupo' ];
            document.getElementById( 'cliente_producto_interes' ).value = cliente[ 'producto' ];
            // Contactos
            contactos = d[ 'contactos' ];
            $.each( contactos , function( a , b ) {
                if( a > 0 ) {
                  document.getElementById( 'idsContactos' ).value              = document.getElementById( 'idsContactos' ).value + b.idty + ',';
                  agregaEstructuraContacto(b.nombre,b.idty,b.apellidoPaterno,b.apellidoMaterno,b.correoElectronico,b.celular,b.compania,b.telefono,b.extension,b.area,b.puesto);
                } else {
                  document.getElementById( 'contacto_idty' ).value             = b.idty;
                  document.getElementById( 'contacto_nombre' ).value           = b.nombre;
                  document.getElementById( 'contacto_paterno' ).value          = b.apellidoPaterno;
                  document.getElementById( 'contacto_materno' ).value          = b.apellidoMaterno;
                  document.getElementById( 'contacto_email' ).value            = b.correoElectronico;
                  document.getElementById( 'contacto_celular' ).value          = b.celular;
                  //document.getElementById( 'contacto_celular_compania' ).value = b.compania;
                  document.getElementById( 'contacto_telefono' ).value         = b.telefono;
                  document.getElementById( 'contacto_extension' ).value        = b.extension;
                  //document.getElementById( 'contacto_area' ).value             = b.area;
                  //document.getElementById( 'contacto_puesto' ).value           = b.puesto;
                }
            });

            adicionales = d[ 'adicionales' ];
            cargaCamposAdicionales( '2' , adicionales );
        })
        .catch( err => {
            console.error( err );
        });

      function cargaPipeline( clienteID ) {
          axios.get( '/api/obtienePipeline/' + clienteID , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
               .then( response => {

                  alert( JSON.stringify( response.data ) );

                  /*var datos   = new Array();
                  var colores = new Array();

                  response.data.detalles.forEach( function( e , i ) {
                      colores.push( ( ( e.estado == true ) ? '#3E5A8E' : '#d1d1d1' ) );
                      var estado = ( e.estado == true ) ? '('+e.peso+'%) Finalizado' : '('+e.peso+'%) Pendiente';
                      datos.push( { name: e.tituloDetalle , label:estado , description: e.descripcion } );
                  });

                  Highcharts.chart('graficaPipeline', {
                      chart: { type: 'timeline' },
                      xAxis: { visible: false },
                      yAxis: { visible: false },
                      title: { text: 'Pipeline' },
                      colors: colores,
                      credits: { enabled: false },
                      series: [{ data: datos }]
                  });*/

               })
               .catch( err => {
                 console.log( err );
               });
      }
</script>
