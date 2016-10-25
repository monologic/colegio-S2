@extends('templates.main')

@section('title', 'Crear Actividad')

@section('content')
	<div class="container">
		
    	<div ng-controller="actividadesController">
    		<div class="cart" style="max-width: 600px">
    			<h1 class="titulo">Crear Actividad</h1>
    			<form role="form" method="POST" action="{{ url('app/actividades') }}">
    				{{ csrf_field() }}
                    <div class="form-group">
                        <label for="responsable">Responsable, Nro contacto</label>
                        <input type="text" class="form-control" id="responsable" ng-model="responsable" placeholder="Escriba su nombre, y su número" name="responsable" required>
                    </div>
    				<div class="form-group">
					    <label for="titulo">Título</label>
					    <input type="text" class="form-control" id="titulo" ng-model="titulo" placeholder="" name="titulo" required>
					</div>
					<div class="form-group">
					    <label for="fecha_inicio">Fecha y hora (Inicio)</label>
					    <input type="datetime-local" class="form-control" id="fecha_inicio" ng-model="fecha_inicio" placeholder="2016-01-01 12:00" name="fecha_inicio" required>
					</div>
					<div class="form-group">
					    <label for="fecha_fin">Fecha y hora (Fin)</label>
					    <input type="datetime-local" class="form-control" id="fecha_fin" ng-model="fecha_fin" placeholder="2016-01-01 12:00" name="fecha_fin" required>
					</div>
					<div class="form-group">
					    <b for="descripcion">Descripción</b>
					    <textarea  id="" cols="50" rows="10" name="descripcion" class="edit"></textarea>
					</div>
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" name="tipo" id="tipo" ng-model="tipo" required>
                            <option value="Curricular">Curricular</option>
                            <option value="Extracurricular">Extracurricular</option>
                            <option value="Cocurricular">Co-curricular</option>
                        </select>
                    </div>
					<div class="form-group">
					    <label for="lugar">Lugar</label>
					    <input type="text" class="form-control" id="lugar" ng-model="lugar" placeholder="" name="lugar" required>
					</div>
					<div class="form-group">
					    <label for="participantes">Participantes</label>
					    <input type="text" class="form-control" id="participantes" ng-model="participantes" placeholder="" name="participantes" required>
					</div>
					
					<input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
					<button type="submit" class="btn btn-colegio">Guardar</button>
    			</form>
    		</div>
    	</div>
	</div>
    <script type="text/javascript">
        $( document ).ready(function() {
            var hoy = new Date();
            a = hoy.getFullYear() + "-" + ( (hoy.getMonth()+1) < 10 ? '0' + (hoy.getMonth()+1) : (hoy.getMonth()+1) ) + "-" + (hoy.getDate() < 10 ?  '0' + hoy.getDate() : hoy.getDate()) + "T12:00";
            $('#fecha_inicio').val(a);
            $('#fecha_fin').val(a);
        });
    </script>

    <script src="{{ asset('assets/js/ng-scripts/controllers/actividadesController.js') }}"></script>
	
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