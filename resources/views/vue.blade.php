<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Vue y Laravel</title>
        
        <!--script src="{{ asset( 'js/jquery/jquery.js' ) }}"></script-->
        <!--script src="{{ asset( 'assets/dist/js/bootstrap.js' ) }}"></script-->
        <!--script src="{{ asset( 'js/jquery/jquery.dataTables.min.js' ) }}"></script-->
        
        
        
        <!--link href="{{ asset( 'assets/dist/css/bootstrap.min.css' ) }}" rel="stylesheet"-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <grid-datos 
                url="/api/listadoContactos" 
                titulo="Mis Datos" 
                :col-names="['ID','Nombre','Correo','Telefono','Area','Puesto','Opciones']"
                col-ids="['id','nombre','correo','telefono','area','puesto','opts']"
                >
            </grid-datos>
        </div> 
        
        <script src="{{ asset( 'js/app.js' ) }}" ></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    </body>
</html>



