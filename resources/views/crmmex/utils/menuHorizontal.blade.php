<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto" aria-labelledby="navbarDropdown">
      @if($priv['modulos'][ 1 ] == 1)
      <li id="moduloMenu_1" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-user-tie"></i> Usuarios</a>
        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
          @if( isset( $priv[ 'secciones' ][ 1 ] ) && $priv[ 'secciones' ][ 1 ] == 1 )
          <li><a class="dropdown-item"  href="javascript:void(0)" onclick="return contenidos('ejecutivos_listado');">Administración</a></li>
          @endif
        </ul>
      </li>
      @endif

      @if($priv['modulos'][ 2 ] == 1)
      <li id="moduloMenu_2" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-users"></i>  Prospectos</a>
        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
          @if( isset( $priv[ 'secciones' ][ 5 ] ) && $priv[ 'secciones' ][ 5 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo' );">Alta</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 4 ] ) && $priv[ 'secciones' ][ 4 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Listado</a></li>@endif
        </ul>
      </li>
      @endif

      @if($priv['modulos'][ 3 ] == 1)
      <li id="moduloMenu_3" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-users"></i>  Clientes</a>
        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
          @if( isset( $priv[ 'secciones' ][ 15 ] ) && $priv[ 'secciones' ][ 15 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('clientes_alta');">Alta</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 7 ] ) && $priv[ 'secciones' ][ 7 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('clientes_listado');">Listado</a></li>@endif
        </ul>
      </li>
      @endif

      @if($priv['modulos'][ 6 ] == 1)
      <li id="moduloMenu_6" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-lightbulb"></i>  Mercadotecnia</a>
        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
          @if( isset( $priv[ 'secciones' ][ 23 ] ) && $priv[ 'secciones' ][ 23 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('mercadotecnia_listado');">Campañas</a></li>@endif
        </ul>
      </li>
      @endif

      @if($priv['modulos'][ 8 ] == 1)
      <li id="moduloMenu_8" class="nav-item dropdown">
        <a class="nav-link dropdown-toggle navBarFont" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-cogs"></i>  Configuraciones</a>
        <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 14 ] ) && $priv[ 'secciones' ][ 14 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('ejecutivos_roles');"> > Perfiles</a></li>@endif
            </ul>
          </li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prospectos</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','2');"> > Campos Adicionales</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','4');"> > Campos Adicionales Contactos</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 86 ] ) && $priv[ 'secciones' ][ 86 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_cargaProspectos','2');"> > Carga Información</a></li>@endif
            </ul>
          </li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clientes</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','1');"> > Campos Adicionales</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','4');"> > Campos Adicionales Contactos</a></li>@endif
            </ul>
          </li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mercadotecnia</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 45 ] ) && $priv[ 'secciones' ][ 45 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_destinatarios');"> > Templates</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 64 ] ) && $priv[ 'secciones' ][ 64 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_multimedia');"> > Multimedia</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 79 ] ) && $priv[ 'secciones' ][ 79 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_listaEnvios');"> > Listas</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 80 ] ) && $priv[ 'secciones' ][ 80 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_formularios');"> > Formularios</a></li>@endif
            </ul>
          </li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 18 ] ) && $priv[ 'secciones' ][ 18 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_productos');"> > Productos/Servicios</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','3');"> > Campos Adicionales</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 50 ] ) && $priv[ 'secciones' ][ 50 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_promociones');"> > Alta de Promociones</a></li>@endif
            </ul>
          </li>
          @if( isset( $priv[ 'secciones' ][ 48 ] ) && $priv[ 'secciones' ][ 48 ] == 1 )
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Propuestas</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_propuestas','1');"> > Envio de propuestas</a></li>
            </ul>
          </li>
          @endif
          @if( isset( $priv[ 'secciones' ][ 84 ] ) && $priv[ 'secciones' ][ 84 ] == 1 )
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seguimientos</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_propuestas','1');"> > Configuraciones</a></li>
            </ul>
          </li>
          @endif
          @if( isset( $priv[ 'secciones' ][ 66 ] ) && $priv[ 'secciones' ][ 66 ] == 1 )
            <li class="dropdown-item dropdown"><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_pronosticos','1');">Pronosticos</a></li>
          @endif
          @if( isset( $priv[ 'secciones' ][ 67 ] ) && $priv[ 'secciones' ][ 67 ] == 1 )
            <li class="dropdown-item dropdown"><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_pipeline','1');">Indicadores</a></li>
          @endif
          @if( isset( $priv[ 'secciones' ][ 10 ] ) && $priv[ 'secciones' ][ 10 ] == 1 )
            <li class="dropdown-item dropdown">
              <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos</a>
              <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_generales');"> > Catálogos Generales</a></li>
              </ul>
            </li>
          @endif
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle dropdown-item" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sistema</a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
              @if( isset( $priv[ 'secciones' ][ 13 ] ) && $priv[ 'secciones' ][ 13 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_smtp');"> > SMTP</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 16 ] ) && $priv[ 'secciones' ][ 16 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_branding');"> > Diseño</a></li>@endif
              @if( isset( $priv[ 'secciones' ][ 43 ] ) && $priv[ 'secciones' ][ 43 ] == 1 )<li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('configuraciones_dashboard');"> > Pantalla Principal</a></li>@endif
            </ul>
          </li>
        </ul>
      </li>
      @endif
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
