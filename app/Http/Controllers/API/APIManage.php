<?php
/*
 * Controlador que administra y concede los accesoa
 * al API crm
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Controllers\API;

use Validator;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Notifications\SignupActivate;

class APIManage extends Controller
{

    private $errores = null;

    /*
     * Metodo que agrega un nuevo usuario
     */
    public function addUser( Request $request ) {
        // No permite el alta de usuarios a traves de api.
        return response()->json([ 'message' => 'No autorizado'] , 401 );
        if( !$this->valRequest( $request ) ) {
          //$error = $this->errores->messages->all();
          return response()->json( [ 'message' => 'Error en los datos, verifique la especificacion' ] , 200 );
        } else {
          $user = new User([
              'name'             => $request->name,
              'email'            => $request->email,
              'password'         => bcrypt( $request->password ),
              'activation_token' => str_random(60),
          ]);
          $user->save();
          //$user->notify(new SignupActivate($user));
          return response()->json([ 'message' => 'Usuario creado'] , 201 );
        }
    } // Fin metodo

    /*
     * Metodo que regresa un token de acuerdo a una solicitud
     * por un usuario valido
     */
     public function getToken( Request $request ) {
        if( !$this->valRequest( $request ) ) {
            $credentials = request(['email', 'password']);
            $credentials['active'] = 1;
            $credentials['deleted_at'] = null;

            if (!Auth::attempt($credentials)) {
                return response()->json( [ 'message' => 'Usuario no autorizado' ] , 401 );
            }

            $user        = $request->user();
            $tokenResult = $user->createToken( $user->name );
            $token       = $tokenResult->token;

            if ( $request->remember_me ) {
                $token->expires_at = Carbon::now()->addDays( 1 );
            }
            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString(),
            ]);

        } else {
            $error = $this->errores->messages->all();
            return response()->json( [ 'message' => 'Error en los datos, verifique la especificacion' ] , 200 );
        }
     } // Fin del metodo

     /*
      * Metodo que revoca un token previamente generado.
      */
      public function delToken( Request $request ) {
        $request->user()->token()->revoke();
        return response()->json( [ 'message' => 'Token eliminado' ] );
      }// Fin del metodo

      /*
       * Metodo que activa la cuenta crada
       */
       public function signupActivate( $token ) {
          $user = User::where( 'activation_token' ,  $token )->first();

          if (!$user) {
              return response()->json(['message' => 'El token de activación es inválido'], 404);
          }

          $user->active = true;
          $user->activation_token = '';
          $user->save();

          return $user;
       }

      /*
       * Validacion de los datos de request
       */
      private function valRequest( Request $request ) {
       $validacion = Validator::make( $request->all() , [
         'name'        => 'required|string|max:100',
         'email'       => 'required|string|email|unique:users',
         'password'    => 'required|string|confirmed',
         'remember_me' => 'boolean'
       ]);

       if( $validacion->fails() ) {
            $this->errores = $validacion;
            return false;
          } else {
            return true;
       }
     }// Fin del metodo

}
