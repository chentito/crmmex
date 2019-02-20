
<fieldset class="mt-2 pt-2">
    <form>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <label for="conf_smtp_host">Servidor SMTP (host)</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_host" >
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_usuario">Usuario</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_usuario" >
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_passwd">Contrase&ntilde;a</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_passwd" >
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_port">Puerto</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_port" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label for="conf_smtp_security">Seguridad</label>
                    <select class="custom-select custom-select-sm" id="conf_smtp_security">
                        <option>Ninguna</option>
                        <option>TLS</option>
                        <option>SSL</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_from">De</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_from" >
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_copy">Copia</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_copy" >
                </div>
                <div class="col-sm-3">
                    <label for="conf_smtp_passwd">Contrase&ntilde;a</label>
                    <input type="text" class="form-control form-control-sm" id="conf_smtp_passwd" >
                </div>
            </div>
        </div>
        <br />
        <div class="col-xs-1" align="center">
            <button type="button" class="btn btn-sm btn-primary">Probar Conexi&oacute;n</button>
            <button type="button" class="btn btn-sm btn-success disabled">Guardar Configuraci&oacute;n</button>
        </div>
    </form>
</fieldset>
