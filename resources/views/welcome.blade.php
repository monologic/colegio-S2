<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}" />
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
		
		<!--Carrusel-->
		<link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    	<link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet">
    	<link href="{{asset('assets/css/owl.transitions.css')}}" rel="stylesheet">

    	
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
		
		<link rel="stylesheet" type="text/css" href="{{asset('assets/GridGallery/css/component.css')}}" />
		<script src="{{asset('assets/GridGallery/js/modernizr.custom.js')}}"></script>
		<link rel="stylesheet" href="{{asset('assets/css/kira.css')}}" />



	</head>
	
	<body ng-app="robertApp">
		<!-- Wrapper -->
			<div id="wrapper" style="" >

				<!-- Header -->
					<header id="header" style="height: 60px;background-color:#192473">
						<h1><a href="/" style="color:white;font-size:1.5rem"><img src="{{asset('images/logo_izq.jpg')}}" alt="" width="150" style="padding-top: 0px" /></a></h1>
						<nav class="links">
							<ul style="color:white">
								
								<li><a href="{{ url('/institucional') }}" style="font-size:.8rem">Institucional</a></li>
								<li><a href="{{ url('/comunidad') }}" style="font-size:.8rem">Comunidad</a></li>
								<li><a href="{{ url('/galeria') }}" style="font-size:.8rem">Galeria</a></li>
								<li><a href="{{ url('/contacto') }}" style="font-size:.8rem">Contacto</a></li>
							</ul>
						</nav>
						<nav class="main" >
							<ul>
								
								<li class="me">
									<a href="/app" class="fa fa-user" style="color:white">login</a>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu" style="color:white">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="{{ url('/') }}">
											<h3>Inicio</h3>
											
										</a>
									</li>
									<li>
										<a href="{{ url('/institucional') }}">
											<h3>Institucional</h3>
											
										</a>
									</li>
									<li>
										<a href="{{ url('/comunidad') }}">
											<h3>Comunidad</h3>
											
										</a>
									</li>
									<li>
										<a href="{{ url('/galeria') }}">
											<h3>Galeria</h3>
											
										</a>
									</li>
									<li>
										<a href="{{ url('/contacto') }}">
											<h3>Contacto</h3>
											
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="{{ url('/app') }}"class="button big fit">Log In</a></li>
								</ul>
							</section>

					</section>
				<!-- Slider-->
					
				<!-- Main -->
				<script src="{{asset('assets/js/jquery-1.9.1.min.js')}}"></script>
				<script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
				<script src="{{ asset('assets/angular/angular.min.js') }}"></script>
				<script src="{{ asset('assets/js/ng-scripts/app.js') }}"></script>
					@yield('content')
		

			</div>
			<footer class="foot" ng-controller="colegioController" ng-init="get2()" style="background-color:#192473">
				<section class="cont-foot row" ng-repeat="o in colegio">
					<div class="col-md-6 rs">
						<h4 style="color: white;font-size: 1rem">Redes Sociales</h4>
						<a href="@{{o.facebook}}" target="_bank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="@{{o.twiter}}" target="_bank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="@{{o.youtube}}" target="_bank"><i class="fa fa-youtube" aria-hidden="true"></i></a>

					</div>
					<div class="col-md-6 ft" >
						<h4 style="color: white;font-size: 1rem">Informaci&oacute;n</h4>
						<stong>Direcci&oacute;n : @{{o.direccion}}</stong><br>
						<stong>Email : @{{o.email}}</stong><br>
						<stong>Tel&eacute;fono : @{{o.telefono}}</stong><br>
					</div>
				</section>
			</footer>
			<script src="{{ asset('assets/js/ng-scripts/controllers/colegioController.js') }}"></script>
			
			<script src="{{ asset('assets/js/skel.min.js') }}"></script>
			<script src="{{ asset('assets/js/main.js') }}"></script>
			<script src="{{ asset('assets/js/util.js') }}"></script>
			
			<script src="{{ asset('assets/js/ng-scripts/directivas/onFinishRender.js') }}"></script>  

   			<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
   			
		<!-- Scripts -->
			
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	</body>
</html>