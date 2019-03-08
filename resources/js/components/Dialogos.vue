
<template>
    <div class="modal fade" id="pipelineAgregaIndicador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Indicador</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm">Nombre Indicador</div>
                        <div class="col-sm">Peso</div>
                    </div>
                    <div class="row">
                        <div class="col-sm"><input type="text" class="form-control form-control-sm"></div>
                        <div class="col-sm"><input type="number" class="form-control form-control-sm"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-sm btn-primary" id="conf_forecast_btn_addPeriodo">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        }
    }
</script>