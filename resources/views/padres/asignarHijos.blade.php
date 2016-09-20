@extends('templates.main')

@section('title', 'Asignar Hijos a Padre')

@section('content')
	<div class="container">
		<div class="cart" style="width: 80%">
			<div ng-controller="padresController">
				<h1 class="titulo">Asignar hijos a padre</h1>
				<form ng-submit="buscarPadre()" class="form-inline">
					<div class="form-group">
					    <label for="dni">DNI de padre</label>
					    <input type="text" class="form-control" id="dni" placeholder="" ng-model="dni" required>
					</div>
					<button type="submit" class="btn btn-colegio">Buscar</button>
	    		</form>
	    		<div ng-if="padre.length == 1" class="row">
	    			<div class="col-md-6">
	    				<h1 class="titulo">Información (padre)</h1>
		    			<table class="table">
		    				<tr>
		    					<td>Nombre:</td>
		    					<td> @{{ padre[0].nombres + " " +padre[0].apellidos }}</td>
		    				</tr>
		    				<tr>
		    					<td>DNI:</td>
		    					<td> @{{ padre[0].dni }}</td>
		    				</tr>
		    			</table>
		    			<h1 class="titulo2"><strong>Hijos</strong></h1>
		    			<table class="myTable table-hover">
				    		<thead>
				    			<th>Nombre</th>
				    			<th>DNI</th>
				    		</thead>
			    			<tr ng-repeat="hp in padreHijos">
			    				<td>@{{hp.nombres + " " + hp.apellidos}}</td>
			    				<td>@{{hp.dni}}</td>
			    				<td><a ng-click="eliminarAsignacion(hp.idTutor);"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a></td>
			    			</tr>
			    		</table>
	    			</div>
	    			<div class="col-md-6">
	    				<h1 class="titulo">Buscar Hijo</h1>
	    				<form class="form-inline" ng-submit="buscarHijo(dniHijo);">
							<div class="form-group">
							    <label for="dniHijo">DNI Hijo</label>
							    <input type="text" class="form-control" id="dniHijo" placeholder="" ng-model="dniHijo" required>
							</div>
							<button type="submit" class="btn btn-colegio">Buscar</button>
			    		</form>
			    		<br>
			    		<table class="myTable table-hover">
				    		<thead>
				    			<th>Nombre</th>
				    			<th>DNI</th>
				    			<th>Asignar</th>
				    		</thead>
			    			<tr ng-repeat="est in estudiantes">
			    				<td>@{{est.nombres + " " + est.apellidos}}</td>
			    				<td>@{{est.dni}}</td>
			    				<td><button class="btn btn-success" ng-click="asignarHijo(est.dni)">+</button></td>
			    			</tr>
			    		</table>
	    			</div>
	    		</div>
			</div>
    	</div>
	</div>
	<script src="{{ asset('assets/js/ng-scripts/controllers/padresController.js') }}"></script>
@endsection