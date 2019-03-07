<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Vue y Laravel</title>
        <script src="{{ asset( 'js/jquery/jquery.js' ) }}"></script>
        <script src="{{ asset( 'assets/dist/js/bootstrap.js' ) }}"></script>
        <script src="{{ asset( 'css/app.js' ) }}" ></script> 
        <link href="{{ asset( 'assets/dist/css/bootstrap.min.css' ) }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <example-component title="Titulo uno" texto="Aqui irá algo de texto dinamico"></example-component>
            <example-component title="Titulo dos" texto="Aqui también"></example-component>
            <example-component title="Titulo tres" texto="Y aquí iguanas ranas"></example-component>

            <div class="row">
                <div class="col-sm-6"><boton texto="Regresar"></boton></div>
                <div class="col-sm-6"><boton texto="Guardar Informacion"></boton></div>
            </div>
            
        </div> 
        
        <script src="{{ asset( 'js/app.js' ) }}" ></script> 
    </body>
</html>



