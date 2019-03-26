
<div class="container pt-3">
    <form method="get" action="/administracion/guardaAdmin">
        <input type="hidden" id="admin_altaAdmin_id" name="admin_altaAdmin_id" value="0" >
        <div class="form-group row">
            <div class="col-4">
                <label for="admin_altaAdmin_nombre">Nombre(s):</label>
                <input type="texto" id="admin_altaAdmin_nombre" name="admin_altaAdmin_nombre" class="form-control form-control-sm" >
            </div>
            <div class="col-4">
                <label for="admin_altaAdmin_apPaterno">Ap. Paterno:</label>
                <input type="texto" id="admin_altaAdmin_apPaterno" name="admin_altaAdmin_apPaterno" class="form-control form-control-sm" >
            </div>
            <div class="col-4">
                <label for="admin_altaAdmin_apMaterno">Ap. Materno:</label>
                <input type="texto" id="admin_altaAdmin_apMaterno" name="admin_altaAdmin_apMaterno" class="form-control form-control-sm" >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <label for="admin_altaAdmin_email">Email:</label>
                <input type="texto" id="admin_altaAdmin_email" name="admin_altaAdmin_email" class="form-control form-control-sm" >
            </div>
            <div class="col-4">
                <label for="admin_altaAdmin_extension">Extensi&oacute;n:</label>
                <input type="texto" id="admin_altaAdmin_extension" name="admin_altaAdmin_extension" class="form-control form-control-sm" >
            </div>
            <div class="col-4">
                <label for="admin_altaAdmin_rol">Rol:</label>
                <select id="admin_altaAdmin_rol" name="admin_altaAdmin_rol" class="form-control form-control-sm">
                    <option value="1">Administrador</option>
                    <option value="2">Vendedor</option>
                    <option value="3">Otro</option>
                </select>
            </div>
        </div>
        <div class="col-xs-1 pt-2" align="center">
            <button type="submit" class="btn btn-success btn-sm">Guardar Datos</button>
        </div>
    </form>
</div>
