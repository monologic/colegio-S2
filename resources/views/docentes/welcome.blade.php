@extends('templates.main')

@section('title', 'Bienvenido')

@section('content')
    <h1 class="titulo text-center" style="margin-top: 20%;">Bienvenido/a  {{Auth::user()->nombres}}</h1>
@endsection