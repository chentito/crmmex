<div class="col-sm-12" id="contacto_{{$rand}}">
    <div class="row">
        <div class="col-sm-2 my-auto">Contacto adicional</div>
        <div class="col-sm-10"><hr /></div>
    </div>
    <div class="row">
        <div class="col-sm-3 mb-1">
            <label for="contacto_nombre">Nombre(s)</label>
            <input type="text" id="contacto_nombre" name="contacto_nombre[]" class="form-control form-control-sm" value="{{$nom}}" placeholder="Nombre(s)">
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
        <div class="col-sm-3 mb-1">
            <label for="contacto_celular_compania">Compañia</label>
            <select id="contacto_celular_compania" name="contacto_celular_compania[]" class="custom-select custom-select-sm">
                <option value="1" @if($compania=="1")selected="selected"@endif>AT&T</option>
                <option value="2" @if($compania=="2")selected="selected"@endif>Telcel</option>
                <option value="3" @if($compania=="3")selected="selected"@endif>Unefon</option>
                <option value="4" @if($compania=="4")selected="selected"@endif>Movistar</option>
            </select>
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_telefono">Teléfono</label>
            <input type="text" id="contacto_telefono" name="contacto_telefono[]" class="form-control form-control-sm" value="{{$tel}}" placeholder="Tel&eacute;fono">
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_extension">Extensión</label>
            <input type="text" id="contacto_extension" name="contacto_extension[]" class="form-control form-control-sm" value="{{$ext}}" placeholder="Extensi&oacute;n">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 mb-1">
            <label for="contacto_area">Área</label>
            <select id="contacto_area" name="contacto_area[]" class="custom-select custom-select-sm">
                <option value="1" @if($area=="1")selected="selected"@endif>Finanzas</option>
                <option value="2" @if($area=="2")selected="selected"@endif>Ventas</option>
                <option value="3" @if($area=="3")selected="selected"@endif>TI</option>
                <option value="4" @if($area=="4")selected="selected"@endif>Administraci&oacute;n</option>
                <option value="5" @if($area=="5")selected="selected"@endif>Recursos Humanos</option>
            </select>
        </div>
        <div class="col-sm-3 mb-1">
            <label for="contacto_puesto">Puesto</label>
            <input type="text" id="contacto_puesto" name="contacto_puesto[]" class="form-control form-control-sm" value="{{$puesto}}" placeholder="Puesto">
        </div>
        <div class="col-sm-3 mb-1"></div>
        <div class="col-sm-3 mb-1 text-center my-auto"><button class="btn btn-sm {{$btn}}" id="btnEliminaContacto_{{$rand}}"><i class="fa fa-sm fa-trash"></i></button></div>
    </div>
</div>

<script>
    $( '#btnEliminaContacto_{{$rand}}' ).button().click( function( e ) {
        e.preventDefault();
        $( '#contacto_{{$rand}}' ).remove();
    });
</script>
