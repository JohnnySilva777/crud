<?php

namespace App\Repositories;
use App\Cliente;

/**
 * Class ClientesRepository.
 */
class ClientesRepository extends BaseRepository
{
    public $model;

    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
}