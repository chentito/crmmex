<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    //
    protected $table = 'crmmex_sis_cat';

    public function opciones() {
        return $this->hasMany( 'App\Models\OpcionesCat' , 'idCat' );
    }
}
