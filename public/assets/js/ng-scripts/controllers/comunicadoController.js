app.controller('comunicadoController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getComunicados').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha_pub;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                }
                $scope.comunicados = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.getComuni = function () {
        $http.get('getComunicadosIndex').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha_pub;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                }
                $scope.comun = data;
                console.log($scope.comunicados)
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.dataEditar = function (data) {

        $scope.formUrl = "comunicados/"+ data.id;
        $scope.nom = data.nombre;
        $scope.car = data.puesto_cargo;
        $scope.destinatario = data.destinatario;
        $scope.asunto = data.asunto;
        $scope.cuerpo = data.cuerpo;
        $scope.fecha_pub = (data.fecha_pub).replace(" ","T");
    }
    $scope.editar = function () {
        $http.put('comunicados/' + $scope.id,
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
    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.nombrem = data.nombre;
        $scope.cargo = data.puesto_cargo;
        $scope.cuerpom = data.cuerpo;
        $scope.destinatariom = data.destinatario;
        $scope.fechams = data.fecha_pub.split(" ");
        $scope.solofe =  $scope.fechams[0];
        $scope.asuntom = data.asunto;
        
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

                $http.delete( 'comunicados/'+id ).then(function successCallback(response) {
                    data = response.data;
                    for(i in data){
                        rs=data[i].fecha_pub;
                        $scope.fe = rs.split(' ');
                        data[i].solofe = $scope.fe[0];
                    }
                    $scope.comunicados = data;
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