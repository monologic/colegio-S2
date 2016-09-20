@extends('templates.main')

@section('title', 'Crear Directivo')

@section('content')
	<div class="contenidos">
		<div class="cart" style="max-width: 600px">
			<h1 class="titulo">Agregando a Directorio</h1>
	    		<div class="formulariok">
	    			<form  method="POST" action="{{ url('app/directorio') }}" accept-charset="UTF-8" enctype="multipart/form-data">
	    				{{ csrf_field() }}
	    				<div class="form-group">
						    <label for="titulo">Título</label>
						    <input type="text" class="form-control" id="titulo" placeholder="" name="titulo" required>
						</div>
						<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" required>
						</div>
						<div class="form-group">
						    <label for="cargo">Cargo</label>
						    <input type="text" class="form-control" id="cargo" placeholder="" name="cargo" required>
						</div>
						<div class="form-group">
                <b for="archivo">Foto</b>
                <input type="file" name="foto" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="" name="email" required>
            </div>
						<button type="submit" class="btn btn-colegio">Guardar</button>
	    			</form>
	    		</div>
	    	</div>
		</div>
	</div>
	<!-- Modal de Edición -->
   

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