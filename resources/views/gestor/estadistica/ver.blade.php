@extends('templates.main')

@section('title', 'Comunicado')

@section('content')
    <div ng-controller="estadisticaController" ng-init="get()">
        <div class="row cont-est">
        	<p style="margin-left:20px">Seleccione usuario :</p>
        	<div class="col-md-8">
	        	<select  ng-model="user" class="form-control">
	        		<option ng-repeat="us in users | orderBy:'apellidos'" value="@{{us.dni}}">@{{us.apellidos}} , @{{us.nombres}} </option>
	        	</select>	
        	</div>
        	<div class="col-md-4">
        		<button class="btn btn-colegio" ng-click="buscar(user)"><i class="fa fa-search"></i> &nbsp;Buscar</button>
        	</div>
        </div>
        <section class="row cont-vid">
        	<div class="col-md- 12">
        		<div class="col-xs-12 tit-est">
        			<p>Actividades</p>
        			<hr>
        		</div>
        		<div id="graph" class="col-md-8" style="min-height:250px"></div>
        		<div class="col-md-4 afg" style="border-left:1px solid #BDC3C7">
        			<div> 
        				<p class="text-center tit-est">Actividades Registradas</p>
        				<strong id="canti" class="text-center"></strong>
        			</div>
        		</div>
        	</div>
        </section>

        <section class="row cont-vid">
        	<div class="col-md- 12">
        		<div class="col-xs-12 tit-est">
        			<p>Comunicados</p>
        			<hr>
        		</div>
        		<div id="comunicados" class="col-md-8" style="min-height:250px"></div>
        		<div class="col-md-4 afg" style="border-left:1px solid #BDC3C7">
        			<div> 
        				<p class="text-center tit-est">Comunicados emitidos</p>
        				<strong id="ncom" class="text-center"></strong>
        			</div>
        		</div>
        	</div>
        </section>
        <section class="row cont-vid">
        	<div class="col-md- 12">
        		<div class="col-xs-12 tit-est">
        			<p>Noticias</p>
        			<hr>
        		</div>
        		<div id="noticias" class="col-md-8" style="min-height:250px"></div>
        		<div class="col-md-4 afg" style="border-left:1px solid #BDC3C7">
        			<div> 
        				<p class="text-center tit-est">Noticias emitidos</p>
        				<strong id="nnot" class="text-center"></strong>
        			</div>
        		</div>
        	</div>
        </section>
        <section class="row cont-vid">
        	<div class="col-md- 12">
        		<div class="col-xs-12 tit-est">
        			<p>Novedades</p>
        			<hr>
        		</div>
        		<div id="novedades" class="col-md-8" style="min-height:250px"></div>
        		<div class="col-md-4 afg" style="border-left:1px solid #BDC3C7">
        			<div> 
        				<p class="text-center tit-est">Novedades emitidos</p>
        				<strong id="nnov" class="text-center"></strong>
        			</div>
        		</div>
        	</div>
    	</section>
    	<section class="row cont-vid">
        	<div class="col-md- 12">
        		<div class="col-xs-12 tit-est">
        			<p>Videos</p>
        			<hr>
        		</div>
        		<div id="videos" class="col-md-8" style="min-height:250px"></div>
        		<div class="col-md-4 afg" style="border-left:1px solid #BDC3C7">
        			<div> 
        				<p class="text-center tit-est">Videos Subidos</p>
        				<strong id="nvid" class="text-center"></strong>
        			</div>
        		</div>
        	</div>
    	</section>
        	

   </div>
     <!-- Modal de Edición -->
    <script src="{{ asset('assets/js/ng-scripts/controllers/estadisticaController.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
@endsection