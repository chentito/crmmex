<ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link @if($seccion=='prospectos') active @endif" href="/prospecto">
        <i class="material-icons">group_add</i>
        <span>Prospectos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='clientes') active @endif" href="./cliente">
        <i class="material-icons">group</i>
        <span>Clientes</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='ventas') active @endif" href="/venta">
        <i class="material-icons">monetization_on</i>
        <span>Ventas</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='productos') active @endif" href="/producto">
        <i class="material-icons">view_module</i>
        <span>Productos / Servicios</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='mercadotecnia') active @endif" href="/mercadotecnia">
        <i class="material-icons">important_devices</i>
        <span>Mercadotecnia</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='reportes') active @endif" href="/reportes">
        <i class="material-icons">vertical_split</i>
        <span>Reportes</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($seccion=='configuraciones') active @endif" href="/configuracion">
        <i class="material-icons">settings_applications</i>
        <span>Configuraciones</span>
      </a>
    </li>
</ul>
