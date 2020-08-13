<?php

namespace App\Repositories;

use App\Client;
use Illuminate\Support\Facades\DB;

class ClientRepository extends Client
{
    public static function buscar(string $valor = null)
    {
        $cliente = Client::where('nome', 'LIKE', "%$valor%")->paginate(10);
        return $cliente;
    }    
}
