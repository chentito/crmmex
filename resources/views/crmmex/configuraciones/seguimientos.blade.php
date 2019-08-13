<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Configuraciones</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom p-1">
      <div class="row mt-2 mb-2">
        <div class="col-sm-2">
          Minutos disponibles:
        </div>
        <div class="col-sm-2">
          <input type="text" name="valorPredefinido_4" id="valorPredefinido_4" value="" placeholder="Minutos disponibles" class="form-control form-control-sm">
        </div>
        <div class="col-sm-2" text-center>
          <button type="button" id="guardaMinutosDisponibles" name="guardaMinutosDisponibles" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  var header = {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}};

  axios.get( '/api/getPredefinido/4' , header )
      .then( response => {
          document.getElementById( 'valorPredefinido_4' ).value = response.data.valor;
        })
      .catch( err => {
          console.log( err );
        });

  document.getElementById( 'guardaMinutosDisponibles' ).addEventListener( 'click' , function( e , i ) {
    var datos = new FormData();
    datos.append( 'valorPredefinido_4' , document.getElementById( 'valorPredefinido_4' ).value );
    axios.post( '/api/setPredefinido/4' , datos , header )
         .then( response => {
            aviso( 'Valor actualizado correctamente' );
          })
         .catch( err => {
            console.log( err );
          });
  });

</script>
