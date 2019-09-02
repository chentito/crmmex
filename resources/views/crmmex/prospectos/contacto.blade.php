<input type="hidden" value="{{$adicionales}}" name="adicionales_{{$rand}}" id="adicionales_{{$rand}}">
<div class="col-sm-12" id="contacto_{{$rand}}">
    <div class="row">
        <div class="col-sm-2 my-auto">Contacto adicional</div>
        <div class="col-sm-10"><hr /></div>
    </div>
    <div class="row">
        <div class="col-sm-3 mb-1">
            <label for="contacto_nombre">Nombre(s)</label>
            <input type="text" id="contacto_nombre" name="contacto_nombre[]" class="form-control form-control-sm" value="{{$nom}}" placeholder="Nombre(s)">
            <input type="hidden" id="contacto_idty" name="contacto_idty[]" value="{{$idty}}">
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_paterno">Apellido Paterno</label>
            <input type="text" id="contacto_paterno" name="contacto_paterno[]" class="form-control form-control-sm" value="{{$appat}}" placeholder="Apellido Paterno">
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_materno">Apellido Materno</label>
            <input type="text" id="contacto_materno" name="contacto_materno[]" class="form-control form-control-sm" value="{{$apmat}}" placeholder="Apellido Materno">
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_email">Correo Electrónico</label>
            <input type="text" id="contacto_email" name="contacto_email[]" class="form-control form-control-sm" value="{{$correo}}" placeholder="Correo Electr&oacute;nico">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 mb-1">
            <label for="contacto_celular">No. Celular</label>
            <input type="text" id="contacto_celular" name="contacto_celular[]" class="form-control form-control-sm" value="{{$celular}}" placeholder="Celular">
        </div>
        <input type="hidden" id="contacto_celular_compania" name="contacto_celular_compania[]" value="">
        <div class="col-sm-3 mb-1">
            <label for="contacto_telefono">Teléfono</label>
            <input type="text" id="contacto_telefono" name="contacto_telefono[]" class="form-control form-control-sm" value="{{$tel}}" placeholder="Tel&eacute;fono">
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_extension">Extensión</label>
            <input type="text" id="contacto_extension" name="contacto_extension[]" class="form-control form-control-sm" value="{{$ext}}" placeholder="Extensi&oacute;n">
        </div>
        <div class="col-sm-3 mb-1 text-center my-auto"><button class="btn btn-sm {{$btn}}" id="btnEliminaContacto_{{$rand}}"><i class="fa fa-sm fa-trash"></i></button></div>
    </div>
    <div class="row" id="containerCamposAdicionalesContactos_{{$rand}}"></div>
</div>

<script>
    cargaCamposAdicionales( '4' , JSON.parse( document.getElementById( 'adicionales_{{$rand}}' ).value ) , '{{$rand}}' );
    $( '#btnEliminaContacto_{{$rand}}' ).button().click( function( e ) {
        e.preventDefault();
        $( '#contacto_{{$rand}}' ).remove();
    });
</script>
