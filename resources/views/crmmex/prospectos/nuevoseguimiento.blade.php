<div class="row">
    <div class="col-sm-3">
        <label for="prospectos_nuevoseguimiento_titulo">Título</label>
        <input class="form-control form-control-sm" id="prospectos_nuevoseguimiento_titulo">
    </div>
    <div class="col-sm-3">
        <label for="prospectos_nuevoseguimiento_fecha">Fecha Ejecución</label>
        <input class="form-control form-control-sm" id="prospectos_nuevoseguimiento_fecha">
    </div>
    <div class="col-sm-3">
        <label for="prospectos_nuevoseguimiento_tipo">Tipo</label>
        <select class="custom-select custom-select-sm" id="prospectos_nuevoseguimiento_tipo">
            <option>Llamada telefónica</option>
            <option>Correo electrónico</option>
            <option>Reunión</option>
            <option>Conferencia</option>
            <option>Envío de propuesta</option>
            <option>Envío de prefactura</option>
            <option>Envío de factura</option>
            <option>Soporte</option>
            <option>Otro</option>
        </select>
    </div>
    <div class="col-sm-3">
        <label for="prospectos_nuevoseguimiento_estado">Estado</label>
        <select class="custom-select custom-select-sm" id="prospectos_nuevoseguimiento_estado">
            <option>Abierto</option>
            <option>En proceso</option>
            <option>Detenido</option>
            <option>Detenido por el cliente</option>
            <option>Cerrado</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 mb-2">
        <label for="prospectos_nuevoseguimiento_involucrados">Involucrados</label>
        <select id="prospectos_nuevoseguimiento_involucrados" class="custom-select custom-select-sm" multiple="multiple">
            <option>correocontacto@empresa.com</option>
            <option>otrocorreo@empresa.com</option>
            <option>contactodos@empresa.com</option>
        </select>
    </div>
    <div class="col-sm-6 mb-2">
        <label for="prospectos_nuevoseguimiento_texto">Texto</label>
        <textarea id="prospectos_nuevoseguimiento_texto" class="form-control form-control-sm" cols="3"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 text-center">
        <button class="btn btn-sm {{$btn}}">Guardar Seguimiento</button>
    </div>
</div>