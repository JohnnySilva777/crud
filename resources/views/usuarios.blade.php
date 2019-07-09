@if($checagem == true)
    {{$texto}}]
@else
    <span>Ola</span>
@endif

@foreach($usuarios as $usuario)
    {{$usuario}} <br/>
@endforeach