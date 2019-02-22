<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prospectos extends Controller
{
    /*
     * Regresa el arreglo de prospectos
     */
    public function listado() {
        $prospectos = array( 'prospectos' => array(
            array(
                "name"       => "José Guitérrez",
                "position"   => "Desarrollador",
                "salary"     => "$320,800",
                "start_date" => "2011/04/25",
                "office"     => "Romerolandia",
                "extn"       => ""
            ) ,
            array(
                "name"       => "Carlos Reyes",
                "position"   => "Achichincle",
                "salary"     => "$320,800",
                "start_date" => "2011/04/25",
                "office"     => "Toluca",
                "extn"       => "310"
            ) ,
            array(
                "name"       => "Juan Linares",
                "position"   => "Gerente",
                "salary"     => "$1,000,800",
                "start_date" => "2011/04/25",
                "office"     => "Santa Ana",
                "extn"       => "5025"
            ) 
            
        ) );
        
        return response()->json( $prospectos );
    }
}
