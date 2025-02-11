@extends('layouts.fo_layout')
@section('content')

@if (Auth::user()->user_type==1)
<div class="alert alert-success" role = "alert">
    Conta de administrador
</div>
@endif

<h2>Olá {{Auth::user()->name}}</h2>
@endsection
