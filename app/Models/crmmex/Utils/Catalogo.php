<?php

namespace App\Models\crmmex\Utils;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    //
    protected $table = 'crmmex_sis_cat';
    public $timestamps = false;

    public function opciones() {
        return $this->hasMany( 'App\Models\crmmex\Utils\OpcionesCat' , 'idCat' );
    }
}
