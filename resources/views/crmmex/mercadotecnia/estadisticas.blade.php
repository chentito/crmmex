<input type="hidden" name="campaniaID" id="campaniaID" value="{{$param}}">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-sm fa-paper-plane"></i>
      <span class="d-none d-sm-inline">  Envios</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
      <i class="fa fa-sm fa-th-list"></i>
      <span class="d-none d-sm-inline">  Formulario</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="{{$container}} border-left border-right border-bottom">
      <div class="row">
        <div class="col-sm-12 p-2">
          <table style="width:100%" class="table table-striped responsive">
            <thead>
              <tr>
                <th>Email</th>
                <th>ID</th>
                <th>Fecha Visualización</th>
              </tr>
            </thead>
            <tbody id="trackingDestinatariosContainer"></tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="{{$container}} border-left border-right border-bottom ">
      <div class="row">
        <div class="col-sm-12 p-2">
          <table style="width:100%" class="table table-striped responsive">
            <thead>
              <tr>
                <th>Email</th>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Respuesta</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody id="formRespuestasDestinatariosContainer"></tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12 text-center mb-6"><button onclick="contenidos( 'mercadotecnia_listado' )" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button></div>
</div>

<script>
  var campaniaID = document.getElementById( 'campaniaID' ).value;
  axios.get( '/api/listadoDestinatarios/' + campaniaID , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      var container = document.getElementById( 'trackingDestinatariosContainer' );
      response.data.forEach( function( e , i ) {
        var row   = container.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        cell1.innerHTML = e.email;
        cell2.innerHTML = e.idty;
        cell3.innerHTML = e.click;
      });
    })
    .catch( err => {
      console.log( err );
    });

  axios.get( '/api/respuestasForm/' + campaniaID , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer ' + sessionStorage.getItem( 'apiToken' ) } } )
    .then( response => {
      var container = document.getElementById( 'formRespuestasDestinatariosContainer' );
      response.data.forEach( function( e , i ){
        var row   = container.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = e.email;
        cell2.innerHTML = e.contactoID;
        cell3.innerHTML = e.pregunta;
        cell4.innerHTML = e.respuesta;
        cell5.innerHTML = e.fecha;
      });
    })
    .catch( err => {
      console.log( err );
    });
</script>
