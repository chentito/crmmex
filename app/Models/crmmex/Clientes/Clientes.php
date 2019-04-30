<?php
/*
 * Modelo para el control de la tabla de clientes
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */

namespace App\Models\crmmex\Clientes;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "crmmex_ventas_cliente";
    public $timestamps = false;
}
