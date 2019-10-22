
/*
 * Funcionalidad para el despliegue de datos a traves de la libreria dataTables
 * implementando la paginacion del lado del servidor.
 * @Fecha Octubre 2019
 * @Autor Carlos Reyes
 */

function gridDataTables( id , filtro = '' ) {
  var token = sessionStorage.getItem( 'apiToken' );
  f = ( filtro != '' ) ? '/' + filtro : '';
  axios.get( '/api/dataTableConfig/' + id )
    .then( response => {
      var titulos     = response.data.titulos.split( ',' );
      var campos      = response.data.campos.split( ',' );
      var visibilidad = response.data.visibilidad.split( ',' );
      var titulo = document.getElementById( id ).createCaption();
          titulo.innerHTML = '<div class="row"><div class="col-sm-12"><h6><i class="fa fa-sm fa-th-list"></i> '+response.data.titulo+'</h6></div></div>';
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
            text: '<i class="fa fa-md fa-file-alt"></i>',
            title: response.data.titulo.replace( ' ' , '' ),
            titleAttr: 'Exportar a formato CSV'
          },
          {
            extend: 'excel',
            text: '<i class="fa fa-md fa-file-excel"></i>',
            title: response.data.titulo.replace( ' ' , '' ),
            titleAttr: 'Exportar a Excel'
          },
          {
            extend: 'pdf',
            text: '<i class="fa fa-md fa-file-pdf"></i>',
            title: response.data.titulo.replace( ' ' , '' ),
            titleAttr: 'Exportar a DPF'
          },
          {
            text: '<i class="fa fa-md fa-cogs"></i>',
            titleAttr: 'Configuracion',
            action: function(){
              //document.getElementById( id + '_config' ).style.display = 'block';
              $( '#' + id + '_config' ).show( 'blind' );
            }
          }
        ],
        order      : [[ 0, "desc" ]],
        lengthMenu : [ [8, 16, 24, -1], [8, 16, 24, "All"]],
        "processing": true,
        "serverSide": true,
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
        stateSave:  true,
        stateSaveParams: function (settings, data) {
          data.search.search = "";
        },
        language: {
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

      grid.buttons().container().appendTo( '#'+id+'_wrapper .col-sm-6:eq(0)' );
      new $.fn.dataTable.ColReorder( grid, {});

      axios.get( '/api/dataTableConfigView/' + id )
            .then( response => {
              document.getElementById( id + '_config' ).innerHTML = response.data;
              document.getElementById( id + '_config' ).style.display = "none";

              document.getElementById( 'btnGdaConfGrid' ).addEventListener( 'click' , function( e ) {
                e.preventDefault();
                var url = '/api/actualizaGridConfig';
                var datos = new FormData( document.getElementById( 'formConfGrid' ) );
                var fields = 0;
                for ( var [key, value] of datos.entries() ) { fields ++; }

                if( fields <= 2 ) {
                  aviso( 'Debe seleccionar al menos una columna para mostrar' , false );
                } else {
                  axios.post( url , datos )
                    .then( request => {
                       aviso( 'Listado actualizado correctamente' );
                       seccion = document.getElementById(  ( document.getElementById( 'confGrid_seccion' ).value == "" )
                              ? 'nombreSeccionRecargar' : 'confGrid_seccion' ).value;
                       contenidos( seccion , f.replace( '/' , '' ) );
                      })
                      .catch( err => {
                       console.log( err );
                      });
                }
              });

              document.getElementById( 'btnGdaConfGridCierra' ).addEventListener( 'click' , function() {
                $( '#' + id + '_config' ).hide( 'blind' );
              });

              document.getElementById( 'gridSeleccionaTodo' ).addEventListener( 'click' , function(){
                var checkboxes = new Array();
                checkboxes = document.getElementById( 'formConfGrid' ).getElementsByTagName('input');
                for (var i=0; i<checkboxes.length; i++)  {
                  if (checkboxes[i].type == 'checkbox')   {
                    checkboxes[i].checked = document.getElementById( 'gridSeleccionaTodo' ).checked;
                  }
                }
              });
            })
            .catch( err => {
              console.log( err );
            });
    })
    .catch( err => {
      console.log( err );
    });
}
