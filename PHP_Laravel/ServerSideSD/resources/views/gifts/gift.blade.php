@extends('layouts.fo_layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <br>

                <h3>Clica aqui para adicionares novas prendas:</h3>

                <br>
                <a href="{{ route('gifts.add') }}" class="btn btn-secondary">Adicionar novas prendas</a>

                <br>
                <br>
                <h5>Aqui poderás ver os seguintes dados das prendas:</h5>

                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prenda</th>
                                <th scope="col">Valor Previsto(€)</th>
                                <th scope="col">Pessoa de destino</th>
                                <th scope="col">Valor Gasto (€)</th>
                                <th scope="col">Diferença de Valor Previsto e Valor Gasto (€)</th>
                                <th scope="col">Acção ver</th>
                                <th scope="col">Acção editar</th>
                                <th scope="col">Acção apagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gifts as $gift)
                                <tr>
                                    <th scope="row">{{ $gift->id }}</th>
                                    <td>{{ $gift->giftName }}</td>
                                    <td>{{ $gift->valueExpected }}€</td>
                                    <td>{{ $gift->username }}</td>
                                    <td>{{ $gift->valueSpent }}€</td>
                                    <td>{{ $gift->valueExpected - $gift->valueSpent }}€</td>
                                    <td><a class="btn btn-sm btn-success" href="{{ route('onegift', $gift->id) }}">Ver</a></td>
                                    <td><a class="btn btn-sm btn-warning" href="{{ route('gifts.edit', $gift->id) }}">Editar</a></td>
                                    <td><a class="btn btn-sm btn-danger"href="{{ route('gifts.delete', $gift->id) }}">Apagar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
