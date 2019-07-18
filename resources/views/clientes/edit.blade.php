@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adiciona Cliente
                        <a class="float-right" href="{{url('/clientes')}}">Listagem Cliente</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                        @endif
                        {{ Form::model($cliente) }}
                            @include('clientes.blocks.config')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('mouseout', '#numero', function () {
                var cep = $(this).val();
                $.ajax({
                    url: baseUrl + '/api/cep/preencheEndereco',
                    type: 'POST',
                    data: { cep: cep },
                    success: function (data) {
                        if(data.status == '200'){
                            console.log(data);
                            $('#endereco').val(data.logradouro)
                        }
                    }
                })
            })
        })
    </script>
@stop
