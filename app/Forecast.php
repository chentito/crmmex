<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Forecast extends Model
{
    // Obtiene listado de ejecutivos disponibles
    public function listaEjecutivos() {
        $ejecutivos = DB::select( 'SELECT * FROM crmmexagon.crmmex_sis_admins WHERE status=1' );
        return $ejecutivos;
    }
}
