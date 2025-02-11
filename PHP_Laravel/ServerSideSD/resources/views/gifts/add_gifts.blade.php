@extends('layouts.fo_layout')
@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

    <br>
    <h5>Podes adicionar prendas aqui:</h5>
    <br>
    <form method="POST" action="{{ route('gifts.create') }}">
        @csrf

        <select class="form-select" name= "user_id" aria-label="Default select example">

            <option selected>Selecione o utilizador</option>

            @foreach ($users as $user)
                <option value={{ $user->id }}> {{ $user->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="campoTexto1" class="form-label">Prenda</label>
            <input type="text" name= "giftName" class="form-control" id="campoTexto1" placeholder="Insira texto aqui"
                aria-describedby="emailHelp">
            @error('giftName')
                <div class="text-danger">Nome da prenda inválido</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="campoValor1" class="form-label">Valor Previsto(€)</label>
            <div class="input-group">
                <span class="input-group-text">€</span>
                <input type="number" name= "valueExpected" class="form-control" id="campoValor1"
                    placeholder="Insira um valor" aria-describedby="emailHelp">
                @error('valueExpected')
                    <div class="text-danger">Valor previsto inválido</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="campoValor2" class="form-label">Valor Gasto (€)</label>
            <div class="input-group">
                <span class="input-group-text">€</span>
                <input type="number" name= "valueSpent" class="form-control" id="campoValor2" placeholder="Insira um valor"
                    aria-describedby="emailHelp">
            </div>
            @error('valueSpent')
                <div class="text-danger">Valor Gasto inválido</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>

        @error('user_id')
            <div class="text-danger">Selecção inválida</div>
        @enderror
    </form>

<br>


    <td><a class="btn btn-sm btn-secondary" href="{{ route('gifts') }}">Voltar atrás</a></td>

@endsection
