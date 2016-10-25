@extends('templates.main')

@section('title', 'Agenda')

@section('content')
    
    <div class="contenidos" ng-controller="agendaController" ng-init="get()">

        <div class="cart">
            <h1 class="titulo">Entradas de Agenda</h1>
            @if (Auth::user()->usuariotipo_id == 2)
                <a href="{{ url('app/agenda/create') }}" class="btn btn-colegio">Crear Entrada</a>
            @endif
            <div style="margin-top: 20px"1`>
                <div style="width: 310px;float: right" id="bsq">
                    <input type="text" class="form-control" ng-model="buscar" style="width: 320px"><i class="glyphicon glyphicon-search" style="top:-25px;float: right;color: black"></i>
                </div>
                @if (Auth::user()->usuariotipo_id == 5)
                    <div ng-repeat="y in hijos">
                        <h3>Agenda de @{{ y.nombres + " " + y.apellidos }}</h3>
                        <table class="myTable table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha publicación</th>
                                    <th>Asunto</th>
                                    <th>Docente</th>
                                    <th>Área</th>
                                    <th>Acción</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="x in y.agenda | filter:buscar ">
                                    <td>@{{ $index+1 }}</td>
                                    <td>@{{ x.fecha_pub }}</td>
                                    <td>@{{ x.asunto }}</td>
                                    <td>@{{ x.nombre }}</td>
                                    <td>@{{ x.asignatura  }}</td>
                                    <td>
                                        <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#view" class="btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ver</a>
                                        @if (Auth::user()->usuariotipo_id == 2)
                                            <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar" class="btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            <button ng-click="eliminar(x.id);" class="btn"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                        @endif
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha publicación</th>
                                <th>Asunto</th>
                                <th>Docente</th>
                                <th>Área</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in entradas | filter:buscar ">
                                <td>@{{ $index+1 }}</td>
                                <td>@{{ x.fecha_pub }}</td>
                                <td>@{{ x.asunto }}</td>
                                <td>@{{ x.nombre }}</td>
                                <td>@{{ x.asignatura }}</td>
                                <td>
                                    <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#view" class="btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ver</a>
                                    @if (Auth::user()->usuariotipo_id == 2)
                                        <a href="" ng-click="dataEditar(x);" data-toggle="modal" data-target="#editar" class="btn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        <button ng-click="eliminar(x.id);" class="btn"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
                
            </div>
        	
        </div>
    	
        <!-- Modal de Edición -->
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Editar Entrada</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="@{{formUrl}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formEdit">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nombre">Emisor</label>
                                <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" ng-model='nombre' required>
                            </div>
                            <div class="form-group">
                                <label for="puesto_cargo">Cargo</label>
                                <input type="text" class="form-control" id="puesto_cargo"  name="puesto_cargo" ng-model='puesto_cargo' required>
                            </div>
                            <div class="form-group">
                                <label for="asunto">Asunto</label>
                                <input type="text" class="form-control" id="asunto" ng-model="asunto" placeholder="" name="asunto" required>
                            </div>
                            <div class="form-group">
                                <b><p for="cuerpo">Cuerpo</p></b>
                                <textarea name="cuerpo" id="cuerpo" ng-model="cuerpo" class="form-control" cols="70" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="fecha_pub">Fecha de publicación</label>
                                <input type="date" class="form-control" id="fecha_pub" ng-model="fecha_pub" placeholder="" name="fecha_pub" required>
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nivel</label>
                                <select class="form-control" id="nivel" ng-model="grados" name="nivel" ng-options="nivel for (nivel, grados) in data" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombres">Grado</label>
                                <select class="form-control" id="grado" ng-disabled="!grados" ng-model="secciones" name="grado" ng-options="grado for (grado, secciones) in grados.grados" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombres">Sección</label>
                                <select class="form-control" id="seccion" ng-disabled="!secciones" ng-model="seccion" name="seccion" ng-options="seccion for seccion in secciones track by seccion" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombres">Área</label>
                                <select class="form-control" ng-model="asignatura" name="asignatura" ng-options="asignatura for asignatura in grados.asignaturas | orderBy:'toString()' track by asignatura" required>
						   	
						    </select>
                            </div>
                            <div class="form-group">
                                <b for="archivo">Imagen</b>
                                <input type="file" name="imagen">
                            </div>
                            <input type="hidden" name="posteador" value="{{Auth::user()->id}}">
    
                            
                            <button ng-click='editarNoticia()' class="btn btn-colegio">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Vista -->
        <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" ng-bind="asunto"></h4>
                    </div>
                    <div class="modal-body">
                        <blockquote class="bro">
                            <div><b>Fecha de Publicación: </b><span ng-bind="fecha"></span></div>
                            <div><b>Publicó: </b><span>@{{nombres + " " + apellidos}}</span></div>
                            <div ng-if="nombre!=''"><b>Docente: </b><span ng-bind="nombre"></span></div>
                            <div ng-if="puesto_cargo!=''"><b>Cargo: </b><span ng-bind="puesto_cargo"></span></div>
                            <div><b>Área: </b><span ng-bind="asignatura"></span></div>
                            
                        </blockquote>
                        <p ng-bind="cuerpo"></p>
                        <div ng-if="imagen!=null" style="display:block;width:90%;margin:20px auto 20px auto"><img ng-src="../imagen/agenda/@{{imagen}}" class="img-responsive"></div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/ng-scripts/controllers/agendaController.js') }}"></script>
@endsection
