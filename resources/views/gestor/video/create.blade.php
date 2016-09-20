@extends('templates.main')

@section('title', 'Crear Enlace')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Añadiendo video</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/video') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" required>
						</div>
						<div class="form-group">
						    <label for="direccion">Descripción</label>
						    <textarea class="form-control" id="direccion"  name="descripcion" required></textarea>
						</div>
						<div class="form-group">
						    <label for="url">Url</label>
						    <input type="text" class="form-control" id="url" placeholder="" name="url" required>
						</div>
						
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	
@endsection