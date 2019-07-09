<?php

namespace App\Models\crmmex\Mercadotecnia;

use Illuminate\Database\Eloquent\Model;

class Listas extends Model
{
    // Tabla
    protected $table = "crmmex_camp_audiencias";

    // Timestamps
    public $timestamps = false;

    public function contactos() {
        return $this->hasMany( 'App\Models\crmmex\Mercadotecnia\ListasContactos' , 'audienciaID' );
    }
}
