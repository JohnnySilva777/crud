<?php

namespace App\Http\Controllers\Api;

use App\Jobs\obterEnderecoLog;
use App\Repositories\ClientesRepository;
use App\Cliente;
use App\Service\NumeroService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CepController extends Controller
{
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function obterEndereco(Request $request)
    {
        try {
            $response = $this->client->get("https://viacep.com.br/ws/{$request->cep}/json/");
            $logradouro = \GuzzleHttp\json_decode($response->getBody(), true);

            obterEnderecoLog::dispatch($request->cep, 'Encontrado');
            return response($logradouro['logradouro'], 200);

        } catch (\Exception $e) {
            obterEnderecoLog::dispatch($request->cep, $e->getMessage());
            return response('', 500);
        }
    }
}
