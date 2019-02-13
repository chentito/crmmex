@extends('layout')

@section( 'content' )
    <div class="tab-content">
        <div id="cartera" class="tab-pane in active">
            @include( 'clientes.listado' )
        </div>
        <div id="alta" class="tab-pane fade">
            @include( 'clientes.alta' )
        </div>
        <div id="seguimiento" class="tab-pane fade">
            @include( 'clientes.seguimiento' )
        </div>
    </div>
@endsection

@section( 'submenu' )
    <ul class="nav nav-tabs sticky-top bg-white">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#cartera">Cartera</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#alta">Alta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#seguimiento">Seguimiento</a>
        </li>
    </ul>
@endsection