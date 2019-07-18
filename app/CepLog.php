<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CepLog extends Model
{
    protected $fillable = [
        'mensagem',
        'cep',
    ];

    protected $table = 'logs_ceps';
}
