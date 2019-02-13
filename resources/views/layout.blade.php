<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mexagon.net">
        <title> {{ config('app.name', 'Laravel') }} </title>
        <!-- Javascript -->
        <script src="{{ asset( 'js/jquery/jquery.js' ) }}"></script>
        <script src="{{ asset( 'js/tabs.js' ) }}"></script>
        <script src="{{ asset( 'js/forms.js' ) }}"></script>
        <script src="{{ asset( 'assets/dist/js/bootstrap.js' ) }}"></script>
        <!-- CSS -->
        <link href="{{ asset( 'assets/dist/css/bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'css/dashboard.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'css/forms.css' ) }}" rel="stylesheet">
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Menu -->
            @include( 'generales.menu' )
            
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <button class="btn btn-primary btn-sm" id="menu-toggle">Men&uacute;</button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">CRM</a>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-sm btn-danger">
                                    Avisos <span class="badge badge-light">4</span>
                                </button>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="z-index: 10000; font-size: 12px">
                                    <a class="dropdown-item" href="/perfil">Perfil</a>
                                    <a class="dropdown-item" href="/eventos">Mis Tareas</a>
                                    <div class="dropdown-divider"></div>
                                    <!--a class="dropdown-item" href="{{ route('logout') }}">Cerrar Sesi&oacute;n</a-->
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                  Cerrar Sesi&oacute;n
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                @yield('submenu')

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

  <!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

    </body>
</html>
