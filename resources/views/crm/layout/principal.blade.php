<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ config('app.name', 'Laravel') }} </title>
        <link href="{{ asset( 'assets2/css/all.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets2/css/icon.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <!--link href="{{ asset( 'assets2/css/shards-dashboards.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets2/css/extras.css' ) }}" rel="stylesheet"-->
        <link href="{{ asset( 'styles/shards-dashboards.1.1.0.min.css' ) }}" id="main-stylesheet" data-version="1.1.0" rel="stylesheet">
        <link href="{{ asset( 'styles/extras.1.1.0.min.css' ) }}" rel="stylesheet">
        <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
        
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <script src="{{ asset( 'assets2/js/jquery-3.js' ) }}"></script>
        <!--script async="" defer="defer" src="{{ asset( 'assets2/js/buttons.js' ) }}"></script-->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </head>
    
    
    <body class="h-100">
        <div class="color-switcher animated">
      <h5>Colores Disponibles</h5>
      <ul class="accent-colors">
        <li class="accent-primary active" data-color="primary">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-secondary" data-color="secondary">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-success" data-color="success">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-info" data-color="info">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-warning" data-color="warning">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-danger" data-color="danger">
          <i class="material-icons">check</i>
        </li>
      </ul>
      <div class="close">
        <i class="material-icons">close</i>
      </div>
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- Barra lateral izquierda -->
                    <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                        <!-- Logotipo/Marca -->
                        <div class="main-navbar">
                            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                                <a class="navbar-brand w-100 mr-0" href="/home" style="line-height: 25px;">
                                    <div class="d-table m-auto">
                                        <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 180px;" src="{{ asset( 'assets2/img/logoMexagon.png' ) }}" alt="CRM Mexagon">
                                    </div>
                                </a>
                                <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                                    <i class="material-icons">&#xE5C4;</i>
                                </a>
                            </nav>
                        </div>
                        <!-- Menu principal -->
                        <div class="nav-wrapper">
                            @include( 'crm.layout.menu' , [ 'seccion' , $seccion ])
                        </div>
                    </aside>
                    <!-- Fin barra lateral izquierda -->
                    <!-- Zona central -->
                    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                        <div class="main-navbar sticky-top bg-white">
                            <!-- Main Navbar -->
                            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                                <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                                    <div class="input-group input-group-seamless ml-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                        <input class="navbar-search form-control" type="text" placeholder="" aria-label="Search">
                                    </div>
                                </form>
                                <ul class="navbar-nav border-left flex-row">
                                    <li class="nav-item border-right dropdown notifications">
                                        <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="nav-link-icon__wrapper">
                                                <i class="material-icons"></i>
                                                <span class="badge badge-pill badge-danger">2</span>
                                            </div>
                                        </a>
                                        <!-- Notificaciones -->
                                        <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">
                                                <div class="notification__icon-wrapper">
                                                    <div class="notification__icon">
                                                        <i class="material-icons"></i>
                                                    </div>
                                                </div>
                                                <div class="notification__content">
                                                    <span class="notification__category">Analytics</span>
                                                    <p>Your website’s active users count increased by <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <div class="notification__icon-wrapper">
                                                    <div class="notification__icon">
                                                        <i class="material-icons"></i>
                                                    </div>
                                                </div>
                                                <div class="notification__content">
                                                    <span class="notification__category">Sales</span>
                                                    <p>Last week your store’s sales count decreased by <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                                </div>
                                            </a>
                                            <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                                        </div>
                                        <!-- Fin notificaciones -->
                                    </li>
                                    <li class="nav-item dropdown">
                                        <!-- Opciones usuario -->
                                        <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            <img class="user-avatar rounded-circle mr-2" src="{{ asset( 'assets2/img/saint.jpg' ) }}" alt="User Avatar"> <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-small">
                                            <a class="dropdown-item" href="/ejecutivos"><i class="material-icons">person</i> Perfil</a>
                                            <a class="dropdown-item" href="/ejecutivoActividades"><i class="material-icons">local_activity</i> Actividades</a>
                                            <a class="dropdown-item" href="/ejecutivoListado"><i class="material-icons">supervisor_account</i> Ejecutivos</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
                                               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                                <i class="material-icons text-danger"></i> Cerrar Sesi&oacute;n 
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                                        </div>
                                        <!-- Fin opciones usuario -->
                                    </li>
                                </ul>
                                <nav class="nav">
                                    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                                        <i class="material-icons">&#xE5D2;</i>
                                    </a>
                                </nav>
                            </nav>
                        </div>

                        <div class="main-content-container container-fluid px-4" style="font-size: 12px">

                            @yield( 'seccionHeader' )

                            @yield( 'seccionContenido' )

                        </div> 

                        @yield( 'seccionFooter' )

                    </main>
                </div>
        </div>
        
        <script src="{{ asset( 'js/app.js' ) }}" ></script> 
        <script src="{{ asset( 'assets2/js/popper.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/bootstrap.js' ) }}"></script>
        
        
        <script src="{{ asset( 'assets2/js/jquery.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/Chart.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/shards.js' ) }}"></script>
        <!--script src="{{ asset( 'assets2/js/extras.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/shards-dashboards.js' ) }}"></script-->
        <script src="scripts/extras.1.1.0.min.js"></script>
        <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
        <script src="scripts/app/app-blog-overview.1.1.0.js"></script>
        
        <script src="{{ asset( 'js/jquery/jquery.dataTables.min.js' ) }}"></script>
        <script src="{{ asset( 'js/datepicker/bootstrap-datepicker.min.js' ) }}"></script>
        <script src="{{ asset( 'js/datepicker/bootstrap-datepicker.es.min.js' ) }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
        
    </body>
</html>
