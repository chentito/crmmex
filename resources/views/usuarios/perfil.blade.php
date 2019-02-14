@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="listado" class="tab-pane in active">
            @include( 'usuarios.listado' )
        </div>
        <div id="info" class="tab-pane fade"></div>
        <div id="nuevo" class="tab-pane fade">
            @include( 'usuarios.nuevo' )
        </div>
        <div id="seguimientos" class="tab-pane fade">
            @include( 'usuarios.seguimiento' )
        </div>
    </div>  
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/usuarios/listado" data-target="#listado">Administradores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usuarios/misdatos/{{ Auth::user()->id }}" data-target="#info">Informaci&oacute;n</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usuarios/nuevo" data-target="#nuevo">Agregar Usuario</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usuarios/seguimiento" data-target="#seguimientos">Seguimientos</a>
        </li>
    </ul>
@endsection


