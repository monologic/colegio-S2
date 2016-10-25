@extends('templates.main')

@section('title', 'Album')

@section('content')
    <div ng-controller="videoController"> 
    <div class="cart" style="max-width: 600px">
        <h1 class="titulo text-center">Álbumes de fotos</h1>
        <a href="{{ url('app/album/create') }}" class="btn btn-colegio" style="display: block;position:relative;padding: 7px;max-width: 100px;right: 0;margin-bottom:20px;float:right"> Crear Álbum</a>
        <table class="table">
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fotos</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todo[0] as $albun)
                <tr>
                    <td>{{$albun->nombre}}</td>
                    <td>{{$albun->descripcion}}</td>
                    <td><a href="getAlbum/{{$albun->id}}" class="btn"><i class="glyphicon glyphicon-picture"></i></a></td>
                    <td>{{$albun->activo}}<button class="btn" onclick="cambiarEstado({{$albun->id}});"><i class="glyphicon glyphicon-refresh"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            function cambiarEstado(id) {
                swal({   title: "",
                    text: "Deseas cambiar el estado del álbum?",
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Sí",
                    closeOnConfirm: false,
                    cancelButtonText:"Cancelar", }, 
                    function(){
                        window.location.href = "cambiarEstadoAlbum/" + id;
                    }
                );
            }
        </script>
    </div>
    <!-- videos -->
    
    <div class="cart" style="max-width: 600px">
        <h1 class="titulo text-center">Videos</h1>
        <a href="{{ url('app/video/create') }}" class="btn btn-colegio" style="display: block;position:relative;padding: 7px;max-width: 100px;right: 0;margin-bottom:20px;float:right"> Añadir Video</a>
        <table class="table">
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todo[1]  as $videos)
                <tr>
                    <td>{{$videos->nombre}}</td>
                    <td>
                        <a ng-click="dataEditar({{ $videos }});" data-toggle="modal" data-target="#editar" class="btn"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>
                        <a ng-click="eliminar({{ $videos->id }});" class="btn"><i class="glyphicon glyphicon-trash" style="color:black"></i></a>
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
                        <h3>Editando Video</h3>
                    </div>
                    <div class="modal-body" style="padding: 20px">
                        <div class="formulariok">
                            <form ng-submit='editar();'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" required ng-model="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Descripción</label>
                                    <textarea class="form-control" id="direccion"  name="descripcion" required ng-model="descripcion"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="url">Url</label>
                                    <input type="text" class="form-control" id="url" placeholder="" name="url" required ng-model="url">
                                </div>
                                <button type="submit" class="btn btn-colegio">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/ng-scripts/controllers/videoController.js') }}"></script>
@endsection