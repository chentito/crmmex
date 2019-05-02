<?php
/*
 * Modelo para el control de los seguimientos
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Models\crmmex\Clientes;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    //
    protected $table = 'crmmex_clientes_seguimiento';
    public $timestamps = false;
}
