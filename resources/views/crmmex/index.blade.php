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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
        <script src="/assets3/js/contenidos.js" rel="stylesheet"></script>
        <!-- Font Awesome JS -->
        <script src="http://192.168.30.7/js/feather.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    </head>
    <body class="h-100">
        <style>
            .bd-example-modal-lg .modal-dialog{
                display: table;
                position: relative;
                margin: 0 auto;
                top: calc(50% - 24px);
              }

              .bd-example-modal-lg .modal-dialog .modal-content{
                background-color: transparent;
                border: none;
              }
        </style>
        <!-- Contenedor principal -->
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar" class="{{$estilo}} shadow">
                <div class="sidebar-header sticky-top">
                    <img src="{{ asset( 'imgs/logoCRM.jpg' ) }}">
                </div>
                @include( 'crmmex.utils.menu' )
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
                                        <li class="nav-item">
                                            <!--a class="nav-link" href="/logout">Cerrar Sesi&oacute;n <span class="sr-only">(current)</span></a-->
                                            <a class="nav-link" href="{{ route('logout') }}" 
                                               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                                Cerrar Sesi&oacute;n 
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
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
                                <div class="card-body" id="contenidosPrincipales">
                                    @yield( 'contenidos' )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width: 48px">
                    <span class="fa fa-spinner fa-spin fa-3x"></span>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
    </body>
</html>

