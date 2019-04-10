
<div class="row" id="contenedorCatalogosConfig">
</div>

<div class="modal fade" id="modalAltaCatalogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_alta_opcion_catalogo" name="frm_alta_opcion_catalogo">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Opción a agregar:</label>
                    <input type="text" class="form-control" id="nombre_opcion_categoria">
                    <input type="hidden" class="form-control" id="id_categoria">
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="btnGuardaOpcionCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEliminaOpcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Opción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_alta_opcion_catalogo" name="frm_alta_opcion_catalogo">
                    <input type="hidden" class="form-control" id="idOpcion">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="btnEliminaOpcionCategoria">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    cargaCatalogosAdmin();
    configuracionesGenerales();
</script>
