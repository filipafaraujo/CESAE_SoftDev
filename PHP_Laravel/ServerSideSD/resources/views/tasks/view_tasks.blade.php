@extends('layouts.fo_layout')

@section('content')
<h4>Dados da tarefa: {{$tasks->name}}</h4>
<h6>Descrição: {{$tasks->description}}</h6>
<h6>Responsavel:{{$tasks->username}}</h6>

@endsection
