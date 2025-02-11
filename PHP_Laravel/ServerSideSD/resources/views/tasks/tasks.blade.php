@extends('layouts.fo_layout')
@section('content')
    {{-- <h5>Olá, aqui podes ver as tarefas dos alunos.</h5> --}}

    {{-- <h6>Lista de tarefas:</h6> --}}
    {{-- <ul> --}}
    {{-- @foreach ($tasks as $task) --}}
    {{-- <li> {{$task['name']}} - {{$task['task']}}</li> --}}
    {{-- @endforeach --}}
    {{-- </ul> --}}


    {{-- <h6>Lista de tarefas disponíveis:</h6> --}}
    {{-- <ul> --}}
    {{-- @foreach ($availableTasks as $availableTask) --}}
    {{-- <li> {{$availableTask}}</li> --}}
    {{-- @endforeach --}}
    {{-- </ul> --}}

    <h5>Aqui podes ver todas as tarefas e dados da Base de dados</h5>

    <ul>Lista de tarefas

        @foreach ($tasks as $task)
            <li> {{ $task->name }} - {{ $task->status }} - {{ $task->due_at }} </li>
        @endforeach
    </ul>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tarefa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Prazo</th>
                <th scope="col">Concluida</th>
                <th scope="col">Status</th>
                <th scope="col">Pessoa Responsável</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_at }}</td>

                    <td>
                        @if ($task->status)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                    <td>{{ $task->username }}</td>

                    <td><a class = "btn btn-info" href="{{ route('tasks.view', $task->id) }}">Ver</td>

                    <td><a class = "btn btn-danger" href="{{ route('tasks.delete', $task->id) }}">Apagar</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
