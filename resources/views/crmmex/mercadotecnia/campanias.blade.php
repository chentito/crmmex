<div class="card card-small">
    <div class="card-header"><h6>Nueva Campaña</h6></div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Nombre de campaña" class="form-control form-control-sm">
            </div>
            <div class="col-sm-4 mb-1">
                <select class="custom-select custom-select-sm">
                    <option>Tipo de campaña</option>
                    <option>Envio Email</option>
                </select>
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Fecha de Envío" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="URL (Landing Page)" class="form-control form-control-sm">
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Nombre de quien envía" class="form-control form-control-sm">
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Correo de quien envia" class="form-control form-control-sm">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Asunto" class="form-control form-control-sm">
            </div>
            <div class="col-sm-4 mb-1">
                <select class="custom-select custom-select-sm">
                    <option>Receptores</option>
                    <option>Clientes Facturación</option>
                </select>
            </div>
            <div class="col-sm-4 mb-1">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Seleccionar archivo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="editorN"></div>
                <script>var editor = new Jodit('#editorN');</script>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 mt-2"></div>
            <div class="col-sm-4 mt-2"> 
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Activar seguimiento de apertura ?</span>
                    </div>
                    <input class="form-control form-control-sm" type="checkbox">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <button onclick="contenidos( 'mercadotecnia_listado' )" class="mt-1 btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
    </div>
    <div class="col-sm-4 text-center">
        <button onclick="contenidos( 'mercadotecnia_listado' )" class="mt-1 btn btn-sm {{$btn}}"><i class="fa fa-sm fa-save"></i> Guardar</button>
    </div>
    <div class="col-sm-4"></div>
</div>
