@extends('layouts.fo_layout')
@section('content')
    {{-- <h5>Olá, estou em casa.</h5> --}}
    {{-- <h6>{{ $myVar }}</h6> --}}
    {{-- <h6>{{ $contactInfo['name'] }}</h6> --}}
    {{-- <img src= "{{ asset('images/spotify.png') }}" alt = ""> --}}

@auth
       <h5>Olá {{Auth::user()->name}}</h5>
@endauth

    <br>
    <h5>Bem-vindo</h5>
    <br>
    <ul>
        <li> <a href = "{{ route('users.show') }}">Todos os users.</a></li>
        <li> <a href = "{{ route('users.add') }}">Adicionar utilizador.</a></li>

        <br>

            {{-- <li> <a href="{{ route('tasks') }}">Ver Tarefas</a></li> --}}

            <li> <a href = "{{ route('tasks') }}">Todas as tarefas.</a></li>

            <li> <a href = "{{ route('tasks.add') }}">Adicionar tarefas.</a></li>
            <br>


            <li> <a href = "{{ route('gifts') }}">Ver todas as Prendas.</a></li>

            <li> <a href = "{{ route('gifts.add') }}">Adicionar prendas.</a></li>
    </ul>
@endsection
