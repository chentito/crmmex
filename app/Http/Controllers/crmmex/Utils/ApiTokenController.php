<?php

namespace App\Http\Controllers\crmmex\Utils;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiTokenController extends Controller
{
    /*
     * Metodo para generar el token a utilizar dentro de la aplicacion
     * para poder consumir los recurdos de la API
     */
    public function getTokenWeb() {
       $user        = Auth::user();
       $tokenResult = $user->createToken( $user->name );
       $token       = $tokenResult->token;
       $token->expires_at = Carbon::now()->addWeeks( 1 );
       $token->save();
       return response()->json(
         array( 'apiToken' => $tokenResult->accessToken )
       );
    }

}
