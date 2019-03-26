@extends( 'principales.ventas' )

@section( 'individual' )

<h4 class="pt-2 text-center">
    Ventas [{{$periodoInicial}} / {{$periodoFinal}}]
    <span class="float-lg-right pr-2">
        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#forecastActualizaPeriodos" data-whatever="@mdo">Agregar Filtros</button>
    </span>
</h4>

<div class="pl-2 pt-2 pr-2">
    <table id="listadoPropuestas" class="table table-responsive-sm table-striped table-bordered" style="width:100%">
        <thead>
            <tr class="text-center">
                <th rowspan="2">Ejecutivo</th>
                <th colspan="3">VENTAS CERRADAS</th>
                <th colspan="2">VENTAS EN CURSO</th>
                <th colspan="2">PREVISI&Oacute;N TOTAL</th>
            </tr>
            <tr class="text-center">
                <th>Ventas</th>
                <th>Facturaci&oacute;n</th>
                <th>Precio Medio</th>
                <th>Ventas Pendientes</th>
                <th>Previsi&oacute;n</th>
                <th>Total</th>
                <th>Venta Bruta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros AS $r)
                <tr>
                    <td>{{$r['ejecutivo']}}</td>
                    <td><input class="form-control form-control-sm" type="text" value="{{$r['ventasTotales']}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{@moneda($r['montoVentas'])}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{@moneda($r['precioMedio'])}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{$r['ventasPendientes']}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{$r['prevision']}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{$r['estimado']}}"></td>
                    <td><input class="form-control form-control-sm" type="text" value="{{@moneda($r['ventaBruta'])}}"></td>
                </tr>
                @php($vt = $vt + $r['ventasTotales'])
                @php($vp = $vp + $r['ventasPendientes'])
                @php($pr = $pr + $r['prevision'])
                @php($tt = $tt + $r['estimado'])
                @php($mv = $mv + $r['montoVentas'])
                @php($pm = $pm + $r['precioMedio'])
                @php($vb = $vb + $r['ventaBruta'])
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Totales</th>
                <th>{{$vt}}</th>
                <th>{{@moneda($mv)}}</th>
                <th>{{@moneda($pm)}}</th>
                <th>{{$vp}}</th>
                <th>{{$pr}}</th>
                <th>{{$tt}}</th>
                <th>{{@moneda($vb)}}</th>
            </tr>
        </tfoot>
    </table>
</div>

<div class="modal fade" id="forecastActualizaPeriodos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reporte Forecast</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="header">Filtrar por fechas</div>
                        <div class="row">
                            <div class="col-6">Del <input type="text" class="form-control form-control-sm" size="8" /></div>
                            <div class="col-6">al <input type="text" class="form-control form-control-sm" size="8" /></div>
                        </div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <div class="header">Filtrar por ejecutivo</div>
                            <select multiple class="form-control">
                            @foreach($registros AS $r)
                                <option>{{$r['ejecutivo']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <div class="header">Filtrar por categor&iacute;as</div>
                            <select multiple class="form-control">
                                <option>Emisi&oacute;n CFDi</option>
                                <option>Adicionales CFDi</option>
                                <option>Perifericos</option>
                                <option>Servidores</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-sm btn-primary" id="conf_forecast_btn_addPeriodo">Calcular</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#sandbox-container .input-daterange').datepicker({
        language: "es"
    });
</script>

@endsection
