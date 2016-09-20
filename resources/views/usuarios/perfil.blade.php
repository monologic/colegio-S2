@extends('templates.main')

@section('title', 'Perfil de Usuario')

@section('content')
	<div class="container">
		<div class="cart"  style="max-width: 600px">
		<h1 class="titulo">Modificar Contraseña</h1>
    		<div ng-controller="usuarioController">
    			<form ng-submit="editar()">
    				{{ csrf_field() }}
					<div class="form-group">
					    <label for="dni">Contraseña Actual</label>
					    <input type="password" class="form-control" id="dni" placeholder="Ingrese su contraseña actual" name="dni" ng-model="pass">
					</div>
					<div class="form-group">
					    <label for="dni">Nueva Contraseña</label>
					    <input type="password" class="form-control" id="dni" placeholder="Ingrese una nueva contraseña" name="dni" ng-model="pass1">
					</div>
					<div class="form-group">
					    <label for="dni">Vuelva a escribir la Contraseña</label>
					    <input type="password" class="form-control" id="dni" placeholder="" name="dni" ng-model="pass2">
					</div>
					<button type="submit" class="btn btn-colegio">Editar</button>
    			</form>
    		</div>
    	</div>
	</div>
	 <script src="{{ asset('assets/js/ng-scripts/controllers/usuarioController.js') }}"></script>
@endsection