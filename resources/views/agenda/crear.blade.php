@extends('templates.main')

@section('title', 'Crear Entrada')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Crear entrada a Agenda</h1>
	    	<div ng-controller='menuController'>
	    		<div class="formulariok">
	    			<form role="form" method="POST" action="{{ url('app/agenda') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="nombre">Docente</label>
						    <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" value="{{Auth::user()->nombres}} {{Auth::user()->apellidos}}" required>
						</div>
						<div class="form-group">
						    <label for="puesto_cargo">Cargo</label>
						    <input type="text" class="form-control" id="puesto_cargo"  name="puesto_cargo" value="Docente" required>
						</div>
						<div class="form-group">
						    <label for="asunto">Asunto</label>
						    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="" name="asunto" required>
						</div>
						<div class="form-group">
						    <b><p for="cuerpo">Cuerpo</p></b>
						    <textarea name="cuerpo" id="cuerpo" class="form-control" cols="70" rows="10" required></textarea>
						</div>
						<div class="form-group">
					    	<label for="nombres">Nivel</label>
					    	<select class="form-control" id="nivel" ng-model="grados" name="nivel" ng-options="nivel for (nivel, grados) in data" required>
					        </select>
						</div>
						<div class="form-group">
						    <label for="nombres">Grado</label>
						    <select class="form-control" id="grado" ng-disabled="!grados" ng-model="secciones" name="grado" ng-options="grado for (grado, secciones) in grados.grados" required>
						    </select>
						</div>
						<div class="form-group">
						    <label for="nombres">Sección</label>
						    <select class="form-control" id="seccion" ng-disabled="!secciones" ng-model="seccion" name="seccion" ng-options="seccion for seccion in secciones track by seccion" required>
						    </select>
						</div>
						<div class="form-group">
						    <label for="nombres">Área</label>
						    <select class="form-control" ng-model="asignatura" name="asignatura" ng-options="asignatura for asignatura in grados.asignaturas | orderBy:'toString()' track by asignatura" required>
						    	
						    </select>
						</div>
						<div class="form-group">
						    <label for="fecha_pub">Fecha de publicación</label>
						    <input type="date" class="form-control" id="fecha_pub" placeholder="" name="fecha_pub" required>
						</div>
						<div class="form-group">
						    <b for="archivo">Imagen</b>
						    <input type="file" name="imagen">
						</div>
						<input type="hidden" name="posteador" value="{{Auth::user()->id}}">
						
						
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	<script type="text/javascript">
		app.controller('menuController', function($scope) {
			$scope.data = {
			    "Inicial": {
			        "asignaturas":[
			        "*",
			        	"COMUNICACIÓN",
						      "MATEMÁTICA",
						      "PERSONAL SOCIAL",
						      "CIENCIA Y AMBIENTE",
						      "TALLER DE INGLES",
						      "TALLER DE COMPUTO",
						      "TUTORIA"
			        ],
			        "grados":{
			        	"4 años": ["Los Geniales"],
			        	"5 años": ["Los Exploradores"]
			        }
			    },
			    "Primaria": {
			      "asignaturas":[
			        	  "COMUNICACIÓN",
					      "MATEMÁTICA",
					      "PERSONAL SOCIAL",
					      "CIENCIA Y AMBIENTE",
					      "TALLER DE INGLES",
					      "TALLER DE COMPUTO",
					      "ED. RELIGIOSA",
					      "ED. FÍSICA",
					      "ARTE",
					      "TUTORIA",
					      "PLAN LECTOR"
			        ],
			        "grados":{
			      
			        "1er": ["1", "2"],
			        "2do": ["1", "2"],
			        "3er": ["1", "2"],
			        "4to": ["1", "2"],
			        "5to": ["1", "2"],
			        "6to": ["1", "2"]
			        }
			    },
			    "Secundaria": {
			      "asignaturas":[
			        	"COMUNICACIÓN",
					      "MATEMÁTICA",
					      "PERSONA FAMILIA Y RELACIONES HUMANAS",
					      "CIENCIA TECNOLOGÍA Y AMBIENTE",
					      "INGLÉS",
					      "ED. PARA EL TRABAJO",
					      "ED. RELIGIOSA",
					      "ED. FÍSICA",
					      "ARTE",
					      "TUTORIA",
					      "FORMACIÓN CIUDADANA Y CÍVICA",
					      "HISTORIA, GEOGRAFÍA Y ECONOMÍA",
					      "QUÍMICA",
					      "FÍSICA",
					      "BIOLOGÍA",
					      "PLAN LECTOR"
			        ],
			        "grados":{
			        "1er": ["1", "2"],
			        "2do": ["1", "2"],
			        "3er": ["1", "2"],
			        "4to": ["1", "2"],
			        "5to": ["1", "2"]
			        }
			    }
			}
		});
	</script>
	<script type="text/javascript">
		$( document ).ready(function() {
			var hoy = new Date();
			a = hoy.getFullYear() + "-" + ( (hoy.getMonth()+1) < 10 ? '0' + (hoy.getMonth()+1) : (hoy.getMonth()+1) ) + "-" + (hoy.getDate() < 10 ?  '0' + hoy.getDate() : hoy.getDate());
			$('#fecha_pub').val(a);
		});
	</script>
@endsection