<?php
/*
 * Modelo para el control de la tabla de facturas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Models\crmmex\Ventas;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table   = 'crmmex_ventas_facturas';
    public $timestamps = false;
}
