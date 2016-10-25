app.controller('estadisticaController', function($scope,$http) {
    
    $scope.get = function () {
        $http.get('getUsuarios').then(function successCallback(response) {
                data = response.data;
                $scope.users = data;
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.buscar = function (dni){
    	//alert(dni);
    	$('#graph').html('');
    	$('#comunicados').html('');
    	$('#novedades').html('');
    	$('#videos').html('');
    	$('#noticias').html('');
    	$http.get('getEstadisticas/' + dni).then(function successCallback(response) {
                data = response.data;
                $scope.dts = data;
                acti = $scope.dts[0];
                $scope.procActivit(acti);
                $scope.procComuni($scope.dts[4]);
                $scope.procNot($scope.dts[2]);
                $scope.procNov($scope.dts[3]);
                $scope.procVid($scope.dts[1]);
            }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
            });
    }
    $scope.procActivit = function (dat){
    	can = 0;
    	for (var i = 0; i < dat.length; i++) {
        	sfecha = dat[i].x.split('-');
        	dat[i].x = sfecha[0] +'-'+ sfecha[1];
        	can = can + parseInt(dat[i].y); 
        }
        mosCan = "<h1>" + can + "</h1>"; 
        $('#canti').html(mosCan);
        Morris.Bar({
		  element: 'graph',
		  data: dat,
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: ['Videos']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
    }
    $scope.procComuni = function (dat){
    	can = 0;
    	for (var i = 0; i < dat.length; i++) {
        	sfecha = dat[i].x.split('-');
        	dat[i].x = sfecha[0] +'-'+ sfecha[1];
        	can = can + parseInt(dat[i].y); 
        }
        mosCan = "<h1>" + can + "</h1>"; 
        $('#ncom').html(mosCan);
        Morris.Bar({
		  element: 'comunicados',
		  data: dat,
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: ['Videos']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
    }
    $scope.procVid = function (dat){
    	can = 0;
    	for (var i = 0; i < dat.length; i++) {
        	sfecha = dat[i].x.split('-');
        	dat[i].x = sfecha[0] +'-'+ sfecha[1];
        	can = can + parseInt(dat[i].y); 
        }
        mosCan = "<h1>" + can + "</h1>"; 
        $('#nvid').html(mosCan);
        Morris.Bar({
		  element: 'videos',
		  data: dat,
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: ['Videos']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
    }
    $scope.procNot = function (dat){
    	can = 0;
    	//alert(dat);
    	for (var i = 0; i < dat.length; i++) {
        	sfecha = dat[i].x.split('-');
        	dat[i].x = sfecha[0] +'-'+ sfecha[1];
        	can = can + parseInt(dat[i].y); 
        }
        mosCan = "<h1>" + can + "</h1>"; 
        $('#nnot').html(mosCan);
        Morris.Bar({
		  element: 'noticias',
		  data: dat,
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: ['Noticias']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
    }
    $scope.procNov = function (dat){
    	can = 0;
    	//alert(dat);
    	for (var i = 0; i < dat.length; i++) {
        	sfecha = dat[i].x.split('-');
        	dat[i].x = sfecha[0] +'-'+ sfecha[1];
        	can = can + parseInt(dat[i].y); 
        }
        mosCan = "<h1>" + can + "</h1>"; 
        $('#nnov').html(mosCan);
        Morris.Bar({
		  element: 'novedades',
		  data: dat,
		  xkey: 'x',
		  ykeys: ['y'],
		  labels: ['Noticias']
		}).on('click', function(i, row){
		  console.log(i, row);
		});
    }
});