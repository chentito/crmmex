<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactosController extends Controller
{
    
    public function listadoContactos() {
        //$arrContactos = array();
        
        $arrContactos = array(
            array(
                'id'       => 1,
                'nombre'   => 'Carlos Reyes Salazar',
                'correo'   => 'cvreyes@mexagon.net',
                'telefono' => '5578100961',
                'area'     => 'Desarrollo',
                'puesto'   => 'Programador',
                'opts'     => '<a href="/prospectos/contactos/edita/1"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 2,
                'nombre'   => 'José Guitérrez García',
                'correo'   => 'jgutierrez@mexagon.net',
                'telefono' => '7222596355',
                'area'     => 'Desarrollo',
                'puesto'   => 'Programador',
                'opts'     => '<a href="/prospectos/contactos/edita/2"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 3,
                'nombre'   => 'Carlos Lam Santiesteban',
                'correo'   => 'jlam@mexagon.net',
                'telefono' => '558963222',
                'area'     => 'Ventas',
                'puesto'   => 'Ejecutivo Comercial',
                'opts'     => '<a href="/prospectos/contactos/edita/3"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 4,
                'nombre'   => 'Carlos Lam Santiesteban',
                'correo'   => 'jlam@mexagon.net',
                'telefono' => '558963222',
                'area'     => 'Ventas',
                'puesto'   => 'Ejecutivo Comercial',
                'opts'     => '<a href="/prospectos/contactos/edita/3"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 5,
                'nombre'   => 'Carlos Lam Santiesteban',
                'correo'   => 'jlam@mexagon.net',
                'telefono' => '558963222',
                'area'     => 'Ventas',
                'puesto'   => 'Ejecutivo Comercial',
                'opts'     => '<a href="/prospectos/contactos/edita/3"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 6,
                'nombre'   => 'Carlos Lam Santiesteban',
                'correo'   => 'jlam@mexagon.net',
                'telefono' => '558963222',
                'area'     => 'Ventas',
                'puesto'   => 'Ejecutivo Comercial',
                'opts'     => '<a href="/prospectos/contactos/edita/3"><i class="fas fa-edit"></i></a>'
            ),
            array(
                'id'       => 7,
                'nombre'   => 'Carlos Lam Santiesteban',
                'correo'   => 'jlam@mexagon.net',
                'telefono' => '558963222',
                'area'     => 'Ventas',
                'puesto'   => 'Ejecutivo Comercial',
                'opts'     => '<a href="/prospectos/contactos/edita/3"><i class="fas fa-edit"></i></a>'
            )
        );
        
        return response()->json( $arrContactos );
    }
    
    
}
