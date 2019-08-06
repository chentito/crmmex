<ul class="list-unstyled components" id="menuNavegacionModulos">
    <li id="moduloMenu_1">
      <a href="#usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-user-tie"></i>  Usuarios</a>
      <ul class="collapse list-unstyled" id="usuarios">
          <li><a href="javascript:void(0)" onclick="return contenidos('ejecutivos_listado');">Listado</a></li>
      </ul>
    </li>
    <li id="moduloMenu_2">
        <a href="#prospectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-users"></i>  Prospectos</a>
        <ul class="collapse list-unstyled" id="prospectos">
            <li><a href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo' );">Alta</a></li>
            <li><a href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Listado</a></li>
        </ul>
    </li>
    <li id="moduloMenu_3">
        <a href="#clientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-users"></i>  Clientes</a>
        <ul class="collapse list-unstyled" id="clientes">
            <li><a href="javascript:void(0)" onclick="return contenidos('clientes_alta');">Alta</a></li>
            <li><a href="javascript:void(0)" onclick="return contenidos('clientes_listado');">Listado</a></li>
        </ul>
    </li>
    <li id="moduloMenu_6">
        <a href="#mercadotecnia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-lightbulb"></i>  Mercadotecnia</a>
        <ul class="collapse list-unstyled" id="mercadotecnia">
            <li><a href="javascript:void(0)" onclick="return contenidos('mercadotecnia_listado');">Campañas</a></li>
        </ul>
    </li>
    <li id="moduloMenu_7">
        <a href="#reportes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-chart-pie"></i>  Reportes</a>
        <ul class="collapse list-unstyled" id="reportes">
            <li><a href="javascript:void(0)" onclick="return contenidos('reportes_pipeline');">Pipeline</a></li>
            <li><a href="javascript:void(0)" onclick="return contenidos('reportes_resumen');">Ventas</a></li>
        </ul>
    </li>
    <li id="moduloMenu_8">
        <a href="#configuraciones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-cogs"></i>  Configuraciones</a>
        <ul class="collapse list-unstyled" id="configuraciones">
            <li>
                <a href="#configuracionesProspectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Prospectos</a>
                <ul class="collapse list-unstyled" id="configuracionesProspectos">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','2');"> > Campos Adicionales</a></li>
                </ul>
            </li>
            <li>
                <a href="#configuracionesClientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
                <ul class="collapse list-unstyled" id="configuracionesClientes">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','1');"> > Campos Adicionales</a></li>
                </ul>
            </li>
            <li>
                <a href="#configuracionesProductos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
                <ul class="collapse list-unstyled" id="configuracionesProductos">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_productos');"> > Productos/Servicios</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','3');"> > Campos Adicionales</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_promociones');"> > Alta de Promociones</a></li>
                </ul>
            </li>
            <li>
              <a href="#configuracionesPropuestas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Propuestas</a>
              <ul class="collapse list-unstyled" id="configuracionesPropuestas">
                  <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_propuestas','1');"> > Envio de propuestas</a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)" onclick="return contenidos('configuraciones_pronosticos','1');">Pronosticos</a>
            </li>
            <li>
              <a href="javascript:void(0)" onclick="return contenidos('configuraciones_pipeline','1');">Pipeline</a>
            </li>
            <li>
                <a href="#configuracionesUsuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
                <ul class="collapse list-unstyled" id="configuracionesUsuarios">
                    <li><a href="javascript:void(0)" onclick="return contenidos('ejecutivos_roles');"> > Perfiles</a></li>
                </ul>
            </li>
            <li>
                <a href="#configuracionesMercadotecnia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mercadotecnia</a>
                <ul class="collapse list-unstyled" id="configuracionesMercadotecnia">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_destinatarios');"> > Templates</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_multimedia');"> > Multimedia</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_listaEnvios');"> > Listas</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_formularios');"> > Formularios</a></li>
                </ul>
            </li>
            <!--li>
                <a href="#configuracionesReportes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reportes</a>
                <ul class="collapse list-unstyled" id="configuracionesReportes">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_disenoReportes');"> > Diseño Reportes</a></li>
                </ul>
            </li-->
            <li>
                <a href="#configuracionesCatalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catálogos</a>
                <ul class="collapse list-unstyled" id="configuracionesCatalogos">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_generales');"> > Catálogos Generales</a></li>

                    <!--li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_adicionales');"> > Campos Adicionales</a></li-->
                </ul>
            </li>
            <li>
                <a href="#configuracionesSistema" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sistema</a>
                <ul class="collapse list-unstyled" id="configuracionesSistema">
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_smtp');"> > SMTP</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_branding');"> > Branding</a></li>
                    <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_dashboard');"> > Dashboard</a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
<input type="hidden" id="log_perfilID" name="log_perfilID" value="{{ Auth::user()->rol }}">
