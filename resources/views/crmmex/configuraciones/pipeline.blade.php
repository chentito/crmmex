<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="nuevo-tab" data-toggle="tab" href="#nuevo" role="tab" aria-controls="nuevo" aria-selected="false">
      <i class="fa fa-plus fa-sm"></i><span class="d-none d-sm-inline">  Nuevo Indicador</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      <i class="fa fa-ruler fa-sm"></i><span class="d-none d-sm-inline">  Indicadores</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="procesos-tab" data-toggle="tab" href="#procesos" role="tab" aria-controls="procesos" aria-selected="false">
      <i class="fa fa-project-diagram fa-sm"></i><span class="d-none d-sm-inline">  Procesos Sistema</span>
    </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div id="listadoIndicadores_config"></div>
      <table id="listadoIndicadores" class="table table-striped table-bordered display responsive nowrap" style="width:100%"></table>
    </div>
  </div>
  <div class="tab-pane fade" id="procesos" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="formDescripcionProcesosSistema" name="formDescripcionProcesosSistema">
          <ul class="list-group list-group-flush" id="contenedorProcesosSistema"></ul>
          <div class="row mt-3 mb-2">
              <div class="col-sm-12 text-center">
                  <button type="button" name="descripcionProcesosSistema_btnGuarda" id="descripcionProcesosSistema_btnGuarda" class="btn btn-sm {{$btn}}">
                    <i class="fa fa-sm fa-save"></i> Guardar descripcion
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>
  <div class="tab-pane show active" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
    <div class="container border-left border-bottom border-right p-1">
      <form id="nuevoIndicador_Form" name="nuevoIndicador_Form">
        <div class="row mt-2">
            <div class="col-sm-6">
              <label for="nuevoIndicdor_nombre">Nombre del indicador:</label>
              <input type="text" id="nuevoIndicdor_nombre" name="nuevoIndicdor_nombre" placeholder="Nombre indicador" class="form-control form-control-sm">
            </div>
            <div class="col-sm-6">
              <label for="grupoProductosPerteneceIndicador">Grupo de productos al que pertenece el indicador:</label>
              <select class="custom-select custom-select-sm" id="grupoProductosPerteneceIndicador" name="grupoProductosPerteneceIndicador"></select>
            </div>
        </div>
        <div class="row mt-2">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                <label for="nuevoIndicador_fases">Fases:</label>
                <select class="custom-select custom-select-sm" id="nuevoIndicador_fases" name="nuevoIndicador_fases" multiple style="height:150px"></select>
              </div>
              <div class="col-sm-9 mt-2">
                  <label for="nombreFase">Nombre de la fase</label>
                  <input type="text" id="nombreFase" name="nombreFase" placeholder="Nombre Fase" class="form-control form-control-sm">
              </div>
              <div class="col-sm-3 mt-3">
                <div class="row">
                  <div class="col-sm-12 text-center">
                      <button type="button" name="agregaFase" id="agregaFase" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar</button>
                  </div>
                  <div class="col-sm-12 text-center" style="display: none; float: right" id="contenedorEdicionFase">
                    <button type="button" name="actualizaFase" id="actualizaFase" class="btn btn-sm btn-info mt-1"><i class="fa fa-sm fa-edit"></i></button>
                    <button type="button" name="eliminaFase" id="eliminaFase" class="btn btn-sm btn-danger mt-1"><i class="fa fa-sm fa-trash"></i></button>
                    <input type="hidden" name="nombreFaseOriginal" id="nombreFaseOriginal" value="">
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-12">
                  <label for="nuevoIndicador_listadoSecundario">Detalle de la fase:</label>
                  <select class="custom-select custom-select-sm" id="nuevoIndicador_detalleFase" name="nuevoIndicador_detalleFase" multiple style="height:150px"></select>
              </div>
              <div class="col-sm-6 mt-2">
                <label for="detalleFase">Detalle Fase:</label>
                <input type="text" id="detalleFase" name="detalleFase" placeholder="Detalle Fase" class="form-control form-control-sm">
              </div>
              <div class="col-sm-3 mt-2 text-center">
                <label for="detalleFase">Peso:</label>
                <input type="number" id="detalleFase_peso" name="detalleFase_peso" placeholder="Peso" class="form-control form-control-sm" value="1">
              </div>
              <div class="col-sm-3 mt-3 text-center">
                  <button type="button" name="agregaDetalle" id="agregaDetalle" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-plus"></i> Agregar</button>
              </div>
              <div class="col-sm-12 mt-2">
                  <label for="procesoSistemaADetalleFase">Al ejecutar el proceso:</label>
                  <select class="custom-select custom-select-sm" name="procesoSistemaADetalleFase" id="procesoSistemaADetalleFase"></select>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <div class="row mb-1">
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

  var fases    = [];
  sessionStorage.setItem( 'fases'    , JSON.stringify( fases ) );
  var detalles = [];
  sessionStorage.setItem( 'detalles' , JSON.stringify( detalles ) );

  document.getElementById( 'actualizaFase' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var nuevo = document.getElementById( 'nombreFase' ).value;
      var original = document.getElementById( 'nombreFaseOriginal' ).value;

      if( nuevo == original ) {
          aviso( 'La fase no ha sido actualizada' , false );
      } else {
        actualizaArraySesion( original , nuevo );
        recargaComboFases();
      }

      document.getElementById( 'nombreFase' ).value                     = '';
      document.getElementById( 'contenedorEdicionFase' ).style.display  = 'none';
      document.getElementById( 'nuevoIndicador_detalleFase' ).innerHTML = '';
      document.getElementById( 'agregaFase' ).disabled                  = false;
  });

  document.getElementById( 'eliminaFase' ).addEventListener( 'click' , function( e ) {
      e.preventDefault();
      var fase = document.getElementById( 'nombreFase' ).value;
      eliminaArraySesion( 'fases' ,  fase );
      recargaComboFases();
      document.getElementById( 'nombreFase' ).value                     = '';
      document.getElementById( 'contenedorEdicionFase' ).style.display  = 'none';
      document.getElementById( 'nuevoIndicador_detalleFase' ).innerHTML = '';
      document.getElementById( 'agregaFase' ).disabled                  = false;
  });

  document.getElementById( 'descripcionProcesosSistema_btnGuarda' ).addEventListener( 'click' , function( e ){
      e.preventDefault();
      var datos = new FormData( document.getElementById( 'formDescripcionProcesosSistema' ) );
      axios.post( '/api/actualizaDescripcionProcesos' , datos , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer '+ sessionStorage.getItem( 'apiToken' ) } } )
           .then( response => {
              aviso( 'Descripciones actualizadas correctamente.' );
           })
           .catch( err => {
              console.log( err );
           });
  });

  document.getElementById( 'btnAgregaIndicador' ).addEventListener( 'click' , function() {
      var datos = new FormData( document.getElementById( 'nuevoIndicador_Form' ) );
      datos.append( 'fases'    , sessionStorage.getItem( 'fases' ) );
      datos.append( 'detalles' , sessionStorage.getItem( 'detalles' ) );
      if( document.getElementById( 'indicadorID' ) != null ) {
        datos.append( 'indicadorID' , document.getElementById( 'indicadorID' ).value );
      }

      if( document.getElementById( 'nuevoIndicdor_nombre' ).value == '' ) {
          aviso( 'No ha proporcionado un nombre para el indicador' , false );
      } else {
          var movimiento = ( document.getElementById( 'indicadorID' ) != null ) ? 'actualizaIndicador' : 'guardaIndicador';
          var textoMov   = ( document.getElementById( 'indicadorID' ) != null ) ? 'actualizado' : 'agregado';

          axios.post( '/api/'+movimiento , datos , { headers:{ 'Accept' : 'application\json' , 'Authorization' : 'Bearer '+ sessionStorage.getItem( 'apiToken' ) } } )
             .then( response => {
                aviso( 'Indicador ' + textoMov + ' correctamente' );
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
        document.getElementById( 'nombreFase' ).value = this.value;
        document.getElementById( 'nombreFaseOriginal' ).value = this.value;
        document.getElementById( "contenedorEdicionFase" ).style.display = "table";
        document.getElementById( 'agregaFase' ).disabled                  = true;
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
          var nueva = { fase:fase , idty:'0' };
          guardaArraySesion( 'fases' , nueva );
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
            var nuevo = {fase:fase, detalle:detalle, peso:peso, proceso:proceso , idty: '0'};
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

  function actualizaArraySesion( valorOriginal, valorNuevo ) {
      var fases    = JSON.parse( sessionStorage.getItem( 'fases' ) );
      var detalles = JSON.parse( sessionStorage.getItem( 'detalles' ) );

      fases.forEach( function ( elemento ) {
          elemento.valor.fase = ( elemento.valor.fase == valorOriginal ) ? valorNuevo : elemento.valor.fase
      });

      detalles.forEach( function ( elemento ) {
          elemento.valor.fase = ( elemento.valor.fase == valorOriginal ) ? valorNuevo : elemento.valor.fase
      });

      sessionStorage.setItem( 'fases'    , JSON.stringify( fases ) );
      sessionStorage.setItem( 'detalles' , JSON.stringify( detalles ) );
  }

  function eliminaArraySesion( sesion , valor ) {
      var arreglo = JSON.parse( sessionStorage.getItem( sesion ) );
      arreglo     = arreglo.filter( elemento => elemento.valor.fase != valor );
      sessionStorage.setItem( sesion , JSON.stringify( arreglo ) );

      if( sesion == 'fases' ) {
        var detalles = JSON.parse( sessionStorage.getItem( 'detalles' ) );
        detalles     = detalles.filter( elemento => elemento.valor.fase != valor );
        sessionStorage.setItem( 'detalles' , JSON.stringify( detalles ) );
      }
  }

  function grupoPorductos() {
      axios.get( '/api/obtieneListadoProductos/12' , {headers:{'Accept':'application\json','Authorization':'Bearer '+sessionStorage.getItem( 'apiToken' )}} )
           .then( response => {
              document.getElementById( 'grupoProductosPerteneceIndicador' ).add( new Option( 'Todos' , '0' , false , false ) );
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
                var html  = '<li class="list-group-item">'+e.nombreProceso+':<div class="float-right">'
                    html += '<textarea id="descripcion_proceso_'+e.id+'" name="descripcion_proceso_'+e.id+'" class="form-control form-control-sm" cols="120" rows="1" >'
                    html += e.descripcionProceso+'</textarea></div></li>';
                $( '#contenedorProcesosSistema' ).append( html );
            });
         })
         .catch( err => {
            console.log( err );
         });
  }

  function recargaComboFases() {
      document.getElementById( 'nuevoIndicador_fases' ).innerHTML = '';
      var arreglo = JSON.parse( sessionStorage.getItem( 'fases' ) );

      arreglo.forEach( function( e , i ){
          document.getElementById( 'nuevoIndicador_fases' ).add( new Option( e.valor.fase, e.valor.fase , false , false ) );
      });
  }

</script>
