@extends('layouts.fo_layout')

@section('content')
<br>

    <h5>Detalhes da Prenda</h5>
<br>
    <ul>
        <li><strong>Nome da Prenda:</strong> {{ $gift->giftName }}</li>
        <li><strong>Valor Previsto:</strong> {{ $gift->valueExpected }}€</li>
        <li><strong>Valor Gasto:</strong> {{ $gift->valueSpent }}€</li>
        <li><strong>Pessoa de Destino:</strong> {{ $gift->username }}</li>
    </ul>


    <td><a class="btn btn-sm btn-secondary" href="{{ route('gifts') }}">Voltar atrás</a></td>
@endsection
