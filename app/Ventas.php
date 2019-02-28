<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'crmmex_ventas_propuestacomercial';
    
    public function ejecutivos() {
        return $this->belongsToMany( 'App\Admins' );
    }
    
    public function clientes() {
        return $this->belongsToMany( 'App\Cartera' );
    }
    
}
