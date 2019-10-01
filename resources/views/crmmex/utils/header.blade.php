<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="javascript:contenidos('dashboard')" title="Página principal"><i class="fa fa-sm fa-home"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" class="nav-link">
                Bienvenido(a) {{ Auth::user()->name }} {{ Auth::user()->apPat }}
            </a>
            <ul class="dropdown-menu collapse list-unstyled {{$borde}}" aria-labelledby="navbarDropdown" style="font-size: 12px">
                <li><a id="menuHeader" class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('ejecutivos_perfil');">Editar Perfil</a></li>
                <li><a class="dropdown-item" href="javascript:void(0)" onclick="return contenidos('ejecutivos_actividades');">Seguimientos</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="eliminaToken();event.preventDefault(); document.getElementById('logout-form').submit();" title="Cerrar Sesión">
              <i class="fa fa-sa fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
        </li>
    </ul>
</div>
