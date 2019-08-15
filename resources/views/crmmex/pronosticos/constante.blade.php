<div class="col-sm-12" id="contante_{{$rand}}">
  <div class="row">
    <div class="col-sm-2">
      <label for="formula_constantes_nombre">Nombre</label>
      <input type="text" name="formula_constantes_nombre[]" id="formula_constantes_nombre" value="{{$nombre}}" class="form-control form-control-sm" maxlength="10">
      <input type="hidden" name="formula_constantes_id[]" id="formula_constantes_id" value="{{$id}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-5">
      <label for="formula_constantes_descripcion">Descripción</label>
      <input type="text" name="formula_constantes_descripcion[]" id="formula_constantes_descripcion" value="{{$descripcion}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-2">
      <label for="formula_constantes_tipo">Tipo</label>
      <select name="formula_constantes_tipo[]" id="formula_constantes_tipo" class="custom-select custom-select-sm">
        <option value="1" @if($tipo==1) selected @endif>Importe</option>
        <option value="2" @if($tipo==2) selected @endif>Tasa</option>
      </select>
    </div>
    <div class="col-sm-2">
      <label for="formula_constantes_valor">Valor</label>
      <input type="text" name="formula_constantes_valor[]" id=formula_constantes_valor value="{{$valor}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-1">
      <button type="button" name="button" onclick="cargaConstante('{{$nombre}}')" @if($nombre=='') disabled @endif class="btn btn-sm btn-info float-left"><i class="fa fa-sm fa-link"></i></button>
      <button type="button" name="button" id="formula_btnEliminaConstante_{{$rand}}" class="btn btn-sm btn-danger float-right"><i class="fa fa-sm fa-trash"></i></button>
    </div>
    <div class="col-sm-12"><hr></div>
  </div>
</div>

<script>
    document.getElementById( "formula_btnEliminaConstante_{{$rand}}" ).addEventListener( "click" , function( e ) {
        e.preventDefault();
        var nombre = '{{$nombre}}';
        var formula = document.getElementById( 'formula_calculada' ).value;
        var existeEnFormula = formula.indexOf( nombre );

        if( existeEnFormula == -1 ) {
          $( '#contante_{{$rand}}' ).remove();
        } else {
          aviso( 'La constante forma parte de la formula, no se puede eliminar' , false );
        }

    });
</script>
