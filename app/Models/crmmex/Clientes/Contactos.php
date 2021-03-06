<?php
/*
 * Modelo para el control de la tabla de contactos
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Abril 2019
 */

namespace App\Models\crmmex\Clientes;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    protected $table = "crmmex_ventas_contacto";
    public $timestamps = false;

    protected $fillable = [
                           'clienteID',
                           'nombre',
                           'apellidoPaterno',
                           'apellidoMaterno',
                           'correoElectronico',
                           'celular',
                           'compania',
                           'telefono',
                           'extension',
                           'area',
                           'puesto',
                           'status',
                           'fechaAlta',
                           'fechaEdicion',
                           'ejecutivoAlta',
                           'ejecutivo'
                         ];

}
