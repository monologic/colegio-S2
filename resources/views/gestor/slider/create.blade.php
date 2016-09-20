@extends('templates.main')

@section('title', 'Crear Enlace')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Añadir Slider</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/slider') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="titulo">Título</label>
						    <input type="text" class="form-control" id="titulo" placeholder="" name="titulo" required>
						</div>
						<div class="form-group">
						    <label for="direccion">Orden</label>
						    <input type="text" class="form-control" id="orden"name="orden" required>
						</div>
						<div class="form-group">
						    <label for="estado">Estado</label>
						    <select name="estado" class="form-control" required>
						    	<option value="Activo">Activo</option>
						    	<option value="Inactivo">Inactivo</option>
						    </select>
						</div>
						<div class="form-group">
						    <b><p for="imagen">Imagen</p></b>
						    <input type="file" name="imagen" required>
						</div>
						
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	
@endsection