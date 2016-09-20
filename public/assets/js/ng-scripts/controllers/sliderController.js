app.controller('sliderController', function($scope,$http) {
    
    $scope.gets = function () {
        $http.get('getSliderIndex').then(function successCallback(response) {
                data = response.data;
                $scope.slider = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.get = function () {
        $http.get('getSlider').then(function successCallback(response) {
                data = response.data;
                $scope.slider = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.$on('ngRepeatFinished', function(ngRepeatFinishedEvent) {
        $("#owl-demo").owlCarousel({
            singleItem : true,
            transitionStyle : "fadeUp",
            autoPlay : 5000
        });
    }); 
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
        $scope.formUrl2 = 'slider/' + data.id;
        $scope.titulo = data.titulo;
         $scope.orden = data.orden;
        $scope.estado = data.estado;
        $scope.descripcion = data.descripcion;

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

                $http.delete( 'slider/'+id ).then(function successCallback(response) {
                    $scope.noticias = response.data;
                }, function errorCallback(response) {
                   javascript:location.reload()
                });
            }
        );
    }

    $scope.editarNoticia = function () {
        $( "#formEdit" ).submit();
    }
});