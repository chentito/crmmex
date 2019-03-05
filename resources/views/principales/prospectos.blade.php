@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="cartera" class="tab-pane in active">
        </div>
        <div id="alta" class="tab-pane fade">
        </div>
        <div id="seguimiento" class="tab-pane fade">
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Prospectos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/prospectos">Cartera</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/prospectos/alta">Alta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/prospectos/seguimiento">Seguimiento</a>
        </li>
    </ul>

    @yield( 'individual' )
@endsection