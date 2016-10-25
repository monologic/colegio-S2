
@extends('templates.main')

@section('title', 'Novedades')

@section('content')
    <div ng-controller="novedadesController" ng-init="get()">
        <div class="contenidos">
            <div class="col-md-6">
                <div class="cart">
                    <h1 class="titulo">Mis Novedades</h1>
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Titular</th>
                                <th>Reseña</th>       
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in noticias" ng-if="{{Auth::user()->id}} ==  x.posteador ">
                                <td>@{{ x.fecha }}</td>
                                <td>@{{ x.titulo }}</td>
                                <td>@{{ x.copete }}</td>
                                <td>
                                    <a ng-click="plus(x);" data-toggle="modal" data-target="#editar"><i class="glyphicon glyphicon-pencil" style="color:black"></i></a>

                                    <a ng-click="eliminar(x.id);"> <i class="glyphicon glyphicon-trash" style="color:black;margin-left: 10px"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ url('app/novedades/create') }}" class="btn btn-colegio">Crear Novedad</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cart">
                    <h2 class="titulo">Todas las novedades</h2>
                    <table class="myTable table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Titular</th>
                                <th>Reseña</th>     
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="y in noticias">
                                <td>@{{ y.fecha }}</td>
                                <td>@{{ y.titulo }}</td>
                                <td>@{{ y.copete }}</td>
                                <td>
                                    <a ng-click="plus(y);" data-toggle="modal" data-target="#mas"><i class="glyphicon glyphicon-plus" style="color:black"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Noticia</h4>
                        </div>
                        <div class="modal-body">
                            <div class="formulariok">
                                <form role="form" action="@{{formUrl}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id="formEdit">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="autor">Autor</label>
                                        <input type="text" class="form-control" id="autor" name="autor" placeholder="" name="autor" ng-model="autorm"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="titulo">Título</label>
                                        <input type="text" class="form-control" id="nombre"  name="titulo" ng-model="titulom"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="copete">Copete</label>
                                        <input type="text" class="form-control" id="copete"  name="copete" ng-model="copetem"  required>
                                    </div>
                                    <div class="form-group">
                                        <b for="archivo">Foto</b>
                                        <input type="file" name="imagen">
                                    </div>
                                    <div class="form-group">
                                        <label for="epigrafe">Epígrafe</label>
                                        <input type="text" class="form-control" id="destinatario" name="epigrafe" ng-model="epigrafem"  required>
                                    </div>
                                    <div class="form-group">
                                        <b for="cuerpo">Cuerpo</b>
                                        <textarea id="" cols="50" rows="10" name="cuerpo" class="edit" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha">Fecha de publicación</label>
                                        <input type="date" class="form-control" id="fecha" placeholder="2016-01-01" name="fecha" ng-model="solofec"  required>
                                    </div>
                                    <input type="hidden" name="posteador" value="{{Auth::user()->id}}">
                                    <a ng-click='editarNoticia()' class="btn btn-colegio">Guardar</a>
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
                        <div class="modal-body" style="padding: 20px">
                            
                            <h2 class="modal-title" id="myModalLabel" ng-bind="titulom"></h2>
                            <br><span ng-bind="epigrafem"></span>
                            <blockquote class="bro">
                                <div><b>Autor: </b><span ng-bind="autorm"></span></div>
                                <div><b>Fecha: </b><span ng-bind="fecham"></span></div>     
                            </blockquote>
                            <figure class="imgnot">
                                <img ng-src="../imagen/novedades/@{{fotom}}" alt="novedades robert gagne" class="imgn" />
                                <figcaption ng-bind="copetem"></figcaption> 
                            </figure>
                            <div id="cuerpo"></div>
                            
                        </div>
                    </div>
            </div>
        </div>
   </div>
     <!-- Modal de Edición -->
    <script src="{{ asset('assets/js/ng-scripts/controllers/novedadesController.js') }}"></script>

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