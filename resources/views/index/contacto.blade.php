@extends('welcome')

@section('title', 'Contacto')

@section('content')
	<div id="main">
		<section class="row">
			<div class="ctn col-md-6">
				<div class="card" style="background-color:#004D40;padding:20px;margin-bottom:30px;border:#795548 12px solid;color:white">
					<h3 class="tituloadd" style="color:white">Contáctenos</h3>
					<form  method="POST" action="{{ url('send') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group" >
							<label for="nombre" style="color:white">Nombre</label>
							<input type="text" id="nombre" name="nombre" class="form-control" style="color:white;border-color:white">
						</div>
						<div class="form-group">
							<label for="email" style="color:white">Email</label>
							<input type="email" id="email" name="email" class="form-control" style="color:white;border-color:white">
						</div>
						<div class="form-group">
							<label for="contenido" style="color:white">Mensaje</label>
							<textarea name="contenido" id="" cols="30" rows="4" style="color:white;border-color:white"></textarea>
						</div>
						<input type="submit" value="Enviar">
					</form>
				</div>
			</div>
			
			<div class="ctn col-md-6">
				<div class="card" ng-controller="colegioController" ng-init="get()" style="background-color:white;padding:20px;box-shadow: 4px 4px 2px #888888;">
					<div class="info" ng-repeat="o in colegio" >
						<h3 class="tituloadd">Información</h3>
						<h4 style="margin-top: 25px">Visítanos en:</h4>
						<p> <i class="fa fa-bookmark" aria-hidden="true"></i> Perú - @{{o.region}} - @{{o.ciudad}}</p>
						<h4>Búscanos en:</h4>
						<p> <i class="fa fa-map-marker" aria-hidden="true"></i> @{{o.direccion}}</p>
						<h4>Escríbenos a:</h4>
						<p> <i class="fa fa-envelope" aria-hidden="true"></i> @{{o.email}}</p>
						<h4>Llámanos al:</h4>
						<p> <i class="fa fa-volume-control-phone" aria-hidden="true"></i> @{{o.telefono}}</p>
						
					</div>
					
				</div>	
			</div>
		</section>
		<section class="card " style="margin-top: 50px;padding-top: 50px">
			<h3 class="tituloadd">Ubicación</h3>
			<map id="map" style="display: block;width: 90%;height: 400px;margin:50px auto 30px auto"></map>
		</section>
		<script>
	      function initMap() {
	        // Create a map object and specify the DOM element for display.
	        var pos = {lat: -17.196075, lng: -70.933936};
	        var map = new google.maps.Map(document.getElementById('map'), {
	          center:pos ,
	          scrollwheel: false,
	          zoom: 16
	        });
	        var marker = new google.maps.Marker({
			    map: map,
			    position: pos,
			    title: 'Hello World!'
			  });
	      }

	    </script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPUa-hhhm8i0ndVv-vHifEy6yeko8wQv8&callback=initMap"
    async defer></script>
		
	</div>
@endsection