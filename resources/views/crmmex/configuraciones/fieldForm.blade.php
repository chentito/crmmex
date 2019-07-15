<div class="col-sm-12 mt-1" id="campoForm_{{$rand}}">
  <div class="row">
    <div class="col-sm-3">
      <input type="text" name="formularios_nombreCampo[]" id="formularios_nombreCampo" value="" class="form-control form-control-sm formularios_nombreCampo_dinamico" placeholder="Nombre del campo" maxlength="50">
    </div>
    <div class="col-sm-2">
      <select class="custom-select custom-select-sm formularios_tipoCampo_dinamico" name="formularios_tipoCampo[]" id="formularios_tipoCampo">
          <option value="1">Texto libre</option>
          <option value="2">Listado</option>
          <option value="3">Multiples opciones</option>
      </select>
    </div>
    <div class="col-sm-2">
      <select class="custom-select custom-select-sm formularios_oblCampo_dinamico" name="formularios_oblCampo[]" id="formularios_oblCampo">
        <option value="1">Opcional</option>
        <option value="2">Obligatorio</option>
      </select>
    </div>
    <div class="col-sm-4 text-center">
        <input type="text" placeholder="Valores" name="formularios_valoresCampo[]" id="formularios_valoresCampo" class="form-control form-control-sm formularios_valoresCampo_dinamico">
    </div>
    <div class="col-sm-1 text-center">
        <button type="button" class="btn btn-danger" id="formularios_btnEliminaCampoForm_{{$rand}}"><i class="fa fa-sm fa-trash"></i></button>
    </div>
  </div>
</div>

<script>
    document.getElementById( "formularios_btnEliminaCampoForm_{{$rand}}" ).addEventListener( "click" , function( e ) {
        e.preventDefault();
        $( '#campoForm_{{$rand}}' ).remove();
    });
</script>
