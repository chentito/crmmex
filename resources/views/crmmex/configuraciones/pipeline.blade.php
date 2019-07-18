<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-ruler fa-sm"></i><span class="d-none d-sm-inline">  Indicadores</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="nuevo-tab" data-toggle="tab" href="#nuevo" role="tab" aria-controls="nuevo" aria-selected="false">
      <i class="fa fa-plus fa-sm"></i><span class="d-none d-sm-inline">  Nuevo Indicador</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
listado indicadores
    </div>
  </div>
  <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
    <div class="container border-left border-bottom border-right p-1">

        <div class="row mt-2">
            <div class="col-sm-6">
              <label for="nuevoIndicdor_nombre">Nombre del indicador:</label>
              <input type="text" id="nuevoIndicdor_nombre" name="nuevoIndicdor_nombre" placeholder="Nombre indicador" class="form-control form-control-sm">
            </div>
        </div>

        <div class="row mt-2">
          <div class="col-sm-3">
              <label for="nuevoIndicador_fases">Fases del indicador:</label>
              <select class="custom-select custom-select-sm" id="nuevoIndicador_fases" name="nuevoIndicador_fases" multiple style="height:250px">

              </select>
          </div>
          <div class="col-sm-3">
              <label for="nuevoIndicador_listadoSecundario">Detalle fase:</label>
              <select class="custom-select custom-select-sm" id="nuevoIndicador_detalleFase" name="nuevoIndicador_detalleFase" multiple style="height:250px">

              </select>
          </div>

          <div class="col-sm-6">
              <div class="row">
                  <div class="col-sm-9">
                      <label for="nombreFase">Nombre de la fase</label>
                      <input type="text" id="nombreFase" name="nombreFase" placeholder="Nombre Fase" class="form-control form-control-sm">
                  </div>
                  <div class="col-sm-3 text-center">
                      <button type="button" name="agregaFase" id="agregaFase" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar</button>
                  </div>

                  <div class="col-sm-12">
                    <hr>
                  </div>

                  <div class="col-sm-6">
                    <label for="detalleFase">Detalle Fase:</label>
                    <input type="text" id="detalleFase" name="detalleFase" placeholder="Detalle Fase" class="form-control form-control-sm">
                  </div>
                  <div class="col-sm-3 text-center">
                    <label for="detalleFase">Peso:</label>
                    <input type="number" id="detalleFase_peso" name="detalleFase_peso" placeholder="Peso" class="form-control form-control-sm">
                  </div>
                  <div class="col-sm-3 text-center">
                      <button type="button" name="agregaDetalle" id="agregaDetalle" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar</button>
                  </div>


              </div>
          </div>


        </div>

        <div class="row mt-2">
            <div class="col-sm-12 text-center">
                <button type="button" name="btnAgregaIndicador" id="btnAgregaIndicador" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar indicador</button>
            </div>
        </div>

    </div>
  </div>
</div>

<script>

  document.getElementById( 'agregaFase' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var fase = document.getElementById( 'nombreFase' ).value;
      if( fase == '' ) {
          aviso( 'El nombre de la fase está vacio' , false );
      } else {
          document.getElementById( 'nuevoIndicador_fases' ).add( new Option( fase , fase , false , false ) );
          document.getElementById( 'nombreFase' ).value = '';
      }
  });

  document.getElementById( 'agregaDetalle' ).addEventListener( 'click' , function( e ){
      alert("sss");
  });

</script>
