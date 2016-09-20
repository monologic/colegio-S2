@extends('templates.main')

@section('title', 'Crear Album')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Creando Álbum</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/album') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" required>
						</div>
						<div class="form-group">
						    <label for="descripcion">Descripción</label>
						     <textarea class="form-control" id="descripcion"  name="descripcion" required></textarea>
						</div>
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	
@endsection