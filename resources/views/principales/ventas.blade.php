@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="listadoVentas" class="tab-pane fade">
        </div>
        <div id="forecast" class="tab-pane fade">
        </div>
    </div>  
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Ventas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ventas/verListadoPropuestas">Listado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/ventas/forecast">Forecast</a>
        </li>
    </ul>

    @yield( 'individual' )
@endsection

