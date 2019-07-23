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
      <div id="listadoIndicadores_config"></div>
      <table id="listadoIndicadores" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
    </div>
  </div>
  <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="nuevoIndicador_Form" name="nuevoIndicador_Form">
        <div class="row mt-2">
            <div class="col-sm-6">
              <label for="nuevoIndicdor_nombre">Nombre del indicador:</label>
              <input type="text" id="nuevoIndicdor_nombre" name="nuevoIndicdor_nombre" placeholder="Nombre indicador" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row mt-2">
          <div class="col-sm-3">
              <label for="nuevoIndicador_fases">Fases:</label>
              <select class="custom-select custom-select-sm" id="nuevoIndicador_fases" name="nuevoIndicador_fases" multiple style="height:250px"></select>
          </div>
          <div class="col-sm-3">
              <label for="nuevoIndicador_listadoSecundario">Detalle de la fase:</label>
              <select class="custom-select custom-select-sm" id="nuevoIndicador_detalleFase" name="nuevoIndicador_detalleFase" multiple style="height:250px"></select>
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
                    <input type="number" id="detalleFase_peso" name="detalleFase_peso" placeholder="Peso" class="form-control form-control-sm" value="1">
                  </div>
                  <div class="col-sm-3 text-center">
                      <button type="button" name="agregaDetalle" id="agregaDetalle" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar</button>
                  </div>
                  <div class="col-sm-12 mt-2">
                      <label for="procesoSistemaADetalleFase">Al ejecutar el proceso:</label>
                      <select class="custom-select custom-select-sm" name="procesoSistemaADetalleFase" id="procesoSistemaADetalleFase"></select>
                  </div>
              </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-sm-12">
            <label for="grupoProductosPerteneceIndicador">Grupo de productos al que pertenece el indicador:</label>
            <select class="custom-select custom-select-sm" id="grupoProductosPerteneceIndicador" name="grupoProductosPerteneceIndicador"></select>
          </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12 text-center">
                <button type="button" name="btnAgregaIndicador" id="btnAgregaIndicador" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar indicador</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  generaDataGrid( 'listadoIndicadores' );
  procesosSistema();
  grupoPorductos();

  var fases    = new Array();
  sessionStorage.setItem( 'fases'    , JSON.stringify( fases ) );
  var detalles = [];
  sessionStorage.setItem( 'detalles' , JSON.stringify( detalles ) );

  document.getElementById( 'btnAgregaIndicador' ).addEventListener( 'click' , function(){
      var datos = new FormData( document.getElementById( 'nuevoIndicador_Form' ) );
      datos.append( 'fases'    , sessionStorage.getItem( 'fases' ) );
      datos.append( 'detalles' , sessionStorage.getItem( 'detalles' ) );

      if( document.getElementById( 'nuevoIndicdor_nombre' ).value == '' ) {
          aviso( 'No ha proporcionado un nombre para el indicador' , false );
      } else {
          axios.post( '/api/guardaIndicador' , datos , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer '+ sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                aviso( 'Indicador agregado correctamente' );
                contenidos( 'configuraciones_pipeline' );
             })
             .catch( err => {
               console.log( err );
             });
      }
  });

  document.getElementById( 'nuevoIndicador_fases' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      if( this.value != "" ) {
        llenaDetalleFase( this.value );
      }
  });

  document.getElementById( 'agregaFase' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var fase = document.getElementById( 'nombreFase' ).value;
      if( fase == '' ) {
          aviso( 'El nombre de la fase está vacio' , false );
      } else {
          document.getElementById( 'nuevoIndicador_fases' ).add( new Option( fase , fase , false , false ) );
          document.getElementById( 'nombreFase' ).value = '';
          guardaArraySesion( 'fases' , fase );
      }
  });

  document.getElementById( 'agregaDetalle' ).addEventListener( 'click' , function( e ) {
      var fase    = document.getElementById( 'nuevoIndicador_fases' ).value;
      var detalle = document.getElementById( 'detalleFase' ).value;
      var peso    = document.getElementById( 'detalleFase_peso' ).value;
      var proceso = document.getElementById( 'procesoSistemaADetalleFase' ).value;

      if( fase == "" ) {
            aviso( 'No ha seleccionado una fase' ,  false );
        } else if( detalle == "" ) {
            aviso( 'No ha asignado el nombre del detalle' ,  false );
        } else {
            document.getElementById( 'nuevoIndicador_detalleFase' ).add( new Option( detalle + ' (' + peso + ' %)' , detalle , false , false ) );
            var nuevo = {fase:fase, detalle:detalle, peso:peso, proceso:proceso};
            guardaArraySesion( 'detalles' , nuevo );

            document.getElementById( 'detalleFase_peso' ).value = '1';
            document.getElementById( 'detalleFase' ).value = '';
      }
  });

  function llenaDetalleFase( valor ) {
      document.getElementById( 'nuevoIndicador_detalleFase' ).innerHTML = '';
      var detalles = JSON.parse( sessionStorage.getItem( 'detalles' ) );
      detalles.forEach( function( e , i ){
          if( e.valor.fase == valor ) {
            document.getElementById( 'nuevoIndicador_detalleFase' ).add( new Option( e.valor.detalle + ' (' + e.valor.peso + ' %)', e.valor.detalle , false , false ) );
          }
      });
  }

  function guardaArraySesion( sesion , valor ) {
      var arreglo = JSON.parse( sessionStorage.getItem( sesion ) );
      arreglo.push( {valor} );
      sessionStorage.setItem( sesion , JSON.stringify( arreglo ) );
  }

  function grupoPorductos() {
      axios.get( '/api/obtieneListadoProductos/12' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              response.data.forEach( function( e , i ){
                  document.getElementById( 'grupoProductosPerteneceIndicador' ).add( new Option( e.nombre , e.id , false , false ) );
              });
           })
           .catch( err => {
             console.log( err );
           });
  }

  function procesosSistema() {
      axios.get( '/api/obtieneProcesosSistema' , { headers:{ 'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' ) } } )
         .then( response => {
            response.data.forEach( function( e , i ) {
                document.getElementById( 'procesoSistemaADetalleFase' ).add( new Option( e.nombreProceso , e.id , false , false ) );
            })
         })
         .catch( err => {
            console.log( err );
         });

  }

</script>
