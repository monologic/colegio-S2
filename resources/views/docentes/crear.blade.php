@extends('templates.main')

@section('title', 'Crear Docente')

@section('content')
	<div class="container">
		<div class="cart"  style="max-width: 600px">
		<h1 class="titulo">Crear Docente</h1>
    		<div>
    			<form role="form" method="POST" action="{{ url('app/docentes') }}">
    				{{ csrf_field() }}
    				<div class="form-group">
					    <label for="nombres">Nombres</label>
					    <input type="text" class="form-control" id="nombres" placeholder="" name="nombres" required>
					</div>
					<div class="form-group">
					    <label for="apellidos">Apellidos</label>
					    <input type="text" class="form-control" id="apellidos" placeholder="" name="apellidos" required>
					</div>
					<div class="form-group">
					    <label for="dni">DNI</label>
					    <input type="text" class="form-control" id="dni" placeholder="" name="dni" required>
					</div>
					<button type="submit" class="btn btn-colegio">Guardar</button>
    			</form>
    		</div>
    	</div>
	</div>
@endsection