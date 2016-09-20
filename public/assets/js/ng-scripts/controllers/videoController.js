app.controller('videoController', function($scope,$http) {
    
    $scope.dataEditar = function (data) {
        $scope.id = data.id;
        $scope.nombre = data.nombre;
        $scope.descripcion = data.descripcion;
        $scope.url = data.url;
    }
    $scope.editar = function () {
        $http.put('video/' + $scope.id,
            {   'nombre':$scope.nombre,
                'descripcion':$scope.descripcion,
                'url':$scope.url,
                
            }).then(function successCallback(response) {
                
                swal({  title: "Editado!",
                        text: "El registro se ha editado.",
                        type: "success",   
                        showCancelButton: false,
                        confirmButtonText: "Aceptar",   
                        closeOnConfirm: false,   
                        closeOnCancel: false },
                        function(){
                            window.location.reload();
                        });
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

                $http.delete( 'video/'+id ).then(function successCallback(response) {
                    swal({  title: "Eliminado!",
                        text: "El registro se ha eliminado.",
                        type: "success",   
                        showCancelButton: false,
                        confirmButtonText: "Aceptar",   
                        closeOnConfirm: false,   
                        closeOnCancel: false },
                        function(){
                            window.location.reload();
                        });
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
});