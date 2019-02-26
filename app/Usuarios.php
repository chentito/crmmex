<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    
    protected $fillable = [
        'nombres',
        'appat',
        'apmat',
        'email',
        'extension',
        'rol'
    ];

    
    protected $table = 'crmmex_sis_admins';
    public $timestamps = false;
}

