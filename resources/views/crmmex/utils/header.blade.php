<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/home4">Dashboard<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle">
                Bienvenido Carlos Reyes
            </a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                <li><a id="menuHeader" class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Editar Perfil</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo');">Actividades</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_seguimiento');">Reportes</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle">
                Alertas
            </a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                <li><a id="menuHeader" class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_listado');">Editar Perfil</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_nuevo');">Actividades</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('prospectos_seguimiento');">Reportes</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                Cerrar Sesi&oacute;n
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        </li>
    </ul>
</div>
