app.controller('padresController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getPadres').then(function successCallback(response) {
                $scope.padres = response.data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.guardar = function () {

        $http.post('../padres',
            {   'nombres':$scope.nombres,
                'apellidos':$scope.apellidos,
                'dni':$scope.dni,
            }).then(function successCallback(response) {
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    }

    $scope.dataEditar = function (data) {

        $scope.id = data.id;
        $scope.nombres = data.nombres;
        $scope.apellidos = data.apellidos;
        $scope.dni = data.dni;

    }
    $scope.editar = function () {
        $http.put('padres/' + $scope.id,
            {   'nombres':$scope.nombres,
                'apellidos':$scope.apellidos,
                'dni':$scope.dni,
                'nivel':$scope.nivel,
                'grado':$scope.grado,
                'seccion':$scope.seccion
            }).then(function successCallback(response) {
                $scope.padres = response.data;
                $('#editar').modal('toggle');
                swal("Editado!", 
                    "El registro se ha editado.", 
                    "success"); 
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    }

    $scope.eliminar = function (id) {
        swal({   title: "",
            text: "Está seguro que desea eliminar este registro?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Sí, estoy seguro!",
            closeOnConfirm: false,
            cancelButtonText:"Cancelar", }, 
            function(){

                swal("Eliminado!", 
                    "El registro se ha eliminado.", 
                    "success"); 

                $http.delete( 'padres/'+id ).then(function successCallback(response) {
                    $scope.padres = response.data;
                }, function errorCallback(response) {
                    swal({   
                        title: "Ha ocurrido un error!",   
                        text: "No se puede borrar datos utilizados para otros registros.",   
                        timer: 3000,   
                        showConfirmButton: false 
                    });
                });
            }
        );
    }
    $scope.eliminarAsignacion = function (id) {
        swal({   title: "",
            text: "Está seguro que desea eliminar este registro?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Sí, estoy seguro!",
            closeOnConfirm: false,
            cancelButtonText:"Cancelar", }, 
            function(){

                swal("Eliminado!", 
                    "El registro se ha eliminado.", 
                    "success"); 

                $http.delete( 'deleteAsignacion/'+id ).then(function successCallback(response) {
                    $scope.padreHijos = response.data;
                }, function errorCallback(response) {
                    swal({   
                        title: "Ha ocurrido un error!",   
                        text: "No se puede borrar datos utilizados para otros registros.",   
                        timer: 3000,   
                        showConfirmButton: false 
                    });
                });
            }
        );
    }
    $scope.buscarPadre = function (id) {
        $http.get('getPadre/'+$scope.dni).then(function successCallback(response) {
                $scope.padre = response.data;
                if (($scope.padre).length == 1) {
                    $scope.buscarHijos(response.data[0].id);
                }
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            }
        );
    }
    $scope.buscarHijos = function (idPadre) {
         $http.get('getHijosPadre/'+idPadre).then(function successCallback(response) {
                $scope.padreHijos = response.data;   
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            }
        );
    }
    $scope.buscarHijo = function (dni) {
        $http.get('getEstudiante/'+dni).then(function successCallback(response) {
            $scope.estudiantes = response.data;
        }, function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });
    }
    $scope.asignarHijo = function (dni) {
        swal({   title: "",
            text: "Desea asignar este estudiante a Padre?",
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Sí",
            closeOnConfirm: false,
            cancelButtonText:"Cancelar", }, 
            function(){

                $http.get('asignarHijo/'+dni+'/'+$scope.padre[0].id).then(function successCallback(response) {
                    $scope.padreHijos = response.data;
                }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                });

                swal("", 
                    "Se ha asignado correctamente!", 
                    "success"); 
            }
        );
        
    }
    $scope.cambiarEstado = function (id, estado) {
        swal({  title: "",
                text: "Deseas cambiar el estado del Usuario?",
                type: "warning",   
                showCancelButton: true,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Sí",
                closeOnConfirm: false,
                cancelButtonText:"Cancelar", }, 
                function(){
                    if (estado == 'Activo')
                        estado = 'Inactivo';
                    else if (estado == 'Inactivo')
                        estado = 'Activo';

                    $http.get('cambiarEstado/' + id + '/' + estado).then(function successCallback(response) {
                            window.location.reload();
                        }, function errorCallback(response) {
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                    });

                }
            );
    }

});