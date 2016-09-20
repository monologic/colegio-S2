@extends('templates.main')

@section('title', 'Crear Novedades')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Crear Novedades</h1>
	    	<div>
	    		<div class="formulariok">
	    			<form role="form" method="POST" action="{{ url('app/novedades') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="autor">Autor</label>
						    <input type="text" class="form-control" id="autor" name="autor" placeholder="" name="autor" required>
						</div>
	    				<div class="form-group">
						    <label for="titulo">Titular</label>
						    <input type="text" class="form-control" id="nombre"  name="titulo" required>
						</div>
						<div class="form-group">
						    <label for="copete">Reseña</label>
						    <input type="text" class="form-control" id="copete"  name="copete" required>
						</div>
						
						<div class="form-group">
						    <b for="archivo">Foto</b>
						    <input type="file" name="imagen" required>
						</div>
						<div class="form-group">
						    <label for="epigrafe">Epígrafe</label>
						    <input type="text" class="form-control" id="destinatario" name="epigrafe" required>
						</div>
						<div class="form-group">
						    <b for="cuerpo">Cuerpo</b>
						    <textarea  id="" cols="50" rows="10" name="cuerpo" class="edit" required></textarea>
						</div>
						<div class="form-group">
						    <label for="fecha">Fecha de publicación</label>
						    <input type="date" class="form-control" id="fecha" placeholder="2016-01-01" name="fecha" required>
						</div>
						<input type="hidden" name="posteador" value="{{Auth::user()->dni}}">
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	<script type="text/javascript">
		$( document ).ready(function() {
			var hoy = new Date();
			a = hoy.getFullYear() + "-" + ( (hoy.getMonth()+1) < 10 ? '0' + (hoy.getMonth()+1) : (hoy.getMonth()+1) ) + "-" + (hoy.getDate() < 10 ?  '0' + hoy.getDate() : hoy.getDate());
			$('#fecha').val(a);
		});
	</script>
	<script type="text/javascript" src="{{ asset('assets/froala/js/froala_editor.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/align.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/code_beautifier.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/code_view.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/draggable.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/image.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/image_manager.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/link.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/lists.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/paragraph_format.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/paragraph_style.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/table.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/video.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/url.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/froala/js/plugins/entities.min.js') }}"></script>
  	<script>
	      $(function(){
	        $('.edit')
	          .on('froalaEditor.initialized', function (e, editor) {
	            $('#edit').parents('form').on('submit', function () {
	              console.log($('#edit').val());
	              return false;
	            })
	          })
	          .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
	      });
	</script>
@endsection