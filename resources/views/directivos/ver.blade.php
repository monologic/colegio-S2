@extends('templates.main')

@section('title', 'Directivos')

@section('content')
    
    <div class="contenidos" ng-controller="directivosController" ng-init="get()">
        <div class="cart">
            <h1 class="titulo">Lista de Directivos</h1>
            <a href="{{ url('app/directivos/create') }}" class="btn btn-colegio">Añadir Directivo</a>
            <div style="margin-top: 20px">
                <table class="myTable table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="x in directivos">
                            <td>@{{ $index+1 }}</td>
                            <td>@{{ x.nombres }}</td>
                            <td>@{{ x.apellidos }}</td>
                            <td>@{{ x.dni }}</td>
                            <td>@{{ x.estado }}<button class="btn" ng-click="cambiarEstado(x.id, x.estado);"><i class="glyphicon glyphicon-refresh"></i></button></td>
                            <td>
                                <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    </tbody>
            </table>
            </div>	
        </div>
    	
        <!-- Modal de Edición -->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="myModalLabel">Editar Directivo</h2>
                    </div>
                    <div class="modal-body">
                        <form ng-submit="editar()">
                            <div class="form-group">
                                <label for="nombres">Nombres</label>
                                <input type="text" class="form-control" id="nombres" ng-model="nombres" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" ng-model="apellidos" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" ng-model="dni" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-colegio">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/ng-scripts/controllers/directivosController.js') }}"></script>
@endsection
