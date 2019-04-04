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
            </div>
        </div>
    </div>
</div>

<script>
    function cambiaTema( idT ) {
        axios( '/setTema/' + idT )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }
    function cambiaFondo( imagen ) {
        axios( '/setImagen/' + imagen )
            .then( datos => {
                location.reload();
            })
            .catch( err => {
                console.error(err);
            });
    }
</script>