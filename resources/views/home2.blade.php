@extends('layout')

@section( 'content' )
    <br />
    <div class="card-columns">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Tareas</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Tus actividades para
                    <div class="dropdown">
                        <a class="btn btn-info dropdown-toggle" href="#" id="dropDownActividades" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hoy</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Mañana</a>
                        </div>
                    </div>
                </h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Agrendar reuni&oacute;n</a></li>
                    <li class="list-group-item"><a href="#">Realizar llamada telef&oacute;nica</a></li>
                    <li class="list-group-item"><a href="#">Env&iacute;o de propuesta</a></li>
                    <li class="list-group-item"><a href="#">Generar reporte de ventas</a></li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Ver todas</a>
                </div>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                dssdf
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                sdsf
            </div>
        </div>
    </div>
    
    

@endsection