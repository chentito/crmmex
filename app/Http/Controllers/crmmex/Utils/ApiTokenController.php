<?php
/*
 * Controlador para la creacion de token para uso de la api desde el sistema
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Julio 2019
 */
namespace App\Http\Controllers\crmmex\Utils;

use Session;
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

    session( [ 'apiToken' , $tokenResult->accessToken ] );

    return response()->json(
      array( 'apiToken' => $tokenResult->accessToken )
    );
  }

}
