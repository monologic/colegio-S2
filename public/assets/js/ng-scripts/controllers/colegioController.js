app.controller('colegioController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getColegio').then(function successCallback(response) {
                $scope.colegio = response.data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.get2 = function () {
        $http.get('../getColegio').then(function successCallback(response) {
                $scope.colegio = response.data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
});