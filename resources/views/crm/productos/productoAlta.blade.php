@extends( 'crm.layout.principal' , ['seccion' => 'configuraciones'] )

@section( 'seccionHeader' ) 
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'configuraciones' , 'subseccion' => 'Alta Producto' ] )
@endsection

@section( 'seccionContenido' )
<div id="app">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-small">
                <div class="card-header border-bottom"><h6 class="m-0">Datos Generales</h6></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="Nombre del producto">
                        </div>
                        <div class="col-sm-4 mb-1">
                            <combo-box id-cat="9" nombre-select="combo_giro"></combo-box>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-1">
                            <combo-box id-cat="6" nombre-select="combo_giro"></combo-box>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <combo-box id-cat="1" nombre-select="combo_giro"></combo-box>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <combo-box id-cat="8" nombre-select="combo_giro"></combo-box>
                        </div>
                        <div class="col-sm-3 mb-1">
                            <input type="text" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea class="form-control form-control-sm" rows="2" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    <div class="card-header border-bottom mb-1"><h6 class="m-0">Precios</h6></div>
                    <div class="row">
                        <div class="col-sm-3 input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" aria-label="Cuota de alta" value="">
                        </div>
                        <div class="col-sm-3 input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" aria-label="Precio recurrente" value="">
                        </div>
                    </div>
                    <div class="card-header border-bottom mb-1"><h6 class="m-0">Condiguraciones Adicionales</h6></div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Conf Add 1">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Conf Add 2">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Conf Add 3">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Conf Add 4">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <boton-regresar></boton-regresar>
                    <div class="float-right">
                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">add</i> Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.configuraciones.configuracionesFooter' )
@endsection
