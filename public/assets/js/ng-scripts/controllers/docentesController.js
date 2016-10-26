app.controller('docentesController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getDocentes').then(function successCallback(response) {
                $scope.docentes = response.data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
     $scope.todos = function () {
        $http.get('getDirec').then(function successCallback(response) {
                $scope.doc = response.data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.guardar = function () {

        $http.post('../docentes',
            {   'nombres':$scope.nombres,
                'apellidos':$scope.apellidos,
                'dni':$scope.dni,
                'nivel':$scope.nivel,
                'grado':$scope.grado,
                'seccion':$scope.seccion
            }).then(function successCallback(response) {
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    }
    $scope.send = function (){
        document.getElementById("ed").submit();
    }
    $scope.mtitulo = 'data.titulo';
    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.formUrl = 'directorio/' + data.id;
        $scope.mtitulo = data.titulo;
        $scope.nombre = data.nombre;
        $scope.cargo = data.cargo;
        $scope.email = data.email;
    }
    $scope.dataEditar = function (data) {

        $scope.id = data.id;
        $scope.nombres = data.nombres;
        $scope.apellidos = data.apellidos;
        $scope.dni = data.dni;

    }
    $scope.editar = function () {
        $http.put('docentes/' + $scope.id,
            {   'nombres':$scope.nombres,
                'apellidos':$scope.apellidos,
                'dni':$scope.dni,
                'nivel':$scope.nivel,
                'grado':$scope.grado,
                'seccion':$scope.seccion
            }).then(function successCallback(response) {
                $scope.docentes = response.data;
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

                $http.delete( 'docentes/'+id ).then(function successCallback(response) {
                    $scope.docentes = response.data;
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
    $scope.eliminarD = function (id) {
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

                $http.delete( 'directorio/'+id ).then(function successCallback(response) {
                    javascript:location.reload()
                }, function errorCallback(response) {
                    javascript:location.reload()
                });
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