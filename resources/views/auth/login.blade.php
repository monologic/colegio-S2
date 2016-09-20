@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container">
        <h1>Robert Gagne</h1>
        <br><br>
        <form class="form"  role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
            <input type="text" placeholder="Usuario" name="usuario" value="{{ old('usuario') }}">
            <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password">
            <button type="submit" id="login-button">Ingresar</button>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </form>
    </div>
    
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

@endsection
