@extends('templates.main')

@section('title', 'Añadir Imagen')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Añadiendo imagen</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/galeria') }}" accept-charset="UTF-8" enctype="multipart/form-data">
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
						    <label for="estado">Estado</label>
						    <select name="estado" class="form-control">
						    	<option value="Activo">Activo</option>
						    	<option value="Inactivo">Inactivo</option>
						    </select>
						</div>
						<div class="form-group">
						    <b><p for="imagen">Imagen</p></b>
						    <input type="file" name="imagen">
						</div>
						<input type="text" name="albun_id" value="1">
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	
@endsection