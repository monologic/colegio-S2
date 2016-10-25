<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index.home');
});

Route::get('noticias/{id}', 'NoticiasController@detalle');
Route::get('comunicado/{id}', 'ComunicadoController@detalle');
Route::get('novedad/{id}', 'NovedadController@detalle');

Route::get('/galeria', 'AlbumController@grid');
Route::get('/institucional', 'NosotroController@grid');
Route::get('/comunidad', 'ComunidadController@grid');

Route::get('/contacto', function () {
    return view('index.contacto');
});

Route::get('mensajeenviado', function () {
    return view('contacto.mensajeenviado');
});
Route::post('send',  'ContactoController@send');


Route::group(['prefix'=> 'app', 'middleware' => [ 'auth', 'web' ]], function(){

	Route::get('/', 'HomeController@index');
	Route::get('getPadre/{dni}', 'PadreController@getPadre');
	Route::get('urlApp', 'ColegioController@urlApp');
	Route::post('urlUpdate', 'ColegioController@urlUpdate');
	Route::get('getEstudiante/{dni}', 'EstudianteController@getEstudiante');

	Route::get('/usuarios', function () {
	    return view('templates.menu.usuario');
	});

	Route::get('estadistica', function () {
		return view('gestor.estadistica.ver');
	});

	Route::get('/getUsuarios','UserController@getUsuarios');
	Route::get('/usuarios', function () {
	    return view('templates.menu.usuario');
	});
	Route::get('getEstadisticas/{dni}','EstadisticasController@getDatos');

	Route::get('perfil', function () {
		return view('usuarios.perfil');
	});
	Route::post('perfil', 'UserController@editarUsuario');
	
	Route::group(['middleware' => 'rol:grupo1'], function () {
    	Route::get('getEstudiantes', 'EstudianteController@get');
		Route::resource('estudiantes', 'EstudianteController');

		Route::get('getDocentes', 'DocenteController@get');
		Route::resource('docentes', 'DocenteController');

		Route::get('getAdministrativos', 'AdministrativoController@get');
		Route::resource('administrativos', 'AdministrativoController');

		Route::get('getAdministrativos', 'AdministrativoController@get');
		Route::resource('administrativos', 'AdministrativoController');

		Route::get('getDirectivos', 'DirectivoController@get');
		Route::resource('directivos', 'DirectivoController');

		Route::get('getPadres', 'PadreController@get');
		Route::resource('padres', 'PadreController');

		Route::get('getGaleria', 'GaleriaController@getGaleria');
	    Route::post('galeria/{id}', 'GaleriaController@update');
		Route::resource('galeria', 'GaleriaController');

		Route::get('getAlbum', 'AlbumController@getAlbum');
		Route::get('getAlbum/{id}', 'AlbumController@galeria');
	    Route::post('album/{id}', 'AlbumController@update');
		Route::resource('album', 'AlbumController');

		Route::get('cambiarEstadoAlbum/{id}', 'AlbumController@cambiarEstadoAlbum');

	    Route::post('album/{id}', 'AlbumController@update');
		Route::resource('video', 'VideoController');
		});	

	Route::group(['middleware' => 'rol:grupo2'], function () {

		
		/*
	    * Rutas para el gestor de contenido
	    */
	    /*
	    * Comunicados
	    */
		Route::get('getComunicados', 'ComunicadoController@getComunicado');
		Route::post('comunicados/{id}', 'ComunicadoController@update');
		Route::resource('comunicados', 'ComunicadoController');
		

		/*
	    * Noticias
	    */
	    Route::get('getNoticia', 'NoticiasController@getNoticia');
	    Route::post('noticias/{id}', 'NoticiasController@update');
		Route::resource('noticias', 'NoticiasController');
		/*
	    * Novedades
	    */
		Route::get('getNovedades', 'NovedadController@getNovedades');
	    Route::post('novedades/{id}', 'NovedadController@update');
		Route::resource('novedades', 'NovedadController');

		Route::post('noticias/{id}', 'NoticiasController@update');
		Route::resource('noticias', 'NoticiasController');
	});

	
    Route::group(['middleware' => 'rol:grupo3'], function () {
    	/*
	    * Bibilioteca
	    */
		Route::get('getArchivos', 'ArchivoController@get');
		Route::get('getArchivoTipos', 'ArchivoController@getArchivoTipos');
	    Route::post('archivos/{id}', 'ArchivoController@update');
	    Route::get('archivo/{id}', 'ArchivoController@visualizar');
		Route::resource('archivos', 'ArchivoController');

		Route::get('getActividades', 'ActividadController@get');
	    Route::get('getActividad/{id}', 'ActividadController@getActividad');
		Route::resource('actividades', 'ActividadController');
		Route::get('acti/{id}', 'ActividadController@getdia');
		Route::get('ac/{fecha}', 'ActividadController@getmes');
		
		Route::post('agenda/{id}', 'AgendaController@update');
		Route::resource('agenda', 'AgendaController');
		Route::get('getEntradas', 'AgendaController@getEntradas');


	});

	Route::group(['middleware' => 'rol:grupo4'], function () {
		/*
	    * Enlaces
	    */
		Route::get('getEnlaces', 'EnlaceController@getEnlaces');
	    Route::post('enlaces/{id}', 'EnlaceController@update');
		Route::resource('enlaces', 'EnlaceController');

		/*
	    * Slider
	    */
		Route::get('getSlider', 'SliderController@getSlider');
	    Route::post('slider/{id}', 'SliderController@update');
		Route::resource('slider', 'SliderController');
	});


	Route::group(['middleware' => 'rol:grupo5'], function () {
		/*
	    * Institucional
	    */
	    Route::post('nosotros/{id}', 'NosotroController@update');
		Route::resource('nosotros', 'NosotroController');

		Route::get('getDirec', 'DirectorioController@all');
		Route::post('directorio/{id}', 'DirectorioController@update');
		Route::resource('directorio', 'DirectorioController');

		Route::post('institucional/{id}', 'InstitucionalController@update');
		Route::resource('institucional', 'InstitucionalController');
		
		/*
	    * comunidad
	    */
	    Route::post('comunidad/{id}', 'ComunidadController@update');
		Route::resource('comunidad', 'ComunidadController');

		/*
	    * Colegio General
	    */
	    Route::post('general/{id}', 'ColegioController@update');
		Route::resource('general', 'ColegioController');
		
		
		Route::get('asignarHijo/{dni}/{id}', 'PadreController@asignarHijo');
		Route::get('asignarHijos', 'PadreController@vistaAsignarHijos');
		Route::get('getHijosPadre/{id}', 'PadreController@getHijosPadre');
		Route::delete('deleteAsignacion/{id}', 'PadreController@eliminar');

	});

	Route::group(['middleware' => 'rol:grupo6'], function () {
		Route::get('notas', 'PadreController@getHijosPadreActual');
	});
});

Route::auth();
Route::get('getNoticiaIndex', 'NoticiasController@getNoticiaIndex');
Route::get('noticiasall', 'NoticiasController@getNoticiaIndexAll');

Route::get('comunicados', 'ComunicadoController@getComunicadoIndexAll');

Route::get('novedades', 'NovedadController@getNovedadesIndexAll');

Route::get('getComunicadosIndex', 'ComunicadoController@getComunicadoIndex');
Route::get('getNovedadesIndex', 'NovedadController@getNovedadesIndex');
Route::get('getEnlacesIndex', 'EnlaceController@getEnlacesIndex');
Route::get('getGaleriaIndex', 'GaleriaController@getGaleriaIndex');
Route::get('getSliderIndex', 'SliderController@getSliderIndex');
Route::get('getSliderIndex', 'SliderController@getSliderIndex');
Route::get('getColegio', 'ColegioController@get');