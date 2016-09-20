@extends('templates.main')

@section('title', 'Crear Estudiante')

@section('content')
	<div class="container">
		
    	<div ng-controller="estudiantesController">
    		<div class="cart" style="max-width: 600px">
    			<h1 class="titulo">Crear Estudiante</h1>
    			<form role="form" method="POST" action="{{ url('app/estudiantes') }}">
    				{{ csrf_field() }}
    				<div class="form-group">
					    <label for="nombres">Nombres</label>
					    <input type="text" class="form-control" id="nombres" ng-model="nombres" placeholder="" name="nombres" required>
					</div>
					<div class="form-group">
					    <label for="apellidos">Apellidos</label>
					    <input type="text" class="form-control" id="apellidos" ng-model="apellidos" placeholder="" name="apellidos" required>
					</div>
					<div class="form-group">
					    <label for="dni">DNI</label>
					    <input type="text" class="form-control" id="dni" ng-model="dni" placeholder="" name="dni" required>
					</div>
					<div class="form-group">
					    <label for="nombres">NIvel</label>
					    <select class="form-control" ng-model="nivel" name="nivel" required>
					    	<option>Inicial</option>
					    	<option>Primaria</option>
					    	<option>Secundaria</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="nombres">Grado</label>
					    <select class="form-control" ng-model="grado" name="grado" required>
					    	<option>4 Años</option>
					    	<option>5 Años</option>
					    	<option>1er</option>
					    	<option>2do</option>
					    	<option>3ro</option>
					    	<option>4to</option>
					    	<option>5to</option>
					    	<option>6to</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="nombres">Seccion</label>
					    <select class="form-control" ng-model="seccion" name="seccion" required>
					    	<option>1</option>
					    	<option>2</option>
					    	<option>Los Geniales</option>
					    	<option>Los Exploradores</option>
					    </select>
					</div>
					<button type="submit" class="btn btn-colegio">Guardar</button>
    			</form>
    		</div>
    	</div>
	</div>
    
    <script src="{{ asset('assets/js/ng-scripts/controllers/estudiantesController.js') }}"></script>
@endsection