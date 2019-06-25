<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
      Widgets
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
          <i class="fa fa-list fa-sm"></i><span class="d-none d-sm-inline">  Reportes y Tipos</span>
      </a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="container border-left border-right border-bottom p-1">
        <div class="row">
        </div>
      </div>
  </div>
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container border-left border-right border-bottom p-1">
            <div class="row ml-1 mr-1">
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Reporte de ventas</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>

                </div>
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Ventas por ejecutivo</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>
                </div>
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Propuestas generadas</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>
                </div>
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Ventas por producto/Servicio</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>
                </div>
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Altas</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>
                </div>
                <div class="col-sm-3 pl-1 pt-1 text-center border">
                    <h6>Reporte de ventas</h6>
                    <p>Podrá ver el estadístico de ventas contra el objetivo de cada mes de los últimos meses</p>
                </div>
            </div>

      </div>

  </div>
</div>

<script>

  opcionesReporte( 'template1_psi' );
  opcionesReporte( 'template1_psc' );
  opcionesReporte( 'template1_psd' );
  opcionesReporte( 'template1_pic' );
  opcionesGrafica( 'g_template1_psi' );
  opcionesGrafica( 'g_template1_psc' );
  opcionesGrafica( 'g_template1_psd' );
  opcionesGrafica( 'g_template1_pic' );

  opcionesReporte( 'template2_psi' );
  opcionesReporte( 'template2_psci' );
  opcionesReporte( 'template2_pscd' );
  opcionesReporte( 'template2_psd' );
  opcionesReporte( 'template2_pii' );
  opcionesReporte( 'template2_pid' );
  opcionesGrafica( 'g_template2_psi' );
  opcionesGrafica( 'g_template2_psci' );
  opcionesGrafica( 'g_template2_pscd' );
  opcionesGrafica( 'g_template2_psd' );
  opcionesGrafica( 'g_template2_pii' );
  opcionesGrafica( 'g_template2_pid' );

  opcionesReporte( 'template3_psi' );
  opcionesReporte( 'template3_psd' );
  opcionesReporte( 'template3_pii' );
  opcionesReporte( 'template3_pid' );
  opcionesGrafica( 'g_template3_psi' );
  opcionesGrafica( 'g_template3_psd' );
  opcionesGrafica( 'g_template3_pii' );
  opcionesGrafica( 'g_template3_pid' );

  function opcionesReporte( contenedor ) {
    html  = '<select class="custom-select custom-select-sm">';
    html += '<option value="1">Reporte predefinido 1</option>';
    html += '<option value="2">Reporte predefinido 1</option>';
    html += '<option value="3">Reporte predefinido 1</option>';
    html += '<option value="4">Reporte predefinido 1</option>';
    html += '<option value="5">Reporte predefinido 1</option>';
    html += '<option value="6">Reporte predefinido 1</option>';
    html += '</select>';
    document.getElementById( contenedor ).innerHTML=html;
    return html;
  }

  function opcionesGrafica( contenedor ) {
    html  = '<select class="custom-select custom-select-sm">';
    html += '<option value="1">Grafica Barras</option>';
    html += '<option value="2">Grafica Pie</option>';
    html += '</select>';
    document.getElementById( contenedor ).innerHTML=html;
    return html;
  }

</script>
