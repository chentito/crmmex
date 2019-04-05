<div class="row">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header"><h6>Temas Disponibles</h6></div>
            <div class="card-body">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-dark btn-block" onclick="return cambiaTema(1);">Tema Obscuro</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-primary btn-block" onclick="return cambiaTema(2);">Tema Azul 1</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-light btn-block" onclick="return cambiaTema(3);">Tema Gris</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-info btn-block" onclick="return cambiaTema(4);">Tema Azul 2</button></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-danger btn-block" onclick="return cambiaTema(5);">Tema Rojo</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-warning btn-block" onclick="return cambiaTema(6);">Tema Amarillo</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-success btn-block" onclick="return cambiaTema(7);">Tema Verde</button></div>
                        <div class="col-sm-3 text-center mb-1"><button class="btn btn-white btn-block" onclick="return cambiaTema(8);">Tema Blanco</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-sm-12">
        <div class="card card-small">
            <div class="card-header"><h6>Imágen de Fondo</h6></div>
            <div class="card-body">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-sm-3 text-center mb-1">
                            <img src="{{asset( 'imgs/background/ciudad.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'ciudad.jpg' );">
                        </div>
                        <div class="col-sm-3 text-center mb-1">
                            <img src="{{asset( 'imgs/background/salajuntas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'salajuntas.jpg' );">
                        </div>
                        <div class="col-sm-3 text-center mb-1">
                            <img src="{{asset( 'imgs/background/edificios.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'edificios.jpg' );">
                        </div>
                        <div class="col-sm-3 text-center mb-1">
                            <img src="{{asset( 'imgs/background/plumas.jpg' )}}" style="cursor: pointer" width="150px" class="img-thumbnail" onclick="return cambiaFondo( 'plumas.jpg' );">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-sm-6 text-center">
                            <button class="btn btn-sm {{$btn}}" onclick="return quitaImagen();">Quitar imágen de fondo</button>
                        </div>
                        <div class="col-sm-6">
                            Transparencia
                            <div class="input-group mb-3">
                                <input type="number" min="1" max="10" id="transparenciaValor" class="form-control form-control-sm" value="{{$trans}}" placeholder="Transparencia" aria-label="Transparencia" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-sm {{$btn}}" type="button" id="button-addon2" onclick="return guardaTransparencia()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-sm-12 float-right">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Imágen</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Seleccione</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cambiaTema( idT ) {
        axios( '/setTema/' + idT )
            .then( datos => { location.reload(); })
            .catch( err => { console.error(err); });
    }
    function cambiaFondo( imagen ) {
        axios( '/setImagen/' + imagen )
            .then( datos => { location.reload(); })
            .catch( err => { console.error(err); });
    }
    function quitaImagen() {
        axios( '/quitaImagen/' )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }
    function guardaTransparencia() {
        valor = $( '#transparenciaValor' ).val();
        axios( '/guardaTrans/' + valor )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }
</script>
