<?php

namespace App\Policies;

use App\User;
use App\Models\crmmex\Clientes\Clientes;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientesPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*
     * Verifica que el cliente a editar pertenezca al usuario
     */
     public function revisaCliente( User $user , Clientes $cliente ) {
       trigger_error("el user id es ".$user->id."  y el id del ejecutivo para el cliente es " . $cliente->ejecutivo):
        return $user->id == $cliente->ejecutivo;
     }

}
