<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Detalle Campa&ntilde;a</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container border-left border-bottom border-right p-1">
      <div class="row">
          <div class="col-sm-4 mb-1">
              <input type="hidden" id="detalleCampania_id" name="detalleCampania_id" value="">
              <label for="detalleCampania_nombre">Nombre de la campa&ntilde;a</label>
              <input id="detalleCampania_nombre" name="detalleCampania_nombre" type="text" placeholder="Nombre de campaña" class="form-control form-control-sm" value="">
          </div>
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_tipo">Tipo de Campa&ntilde;a</label>
              <select id="detalleCampania_tipo" name="detalleCampania_tipo" class="custom-select custom-select-sm">
                  <option selected="selected">Envio Email</option>
              </select>
          </div>
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_fechaEnvio">Fecha de env&iacute;o</label>
              <input id="detalleCampania_fechaEnvio" name="detalleCampania_fechaEnvio" type="text" placeholder="Fecha de Envío" class="form-control form-control-sm" value="">
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_landingPage">Landing Page</label>
              <input id="detalleCampania_landingPage" name="detalleCampania_landingPage" type="text" placeholder="URL (Landing Page)" class="form-control form-control-sm" value="">
          </div>
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_remitente">Nombre Remitente</label>
              <input id="detalleCampania_remitente" name="detalleCampania_remitente" type="text" placeholder="Nombre de quien envía" class="form-control form-control-sm" value="">
          </div>
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_remitenteEmail">Email Remitente</label>
              <input id="detalleCampania_remitenteEmail" name="detalleCampania_remitenteEmail" type="text" placeholder="Correo de quien envia" class="form-control form-control-sm" value="">
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_asunto">Asunto</label>
              <input id="detalleCampania_asunto" name="detalleCampania_asunto" type="text" placeholder="Asunto" class="form-control form-control-sm" value="">
          </div>
          <div class="col-sm-4 mb-1">
              <label for="detalleCampania_destinatarios">Destinatarios</label>
              <select id="detalleCampania_destinatarios" name="detalleCampania_destinatarios" class="custom-select custom-select-sm">
                  <option selected="selected">Clientes Facturación</option>
              </select>
          </div>
          <div class="col-sm-4 mb-1"></div>
      </div>
      <div class="row text-center">
          <div class="col-sm-12 mb-1">
            <label>Pieza de correo</label>
            <div id="editorN"></div>
            <script>var editor = new Jodit('#editorN');</script>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="row pt-2">
  <div class="col-sm-12 mb-2 text-center">
    <button onclick="contenidos( 'mercadotecnia_listado' )" class="btn btn-sm {{$btn}}"><i class="fa fa-sm fa-undo"></i> Regresar</button>
  </div>
</div>
