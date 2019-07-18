<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'numero',
        'cep'
    ];

    protected $table = 'clientes';
}
