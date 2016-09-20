@extends('templates.main')

@section('title', 'Galeria')

@section('content')
    <div ng-controller="galeriaController" ng-init="get()">
        <div class="contenidos">
            <div class="col-md-12">
                <div class="cart" style="max-width: 650px">
                    <h1 class="titulo">Galería de fotos</h1>
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Imagen</th> 
                                <th>Acción</th>       
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeria as $foto)
                            <tr>
                                <td>{{ $foto->nombre }}</td>
                                <td>{{ $foto->estado }}</td>
                                <td><img src="../../imagen/galeria/{{ $foto->imagen }}" width="80" height="50"></td>
                                <td>
                                    <a ng-click="dataEditar({{ $foto }});" data-toggle="modal" data-target="#editar"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>
                                    <a ng-click="eliminar({{ $foto->id }});"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="" data-toggle="modal" data-target="#mas" class="btn btn-colegio">Añadir fotos</a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h3>Editando foto</h3>
                        </div>
                        <div class="modal-body" style="padding: 20px">
                            <div class="formulariok">
                                <form id="EditarForm" method="POST" action="@{{formUrl2}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" ng-model="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Descripción</label>
                                        <textarea class="form-control" id="direccion"  name="descripcion" ng-model="descripcion" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" class="form-control" ng-model="estado">
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <b><p for="imagen">Imagen</p></b>
                                        <input type="file" name="imagen">
                                    </div>
                                    <input type="hidden" name="albun_id" value="{{$idalbum}}">
                                    
                                    <button class="btn btn-colegio" id="editarBtn">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal fade" id="mas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h3>Agregando foto</h3>
                        </div>
                        <div class="modal-body" style="padding: 20px">
                            <div class="formulariok">
                                <form  method="POST" action="{{ url('app/galeria') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" ng-model="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion">Descripción</label>
                                        <textarea class="form-control" id="direccion"  name="descripcion" ng-model="descripcion" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" class="form-control" ng-model="estado">
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <b><p for="imagen">Imagen</p></b>
                                        <input type="file" name="imagen">
                                    </div>
                                    <input type="hidden" name="albun_id" value="{{$idalbum}}">
                                    <button type="submit" class="btn btn-colegio">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
   </div>
    <script type="text/javascript">
        $( "#editarBtn" ).click(function() {
            $( "#EditarForm" ).submit();
        });
    </script>
     <!-- Modal de Edición -->
    <script src="{{ asset('assets/js/ng-scripts/controllers/galeriaController.js') }}"></script>
@endsection