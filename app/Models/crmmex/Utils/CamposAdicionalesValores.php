<?php

namespace App\Models\crmmex\Utils;

use Illuminate\Database\Eloquent\Model;

class CamposAdicionalesValores extends Model
{
    // Nombre de la tabla
    protected $table = 'crmmex_sis_camposadicionales_valores';

    // Timestamps
    public $timestamps = false;

    // Fillables
    protected $fillable = ['campoAdicionalID','registroID','seccion','valor','status'];

}
