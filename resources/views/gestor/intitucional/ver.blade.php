@extends('templates.main')

@section('title', 'Editar nosotros')

@section('content')
	<div class="" style="width: 80%;margin: 30px auto 50px auto" ng-controller="institucionalController">

	<div class="card" style="padding: 20px">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($datos as $nosotro)
				<tr>
					<td>1</td>
					<td>{{$nosotro->nombre}}</td>
					<td>
						<a ng-click="plus({{$nosotro}});" data-toggle="modal" data-target="#editar"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>

                         <a ng-click="eliminar(x.id);"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a>
					</td>
				</tr>
				@endforeach 
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar</h4>
                        </div>
                        <div class="modal-body">
                            <div class="formulariok">
                                <form role="form" action="@{{formUrl}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formEdit">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="autor">Nombre</label>
                                        <input type="text" class="form-control" id="autor" name="autor" placeholder="" name="autor" ng-model="nombrem"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="titulo">Descripción</label>
                                        <textarea class='edit' rows="100" cols="150" ng-model="descripcion" name="vision"  style="margin-top: 30px;width: 80%;height: 150px">
										
										</textarea>
                                    </div>
                                    <div class="form-group">
                                        <b for="archivo">Foto</b>
                                        <input type="file" name="imagen">
                                    </div>
                                    <div class="form-group">
                                        <label for="epigrafe">Epígrafe</label>
                                        <input type="text" class="form-control" id="destinatario" name="epigrafe" ng-model="epigrafe"  required>
                                    </div>
                                    <a ng-click='editarNoticia()' class="btn btn-colegio">Guardar</a>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
     </div>
	
	</div>
	<script type="text/javascript" src="../assets/froala/js/froala_editor.min.js"></script>
	<script src="{{ asset('assets/js/ng-scripts/controllers/institucionalController.js') }}"></script>

  	<script>
	      $(function(){
	        $('.edit')
	          .on('froalaEditor.initialized', function (e, editor) {
	            $('.edit').parents('form').on('submit', function () {
	              console.log($('#edit').val());
	              return false;
	            })
	          })
	          .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
	      });
	</script>
@endsection