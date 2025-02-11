@extends('layouts.fo_layout')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h1>Aqui vês todos os users.</h1>

    <h6>O contacto é {{ $contactPerson->name }} e o contacto é {{ $contactPerson->email }} </h6>
    <h6>{{ $cesaeInfo['name'] }}</h6>
    <h6>{{ $cesaeInfo['address'] }}</h6>
    <h6>{{ $cesaeInfo['email'] }}</h6>



    <h6>Contactos</h6>

    <ul>
        @foreach ($contacts as $item)
            <li>{{ $item['id'] }} - {{ $item['name'] }} - {{ $item['phone'] }}</li>
        @endforeach


    </ul>

    <form action="">
        <input type="text" id="" name="search" value="{{ request()->query('search') }}">
        <button type="submit" class="btn btn-secondary">Procurar</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allUsers as $user)
                <tr>
                    <td><img style="width:50px; height:50px"
                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/nophoto.jpg') }}"
                        alt=""></td>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a class = "btn btn-info" href="{{ route('users.view', $user->id) }}">Ver/Editar</td>
                        <td><a class = "btn btn-danger" href="{{ route('users.delete', $user->id) }}">Apagar</td>
                        @auth
                        @if (Auth::user()->email=='filipa@gmail.com')
                        @endif
                        @endauth
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
