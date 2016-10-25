@extends('welcome')

@section('title', 'Comunidad')

@section('content')
	<div id="main">
		<div class="container">
			<div class="row">
		        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
		            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
		              <div class="list-group">
		                <a href="#" class="list-group-item active text-center">
		                  <h4 class="glyphicon glyphicon-star-empty"></h4> Nivel Inicial
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="glyphicon glyphicon-eye-open"></h4> Nivel Primaria
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="fa fa-child"></h4> Nivel Secundaria
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="fa fa-folder-open"></h4> Valores
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="glyphicon glyphicon-education"></h4> Reglamento
		                </a>
		                <a href="#" class="list-group-item text-center">
		                  <h4 class="glyphicon glyphicon-education"></h4> Manual de Convivencia
		                </a>
		              </div>
		            </div>
		            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
					@foreach ($nosotros as $nosotro)
		                <!-- train section -->
		                <div class="bhoechie-tab-content active">
		                      <p class="texts" style="padding-top:0">{!! $nosotro->inicial !!}</p>
		                </div>
		                <div class="bhoechie-tab-content">
		                      <p style="padding-top:0">{!! $nosotro->primaria !!}</p>
		                </div>
		                <div class="bhoechie-tab-content">
		                      <p style="padding-top:0">{!! $nosotro->secundaria !!}</p>
		                </div>
		                <div class="bhoechie-tab-content">
		                      <p style="padding-top:0">{!! $nosotro->valores !!}</p>
		                </div>
		                <div class="bhoechie-tab-content">
		                      <p style="padding-top:0">{!! $nosotro->reglamento !!}</p>
		                </div>
		                <div class="bhoechie-tab-content">
		                      <p style="padding-top:0">{!! $nosotro->convivencia !!}</p>
		                </div>
		                
		    		@endforeach 
		            	
		            </div>
		        </div>
		  	</div>
		</div>
	</div>
	
	<script>
		$(document).ready(function() {

		    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {

		        e.preventDefault();
		        $(this).siblings('a.active').removeClass("active");
		        $(this).addClass("active");
		        var index = $(this).index();
		        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
		    });
		});
	</script>
@endsection