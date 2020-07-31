<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'email',
        'contato',
        'endereco'
    ];
}
