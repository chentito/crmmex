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
        <link href="{{ asset( 'assets2/css/all.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets2/css/icon.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <!-- Grid -->
        <link href="{{ asset( 'assets3/css/fixedHeader.bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/responsive.bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/dataTables.bootstrap4.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/buttons.dataTables.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/buttons.bootstrap4.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/jodit.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/responsive-calendar.css' ) }}" rel="stylesheet">
        <link href="/assets3/css/themes/{{$css}}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/generales.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/contenidos.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/bootstrap-datepicker.standalone.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'assets3/css/animate.css' ) }}" rel="stylesheet">
        <script src="{{ asset( 'assets3/js/jodit.min.js' ) }}"></script>
        <script src="https://cdn.tiny.cloud/1/refyckaus1l087ev2ix1hakf8w8altuitceafl19hv1qbmua/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>
    <body>
        <style>
            .fondo {
                background: url("{{asset('/imgs/background/'.$back)}}") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
        <!-- Contenedor principal -->
        <div class="wrapper @if($usaBack==1) fondo @endif">

            <!-- Barra lateral, contiene menu e imagen corporativa -->
            <nav id="sidebar" class="{{$estilo}} shadow" style="opacity: {{$trans}}">
                <div id="logoBranding" class="sidebar-header sticky-top" >
                    <img src="{{ asset( '/imagenPropietario' ) }}" width="200px">
                </div>
                <button type="button" id="sidebarCollapse2" class="btn {{$btn}} mt-2" style="width: 100%">
                    <i class="fas fa-angle-left"></i>
                </button>
                @include( 'crmmex.utils.menu' , [ 'estilo' => $estilo , 'boton' => $btn ] )
            </nav>

            <!-- Contenido central, contiene header, botones contro menu, breadcrumb y contenido principal -->
            <div class="container-fluid" id="content">
                <!-- Header -->
                <header id="header" class="bg-light sticky-top" style="opacity: {{$trans}}; font-weight: bold">
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
                <div style="height: 35px; opacity: {{$trans}}" style="z-index: 1400" id="contenedorBreadCrumb">
                    <ol class="breadcrumb rounded-0 {{$estilo}} shadow">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>

                <!-- Contenido Principal -->
                <div class="container">
                    <div class="row">
                        <div class="col-12 mt-2 mb-3 pl-2 pr-2">
                            <div class="card card-small shadow {{$borde}}" style="opacity: {{$trans}}">
                                <div class="card-body" id="contenidosPrincipales"></div>
                            </div>
                        </div>
                    </div>
                    <div id="app"></div>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width: 48px">
                    <span class="fa fa-spinner fa-spin fa-3x"></span>
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <script src="{{ asset( 'assets3/js/popper.min.js' ) }}"></script>
        <script src="{{ asset( 'js/app.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/moment.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/es.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/notify.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/timeline.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/contenidos.js' ) }}"></script>
        <!-- Grid -->
        <script src="{{ asset( 'assets3/js/dataTables.bootstrap4.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/dataTables.responsive.min.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/dataTables.buttons.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/buttons.bootstrap4.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/buttons.flash.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/jszip.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/pdfmake.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/vfs_fonts.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/buttons.html5.min.js' ) }}" ></script>
        <script src="{{ asset( 'assets3/js/buttons.print.min.js' ) }}" ></script>
        <!-- Fonts e iconos -->
        <script src="{{ asset( 'assets3/js/solid.js' ) }}"></script>
        <script src="{{ asset( 'assets3/js/fontawesome.js' ) }}"></script>
        <!-- Funcionalidades -->
        <script src="{{ asset( 'assets3/js/funcionalidades.js' ) }}"></script>

        <script type="text/javascript">
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
            $( document ).ready( function() {
                generaToken();
                $( '#sidebarCollapse' ).on( 'click' , function () {
                    $( '#sidebar' ).toggleClass( 'active' );
                });
                $( '#sidebarCollapse2' ).on( 'click' , function () {
                    $( '#sidebar' ).removeClass( 'active' );
                });
            });
            contenidos( 'dashboard' );

            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if ( form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
</html>
