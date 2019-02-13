@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="pipeline" class="tab-pane in active">
            @include( 'configuraciones.pipeline' )
        </div>
        <div id="forecast" class="tab-pane fade">
            @include( 'configuraciones.forecast' )
        </div>
        <div id="otras" class="tab-pane fade">
            @include( 'configuraciones.otras' )
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Configuraciones</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" href="#pipeline">Pipeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#forecast">Forecast</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#otras">Otras</a>
        </li>
    </ul>
@endsection