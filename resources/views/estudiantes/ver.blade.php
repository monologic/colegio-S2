@extends('templates.main')

@section('title', 'Estudiantes')

@section('content')
    <div class="contenidos">
        <div ng-controller="estudiantesController" ng-init="get()">
            <div class="cart">
                <h1 class="titulo">Lista de estudiantes</h1>
                <a href="{{ url('app/estudiantes/create') }}" class="btn btn-colegio">Añadir Estudiante</a>
                <div style="margin-top: 20px">
                    <table class="myTable table-hover">
                        <thead>
                            <div style="width: 310px;float: right" id="bsq">
                                <input type="text" class="form-control" ng-model="buscar" style="width: 320px"><i class="glyphicon glyphicon-search" style="top:-25px;float: right;color: black"></i>
                            </div>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>DNI</th>      
                                <th>Nivel</th>
                                <th>Grado</th>
                                <th>Sección</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in estudiantes | filter:buscar ">
                                <td>@{{ $index+1 }}</td>
                                <td>@{{ x.nombres }}</td>
                                <td>@{{ x.apellidos }}</td>
                                <td>@{{ x.dni }}</td>
                                <td>@{{ x.nivel }}</td>
                                <td>@{{ x.grado }}</td>
                                <td>@{{ x.seccion }}</td>
                                <td>
                                    <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                    <button ng-click="eliminar(x.id);" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
                            <h4 class="modal-title" id="myModalLabel">Editar Estudiante</h4>
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
                                <div class="form-group">
                                    <label for="nombres">NIvel</label>
                                    <select class="form-control" ng-model="nivel">
                                        <option>Inicial</option>
                                        <option>Primaria</option>
                                        <option>Secundaria</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombres">Grado</label>
                                    <select class="form-control" ng-model="grado">
                                        <option>4 Años</option>
                                        <option>5 Años</option>
                                        <option>1er</option>
                                        <option>2do</option>
                                        <option>3ro</option>
                                        <option>4to</option>
                                        <option>5to</option>
                                        <option>6to</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombres">Sección</label>
                                    <select class="form-control" ng-model="seccion">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>Los Geniales</option>
                                        <option>Los Exploradores</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/ng-scripts/controllers/estudiantesController.js') }}"></script>
@endsection
