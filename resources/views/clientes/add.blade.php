@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adiciona Cliente
                        <a class="float-right" href="{{url('/')}}">Listagem Cliente</a>
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
                        {{ Form::open(['url' => 'clientes/add']) }}
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
        $(document).on('blur', '#cep', function () {
            var cep = $(this).val();
            $('#endereco').attr('readonly', false);
            $.ajax({
                url: baseUrl + '/api/cep/preencheEndereco',
                type: 'POST',
                dataType: 'json',
                data: {cep: cep},
                beforeSend: function () {
                    Swal.fire('Any fool can use a computer');
                },
                success: function (response) {
                    Swal.close();
                    $('#endereco').val(response.logradouro);
                    $('#endereco').attr('readonly', true);
                }
            })
        })
    </script>
@stop
