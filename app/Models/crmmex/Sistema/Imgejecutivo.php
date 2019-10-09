<?php

namespace App\Models\crmmex\Sistema;

use Illuminate\Database\Eloquent\Model;

class Imgejecutivo extends Model
{
    // Nombre de la tabla
    protected $table = 'crmmex_sis_imgejecutivo';

    // Timestamps
    public $timestamps = false;

    // Fillables
    public $fillable = [ 'ejecutivoID' , 'img' , 'mime' ];

    // Llave primaria
    public $primaryKey = 'ejecutivoID';

}
