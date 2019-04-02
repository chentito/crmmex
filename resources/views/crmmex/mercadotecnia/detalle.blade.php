
<div class="card card-small">
    <div class="card-header"><h6>Detalle Campaña</h6></div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Nombre de campaña" class="form-control form-control-sm" value="Promociones Enero">
            </div>
            <div class="col-sm-4 mb-1">
                <select class="custom-select custom-select-sm">
                    <option>Tipo de campaña</option>
                    <option selected="selected">Envio Email</option>
                </select>
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Fecha de Envío" class="form-control form-control-sm" value="1 de Enero de 2019">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="URL (Landing Page)" class="form-control form-control-sm" value="https://www.url.com/landings/promo_ene">
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Nombre de quien envía" class="form-control form-control-sm" value="Mexagon.net">
            </div>
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Correo de quien envia" class="form-control form-control-sm" value="envios@mexagon.net">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-1">
                <input type="text" placeholder="Asunto" class="form-control form-control-sm" value="Promociones Enero">
            </div>
            <div class="col-sm-4 mb-1">
                <select class="custom-select custom-select-sm">
                    <option>Receptores</option>
                    <option selected="selected">Clientes Facturación</option>
                </select>
            </div>
            <div class="col-sm-4 mb-1">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-1">
                <div id="editorN">Aquí va la pieza de correo....</div>
                <script>var editor = new Jodit('#editorN');</script>
            </div>
        </div>
    </div>
</div>

<div class="row pt-2">
    <div class="col-sm-12 mb-2"><button onclick="contenidos( 'mercadotecnia_listado' )" class="btn btn-sm {{$btn}}">Regresar</button></div>
</div>

