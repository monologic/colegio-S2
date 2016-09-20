@extends('templates.main')

@section('title', 'Enlaces')

@section('content')
    <div ng-controller="enlaceController" ng-init="get()">
        <div class="contenidos">
            <div class="col-md-12">
                <div class="cart">
                    <h1 class="titulo">Administrador de enlaces</h1>
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Imagen</th> 
                                <th>Acción</th>       
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in enlaces">
                               <td>@{{$index+1}}</td>
                                <td>@{{ x.nombre }}</td>
                                <td>@{{ x.url }}</td>
                                <td><img src="../imagen/enlace/@{{ x.imagen }}" width="80" height="50"></td>
                                <td>
                                    <a ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>

                                    <a ng-click="eliminar(x.id);"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('app/enlaces/create') }}" class="btn btn-colegio">Crear enlaces</a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Comunicado</h4>
                        </div>
                        <div class="modal-body">
                            <form  action="@{{formUrl2}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formEdit">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombre" ng-model="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="asunto">Dirección</label>
                                    <input type="text" class="form-control" id="asunto" name="url" ng-model="direccion">
                                </div>
                                <div class="form-group">
                                    <label for="archivo">Imagen</label>
                                    <input type="file" name="imagen">
                                </div>
                                <a ng-click='editarNoticia()' class="btn btn-colegio">Guardar Cambios</a>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal fade" id="mas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" style="padding: 20px">
                            
                            <h2 class="modal-title" id="myModalLabel" ng-bind="asuntom"></h2>
                            <br><p>Remitente: <span ng-bind="nombrem"></span></p>
                            <blockquote class="bro">
                                <div><b>Destinatario: </b><span ng-bind="destinatariom"></span></div>
                                <div><b>Fecha de publicacion: </b><span ng-bind="solofe"></span></div>     
                            </blockquote>
                            <figure class="imgnot">
                                <iframe src="http://docs.google.com/gview?url=http://localhost:8000/imagen/comunicados/as.pdf&embedded=true" style="width:500px; height:375px;" frameborder="0"></iframe>
                                <figcaption ng-bind="copetem"></figcaption> 
                            </figure>
                            <div ng-bind="cuerpom"></div>
                            
                            
                        </div>
                    </div>
            </div>
        </div>
   </div>
     <!-- Modal de Edición -->
    <script src="{{ asset('assets/js/ng-scripts/controllers/enlaceController.js') }}"></script>
@endsection