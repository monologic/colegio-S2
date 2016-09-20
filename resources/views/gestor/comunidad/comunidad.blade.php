@extends('templates.main')

@section('title', 'Editar comunidads')

@section('content')
	<div class="" style="width: 80%;margin: 30px auto 50px auto">	
	<form  action="{{ url('app/comunidad/1') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
	{{ csrf_field() }}
		<ul class="nav nav-tabs">
			<button type="submit" class="gr">Guardar</button>
			<li class="active"><a  href="#1" data-toggle="tab">Inicial</a></li>
			<li><a href="#2" data-toggle="tab">Primaria</a></li>
			<li><a href="#3" data-toggle="tab">Secundaria</a></li>
			<li><a href="#4" data-toggle="tab">Valores</a></li>
			<li><a href="#5" data-toggle="tab">Reglamento</a></li>
			<li><a href="#6" data-toggle="tab">Convivencia</a></li>
		</ul>
		@foreach ($comunidads as $comunidad)
		<div class="tab-content ">
			<div class="tab-pane active" id="1">
			        <div id="editor">
					      <textarea class='edit'  name="inicial" style="margin-top: 30px;width: 80%">
					      {{$comunidad->inicial}}
					      </textarea>
					</div>
			</div>
			<div class="tab-pane" id="2">
			    <div id="editor">
					<textarea class='edit' name="primaria"  style="margin-top: 30px;width: 80%">
					{{$comunidad->primaria}}
					</textarea>
				</div>
			</div>
			<div class="tab-pane" id="3">
			    <div class="editor">
					<textarea class='edit' name="secundaria" style="margin-top: 30px;width: 80%"> 
					{{$comunidad->secundaria}}   
					</textarea>
				</div>
			</div>
			<div class="tab-pane" id="4">
			    <div id="editor">
					<textarea class='edit' name="valores"  style="margin-top: 30px;width: 80%"> 
					{{$comunidad->valores}}
					</textarea>
				</div>
			</div>
			<div class="tab-pane" id="5">
			    <div id="editor">
					<textarea class='edit' name="reglamento"  style="margin-top: 30px;width: 80%"> 
					{{$comunidad->reglamento}}
					</textarea>
				</div>
			</div>
			<div class="tab-pane" id="6">
			    <div id="editor">
					<textarea class='edit' name="convivencia"  style="margin-top: 30px;width: 80%"> 
					{{$comunidad->convivencia}}
					</textarea>
				</div>
			</div>
		</div>
		@endforeach 
	</form>
	</div>
	<script type="text/javascript" src="../assets/froala/js/froala_editor.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/align.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/code_beautifier.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/code_view.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/draggable.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/image.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/image_manager.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/link.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/lists.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/paragraph_format.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/paragraph_style.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/table.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/video.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/url.min.js"></script>
  	<script type="text/javascript" src="../assets/froala/js/plugins/entities.min.js"></script>
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