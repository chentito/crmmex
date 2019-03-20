@extends( 'crm.layout.principal' , ['seccion' => 'clientes'] )

@section( 'seccionHeader' )
    @include( 'crm.layout.subseccionHeader' , [ 'seccion' => 'clientes' , 'subseccion' => 'Propuesta Comercial' ] )
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
                                    <select class="custom-select custom-select-sm">
                                        <option>Ciclo de facturación</option>
                                        <option>Bienal</option>
                                        <option>Anual</option>
                                        <option>Semestral</option>
                                        <option>Trimestral</option>
                                        <option>Mensual</option>
                                        <option>Un solo pago</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="custom-select custom-select-sm">
                                        <option>Grupo</option>
                                        <option>Consumibles</option>
                                        <option>Equipos de cómputo</option>
                                        <option>Facturación electrónica</option>
                                        <option>Servicios de internet</option>
                                        <option>Servicios profesionales</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input class="form-control form-control-sm" placeholder="Precio (Reemplazar el precio configurado)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <boton-regresar></boton-regresar>
                    <div class="float-right">
                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">add</i> Agregar Producto</button>
                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">insert_photo</i> Vista Previa</button>
                        <button class="btn btn-sm btn-outline-accent"><i class="material-icons">picture_as_pdf</i> Generar Propuesta</button>
                    </div>
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
