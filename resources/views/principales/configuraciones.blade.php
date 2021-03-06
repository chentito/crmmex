@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="forecast" class="tab-pane in active">
            @include( 'configuraciones.forecast' )
        </div>
         <div id="smtp" class="tab-pane fade">
            @include( 'configuraciones.smtp' )
        </div>
        <div id="pipeline" class="tab-pane fade">
            @include( 'configuraciones.pipeline' )
        </div>
        <div id="adicionales" class="tab-pane fade">
            @include( 'configuraciones.camposAdicionales' )
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Configuraciones</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" href="#forecast">Forecast</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pipeline">Pipeline</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#smtp">SMTP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#adicionales">Campos Adicionales</a>
        </li>
    </ul>
@endsection