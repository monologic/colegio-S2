@extends('welcome')

@section('title', 'Colegio Robert Gagne')

@section('content')
	<div id="main" style="margin-top: -50px;">
		<div class="row">
			<div class="col-md-12 col-sm-12" id="vf" style="z-index: 1;margin-bottom: 50px">
							
			</div>
			<div class="col-md-4 col-sm-4" style="z-index: 1;margin-bottom: 50px">
							<section id="intro" style="">
								<a href="#" ><img src="images/logo.gif" alt="" class="insig" /></a>
								<header class="text-center">
									<h2><img src="images/txt.png" alt="" width="200" /></h2>
									<p style="font-size: .7rem;margin-top: -47px">Superaci&oacute;n y disciplina</a></p>
								</header>
							</section>
							<hr>
							<section ng-controller="comunicadoController" ng-init="getComuni()">
								<h2 align="center" style="color:#1F3A93">Comunicados</h2><br>	
								<div style="background-color:#004D40;padding:20px;margin-bottom:30px;border:#795548 12px solid;color:white">
									<ul class="posts">
										<li ng-repeat="c in comun">
											<article>
												<header>
													<h3><a href="/comunicado/@{{c.id}}" style="color:white">@{{c.asunto}}</a></h3>
													<time class="published">@{{c.solofe}}</time>
												</header>
												<a href="" class="image"><img src="images/New.png" alt="" /></a>
											</article>
										</li>
									</ul>
									<a href="/comunicados">Ver todos los comunicados</a>
								</div>
							</section>
							<hr>
							<section ng-controller="novedadesController" ng-init="firstNovedades()">
								<h2 align="center" style="color:#1F3A93">Novedades</h2><br>
								<div class="mini-posts">
									<!-- Mini Post -->
									<article class="mini-post" ng-repeat="k in allnovedades" style="background-color:white;padding:20px;box-shadow: 4px 4px 2px #888888;">
										<header>
											<h3><a href="/novedad/@{{k.id}}">@{{k.titulo}}</a></h3>
											<time class="published">@{{k.fecha}}</time>
										</header>
										<a href="/novedad/@{{k.id}}" class="image"><img src="imagen/novedades/@{{k.foto}}" alt="" /></a>
									</article>
									<a href="/novedades">Ver todas las novedades</a>
								</div>
							</section>	
			</div>	
			<div class="col-md-8 col-sm-10 col-xs-11"  style="z-index: 1;margin-bottom: 50px">
				<section id="copy" class="slid"  ng-controller="sliderController" ng-init="gets()">
					<div id="owl-demo" class="owl-carousel">
						<div class="item" ng-repeat="f in slider" on-finish-render="ngRepeatFinished"><img class="img-responsive" style="width: 100%"  src="imagen/slider/@{{f.imagen}}" ><p class="titulo-slider">@{{f.titulo}}</p></div>

					</div>
				</section>
				<hr>
				<section  ng-controller="noticiaController" ng-init="firstNotice()" style="padding-top: 20px">
				<h1 class="text-center" style="font-size:1.6rem">NOTICIAS</h1>
					<article class="noticia" ng-repeat="n in allnot">
						<header>
							<div class="title">
								<h2><a href="noticias/@{{n.id}}">@{{n.titulo}}</a></h2>
								<blockquote style="text-align: left;">@{{n.copete}}</blockquote>
							</div>
						</header>
						<figure>
						<a href="noticias/@{{n.id}}" class="image featured"><img src="imagen/noticia/@{{n.foto}}" alt="" /></a>
						<figcaption class="text-center" >@{{n.epigrafe}}</figcaption>
						</figure>
					</article>	
				</section>
				
				<a href="/noticiasall">Ver todas las noticias</a>
			</div>		

			<section class="col-md-12 col-sm-12"  ng-controller="enlaceController" ng-init="getindexe()">
				<h3 class="text-center">Enlaces</h3>
				<div class="row">
					<div ng-repeat="en in enlaces" class="col-md-3 col-sm-3 col-xs-6">
							<a href="@{{en.url}}" target="_blank">
									<div class="cont-enlaces" >
										<img class="hijo" src="imagen/enlace/@{{en.imagen}}" style="width:80%;margin: 0px auto 0px auto" alt="" />
									</div>
							</a>
						</div>
				</div>
			</section>
		</div>
		
		<script src="{{ asset('assets/js/ng-scripts/controllers/noticiaController.js') }}"></script> 
		<script src="{{ asset('assets/js/ng-scripts/controllers/comunicadoController.js') }}"></script>
		<script src="{{ asset('assets/js/ng-scripts/controllers/novedadesController.js') }}"></script>
		<script src="{{ asset('assets/js/ng-scripts/controllers/enlaceController.js') }}"></script> 
		<script src="{{ asset('assets/js/ng-scripts/controllers/sliderController.js') }}"></script>
		<script>
		</script>
	</div>
@endsection