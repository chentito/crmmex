@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="catalogo" class="tab-pane in active">
        </div>
        <div id="nuevoProducto" class="tab-pane fade">
        </div>
        <div id="reportesProducto" class="tab-pane fade">
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/productos/verProductos">Cat&aacute;logo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#nuevoProducto">Nuevo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#reportesProducto">Reportes</a>
        </li>
    </ul>

    @yield( 'individual' )
@endsection
