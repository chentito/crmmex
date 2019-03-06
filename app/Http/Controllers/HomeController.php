<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $secciones = array(
            array( 'path' => '/prospectos'      , 'nombre' => 'Prospectos' ),
            array( 'path' => '/clientes'        , 'nombre' => 'Clientes' ),
            array( 'path' => '/ventas'          , 'nombre' => 'Ventas' ),
            array( 'path' => '/productos'       , 'nombre' => 'Productos/Servicios' ),
            array( 'path' => '/mercadotecnia'   , 'nombre' => 'Mercadotecnia' ),
            array( 'path' => '/reportes'        , 'nombre' => 'Reportes' ),
            array( 'path' => '/configuraciones' , 'nombre' => 'Configuraciones' )
        );

        /*return view('home2')->with([
            'secciones' => $secciones
        ]);*/
        return view('home2');
    }
}
