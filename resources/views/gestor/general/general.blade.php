@extends('templates.main')

@section('title', 'Editar nosotros')

@section('content')
	<div class="" style="max-width: 500px;width: 80%;margin: 30px auto 50px auto">	
	<form  action="{{ url('app/general/1') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	{{ csrf_field() }}
		<ul class="nav nav-tabs">
			<button type="submit" class="btn btn-colegio" style="margin-left:50px"> <i class=""></i>Guardar</button>
			<li class="active"><a  href="#1" data-toggle="tab">Información</a></li>
			<li><a href="#2" data-toggle="tab">Redes Sociales</a></li>
		</ul>
		@foreach ($nosotros as $nosotro)
		<div class="tab-content ">
			<div class="tab-pane active" id="1">
			    <section class="cart">
			    	<div class="form-group">
			    		<label for="nombre">Nombre</label>
			    		<input type="text" id="nombre" name="nombre" class="form-control" value="{{$nosotro->nombre}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="email">Email</label>
			    		<input type="text" id="email" name="email" class="form-control" value="{{$nosotro->email}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="telefono">Teléfono</label>
			    		<input type="text" id="telefono" name="telefono" class="form-control" value="{{$nosotro->telefono}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="direccion">Dirección</label>
			    		<input type="text" id="direccion" name="direccion" class="form-control" value="{{$nosotro->direccion}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="region">Región</label>
			    		<input type="text" id="region" name="region" class="form-control" value="{{$nosotro->region}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="ciudad">Ciudad</label>
			    		<input type="text" id="ciudad" name="ciudad" class="form-control" value="{{$nosotro->ciudad}}">
			    	</div>
			    </section>
			</div>
			<div class="tab-pane" id="2">
			    <section class="cart">
			    	<div class="form-group">
			    		<label for="facebook">Facebook</label>
			    		<input type="text" id="facebook" name="facebook" class="form-control" value="{{$nosotro->facebook}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="twiter">Twiter</label>
			    		<input type="text" id="twiter" name="twiter" class="form-control" value="{{$nosotro->twiter}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="youtube">Youtube</label>
			    		<input type="text" id="youtube" name="youtube" class="form-control" value="{{$nosotro->youtube}}">
			    	</div>
			    </section>
			</div>
		</div>
		@endforeach 
	</form>
	</div>
@endsection