@extends('templates.main')

@section('title', 'Docentes')

@section('content')
    <div class="contenidos">
        <div ng-controller="docentesController" ng-init="get()">
            <div class="cart">
                <h1 class="titulo">Lista de Docentes</h1>
                <a href="{{ url('app/docentes/create') }}" class="btn btn-colegio">Añadir Docente</a>
                    <table class="myTable table-hover">
                        <thead>
                            
                                    <div style="width: 310px;float: right" id="bsq">
                                         <input type="text" class="form-control" ng-model="buscar" style="width: 320px"><i class="glyphicon glyphicon-search" style="top:-25px;float: right;color: black"></i>
                                    </div>
                            
                            
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in docentes | filter:buscar ">

                                <td>@{{ x.nombres }}</td>
                                <td>@{{ x.apellidos }}</td>
                                <td>@{{ x.dni }}</td>
                                <td>
                                    <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                    <button ng-click="eliminar(x.id);" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Docente</h4>
                        </div>
                        <div class="modal-body">
                            <form ng-submit="editar()">
                                <div class="form-group">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class="form-control" ng-model="nombres">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" class="form-control" ng-model="apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" class="form-control" ng-model="dni"">
                                </div>
                                <button type="submit" class="btn btn-colegio">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        	
            <!-- Modal de Edición -->
            
        </div>
    </div>
    <script src="{{ asset('assets/js/ng-scripts/controllers/docentesController.js') }}"></script>
@endsection
