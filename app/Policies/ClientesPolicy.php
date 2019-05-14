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
        return $user->id == $cliente->ejecutivo;
     }

}
