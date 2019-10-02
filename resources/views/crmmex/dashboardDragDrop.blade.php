
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-block">
        <div class="row" id="sortable"></div>
      </div>
    </div>
  </div>
</div>

<script>
  $( document ).ready(function() {
    $("#sortable").sortable({
      stop:function(){
        $('#sortable').find('.widget').each(function( i ){
          var idty = $(this).attr('id').split( '_' );
          axios.post( '/api/actualizaPosicion/'+idty[ 1 ]+'/'+i , {} , { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
               .then()
               .catch( err => {
                 console.log( err );
               });
        });
      }
    });
    $("#sortable").disableSelection();
  });
</script>

<script>
  axios.get( '/api/listadoEstadoWidgets' , { headers:{ 'Accept' : 'application/json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      $( '#sortable' ).html( '' );
      response.data.forEach( function( e , i ) {
        var html = '<div class="col-sm-' + e.tamanio + ' mt-1 mb-1 widget" id="contWidget_' + e.id + '" ' + ( ( e.estado == '0' ) ? 'style="display: none"' : '' ) + ' >'
         + '<div class="card"><div class="card-header">' + e.titulo
         + '</div><div class="card-body">' + e.contenido
         + '</div></div></div>';
        $( '#sortable' ).append( html );
      });
    })
    .catch( err => {
      console.log( err );
    });
</script>
