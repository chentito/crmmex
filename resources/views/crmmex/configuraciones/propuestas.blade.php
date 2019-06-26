<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nombre Propuesta</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Template Envio</a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li-->
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container border-left border-right border-bottom p-1">
          <div class="row mt-3">
              <div class="col-sm-12">
                  Nomenclatura a utilizar para el identificador de las propuestas:
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-sm-12 text-center">
                  <table width="100%">
                      <tr>
                          <td>
                            <input class="form-control form-control-sm" type="text" id="nomenclatura_prefijo" name="nomenclatura_prefijo" max="15" value="PROPUESTA" placeholder="Prefijo para el nombre de la propuesta">
                          </td>
                          <td>_</td>
                          <td>
                            <select class="custom-select custom-select-sm" id="nomenclatura_identificador" name="nomenclatura_identificador">
                                <option value="1">Iniciales ejecutivo comercial</option>
                                <option value="2">Fecha de creación</option>
                                <option value="3">Categoría de la propuesta</option>
                            </select>
                          </td>
                          <td>_</td>
                          <td>
                            <select class="custom-select custom-select-sm" id="nomenclatura_identificador" name="nomenclatura_identificador">
                                <option value="1">Autoincremento</option>
                            </select>
                          </td>
                          <td>.pdf</td>
                      </tr>
                  </table>
              </div>
          </div>
          <div class="row mt-3">
              <div class="col-sm-12 text-center">
                  <button class="btn btn-sm {{$btn}}"><i class="fa fa-save fa-sm"></i> Guardar</button>
              </div>
          </div>
      </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="container border-left border-right border-bottom p-1">
          template envio
      </div>
  </div>
  <!--div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div-->
</div>
