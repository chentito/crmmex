<div class="card card-small w-100">
    <div class="card-body">
      <div id="listadoClientes_config"></div>
      <table id="listadoClientes" class="table table-striped table-bordered" style="width:100%">
      </table>
    </div>
</div>

<script>
    $(document).ready( function() {
        generaDataGrid( 'listadoClientes' );
    });
</script>
