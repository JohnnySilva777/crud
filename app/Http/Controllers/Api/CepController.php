<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ObterCepRequest;
use App\Jobs\obterEnderecoLog;
use App\Http\Controllers\Controller;
use App\Service\CepService;

class CepController extends Controller
{
    public $cepService;

    public function __construct(CepService $cepService)
    {
        $this->cepService = $cepService;
    }

    public function obterEndereco(ObterCepRequest $request)
    {
        try {
            $logradouro = $this->cepService->obterDadosViaCep($request->cep);
            obterEnderecoLog::dispatch($request->cep, 'Cep encontrado');
            return response()->json(['logradouro' => $logradouro], 200);

        } catch (\Exception $e) {
            obterEnderecoLog::dispatch($request->cep, $e->getMessage());
            return response()->json($e->getMessage(), 400);
        }
    }
}
