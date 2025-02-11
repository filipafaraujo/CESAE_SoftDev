@extends('layouts.fo_layout')
@section('content')
    <h5>Olá, podes adicionar tarefas</h5>
    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required aria-describedby="emailHelp">
            @error('name')
                Nome da tarefa inválido
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Descricao</label>
            <input type="text" name="descricao" class="form-control" aria-describedby="emailHelp">
            @error('descricao')
                Descrição inválida
            @enderror
        </div>
        <label  class="form-label">Selecione o utilizador</label>
        <select class="form-select" name= "user_id" required>

            <option value = "" disabled selected>Selecione o utilizador</option>

            @foreach ($users as $user)
                <option value=userid> {{$user->name}}</option>
            @endforeach

        @error('user_id')
            Selecção inválida
        @enderror
        </div>


    </select>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
