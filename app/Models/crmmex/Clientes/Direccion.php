<?php
/*
 * Modelo para el control de la tabla de direccion
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */

namespace App\Models\crmmex\Clientes;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "crmmex_ventas_direccion";
    public $timestamps = false;
}
