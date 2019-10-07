<?php

namespace App\Models\crmmex\dashboard;

use Illuminate\Database\Eloquent\Model;

class WidgetsConfig extends Model
{
    // Tabla
    protected $table = 'crmmex_dashboard_widgets_config';

    // Timestamps
    public $timestamps = false;

    // Mass updates
    protected $fillable = ['userID','widgetID','visible','configuracion','orden'];

}
