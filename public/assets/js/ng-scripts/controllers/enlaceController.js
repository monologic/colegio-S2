app.controller('enlaceController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getEnlaces').then(function successCallback(response) {
                data = response.data;
                $scope.enlaces = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.getindexe = function () {
        $http.get('getEnlacesIndex').then(function successCallback(response) {
                data = response.data;
                $scope.enlaces = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.firstEnalce = function () {
        $http.get('getEnlacesIndex').then(function successCallback(response) {
                data = response.data;
                $scope.allenlaces = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.dataEditar = function (data) {

        $scope.id = data.id;
        $scope.formUrl2 = 'enlaces/' + data.id;
        $scope.nombre = data.nombre;
        $scope.direccion = data.url;

    }
    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.formUrl = 'noticias/' + data.id;
        $scope.titulom = data.titulo;
        $scope.autorm = data.autor;
        $scope.copetem = data.copete;
        $scope.cuerpom = data.cuerpo;
        $scope.epigrafem = data.epigrafe;
        $scope.fecham = data.fecha.split(" ");
        $scope.solofec =  $scope.fecham[0];
        $scope.fotom = data.foto;

    }
    $scope.editar = function () {
        $http.put('estudiantes/' + $scope.id,
            {   'nombres':$scope.nombres,
                'apellidos':$scope.apellidos,
                'dni':$scope.dni,
                'nivel':$scope.nivel,
                'grado':$scope.grado,
                'seccion':$scope.seccion
            }).then(function successCallback(response) {
                $scope.estudiantes = response.data;
                $('#editar').modal('toggle')
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

                $http.delete( 'enlaces/'+id ).then(function successCallback(response) {
                    $scope.get();
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

    $scope.editarNoticia = function () {
        $( "#formEdit" ).submit();
    }
});