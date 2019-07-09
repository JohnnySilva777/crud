<?php

namespace App\Http\Controllers;

use App\Repositories\ClientesRepository;
use App\Cliente;
use App\Service\NumeroService;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $cliente;

    public function __construct(ClientesRepository $clientesRepository)
    {
        $this->cliente = $clientesRepository;
    }

    public function index()
    {
        $clientes = Cliente::paginate(4);
        return view('clientes.lista', ['clientes' => $clientes]);
    }

    public function novo()
    {
        return view('clientes.add');
    }

    public function salvar(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = [];
            $data = $request->all();
            if(empty($request->numero)){
                $service = new NumeroService();
                $numero = $service->geraNumero();
                $data['numero'] = $numero;
            }
            if (Cliente::create($data)) {
                \Session::flash('mensagem_sucesso', 'Cliente cadastrado com sucesso');
                return view('clientes.add');
            } else {
                \Session::flash('mensagem_erro', 'Não foi possível realizar a requisição');
                return redirect()->route('clientes');
            }
        }

        return view('clientes.add');
    }

    public function editar(Request $request, $id)
    {
        $cliente = $this->cliente->model()->find($id);

        if ($request->isMethod('post')) {
            $cliente->fill($request->all());
            if ($cliente->save()) {
                \Session::flash('mensagem_sucesso', 'Cliente editado com sucesso');
                return redirect()->route('clientes');
            } else {
                \Session::flash('mensagem_erro', 'Não foi possível realizar a requisição');
                return redirect()->route('clientes');
            }
        }

        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function excluir($id)
    {
        $cliente = $this->cliente->model()->find($id);

        if ($cliente->delete()) {
            \Session::flash('mensagem_sucesso', 'Cliente excluido com sucesso');
            return redirect()->route('clientes');
        } else {
            \Session::flash('mensagem_erro', 'Não foi possível realizar a requisição');
            return redirect()->route('clientes');
        }
    }
}
