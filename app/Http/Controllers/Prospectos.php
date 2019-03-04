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
                "salary"     => "correo1@gmail.com",
                "start_date" => "0447225901744",
                "office"     => "Sabritas SA de CV",
                "extn"       => '<a href="/administracion/edita/"><i class="fas fa-edit"></i></a>'
                              . '<a href="/administracion/datosEmpresa/" class="pl-2"><i class="fas fa-building"></i></a>'
            ) ,
            array(
                "name"       => "Carlos Reyes",
                "position"   => "Desarrollador",
                "salary"     => "correo2@gmail.com",
                "start_date" => "0447222015231",
                "office"     => "Mexagon.net",
                "extn"       => '<a href="/administracion/edita/"><i class="fas fa-edit"></i></a>'
                              . '<a href="/administracion/datosEmpresa/" class="pl-2"><i class="fas fa-building"></i></a>'
            ) ,
            array(
                "name"       => "Juan Linares",
                "position"   => "Gerente",
                "salary"     => "correo5.9660@gmail.com",
                "start_date" => "5578010599",
                "office"     => "UAEMex SA de CV",
                "extn"       => '<a href="/administracion/edita/"><i class="fas fa-edit"></i></a>'
                              . '<a href="/administracion/datosEmpresa/" class="pl-2"><i class="fas fa-building"></i></a>'
            )
        ) );
        
        return response()->json( $prospectos );
    }
}
