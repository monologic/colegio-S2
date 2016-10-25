app.controller('actividadController', function($scope,$http) {
    $scope.get = function () {
        $http.get('getActividades').then(function successCallback(response) {
                data = response.data;
                $scope.actividades = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.getmes = function () {

        var f = new Date();
        fe = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();

        $http.get('ac/'+fe).then(function successCallback(response) {
            data = response.data;
            $scope.imprimir(data);
        }, function errorCallback(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        });
    }
    $scope.imprimir = function (data){
        for (var i = 0; i < data.length; i++) {
            rd = data[i].fecha.split(' ');
            a = rd[0].split('-');
            dia = a[2]+'-'+ a[1] + '-' + a[0];
        }
        
    }
    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.responsable = data.responsable;
        $scope.titulo = data.titulo;
        $scope.tipo = data.tipo;
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
        def = $('#act-des').val();
        $http.put('actividades/' + $scope.id,
            {   'responsable':$scope.responsable,
                'titulo':$scope.titulo,
                'fecha_inicio':$scope.fecha_inicio,
                'fecha_fin':$scope.fecha_fin,
                'descripcion':def,
                'tipo':$scope.tipo,
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