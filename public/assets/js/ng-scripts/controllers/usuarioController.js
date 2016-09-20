app.controller('usuarioController', function($scope,$http) {
    
    $scope.editar = function () {
        if ($scope.pass1 != $scope.pass2) {
            swal("", "No coinciden las contraseñas", "warning");
        }
        else{
            $http.post('perfil',
            {   'password':$scope.pass,
                'password1':$scope.pass1,
                
            }).then(function successCallback(response) {
                if (response.data.msg == 1) {
                    swal("", "Se ha modificado la contraseña", "success");
                }
                if (response.data.msg == 0) {
                    swal("", "La contraseña actual es incorrecta", "warning");
                }
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });
        }

    }
    $scope.ruteoNotas = function (a) {
        var fieldId = a;
        f = fieldId.split("|");
        var encodedData = window.btoa(f[0]);

        window.location.href=f[1] + "?est=" + encodedData;
    
    }
    

});