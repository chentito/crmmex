@extends( 'crm.layout.principal' , ['seccion' => 'clientes'] )

@section( 'seccionHeader' )
    @include( 'crm.prospectos.prospectoHeader' , [ 'seccion' => 'clientes' , 'subseccion' => 'Propuesta Comercial' ] )
@endsection

@section( 'seccionContenido' )
<div id="app">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-small mb-3">
                <div class="card-header border-bottom"><h6 class="m-0">Datos Propuesta</h6></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <select class="custom-select custom-select-sm">
                                <option>Categor&iacute;a</option>
                                <option>Facturaci&oacute;n Electr&oacute;nica</option>
                                <option>Servicios Informáticos</option>
                                <option>Servicios de Internet</option>
                                <option>Consumibles</option>
                                <option>Equipos de Cómputo</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mb-1">
                            <select class="custom-select custom-select-sm">
                                <option>Forma de Pago</option>
                                <option>Transferencia/Depósito</option>
                                <option>PayPal</option>
                                <option>Pasarela de pagos</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-1">
                            <textarea class="form-control" cols="3" placeholder="Requerimientos Cliente"></textarea>
                        </div>
                        <div class="col-sm-6 mb-1">
                            <textarea class="form-control" cols="3" placeholder="Observaciones"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-1">
                            <select class="custom-select custom-select-sm" id="listadoProductosPropuestaComercial">
                                <option>Seleccione producto/servicio</option>
                                <option href="#formIndividual" data-toggle="collapse">Producto 1</option>
                                <option href="#formIndividual" data-toggle="collapse">Producto 2</option>
                                <option href="#formIndividual" data-toggle="collapse">Producto 3</option>
                            </select>
                        </div>
                        <div class="col-sm-12 mb-1 collapse" id="formIndividual">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input class="form-control form-control-sm" placeholder="Cantidad">
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control form-control-sm" placeholder="Cantidad">
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control form-control-sm" placeholder="Cantidad">
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control form-control-sm" placeholder="Cantidad">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <boton-regresar></boton-regresar>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $( '#formIndividual' ).collapse({
            toggle: false
        });
        $( '#listadoProductosPropuestaComercial' ).change( function(){
        });
    });
</script>
@endsection

@section( 'seccionFooter' )
    @include( 'crm.prospectos.prospectoFooter' )
@endsection
