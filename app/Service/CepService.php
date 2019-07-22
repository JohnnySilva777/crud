<?php

namespace App\Service;

use GuzzleHttp\Client;

class CepService
{

    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function obterDadosViaCep($cep)
    {
        try {
            $response = $this->client->get("https://viacep.com.br/ws/{$cep}/json/");
            $logradouro = json_decode($response->getBody(), true);
            return $logradouro['logradouro'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}