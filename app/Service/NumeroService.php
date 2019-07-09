<?php

namespace App\Service;

class NumeroService
{

    public function geraNumero()
    {
        return rand(0, 100);
    }
}