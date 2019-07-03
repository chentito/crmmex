<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nueva Promoción</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Listado Promociones</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <form id="formPromociones" name="formPromociones">
        <input type="hidden" id="promociones_id" name="promociones_id" value="">
        <div class="container border-left border-bottom border-right p-1">
          <div class="row">
            <div class="col-sm-4">
                <label for="promociones_nombre">Nombre promoción:</label>
                <input type="text" class="form-control form-control-sm" value="" id="promociones_nombre" name="promociones_nombre">
            </div>
            <div class="col-sm-4">
                <label for="promociones_tipo">Tipo promoción:</label>
                <select class="custom-select custom-select-sm" value="" id="promociones_tipo" name="promociones_tipo">
                    <option value="1">Porcentaje</option>
                    <option value="2">Cantidad</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="promociones_cantidad">Porcentaje/Monto:</label>
                <input type="number" class="form-control form-control-sm" value="" id="promociones_cantidad" name="promociones_cantidad">
            </div>
            <div class="col-sm-4">
                <label for="promociones_cantidad">Inicio Vigencia:</label>
                <input type="text" class="form-control form-control-sm" value="" id="promociones_inicioVigencia" name="promociones_inicioVigencia" readonly>
            </div>
            <div class="col-sm-4">
                <label for="promociones_cantidad">Fin Vigencia:</label>
                <input type="text" class="form-control form-control-sm" value="" id="promociones_finVigencia" name="promociones_finVigencia" readonly>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-12 mt-3 text-center">
                  <button class="btn btn-sm {{$btn}}" id="btnPromocionesGuardar"><i class="fa fa-save fa-sm"></i>  Guardar</button>
              </div>
          </div>
        </div>
    </form>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div id="listadoPromociones_config"></div>
      <table id="listadoPromociones" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
    </div>
  </div>
</div>

<script>
    document.getElementById( 'btnPromocionesGuardar' ).addEventListener( 'click' , function( e ){
        e.preventDefault();
        var datos = new FormData( document.getElementById( 'formPromociones' ) );

        if( document.getElementById( 'editaPromoID' ) === null ) {
            var url = '/api/guardaPromocion';
            var msj = 'Promocion guardada correctamente';
          } else {
            var url = '/api/actualizaPromocion';
            var msj = 'Promocion actualizada correctamente';
        }

        axios.post( url , datos , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
             .then( response => {
                contenidos( 'configuraciones_promociones' );
                aviso( msj );
             })
             .catch( err => {
               console.log( err );
             });
    });

    $( '#promociones_inicioVigencia,#promociones_finVigencia' ).datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        todayBtn: "linked",
        clearBtn: true,
        startDate: "today",
        daysOfWeekDisabled: "0,6",
        daysOfWeekHighlighted: "0,6"
    });
    generaDataGrid( 'listadoPromociones' );
</script>
