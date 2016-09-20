@extends('templates.main')

@section('title', 'Url de Aplicativo')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Modificar Url</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/urlUpdate') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="nombre">Url de Aplicativo</label>
						    <input type="text" class="form-control" id="url" placeholder="Debe coincidir con la url actual del Aplicativo" name="url" value="{{$colegio->url}}" required>
						</div>
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	
@endsection