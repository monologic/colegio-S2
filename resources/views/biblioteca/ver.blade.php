
@extends('templates.main')

@section('title', 'Biblioteca')

@section('content')
    <div ng-controller="archivoController" ng-init="getTipos(); setSelect();" >
        <div class="contenidosa" style="width: 98%">
            <div class="row">
                <h1 class="titulo text-center">Biblioteca Virtual</h1>
                
                <div style="margin-left: 15px">
                    <form class="form-inline" action="{{ url('app/archivos') }}" method="GET">
                        <label for="edicion">Tipo de archivo</label>
                        <select class="form-control" name="archivotipo_id" id="tipoArchivo" ng-model="archivotipo_id" ng-options="at.tipo for at in ats track by at.id">
                        </select>
                        <input type="text" class="form-control" id="valor" name="valor" value="{{$valor}}" >
                        <button type="submit" class="btn btn-colegio">Buscar</button>
                    </form>
                    <div id="field" data-field-id="{{$tipo}}" ></div>
                        <script>
                        // Asumning you are using JQuery
                        $( window ).load(function() {
                            var fieldId = $('#field').data("field-id");
                            $("#tipoArchivo").val(fieldId);
                        });
                        </script>
                </div><br>
                <div class="col-md-8"> 
                    <form class="form-inline" id="ordenarForm" action="{{ url('app/archivos') }}" method="GET">
                            <label for="">Ordenar Por</label>
                            <select class="form-control" name="ordenar" ng-model="ordenar_por" ng-change="ordenar()">
                                <option value="titulo">Título</option>
                                <option value="autor">Autor</option>
                                <option value="archivotipo_id">Tipo de Documento</option>
                            </select>
                    </form>     
                </div>
            </div>
                
            @if ( Auth::user()->usuariotipo_id == 1 || Auth::user()->usuariotipo_id == 5)
                
                    @foreach ($archivos as $archivo)
                        <div class="cartA">
                            <div class="ta">{{ $archivo->titulo }}</div>
                            <blockquote class="bro">
                                <div> <b>Autor:</b>  {{ $archivo->autor }}</div>
                                <div> <b>Tipo :</b> {{ $archivo->archivotipo->tipo }}</div>
                            </blockquote>
                            <button class="btn btn-colegio" ng-click="plus({{ $archivo }});" data-toggle="modal" data-target="#mas"><i class="fa fa-plus"> </i> Información</button>
                            <a href="archivo/{{ $archivo->id }}" alt="archivo" class="btn btn-colegio" /><i class="fa fa-eye" aria-hidden="true"></i> Ver Documento</a> 
                        </div>
                    @endforeach 
                    {!! $archivos->render() !!} 
               
            @endif
            @if ( Auth::user()->usuariotipo_id == 2 || Auth::user()->usuariotipo_id == 3 || Auth::user()->usuariotipo_id == 4)
            <div class="col-md-8">
                @foreach ($archivos as $archivo)
                        <div class="cartA">
                            <div class="ta">{{ $archivo->titulo }}</div>
                            <blockquote class="bro">
                                <div class="row">
                                    <div class="col-xs-6"> <b>Autor:</b> {{ $archivo->autor }}</div>
                                    <div class="col-xs-6"> <b>Tipo:</b> {{ $archivo->archivotipo->tipo }}</div>
                                </div>
                            </blockquote>
                            <div>
                                <button class="btn btn-colegio" ng-click="plus({{ $archivo }});" data-toggle="modal" data-target="#mas"><i class="fa fa-plus"> </i> Información</button>
                                <a href="archivo/{{ $archivo->id }}" alt="archivo" class="btn btn-colegio" /><i class="fa fa-eye" aria-hidden="true"></i> Ver Documento</a> 
                            </div>
                        </div>
                    @endforeach 
                    {!! $archivos->render() !!} 
            </div>
            <div class="col-md-4">
                <div class="cart">
                    <h2 class="titulo">Mis Publicaciones</h2>
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>       
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($archivos as $y)
                            @if ($y->posteador == Auth::user()->id)
                            <tr>

                                <td>{{ $y->titulo }}</td>
                                <td>{{ $y->autor }}</td>
                                <td>
                                    <a ng-click="plus({{$y}});" data-toggle="modal" data-target="#editar"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>
                                    <a ng-click="eliminar({{$y->id}});"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        
                        </tbody>
                    </table>
                    <a href="{{ url('app/archivos/create') }}" class="btn btn-colegio">Añadir Archivo</a>
                </div>
            </div>
            @endif
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Archivo</h4>
                        </div>
                        <div class="modal-body">
                            <div class="formulariok">
                                <form role="form" action="@{{formUrl}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formEdit">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" required ng-model="titulom">
                                    </div>
                                    <div class="form-group">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor" placeholder="" name="autor" required ng-model="autorm">
                                    </div>
                                    <div class="form-group">
                                        <label for="pub_lugar">Lugar de Publicación</label>
                                        <input type="text" class="form-control" id="pub_lugar"  name="pub_lugar" required ng-model="pub_lugar">
                                    </div>
                                    <div class="form-group">
                                        <label for="pub_editorial">Editorial</label>
                                        <input type="text" class="form-control" id="pub_editorial"  name="pub_editorial" required ng-model="pub_editorial">
                                    </div>
                                    <div class="form-group">
                                        <label for="pub_year">Año de Publicación</label>
                                        <input type="text" class="form-control" id="pub_year"  name="pub_year" required ng-model="pub_year">
                                    </div>
                                    <div class="form-group">
                                        <label for="edicion">Edición</label>
                                        <input type="text" class="form-control" id="edicion"  name="edicion" required ng-model="edicion">
                                    </div>
                                    <div class="form-group">
                                        <b for="archivo">Archivo</b>
                                        <input type="file" name="archivo">
                                    </div>
                                    <div class="form-group">
                                        <label for="edicion">Tipo de archivo</label>
                                        <select class="form-control" name="archivotipo_id" id="archivotipo_id" required ng-model="archivotipo_id" ng-options="at.tipo for at in ats track by at.id">
                                            <option value="">Seleccione...</option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="posteador" value="{{Auth::user()->id}}">
                                    <a ng-click='editarArchivo()' class="btn btn-colegio">Guardar</a>
                                </form>
                            </div>
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
                        <div class="modal-body" style="padding: 20px" onload="ver()">
                            <span ng-bind="epigrafem"></span>
                            <h2 class="modal-title" id="myModalLabel" ng-bind="titulom"></h2>
                            <br>
                            <blockquote class="bro">
                                <div><b>Título: </b><span ng-bind="titulom"></span></div>
                                <div><b>Autor: </b><span ng-bind="autorm"></span></div>
                                
                                <div><b>Lugar de publicación: </b><span ng-bind="pub_lugar"></span></div>
                                <div><b>Editorial: </b><span ng-bind="pub_editorial"></span></div>
                                <div><b>Año: </b><span ng-bind="pub_year"></span></div>
                                <div><b>Edición: </b><span ng-bind="edicion"></span></div>

                            </blockquote>
                            <p ng-bind="descrip"></p>
                            <div id='frameVer'></div>  
                        </div>
                    </div>
            </div>
        </div>
   </div>
     <!-- Modal de Edición -->
    <script src="{{ asset('assets/js/ng-scripts/controllers/archivoController.js') }}"></script>
    <script>
        function ver()
        {
            alert('nuevo')
        }
    </script>
@endsection