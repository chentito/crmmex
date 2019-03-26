<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ config('app.name', 'Laravel') }} </title>
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <!--link href="{{ asset( 'assets3/css/themes/blue.css' ) }}" rel="stylesheet"-->
        <link href="/assets3/css/themes/{{$css}}" rel="stylesheet">
        <script src="{{ asset( 'assets2/js/jquery-3.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/popper.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/bootstrap.js' ) }}"></script>
        <!-- Font Awesome JS -->
        <script defer src="http://192.168.30.7/js/feather.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    </head>
    <body class="h-100">
        <!-- Contenedor principal -->
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar" class="{{$estilo}} shadow">
                <div class="sidebar-header sticky-top">
                    <img src="{{ asset( 'imgs/logoCRM.jpg' ) }}">
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="#prospectos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users-cog fa-lg"></i>  Prospectos</a>
                        <ul class="collapse list-unstyled" id="prospectos">
                            <li><a href="#">Listado</a></li>
                            <li><a href="#">Nuevo Prospecto</a></li>
                            <li><a href="#">Seguimientos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#clientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users fa-lg"></i>  Clientes</a>
                        <ul class="collapse list-unstyled" id="clientes">
                            <li><a href="#">Listado</a></li>
                            <li><a href="#">Alta</a></li>
                            <li><a href="#">Seguimientos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#mercadotecnia" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i>  Mercadotecnia</a>
                        <ul class="collapse list-unstyled" id="mercadotecnia">
                            <li><a href="#">Mercadotecnia</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#reportes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-chart-pie fa-lg"></i>  Reportes</a>
                        <ul class="collapse list-unstyled" id="reportes">
                            <li><a href="#">Reportes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#configuraciones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs fa-lg"></i>  Configuraciones</a>
                        <ul class="collapse list-unstyled" id="configuraciones">
                            <li>
                                <a href="#configuracionesCatalogos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Catálogos</a>
                                <ul class="collapse list-unstyled" id="configuracionesCatalogos">
                                    <li><a href="#"> > Catálogos Generales</a></li>
                                    <li><a href="#"> > Productos/Servicios</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Forecast</a></li>
                            <li><a href="#">Pipeline</a></li>
                            <li><a href="#">Campos Adicionales</a></li>
                            <li><a href="#">SMTP</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="powered">Powered by <a href="https://www.mexagon.net" target="_blank">Mexagon.net</a></div>
            </nav>
            <!-- Page Content -->
            <div class="container-fluid" id="content">
                <header id="header" class="bg-light sticky-top">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn {{$btn}} mt-2">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <div class="float-right">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/home">CRM <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Avisos
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item">MSJ</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Bienvenido Carlos Reyes
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 1500">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/">Cerrar Sesi&oacute;n <span class="sr-only">(current)</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </header>
                <div style="height: 35px" style="z-index: 1400">
                    <ol class="breadcrumb rounded-0 {{$estilo}} shadow">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <div class="card card-small shadow bg-light">
                                <div class="card-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br /><br /><br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $( document ).ready(function () {
                $( '#sidebarCollapse' ).on( 'click' , function () {
                    $( '#sidebar' ).toggleClass( 'active' );
                });
            });
        </script>
    </body>
</html>
