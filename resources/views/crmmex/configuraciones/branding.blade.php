<div class="row"> 
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-dark" onclick="return cambiaTema(1);">Tema Obscuro</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-primary" onclick="return cambiaTema(2);">Tema Azul 1</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-light" onclick="return cambiaTema(3);">Tema Gris</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-info" onclick="return cambiaTema(4);">Tema Azul 2</button></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-danger" onclick="return cambiaTema(5);">Tema Rojo</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-warning" onclick="return cambiaTema(6);">Tema Amarillo</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-success" onclick="return cambiaTema(7);">Tema Verde</button></div>
            <div class="col-sm-3 text-center mb-1"><button class="btn btn-white" onclick="return cambiaTema(8);">Tema Blanco</button></div>
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
</script>