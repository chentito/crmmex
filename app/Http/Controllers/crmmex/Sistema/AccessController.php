<?php

namespace App\Http\Controllers\crmmex\Sistema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\crmmex\Sistema\Access AS Access;
use Carbon;

class AccessController extends Controller
{

  // Metodo que registra el acceso al sistema
  public static function accessCRM( $ip , $client ) {
    $acceso = new Access();
    $acceso->userID    =  Auth::user()->id;
    $acceso->accesDate = Carbon::now()->format( 'Y-m-d H:i:s' );
    $acceso->remoteIP  = $ip;
    $acceso->client    = $client;
    $acceso->save();

    //AccessController::accessCRM( request()->ip() , request()->header( 'User-Agent' ) );
  }

}
