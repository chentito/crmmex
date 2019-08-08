<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto" aria-labelledby="navbarDropdown">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-user-tie"></i> Usuarios</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                    <li><a class="dropdown-item"  href="javascript:void(0)" onclick="return contenidos('ejecutivos_listado');">Listado</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-users"></i>  Prospectos</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo' );">Alta</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Listado</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-users"></i>  Clientes</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('clientes_alta');">Alta</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('clientes_listado');">Listado</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-lightbulb"></i>  Mercadotecnia</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('mercadotecnia_listado');">Campañas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-chart-pie"></i>  Reportes</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('reportes_pipeline');">Pipeline</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('reportes_resumen');">Ventas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-cogs"></i>  Configuraciones</a>
                <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prospectos</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','2');"> > Campos Adicionales</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','1');"> > Campos Adicionales</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_productos');"> > Productos/Servicios</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','3');"> > Campos Adicionales</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_promociones');"> > Alta de Promociones</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Propuestas</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_propuestas','1');"> > Envio de propuestas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown"><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_pronosticos','1');">Pronosticos</a></li>
                    <li class="dropdown-item dropdown"><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_pipeline','1');">Pipeline</a></li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('ejecutivos_roles');"> > Perfiles</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mercadotecnia</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_destinatarios');"> > Templates</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_multimedia');"> > Multimedia</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_listaEnvios');"> > Listas</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_formularios');"> > Formularios</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_generales');"> > Catálogos Generales</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sistema</a>
                        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_smtp');"> > SMTP</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_branding');"> > Branding</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_dashboard');"> > Dashboard</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<input type="hidden" id="log_perfilID" name="log_perfilID" value="{{ Auth::user()->rol }}">

<style>
    .navbar .dropdown-toggle, .navbar .dropdown-menu a {
      cursor: pointer;
    }

    .navbar .dropdown-item.active, .navbar .dropdown-item:active {
      color: inherit;
      text-decoration: none;
      background-color: inherit;
    }

    .navbar .dropdown-item:focus, .navbar .dropdown-item:hover {
      color: #16181b;
      text-decoration: none;
      background-color: #f8f9fa;
    }

    .navBarFont{
      font-size: 12px;
      color: #ffffff;
    }

    @media (min-width: 767px) {
      .navbar .dropdown-toggle:not(.nav-link)::after {
          display: inline-block;
          width: 0;
          height: 0;
          margin-left: .5em;
          vertical-align: 0;
          border-bottom: .3em solid transparent;
          border-top: .3em solid transparent;
          border-left: .3em solid;
      }
    }
</style>
