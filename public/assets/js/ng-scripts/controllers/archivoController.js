app.controller('archivoController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getArchivos').then(function successCallback(response) {
                data = response.data;
                $scope.archivos = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.getTipos = function () {
        $http.get('getArchivoTipos').then(function successCallback(response) {
                data = response.data;
                $scope.ats = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }

    $scope.plus = function (data) {
        console.log(data);
        $scope.id = data.id;
        $scope.formUrl = 'archivos/' + data.id;
        $scope.descrip = data.decripcion;
        $scope.titulom = data.titulo;
        $scope.autorm = data.autor;
        $scope.pub_lugar = data.pub_lugar;
        $scope.pub_editorial = data.pub_editorial;
        $scope.pub_year = data.pub_year;
        $scope.fecham = data.created_at.split(" ");
        $scope.solofec =  $scope.fecham[0];
        $scope.edicion = data.edicion;
        $scope.archivo = data.archivo;
        $('#archivotipo_id').val(data.archivotipo.id);
        //$scope.archivotipo_id = data.archivotipo.id;
        /*
        $scope.archivoUrl = 'https://drive.google.com/viewerng/viewer?url=http://robert.runait.com/archivos/' + $scope.archivo + '?pid=explorer&efh=false&a=v&chrome=false&embedded=true';
        html = "<iframe src=" + $scope.archivoUrl + " width='90%' height='500px'></iframe>";
        $('#frameVer').html(html);
        */
        

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

                $http.delete( 'archivos/'+id ).then(function successCallback(response) {
                    
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

    $scope.editarArchivo = function () {
        $( "#formEdit" ).submit();
    }

    $scope.guardarArchivo = function () {
        $( "#formGuardar" ).submit();
    }

    $scope.ordenar = function () {
        $( "#ordenarForm" ).submit();
    }

    $scope.setSelect = function () {
        var URLactual = window.location + '';
        a = URLactual.split("?");
        if(a[1] != undefined){
            b = a[1].split("=");
            $scope.ordenar_por = b[1];
        }

        

    }
});