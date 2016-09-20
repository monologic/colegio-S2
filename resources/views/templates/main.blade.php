<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>@yield('title')</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		
		<script src="{{ asset('assets/angular/jquery.min.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}" />
		<!-- Libreria inmovibles-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}" />
		<link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
		<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('assets/SweetAlert/sweetalert.min.js') }}"></script> 
    	<link rel="stylesheet" type="text/css" href="{{ asset('assets/SweetAlert/sweetalert.css') }}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleAdmin.css') }}" />

    	<!--floata -->
    	<link rel="stylesheet" href="{{ asset('assets/froala/css/froala_editor.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/froala_style.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/plugins/code_view.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/plugins/image_manager.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/plugins/image.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/plugins/table.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/froala/css/plugins/video.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

		<link rel="stylesheet" href="{{ asset('assets/calendar/css/monthly.css')}}">
		
	</head>
	<body class="body">
		<div class="wrapper">
		    <div class="sidebar" data-color="blue" data-image="{{asset('assets/img/sidebar-5.jpg')}}">

		    <!--

		        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
		        Tip 2: you can also add an image using data-image tag

		    -->

		    	<div class="sidebar-wrapper">
		            <div class="logo">
		                <a  class="simple-text">
		                    <img src="{{asset('images/logo.png')}}" width="100" height="90">
		                </a>
		            </div>
					@if (Auth::user()->usuariotipo_id == "1")
				        @include('templates.menu.estudiante')
				    @endif
				    @if (Auth::user()->usuariotipo_id == "2")
				        @include('templates.menu.docente')
				    @endif
				    @if (Auth::user()->usuariotipo_id == "3")
				        @include('templates.menu.administrativo')
				    @endif
				    @if (Auth::user()->usuariotipo_id == "4")
				        @include('templates.menu.directivo')
				    @endif
				    @if (Auth::user()->usuariotipo_id == "5")
				        @include('templates.menu.padre')
				    @endif
				    @if (Auth::user()->usuariotipo_id == "6")
				        @include('templates.menu.admin')
					@endif
		    	</div>
		    </div>

		    <div class="main-panel">
		        <nav class="navbar navbar-default navbar-fixed" style="background-color:white">
		            <div class="container-fluid">
		                <div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2" onclick="menu()">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <h1 style="margin-top: 5px"><a href="/"><img src="{{asset('images/txt3.png')}}" alt="" width="120" height="50" /></a></h1>
		                </div>
		                <div class="collapse navbar-collapse">
							 <ul class="nav navbar-nav navbar-right">
							 	<li>
		                            <a href="{{ url('app/perfil') }}">
		                                {{Auth::user()->nombres}}
		                            </a>
		                        </li>
		                        <li>
		                            <a href="/logout">
		                                Salir
		                            </a>
		                        </li>
		                    </ul>
		                </div>
		            </div>
		        </nav>
		        <div class="content" onclick="ff()">
					<div class="" ng-app="robertApp">
					
						<script src="{{ asset('assets/angular/angular.min.js') }}"></script>
						<script src="{{ asset('assets/js/ng-scripts/app.js') }}"></script>
						<script src="{{ asset('assets/js/dashboard.js') }}"></script>
		            	@yield('content')
		        	</div>
				</div><!-- /container -->
		    </div>
		</div>
	<script>
		a=$( window ).width()
		if( a < 997 ){
			$('.navbar-collapse').remove();
		} 
		if( a < 768 ){
			$('.sidebar').addClass('moviles');
			$('.main-panel').addClass('movilpanel');
			$('.navbar-collapse').remove();
			$('.out-salir').css('display','block');
		} 
		$(document).ready(function(){
		   if( a < 768 ){
						$('.sidebar').addClass('moviles');
						$('.main-panel').addClass('movilpanel');
					}  
		});
		
		$(window).resize(function(){
		   // Código de respuesta
		   		a=$( window ).width()
				if( a < 768 ){
					$('.sidebar').addClass('moviles');
					$('.main-panel').addClass('movilpanel');
					$('.out-salir').css('display','block');
				} else {
					$('.sidebar').removeClass('moviles');
					$('.main-panel').removeClass('movilpanel');
					$('.out-salir').css('display','none');
				}
		});
		function menu()
		{
			$('.sidebar').removeClass('moviles');
			$('.main-panel').removeClass('movilpanel');
			
		}
		function ff()
		{
			a=$( window ).width()
				if( a < 768 ){
					$('.sidebar').addClass('moviles');
					$('.main-panel').addClass('movilpanel');
				} 
		}
		
	</script>
		
	</body>
</html>