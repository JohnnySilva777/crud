@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listagem de Clientes
                        <a class="float-right" href="{{url('clientes/novo')}}">Novo Cliente</a>
                    </div>

                    <div class="card-body">
                        @if(Session::has('excluido'))
                            <div class="alert alert-success">{{Session::get('excluido')}}</div>
                        @elseif(Session::has('mensagem_erro'))
                            <div class="alert alert-error">{{Session::get('mensagem_erro')}}</div>
                        @elseif(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <th width="10%">Id</th>
                                <th width="20%">Nome</th>
                                <th width="30%">Endereço</th>
                                <th width="10%">Número</th>
                                <th width="15%">Editar</th>
                                <th width="15%">Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nome}}</td>
                                    <td>{{$cliente->endereco}}</td>
                                    <td>{{$cliente->numero}}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{route('clientesEditar', $cliente->id)}}" data-toggle="tooltip"
                                               title="Editar"><i class="mdi mdi-pencil"></i>Editar</a>
                                        </div>
                                    </td>
                                    <td>
                                        {{Form::open(['method' => 'DELETE', 'route' => ['clientesExcluir', $cliente->id]])}}
                                        <button class="btn btn-outline-danger btn-icon"
                                                onclick="return confirm('Realmente deseja excluir ?');">
                                            Excluir
                                        </button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row text-center">
                            <div class="col-md-12" style="margin-left: 40%;">
                                {{  $clientes->links()  }}
                            </div>
                            <div class="col-md-12">
                                Página {{$clientes->currentPage()}} de {{$clientes->lastPage()}},
                                mostrando {{$clientes->count()}} de {{$clientes->total()}} no total
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection