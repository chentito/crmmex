@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="catalogo" class="tab-pane in active">
            @include( 'productos.listado' )
        </div>
        <div id="nuevoProducto" class="tab-pane fade">
            @include( 'productos.nuevo' )
        </div>
        <div id="reportesProducto" class="tab-pane fade">
            @include( 'productos.reportes' )
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#catalogo">Cat&aacute;logo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#nuevoProducto">Nuevo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#reportesProducto">Reportes</a>
        </li>
    </ul>
@endsection
