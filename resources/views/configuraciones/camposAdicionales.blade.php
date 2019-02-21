
<fieldset class="mt-2 pt-2">
    <form>
        <div class="container">
            <div class="row">
                <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                    <label for="exampleFormControlSelect1" class="border-bottom">Campos Adicionales</label>
                    <select multiple="" class="form-control form-control-sm" id="exampleFormControlSelect1">
                        <option>RFC</option>
                        <option>R&eacute;gimen Fiscal</option>
                        <option>Colonia</option>
                        <option>ID Cliente</option>
                        <option>Usuario Webservice</option>
                        <option>Contrase&ntilde;a Webservice</option>
                    </select>
                    <small id="exampleFormControlSelect1" class="form-text text-muted">
                        Doble clic para editar un campo
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="card ml-1 mt-1 mb-1 pb-1 col-sm">
                    <label class="border-bottom">Agregar un nuevo campo:</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="conf_datosAdicionales_nombre">Nombre del campo</label>
                            <input id="conf_datosAdicionales_nombre" type="text" class="form-control form-control-sm" >
                        </div>
                        <div class="col-sm-4">
                            <label for="conf_datosAdicionales_tipoDato">Tipo de dato</label>
                            <select id="conf_datosAdicionales_tipoDato" class="form-control form-control-sm">
                                <option>Num&eacute;rico entero</option>
                                <option>Num&eacute;rico flotante</option>
                                <option>Alfanum&eacute;rico</option>
                                <option>Alfabetico</option>
                                <option>Fecha</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="conf_datosAdicionales_seccion">Secci&oacute;n</label>
                            <select id="conf_datosAdicionales_seccion" class="form-control form-control-sm">
                                <option>Prospectos/Alta</option>
                                <option>Prospectos/Edici&oacute;n</option>
                                <option>Clientes/Alta</option>
                                <option>Clientes/Edici&oacute;n</option>
                                <option>Productos/Alta</option>
                                <option>Productos/Edici&oacute;n</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-4">
                            <label for="conf_datosAdicionales_obligatorio">Obligatorio</label>
                            <input id="conf_datosAdicionales_obligatorio" type="checkbox" class="form-control form-control-sm" >
                        </div>
                        <div class="col-sm-4">
                            <label for="conf_datosAdicionales_validacion">Validaci&oacute;n (Expresi&oacute;n Regular)</label>
                            <input id="conf_datosAdicionales_validacion" type="text" class="form-control form-control-sm" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="col-xs-1" align="center">
            <button type="button" class="btn btn-sm btn-success">Guardar Campo</button>
        </div>
    </form>
</fieldset>