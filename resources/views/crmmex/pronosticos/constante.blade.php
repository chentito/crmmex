<div class="col-sm-12" id="contante_{{$rand}}">
  <div class="row">
    <div class="col-sm-2">
      <label for="formula_constantes_nombre">Nombre</label>
      <input type="text" name="formula_constantes_nombre[]" id="formula_constantes_nombre" value="{{$nombre}}" class="form-control form-control-sm" maxlength="10">
      <input type="hidden" name="formula_constantes_id[]" id="formula_constantes_id" value="{{$id}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-7">
      <label for="formula_constantes_descripcion">Descripción</label>
      <input type="text" name="formula_constantes_descripcion[]" id="formula_constantes_descripcion" value="{{$descripcion}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-2">
      <label for="formula_constantes_valor">Valor</label>
      <input type="text" name="formula_constantes_valor[]" id=formula_constantes_valor value="{{$valor}}" class="form-control form-control-sm">
    </div>
    <div class="col-sm-1 text-right">
      <button type="button" name="button" id="formula_btnEliminaConstante_{{$rand}}" class="btn btn-sm btn-danger"><i class="fa fa-sm fa-trash"></i></button>
    </div>
    <div class="col-sm-12"><hr></div>
  </div>
</div>

<script>
    document.getElementById( "formula_btnEliminaConstante_{{$rand}}" ).addEventListener( "click" , function( e ) {
        e.preventDefault();
        $( '#contante_{{$rand}}' ).remove();
    });
</script>
