<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Gracias</title>
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <script src="{{ asset( 'assets2/js/bootstrap.js' ) }}"></script>
    </head>
    <body>
      <div class="container-fluid">
            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand">
                  <img src="{{ asset( '/imagenPropietario' ) }}" width="200px">
              </a>
            </nav>
            <div class="row">
              <div class="col-sm-12 text-center">
                  {{$mensaje}}
              </div>
            </div>
      </div>
    </body>

</html>
