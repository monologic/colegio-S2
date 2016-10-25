@extends('templates.main')

@section('title', 'Crear Padre')

@section('content')
	<div class="container">
		<div class="cart"  style="max-width: 600px">
			<h1 class="titulo">Crear Padre</h1>
				@if (isset($error))
				    <div class="alert alert-danger">
				        {{ $error }}
				    </div>
				@endif
	    	<div>
	    		<div>
	    			<form role="form" method="POST" action="{{ url('app/padres') }}">
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
	</div>
@endsection