/*
 * Funciones utiles para la carga de contenidos sobre la plataforma
 * Solicita la vista a traves de una llamada ajax y la asigna al contenedor principal
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Marzo 2019
 */

 $.fn.datepicker.dates['es'] = {
     days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
     daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
     daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
     months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
     monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
     today: "Hoy",
     clear: "Borrar",
     format: "mm/dd/yyyy",
     titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
     weekStart: 0
 };

function contenidos( idContenido , param='' ) {
    abreModal();
    path  = '/contenidos/' + idContenido;
    path += ( param != '' ) ? '/'+param : '';
    axios( path )
        .then( datos => {
            $( '#contenidosPrincipales' ).html( datos.data.body );
            $( '#contenedorBreadCrumb' ).html( datos.data.breadcrumb );
            cierraModal();
        })
        .catch( err => {
            console.error( err );
        });
}

function cargaDatosComboCatalogo() {
    $( 'select' ).each( function() {
        idty = $( this ).attr( 'id' );
        if( idty.substring( 0 , 8 ) === 'catalogo' ) {
            id = idty.split( '_' );
            axios
            .get( '/api/opcionesCombosPorId/' + id[ 1 ] )
            .then(response => {
                response.data.forEach((item) => {
                    $( "#" + $( this ).attr( 'id' ) ).append( '<option value="' + item.id + '">' + item.nombre + '</option>' );
                });
            });
        }
    });
}

async function generaToken() {
  if( sessionStorage.getItem("apiToken") === null ) {
    await axios
      .get( '/generaToken' )
      .then( response => {
        console.log( 'Token generado...' );
        sessionStorage.setItem( 'apiToken', response.data.apiToken );
      }).
      catch( function( e ){
        console.log( 'ERROR TOKEN ' + e );
      });
  } else {
      console.log( 'Token previamente generado...' );
  }
}

function eliminaToken() {
  var token  = sessionStorage.getItem( 'apiToken' );
  var config = {
    headers: {
      'Accept': 'application/json',
      'Authorization': 'Bearer ' + token
    }
  };
  axios.get( '/api/auth/delToken' , config )
       .then( request => {
         sessionStorage.removeItem( 'apiToken' );
         console.log( 'Token eliminado' );
       })
       .catch( err => {
         console.log( 'Error al eliminar token ' + err );
       });
}

async function utiles( accion ) {
    let promise = axios.get( '/api/utiles/' + accion );
    let result = await promise;
    return result.data;
}

function abreModal() {
    $( '.modal' ).modal( 'show' );
}

function cierraModal() {
    $( '.modal' ).modal( 'hide' );
    $( '#sidebar' ).removeClass( 'active' );
}

async function solicitud( metodo, token, url, datos ) {
  var config  = { headers: { 'Accept': 'application/json', 'Authorization': 'Bearer ' + token } };
  if( metodo == 'get' ) {
    let promesa = axios.get;
    promesa( url, config );
  } else if( metodo == 'post' ) {
    let promesa = axios.post;
    promesa( url, datos , config );
  }
  let result  = await promesa;
  return result;
}

function aplicaPromo( promoID , monto , input ) {
    if( promoID == '0' ) {
      document.getElementById( input ).value = '0.00';
      return monto;
    }
    var token = sessionStorage.getItem( 'apiToken' );
    var url   = '/api/utiles/aplicaPromo/' + promoID + '/' + monto;
    var datos = {};
    var config = {
      headers: {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + token
      }
    };

    axios.post( url , datos , config )
     .then( response => {
       document.getElementById( input ).value       = response.data.toFixed( 2 );
       document.getElementById( 'propuesta_total' ) = parseInt( document.getElementById( 'propuesta_total' ).value ) - parseInt( response.data );
     })
     .catch( err => {
       console.log( err );
     });
}

function generaDataGrid( id , filtro = '' ) {
    var token = sessionStorage.getItem( 'apiToken' );
    f = ( filtro != '' ) ? '/' + filtro : '';
    axios.get( '/api/dataTableConfig/' + id )
         .then( response => {
            titulos     = response.data.titulos.split( ',' );
            campos      = response.data.campos.split( ',' );
            visibilidad = response.data.visibilidad.split( ',' );

            var titulo = document.getElementById( id ).createCaption();
            titulo.innerHTML = '<div class="row"><div class="col-sm-12"><h5>'+response.data.titulo+'</h5></div></div>';

            var header   = document.getElementById( id ).createTHead();
            var row      = header.insertRow(0);
            var columnas = [];

            titulos.forEach( function( t , p ) {
                if( visibilidad[ p ] == "1" ) {
                  var th       = document.createElement( 'th' );
                  th.innerHTML = t;
                  row.appendChild( th );
                  columnas.push( { data:campos[ p ] } );
                }
            });

            $.fn.dataTable.ext.errMode = 'throw';
            var grid = $( '#' + id ).DataTable({
                dom: 'Bfrtip',
                buttons: [
                  {
                    extend: 'csv',
                    text: 'Exportar a csv',
                    title: response.data.titulo.replace( ' ' , '' ),
                    className: 'btn'
                  },
                  {
                    extend: 'excel',
                    text: 'Exportar a Excel',
                    title: response.data.titulo.replace( ' ' , '' ),
                    className: 'btn'
                  },
                  {
                    extend: 'pdf',
                    text: 'Exportar a PDF',
                    title: response.data.titulo.replace( ' ' , '' ),
                    className: 'btn'
                  },
                  {
                    text: 'Configuracion',
                    className: 'btn',
                    action: function(){
                      document.getElementById( id + '_config' ).style.display = 'block';
                    }
                  }
                ],
                order      : [[ 0, "desc" ]],
                lengthMenu : [ [8, 16, 24, -1], [8, 16, 24, "All"]],
                ajax       : {
                    url: '/api/' + id + f,
                    dataSrc: response.data.datasource,
                    beforeSend : function( request ) {
                        request.setRequestHeader( "Accept" , "application/json" );
                        request.setRequestHeader( "Authorization" , "Bearer " + token );
                    }
                },
                responsive: true,
                columns: columnas,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "No se encontraron datos",
                    "info":           "Mostrando _START_ de _END_ de _TOTAL_ resultados",
                    "infoEmpty":      "Mostrando 0 de 0 de 0 resultados",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrando _MENU_ resultados",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se han encontrado coincidencias",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Untimo",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": orden ascendente",
                        "sortDescending": ": orden descendente"
                    }
                }
            });

            grid.buttons().container().appendTo( '#'+id+'_wrapper .col-md-6:eq(0)' );

            new $.fn.dataTable.ColReorder( grid, {
              // options
            });

            axios.get( '/api/dataTableConfigView/' + id )
                 .then( response => {
                    document.getElementById( id + '_config' ).innerHTML = response.data;
                    document.getElementById( id + '_config' ).style.display = "none";
                    document.getElementById( 'btnGdaConfGrid' ).addEventListener( 'click' , function( e ) {
                        e.preventDefault();
                        var url = '/api/actualizaGridConfig';
                        var datos = new FormData( document.getElementById( 'formConfGrid' ) );
                        axios.post( url , datos )
                             .then( request => {
                               aviso( 'Listado actualizado correctamente' );
                               seccion = document.getElementById(  ( document.getElementById( 'confGrid_seccion' ).value == "" ) ? 'nombreSeccionRecargar' : 'confGrid_seccion' ).value;
                               contenidos( seccion , f.replace( '/' , '' ) );
                             })
                             .catch( err => {
                               console.log( err );
                             });
                    });

                    document.getElementById( 'btnGdaConfGridCierra' ).addEventListener( 'click' , function() {
                        document.getElementById( id + '_config' ).style.display = "none";
                    });

                 })
                 .catch( err => {
                    console.log( err );
                 });

           document.getElementById( 'abreConfiguracionGrid' ).addEventListener( 'click' , function(){
              document.getElementById( id + '_config' ).style.display = 'block';
           });

     })
     .catch( err => {
       console.log( err );
     });

}

// COntrol de campos Adicionales
function cargaCamposAdicionales( seccion , valores=[] ) {
    document.getElementById( 'camposAdicionalesContainer' ).innerHTML = '';
    var container = document.getElementById( 'camposAdicionalesContainer' );
    var url       = '/api/listadoCamposAdicionales/'+seccion;
    var config    ={
      headers: {
        'Accept' : 'application/json',
        'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' )
      }
    };
    axios.get( url , config )
         .then( response => {
           if( typeof response.data[ 'camposAdicionales' ] === 'undefined' ) {
           }else{
              response.data[ 'camposAdicionales' ].forEach( function( e , v ) {
                var urlHTML  = '/api/htmlCampoAdicional/' + e.id;
                    urlHTML += ( typeof valores[ e.id ] === "undefined" ) ? '' : '/' + valores[ e.id ];

                axios.get( urlHTML , config )
                     .then( response => {
                        var x = document.getElementById( 'camposAdicionalesContainer' ).innerHTML;
                        container.innerHTML = x + response.data[ 'campo' ];
                     })
                     .catch( err => {
                       console.log( err );
                     });
              });
            }
         })
         .catch(
           err => {console.log( err );}
         );
}

// Alertas y avisos
function aviso( mensaje , exito=true ) {

    tipo = ( exito == true ) ? 'success' : 'danger';

    $.notify({
      	// options
      	icon: 'glyphicon glyphicon-warning-sign',
      	message: mensaje,
      },{
      	// settings
      	element: 'body',
      	position: null,
      	type: tipo,
      	allow_dismiss: false,
      	newest_on_top: false,
      	showProgressbar: false,
      	placement: {
      		from: "top",
      		align: "center"
      	},
      	offset: 20,
      	spacing: 10,
      	z_index: 1500,
      	delay: 4000,
      	timer: 1000,
      	url_target: '_blank',
      	mouse_over: null,
      	animate: {
      		enter: 'animated fadeInDown',
      		exit: 'animated fadeOutUp'
      	},
      	onShow: null,
      	onShown: null,
      	onClose: null,
      	onClosed: null,
      	icon_type: 'class',
      	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
      		        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
  		            '<span data-notify="message"><b><center>{2}</center></b></span>' +
      	          '</div>'
      });
}

function notificacionesInicio( mensaje ) {
  $.notify({
      // options
      icon: 'glyphicon glyphicon-warning-sign',
      message: mensaje,
    },{
      // settings
      element: 'body',
      position: null,
      type: 'info',
      allow_dismiss: true,
      newest_on_top: false,
      showProgressbar: false,
      placement: {
        from: "top",
        align: "right"
      },
      offset: 20,
      spacing: 10,
      z_index: 1500,
      delay: 8000,
      timer: 1000,
      url_target: '_blank',
      mouse_over: null,
      animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
      },
      onShow: null,
      onShown: null,
      onClose: null,
      onClosed: null,
      icon_type: 'class',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="message"><b><center>{2}</center></b></span>' +
                '</div>'
    });
}

function notificacionesIniciales() {
    axios.get( '/api/proximosSeguimientos' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
    .then( response => {
            response.data.forEach( function( e , ll ) {
                setTimeout(function() {
                    var msj = '<a style="cursor:pointer" onclick="contenidos(\'clientes_editaseguimiento\',\''+e.id+'\')">' + e.titulo + '</a> '
                            + e.fechaEjecucion + ' <br>'
                            + '<a style="cursor:pointer" onclick="contenidos(\'clientes_edicion\',\''+e.clienteID+'\')">' + e.cliente + '</a>';
                    notificacionesInicio( msj );
                }, 2000);
            });
        })
        .catch( err => {
          console.log( err );
        });
}
