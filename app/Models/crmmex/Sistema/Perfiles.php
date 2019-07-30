<?php
/*
 * Modelo para la conexion a la tabla de roles
 * @AUtor Mexagon.net / Carlos Reyes
 * @Fecha Junio 2019
 */
namespace App\Models\crmmex\Sistema;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    // Tabla
    protected $table = "crmmex_sis_roles";

    // Timestamps
    public $timestamps = false;
}
