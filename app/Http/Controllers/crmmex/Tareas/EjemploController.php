<?php

namespace App\Http\Controllers\crmmex\Tareas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\crmmex\Sistema\PHPMailerController AS Mail;

class EjemploController extends Controller
{
    //
    public static function envioTest() {
      Mail::envioCalendarizado();
    }
}
