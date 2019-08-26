<ul class="list-unstyled components" id="menuNavegacionModulos">
  @if($priv['modulos'][ 1 ] == 1)
  <li>
    <a href="#usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-user-tie"></i>  Usuarios</a>
    <ul class="collapse list-unstyled" id="usuarios">
      @if( isset( $priv[ 'secciones' ][ 1 ] ) && $priv[ 'secciones' ][ 1 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('ejecutivos_listado');">Administración</a></li>@endif
    </ul>
  </li>
  @endif

  @if($priv['modulos'][ 2 ] == 1)
  <li>
    <a href="#prospectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-users"></i>  Prospectos</a>
    <ul class="collapse list-unstyled" id="prospectos">
      @if( isset( $priv[ 'secciones' ][ 5 ] ) && $priv[ 'secciones' ][ 5 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo' );">Alta</a></li>@endif
      @if( isset( $priv[ 'secciones' ][ 4 ] ) && $priv[ 'secciones' ][ 4 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Listado</a></li>@endif
    </ul>
  </li>
  @endif

  @if($priv['modulos'][ 3 ] == 1)
  <li>
    <a href="#clientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-users"></i>  Clientes</a>
    <ul class="collapse list-unstyled" id="clientes">
      @if( isset( $priv[ 'secciones' ][ 15 ] ) && $priv[ 'secciones' ][ 15 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('clientes_alta');">Alta</a></li>@endif
      @if( isset( $priv[ 'secciones' ][ 7 ] ) && $priv[ 'secciones' ][ 7 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('clientes_listado');">Listado</a></li>@endif
    </ul>
  </li>
  @endif

  @if($priv['modulos'][ 6 ] == 1)
  <li>
    <a href="#mercadotecnia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-lightbulb"></i>  Mercadotecnia</a>
    <ul class="collapse list-unstyled" id="mercadotecnia">
      @if( isset( $priv[ 'secciones' ][ 23 ] ) && $priv[ 'secciones' ][ 23 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('mercadotecnia_listado');">Campañas</a></li>@endif
    </ul>
  </li>
  @endif

  @if($priv['modulos'][ 8 ] == 1)
  <li>
    <a href="#configuraciones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sm fa-cogs"></i>  Configuraciones</a>
    <ul class="collapse list-unstyled" id="configuraciones">
      <li>
        <a href="#configuracionesUsuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuarios</a>
        <ul class="collapse list-unstyled" id="configuracionesUsuarios">
          @if( isset( $priv[ 'secciones' ][ 14 ] ) && $priv[ 'secciones' ][ 14 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('ejecutivos_roles');"> > Perfiles</a></li>@endif
        </ul>
      </li>
      <li>
        <a href="#configuracionesProspectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Prospectos</a>
        <ul class="collapse list-unstyled" id="configuracionesProspectos">
          @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','2');"> > Campos Adicionales</a></li>@endif
        </ul>
      </li>
      <li>
        <a href="#configuracionesClientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
        <ul class="collapse list-unstyled" id="configuracionesClientes">
          @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','1');"> > Campos Adicionales</a></li>@endif
        </ul>
      </li>
      <li>
        <a href="#configuracionesMercadotecnia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mercadotecnia</a>
        <ul class="collapse list-unstyled" id="configuracionesMercadotecnia">
          @if( isset( $priv[ 'secciones' ][ 42 ] ) && $priv[ 'secciones' ][ 45 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_destinatarios');"> > Templates</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 64 ] ) && $priv[ 'secciones' ][ 64 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_multimedia');"> > Multimedia</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 79 ] ) && $priv[ 'secciones' ][ 79 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_listaEnvios');"> > Listas</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 80 ] ) && $priv[ 'secciones' ][ 80 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_formularios');"> > Formularios</a></li>@endif
        </ul>
      </li>
      <li>
        <a href="#configuracionesProductos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Productos</a>
        <ul class="collapse list-unstyled" id="configuracionesProductos">
          @if( isset( $priv[ 'secciones' ][ 18 ] ) && $priv[ 'secciones' ][ 18 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_productos');"> > Productos/Servicios</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 41 ] ) && $priv[ 'secciones' ][ 41 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_camposAdicionales','3');"> > Campos Adicionales</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 50 ] ) && $priv[ 'secciones' ][ 50 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_promociones');"> > Alta de Promociones</a></li>@endif
        </ul>
      </li>
      @if( isset( $priv[ 'secciones' ][ 48 ] ) && $priv[ 'secciones' ][ 48 ] == 1 )
      <li>
        <a href="#configuracionesPropuestas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Propuestas</a>
        <ul class="collapse list-unstyled" id="configuracionesPropuestas">
          <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_propuestas','1');"> > Envio de propuestas</a></li>
        </ul>
      </li>
      @endif
      @if( isset( $priv[ 'secciones' ][ 84 ] ) && $priv[ 'secciones' ][ 84 ] == 1 )
      <li>
        <a href="#configuracionesSeguimientos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Seguimientos</a>
        <ul class="collapse list-unstyled" id="configuracionesSeguimientos">
          <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_seguimientos','1');"> > Configuraciones</a></li>
        </ul>
      </li>
      @endif
      @if( isset( $priv[ 'secciones' ][ 66 ] ) && $priv[ 'secciones' ][ 66 ] == 1 )
        <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_pronosticos','1');">Pronosticos</a></li>
      @endif
      @if( isset( $priv[ 'secciones' ][ 67 ] ) && $priv[ 'secciones' ][ 67 ] == 1 )
        <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_pipeline','1');">Indicadores</a></li>
      @endif
      @if( isset( $priv[ 'secciones' ][ 10 ] ) && $priv[ 'secciones' ][ 10 ] == 1 )
      <li>
        <a href="#configuracionesCatalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catálogos</a>
        <ul class="collapse list-unstyled" id="configuracionesCatalogos">
          <li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_catalogos_generales');"> > Catálogos Generales</a></li>
        </ul>
      </li>
      @endif
      <li>
        <a href="#configuracionesSistema" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sistema</a>
        <ul class="collapse list-unstyled" id="configuracionesSistema">
          @if( isset( $priv[ 'secciones' ][ 13 ] ) && $priv[ 'secciones' ][ 13 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_smtp');"> > SMTP</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 16 ] ) && $priv[ 'secciones' ][ 16 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_branding');"> > Diseño</a></li>@endif
          @if( isset( $priv[ 'secciones' ][ 43 ] ) && $priv[ 'secciones' ][ 43 ] == 1 )<li><a href="javascript:void(0)" onclick="return contenidos('configuraciones_dashboard');"> > Dashboard</a></li>@endif
        </ul>
      </li>
    </ul>
  </li>
  @endif
</ul>
<input type="hidden" id="log_perfilID" name="log_perfilID" value="{{ Auth::user()->rol }}">
