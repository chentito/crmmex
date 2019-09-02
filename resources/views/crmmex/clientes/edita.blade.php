
<input type="hidden" id="idCargaInfo" name="idCargaInfo" value="{{$param}}" />

<h5>Cliente ID {{$param}} <span id="nombreCliente"></span></h5>

<div style="position:absolute; right: 90px; z-index: 900">
  <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('clientes_listado')"><i class="fa fa-undo-alt fa-lg">undo</i><span class="d-none d-sm-inline">  Regresar</span></button>
  <button class="btn btn-sm {{$btn}}" onclick="javascript:contenidos('clientes_detalle',document.getElementById('idCargaInfo').value)"><i class="fa fa-id-card fa-lg"></i><span class="d-none d-sm-inline">  Detalle</span></button>
</div>

@include( 'crmmex.clientes.alta' )

<script>
    var token = sessionStorage.getItem( 'apiToken' );
    var idContenido = document.getElementById( 'idCargaInfo' ).value;
    document.getElementById( 'expediente_id' ).value = idContenido;

    if( document.getElementById( 'visorPipeline' ) != null ) {
        setTimeout( function(){ document.querySelector('a[href="#adicionales"]').click(); } , 1500 );
    }
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
            document.getElementById( 'cliente_observaciones' ).value    = cliente[ 'observaciones' ];
            document.getElementById( 'cliente_tipo' ).value             = cliente[ 'tipo' ];
            document.getElementById( 'cliente_producto_interes' ).value = cliente[ 'producto' ];
            // Contactos
            contactos = d[ 'contactos' ];
            $.each( contactos , function( a , b ) {
                if( a > 0 ) {
                  document.getElementById( 'idsContactos' ).value       = document.getElementById( 'idsContactos' ).value + b.idty + ',';
                  //agregaEstructuraContacto(b.nombre, b.idty, b.apellidoPaterno, b.apellidoMaterno, b.correoElectronico, b.celular, b.telefono, b.extension,b.adicionales[ 'adicionales' ]);
                  agregaEstructuraContacto( b );
                } else {
                  document.getElementById( 'contacto_idty' ).value      = b.idty;
                  document.getElementById( 'contacto_nombre' ).value    = b.nombre;
                  document.getElementById( 'contacto_paterno' ).value   = b.apellidoPaterno;
                  document.getElementById( 'contacto_materno' ).value   = b.apellidoMaterno;
                  document.getElementById( 'contacto_email' ).value     = b.correoElectronico;
                  document.getElementById( 'contacto_celular' ).value   = b.celular;
                  document.getElementById( 'contacto_telefono' ).value  = b.telefono;
                  document.getElementById( 'contacto_extension' ).value = b.extension;
                  cargaCamposAdicionales( '4' , b.adicionales[ 'adicionales' ] );
                }
            });

            adicionales = d[ 'adicionales' ];
            cargaCamposAdicionales( '1' , adicionales );
        })
        .catch( err => {
            console.error( err );
        });

        function cargaPipeline( clienteID ) {
            axios.get( '/api/obtienePipeline/' + clienteID , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
                 .then( response => {
                    response.data.indicadores.forEach( function( e , i ){
                        var datos   = new Array();
                        var colores = new Array();
                        var titulo  = e.idty;
                        var id      = e.id;
                        var idCont  = 'graficaPipeline_' + i;

                        e.pipeline.detalles.forEach( function( p , indice ) {
                            colores.push( ( ( p.estado == true ) ? '#3E5A8E' : '#d1d1d1' ) );
                            var estado = ( p.estado == true ) ? '(' + p.peso + '%) Finalizado' : '(' + p.peso + '%) Pendiente';
                            datos.push( { name: p.tituloDetalle , label:estado , description: p.descripcion } );
                        });

                        var grafica = document.createElement( 'div' );
                        grafica.setAttribute( 'id' , idCont );
                        document.getElementById( 'contendorPipeline' ).appendChild( grafica );
                        document.getElementById( idCont ).style.height = '180px';
                        document.getElementById( idCont ).className    = 'border-bottom';

                        Highcharts.chart( idCont , {
                            chart: { type: 'timeline' },
                            xAxis: { visible: false },
                            yAxis: { visible: false },
                            title: {
                              align: 'left',
                              useHTML: true,
                              margin: 5,
                              text: '<a href="javascript:void(0)" onclick="return contenidos(\'clientes_editapropuesta\','+id+')">' + titulo + '</a>'
                            },
                            colors: colores,
                            credits: { enabled: false },
                            exporting: { enabled: false },
                            series: [{
                              dataLabels: {
                                connectorColor: 'silver',
                                alternate: false,
                                distance: 0
                              },
                              data: datos
                            }]
                        });
                    });
                 })
                 .catch( err => {
                   console.log( err );
                 });
        }
</script>
