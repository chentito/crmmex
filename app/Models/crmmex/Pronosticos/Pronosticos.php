<?php

namespace App\Models\crmmex\Pronosticos;

use Illuminate\Database\Eloquent\Model;

class Pronosticos extends Model
{
  // Tabla
  protected $table = 'crmmex_ventas_pronostico';

  // Timestamps
  public $timestamps = false;

  protected $fillable = ['mes', 'anio', 'cantidad' , 'importe' , 'status'];

}
