<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'crmmex_ventas_propuestacomercial';
    
    public function ejecutivo() {
        return $this->hasOne( 'App\Admins' , 'id' );
    }
    
    public function cliente() {
        return $this->hasOne( 'App\Cartera' , 'id' );
    }
    
}
