@extends('templates.main')

@section('title', 'Perfil de Usuario')

@section('content')
	<div class="container">
		<div class="cart"  style="max-width: 600px">
		<h1 class="titulo">Visualizar Calificaciones</h1>
    		<div ng-controller="usuarioController">
    			Hijo(s)
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th>Nombre</th>
    						<th>Ver Notas</th>
    					</tr>
    				</thead>
    				<tbody>
    					@foreach ($hijos as $hijo)
						    <tr>
	    						<td>{{$hijo->nombres . " " . $hijo->apellidos}}</td>
	    						<td><a ng-click="ruteoNotas('{{$hijo->dni}}|{{$colegio->url}}')" class="btn"><i class="pe-7s-graph" style="font-size:20px;"></i></a></td>
	    					</tr>                    
						@endforeach
    				</tbody>
    			</table>
    		</div>
    	</div>
	</div>
	 <script src="{{ asset('assets/js/ng-scripts/controllers/usuarioController.js') }}"></script>
@endsection