<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Widgets
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="{{$container}} border-left border-right border-bottom p-1">
        <form id="frmWidgets" name="frmWidgets">
          <div class="row ml-1 mr-1" id="contenedorWidgets">
          </div>
          <div class="row">
              <div class="col-sm-12 text-center"><button class="btn btn-sm {{$btn}}" id="btnGuardaConfigWidgets">Guardar</button></div>
          </div>
        </form>
      </div>
  </div>
</div>

<script>
  var url = '/api/listadoWidgets';
  axios.get( url , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
    .then( response => {
      response.data.forEach( function( e , i ) {
        var nuevoDiv = document.createElement( 'div' );
        nuevoDiv.classList.add( 'col-sm-3', 'pl-1', 'pt-1' , 'mt-2' );
        var contenido  = '<div class="card">'
                    + '<div class="card-header">' + e.titulo + '</div>'
                    + '<div class="card-body">' + e.descripcion
                    + '<br /><input type="number" class="form-control form-control-sm" id="conf_'+e.id+'" name="conf_'+e.id+'" value="'+e.configuracion+'"></div>'
                    + '<div class="card-footer">'
                    + '<label for="widget_'+e.id+'">Habilitar widget?</label> '
                    + '<input type="checkbox" name="widget_'+e.id+'" id="widget_'+e.id+'" '+( ( e.estado=='1' ) ? 'checked' : '' )+'>'
                    + '<input type="hidden" name="idty_'+e.id+'" id="idty_'+e.id+'" value="'+e.id+'">'
                    + '</div>'
                    + '</div>';
        nuevoDiv.innerHTML = contenido;
        document.getElementById( 'contenedorWidgets' ).appendChild( nuevoDiv );
      });
    })
    .catch( err => {
      console.log( err );
    });

  document.getElementById( 'btnGuardaConfigWidgets' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    guardaConfiguracionWidgets();
  });

  function guardaConfiguracionWidgets() {
    var datos = new FormData( document.getElementById( 'frmWidgets' ) );
    var url   = '/api/guardaConfWidgets';
    axios.post( url , datos , { headers:{ 'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
      .then( response => {
        contenidos( 'dashboard' );
      })
      .catch( err => {
        console.log( err );
      });
  }

</script>
