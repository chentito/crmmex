<div class="row">
    <div class="col-sm-12">
       
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
            
                <div class="text-center">
                    <button class="btn btn-sm {{$btn}}"><i class="fa fa-plus fa-lg"></i> Agregar Producto</button>
                    <button class="btn btn-sm {{$btn}}"><i class="fa fa-file"></i> Vista Previa</button>
                    <button class="btn btn-sm {{$btn}}"><i class="fa fa-file-pdf"></i> Generar Propuesta</button>
                </div>
    </div>
</div>