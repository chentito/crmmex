
<div class="card card-small mb-3">
    <div class="card-body">
      <div id="listadoEjecutivos_config"></div>
      <table id="listadoEjecutivos" class="table table-striped responsive nowrap" style="width:100%">
      </table>
    </div>
</div>

<div class="row">
  <div class="col-sm-12 text-center">
    <button class="btn btn-sm {{$btn}}" id="altaEjecutivoBtn">Agregar Ejecutivo</button>
  </div>
</div>

<script>
    $(document).ready( function() {

        generaDataGrid( 'listadoEjecutivos' );
        $( '#altaEjecutivoBtn' ).click( function( e ){
          e.preventDefault();
          contenidos( 'ejecutivos_alta' );
        });
    });
</script>
