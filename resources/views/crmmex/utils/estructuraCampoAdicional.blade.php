<div class="col-sm-3">
    <label for="edicionCampoAdicional_{{$idty}}">{{$nombre}}</label>
    @if ( $tipo == '3' )
        <select id="edicionCampoAdicional_{{$idty}}" name="edicionCampoAdicional_{{$idty}}" class="custom-select custom-select-sm">
            @foreach( $valores AS $valor )
              <option value="{{$valor['valor']}}">{{$valor['texto']}}</option>
            @endforeach
        </select>
      @else
        <input type="text" id="edicionCampoAdicional_{{$idty}}" name="edicionCampoAdicional_{{$idty}}" class="form-control form-control-sm" placeholder="{{$nombre}}">
    @endif
</div>
