<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-piggy-bank fa-sm"></i><span class="d-none d-sm-inline">  Cuentas Bancarias</span>
    </a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li-->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-right border-bottom p-1">
      <div id="listadoCuentasBancarias_config"></div>
      <table id="listadoCuentasBancarias" class="table table-striped responsive nowrap" style="width:100%"></table>
      <div class="row">
        <div class="col-sm-12 text-center">
          <button type="button" name="agregaCuentaBancaria" id="agregaCuentaBancaria" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar Cuenta</button>
        </div>
      </div>
    </div>
  </div>
  <!--div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div-->
</div>

<script>
  generaDataGrid( 'listadoCuentasBancarias' );

  document.getElementById( 'agregaCuentaBancaria' ).addEventListener( 'click' , function( e ){
    e.preventDefault();
    contenidos( 'configuraciones_altaCuentaBancaria' );
  });

  function habilitaCuentaBancaria( cuenta ) {
    axios.post( '/api/habilitaCuentaBancaria/' + cuenta, {headers:{'Accept':'application\json','Authorization':'Bearer ' + sessionStorage.getItem( 'apiToken' )}} )
      .then( response => {
        aviso( 'La cuenta se ha habilitado correctamente' );
        contenidos( 'configuraciones_configuracionesAdicionales' );
      })
      .catch( err => {
        console.log( err );
      });
    }
</script>
