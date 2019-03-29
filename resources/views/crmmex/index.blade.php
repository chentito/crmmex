<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> {{ config('app.name', 'Laravel') }} </title>
        <!-- ESTILOS -->
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <!-- Grid -->
        <link href="{{ asset( 'assets3/css/fixedHeader.bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/responsive.bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/dataTables.bootstrap4.min.css' ) }}" rel="stylesheet">
        <link href="/assets3/css/themes/{{$css}}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/generales.css' ) }}" rel="stylesheet">
    </head>
    <body class="h-100">
        <style>
            .fondo {
                background: url("http://192.168.30.109/imgs/background/salajuntas.jpg") no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
        <!-- Contenedor principal -->
        <div class="wrapper fondo">
            <!-- Barra lateral, contiene menu e imagen corporativa -->
            <nav id="sidebar" class="{{$estilo}} shadow" style="opacity: .8">
                <div id="logoBranding" class="sidebar-header sticky-top" >
                    <img src="{{ asset( 'imgs/logoCRM.jpg' ) }}">
                </div>
                <button type="button" id="sidebarCollapse2" class="btn {{$btn}} mt-2">
                    <i class="fas fa-angle-left"></i>
                </button>
                @include( 'crmmex.utils.menu' )
            </nav>
            <!-- Contenido central, contiene header, botones contro menu, breadcrumb y contenido principal -->
            <div class="container-fluid" id="content">
                <!-- Header -->
                <header id="header" class="bg-light sticky-top" style="opacity: .9; font-weight: bold">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
                        <button type="button" id="sidebarCollapse" class="btn {{$btn}} mt-1">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @include( 'crmmex.utils.header' )
                    </nav>
                </header>
                <!-- Breadcrumb -->
                <div style="height: 35px; opacity: .8" style="z-index: 1400" id="contenedorBreadCrumb">
                    <ol class="breadcrumb rounded-0 {{$estilo}} shadow">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
                <!-- Contenido Principal -->
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-3 mb-3">
                            <div class="card card-small shadow {{$borde}}" style="opacity: .9">
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

        <div id="app"></div>

        <!-- SCRIPTS -->
        <script src="{{ asset( 'js/app.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/popper.js' ) }}"></script>
        <script src="{{ asset( 'assets2/js/mdb.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/feather.min.js' ) }}"></script>
        <!-- Grid -->
        <script src="{{ asset( 'js/jquery/jquery.dataTables.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/dataTables.bootstrap4.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/dataTables.fixedHeader.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/dataTables.responsive.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/responsive.bootstrap.min.js' ) }}"></script>
        <!-- Fonts -->
        <script src="{{ asset( 'assets3/js/solid.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/fontawesome.js' ) }}"></script>
        <!-- Funcionalidades -->
        <script src="{{ asset( 'assets3/js/contenidos.js' ) }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
                $('#sidebarCollapse2').on('click', function () {
                    $('#sidebar').removeClass('active');
                });
            });
            contenidos( 'dashboard' );
        </script>

    </body>
</html>
