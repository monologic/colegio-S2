app.controller('actividadController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getActividades').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha_inicio;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                    data[i].soloho = $scope.fe[1];
                }
                $scope.actividades = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }

    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.responsable = data.responsable;
        $scope.titulo = data.titulo;
        $scope.fecha_inicio = (data.fecha_inicio).replace(" ","T");
        $scope.fecha_fin = (data.fecha_fin).replace(" ","T");
        $('.fr-element').html(data.descripcion);
        $scope.lugar = data.lugar;
        $scope.participantes = data.participantes;
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

                $http.delete( 'actividades/'+id ).then(function successCallback(response) {
                    $scope.actividades = response.data;
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

    $scope.editar = function () {
        $http.put('actividades/' + $scope.id,
            {   'responsable':$scope.responsable,
                'titulo':$scope.titulo,
                'fecha_inicio':$scope.fecha_inicio,
                'fecha_fin':$scope.fecha_fin,
                'descripcion':$scope.descripcion,
                'lugar':$scope.lugar,
                'participantes':$scope.participantes,
                
            }).then(function successCallback(response) {
                $scope.actividades = response.data;
                $('#editar').modal('toggle');
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
    }
});