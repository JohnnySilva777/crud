{{ Form::label('nome', 'Nome*') }}
{{ Form::text('nome', null, ['class' => 'form-control', 'required', 'placeholder' => 'Preencha com seu nome']) }}
{{ Form::label('cep', 'Cep') }}
{{ Form::text('cep', null, ['class' => 'form-control', 'placeholder' => 'Preencha com seu cep']) }}
{{ Form::label('numero', 'Número') }}
{{ Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Preencha com seu numero']) }}
{{ Form::label('endereco', 'Endereço*') }}
{{ Form::text('endereco', null, ['class' => 'form-control', 'required', 'placeholder' => 'Preencha com seu endereço']) }}
{{ Form::submit('Salvar', ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px; width: 100%']) }}