@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="listado" class="tab-pane in active">
            @include( 'administracion.listado' )
        </div>
        <div id="alta" class="tab-pane fade">
            @include( 'administracion.alta' )
        </div>
        <div id="roles" class="tab-pane fade">
            roles
        </div>
        <div id="bitacora" class="tab-pane fade">
            bitacora
        </div>
    </div>  
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Administraci&oacute;n</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#listado">Administradores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#alta">Alta Administrador</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#roles">Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#bitacora">Bit&aacute;cora</a>
        </li>
    </ul>
@endsection
