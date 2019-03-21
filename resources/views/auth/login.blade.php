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
        <script src="{{ asset( 'js/jquery/jquery.dataTables.min.js' ) }}"></script>
        <script src="{{ asset( 'js/datepicker/bootstrap-datepicker.min.js' ) }}"></script>
        <script src="{{ asset( 'js/datepicker/bootstrap-datepicker.es.min.js' ) }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <!-- CSS -->
        <link href="{{ asset( 'assets/dist/css/bootstrap.min.css' ) }}" rel="stylesheet">
        <link href="{{ asset( '/css/datepicker/bootstrap-datepicker.css' ) }}" rel="stylesheet">
        <link href="{{ asset( 'css/dashboard.css' ) }}" rel="stylesheet">
        <!--link href="{{ asset( 'css/jquery.dataTables.min.css' ) }}" rel="stylesheet"-->
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset( 'css/forms.css' ) }}" rel="stylesheet">
        <style>
            .fondo {
                background: url("{{ asset( 'imgs/background/edificios.jpg' ) }}") no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            .cardTransparente {
                background-color: rgba(245, 245, 245, 1);
                opacity: .8;
            }
        </style>
    </head>
    <body class="fondo">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">
                    <div class="card cardTransparente">
                        <div class="card-header">Datos de Acceso</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                Recordar datos
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Entrar
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Recuperar contraseña
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
