<?php
/*
 * Archivo que registra el acceso a las secciones del sistemas
 * @Autor Mexagon.net / Carlos Reyes
 * @Fecha Mayo 2019
 */

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Models\crmmex\Utils\Bitacora AS B;
use Closure;

class Bitacora
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bitacora = new B();
        $bitacora->user_id = Auth::user()->id;
        $bitacora->recurso = Request::capture()->getUri();
        $bitacora->accion  = '';
        $bitacora->fecha   = date( 'Y-m-d H:i:s' );
        $bitacora->save();
        return $next($request);
    }
}
