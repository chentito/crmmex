@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'Catálogos' ] )
@endsection

@section( 'seccionContenido' )
<div id="app">
    
    <div class="row">
        <div class="col-sm-12 mb-3">
            <div class="card card-small">
                <nav>
                    <div class="card-header border-bottom nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Generales</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Productos/Servicios</a>
                    </div>
                </nav>
                <div class="card-body tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            @foreach ( $catalogos AS $catalogo )
                            <div class="col-sm-4 mb-1">
                                <div class="card card-small">
                                    <div class="card-header border-bottom">
                                        {{$catalogo['nombre']}}
                                    </div>
                                    <div class="card-body">
                                        <select class="custom-select custom-select-sm" multiple="multiple">
                                            @foreach ( $catalogo[ 'opciones' ] AS $opcion )
                                                <option value="{{$opcion['idOP']}}">{{$opcion['nombreOP']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">add</i> Nueva Opción</button>
                                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">delete</i> Eliminar Selección</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                        <div class="card card-small mb-3">
                            <div class="card-body">
                                <table id="listadoProductos" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categor&iacute;a</th>
                                            <th>Periodicidad Pago</th>
                                            <th>Tipo</th>
                                            <th>Precio Unitario</th>
                                            <th>M&aacute;s</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Categor&iacute;a</th>
                                            <th>Periodicidad Pago</th>
                                            <th>Tipo</th>
                                            <th>Precio Unitario</th>
                                            <th>M&aacute;s</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="btn btn-sm btn-outline-accent" id="altaProductoServicio"><i class="material-icons">add</i>Alta Producto</div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
    <!--div class="row">
        <div class="col-sm-12">
            <div class="card card-small">
                <div class="card-header border-bottom">
                    Catálogos Disponibles
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ( $catalogos AS $catalogo )
                        <div class="col-sm-4 mb-1">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    {{$catalogo['nombre']}}
                                </div>
                                <div class="card-body">
                                    <select class="custom-select custom-select-sm" multiple="multiple">
                                        @foreach ( $catalogo[ 'opciones' ] AS $opcion )
                                            <option value="{{$opcion['idOP']}}">{{$opcion['nombreOP']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-outline-accent"><i class="material-icons">add</i> Nueva Opción</button>
                                    <button class="btn btn-sm btn-outline-accent"><i class="material-icons">delete</i> Eliminar Selección</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">add</i> Agregar Catálogo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div-->

<script>
    
    $( document ).ready( function(){
        $('#myTab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        
        $('#listadoProductos').DataTable({
            ajax   :{
                url: '/api/listadoProductos',
                dataSrc: 'productos'
            },
            columns: [
                { data: 'nombreProducto' },
                { data: 'categoriaProducto' },
                { data: 'periodicidad' },
                { data: 'tipo' },
                { data: 'costo' },
                { data: 'configuracion' }
            ],
            responsive: true
        });
        
        $( '#altaProductoServicio' ).click( function(){
            location.replace('/productoAlta');
        });
    });
    
    
</script>

@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
