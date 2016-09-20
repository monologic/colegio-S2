app.controller('noticiaController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getNoticia').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                }
                $scope.noticias = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
     $scope.getss = function () {
        $http.get('getNoticia').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                }
                $scope.noticias = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }

    $scope.firstNotice = function () {
        $http.get('getNoticiaIndex').then(function successCallback(response) {
                data = response.data;
                for(i in data){
                    rs=data[i].fecha;
                    $scope.fe = rs.split(' ');
                    data[i].solofe = $scope.fe[0];
                }
                $scope.allnot = data;
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
        $scope.nivel = data.nivel;
        $scope.grado = data.grado;
        $scope.seccion = data.seccion;

    }
    $scope.plus = function (data) {

        $scope.id = data.id;
        $scope.formUrl = 'noticias/' + data.id;
        $scope.titulom = data.titulo;
        $scope.autorm = data.autor;
        $scope.copetem = data.copete;
        $('#cuerpo').html(data.cuerpo);
        $('.fr-element').html(data.cuerpo);
        $scope.epigrafem = data.epigrafe;
        $scope.fecham = data.fecha.split(" ");
        $scope.solofec =  $scope.fecham[0];
        $scope.fotom = data.foto;
        $scope.fecha = (data.fecha).replace(" ","T");

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

                $http.delete( 'noticias/'+id ).then(function successCallback(response) {
                    data = response.data;
                    for(i in data){
                        rs=data[i].fecha;
                        $scope.fe = rs.split(' ');
                        data[i].solofe = $scope.fe[0];
                    }
                    $scope.noticias = data;
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