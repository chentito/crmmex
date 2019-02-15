<br />
<fieldset class="border p-2">
    <form>
        <div class="form-group row">
            <div class="form-group col-sm-4">
                <label for="usuarios_info_nombreUsuario">Nombre</label>
                <input type="text" value="{{ $nombreUsuario }}" class="form-control form-control-sm" id="usuarios_info_nombreUsuario" aria-describedby="usuarioAyuda" placeholder="Nombre del usuario">
            </div>
            <div class="form-group col-sm-4">
                <label for="usuarios_info_nombreUsuario">Usuario</label>
                <input type="email" value="{{ $emailUsuario }}" class="form-control form-control-sm" id="usuarios_info_nombreUsuario" aria-describedby="usuarioAyuda" placeholder="Nombre del usuario">
            </div>
            <div class="form-group col-sm-4">
                <label for="usuarios_info_nombreUsuario">Contrase&ntilde;a</label>
                <input type="password" value="" class="form-control form-control-sm" id="usuarios_info_nombreUsuario" aria-describedby="usuarioAyuda" placeholder="Nombre del usuario">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-sm-4">
                <label for="usuarios_info_nombreUsuario">Nombre del usuario</label>
                <input type="text" value="{{ $nombreUsuario }}" class="form-control form-control-sm" id="usuarios_info_nombreUsuario" aria-describedby="usuarioAyuda" placeholder="Nombre del usuario">
            </div>
        </div>
        <div class="col-xs-1" align="center">
            <button type="button" class="btn btn-success">Actualizar Informaci&oacute;n</button>
        </div>
    </form>
</fieldset>
