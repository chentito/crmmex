@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="cartera" class="tab-pane in active">
            @include( 'configuraciones.pipeline' )
        </div>
        <div id="alta" class="tab-pane fade">
            @include( 'configuraciones.forecast' )
        </div>
        <div id="seguimientos" class="tab-pane fade">
            @include( 'configuraciones.otras' )
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Prospectos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#cartera">Cartera</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#alta">Alta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#seguimientos">Seguimiento</a>
        </li>
    </ul>
@endsection