<div class="container border m-1 p-1">
<h6><i class="fa fa-cogs fa-sm"></i> Configuración Grid</h6>
<fieldset>

  <legen>Seleccione las columnas que desea visualizar en el listado inferior</legend>
  <br>
  <br>

  <input type="hidden" id="confGrid_seccion" name="confGrid_seccion" value="{{$seccion}}">

  <form id="formConfGrid">

      <input type="hidden" id="confGrid_id" name="confGrid_id" value="{{$gridID}}">
      <input type="hidden" id="confGrid_fields" name="confGrid_fields" value="{{$fields}}">

      <div class="row">
        @for( $i = 0 ; $i < count( $titulos ) ;  $i ++ )
            <div class="col-sm-2">
                <input name="{{$campos[$i]}}" id="{{$campos[$i]}}" type="checkbox" @if ( $visibilidad[ $i ] == '1' ) checked="checked" @endif class="custom-input custom-input-sm">
                <label for="{{$campos[$i]}}">{{$titulos[$i]}}</label>
            </div>
        @endfor
      </div>
      <div class="row">
          <div class="col-sm-10 text-right"></div>
          <div class="col-sm-2">
              <input type="checkbox" name="gridSeleccionaTodo" id="gridSeleccionaTodo" >
              <label for="gridSeleccionaTodo">Todo</label>
          </div>
      </div>

  </form>

  <div class="row">
    <div class="col-sm-12 text-center">
      <button class="btn btn-sm btn-success" id="btnGdaConfGrid" name="btnGdaConfGrid">Guardar</button>
      <button class="btn btn-sm btn-warning" id="btnGdaConfGridCierra" name="btnGdaConfGridCierra">Cancelar</button>
    </div>
  </div>
  </div>
</fieldset>
