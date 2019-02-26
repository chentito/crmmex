@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="listadoVentas" class="tab-pane in active">
            pantalla listado ventas
        </div>
        <div id="listadoPendientes" class="tab-pane fade">
            pantalla listado pendientes
        </div>
        <div id="forecast" class="tab-pane fade">
            pantalla forecast
        </div>
    </div>  
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Ventas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#listadoVentas">Listado Ventas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#listadoPendientes">Listado Pendientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#forecast">Forecast</a>
        </li>
    </ul>
@endsection
