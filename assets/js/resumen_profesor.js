var myApp = angular.module("my-app", ['ngRoute']);
myApp.config(function($routeProvider){
	$routeProvider
	.when("/resumen", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/resumen_profesor",
    	controller: 'resumenCtrl'
    })
    .when("/ver-mis-ofertas", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/mis_ofertas",
    	controller: 'misOfertasCtrl'
    })
    .when("/ver-todas-ofertas", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/todas_ofertas",
    	controller: 'todasOfertasCtrl'
    })
    .when("/ver-mis-alumnos", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/mis_alumnos",
    	controller: 'misAlumnosCtrl'
    });
});
myApp.controller('resumenCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_info_resumen')
	.then(
		function correcto(response){
			$scope.alumnos = response.data.alumnos;
			$scope.ofertas = response.data.ofertas;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);
myApp.controller('misOfertasCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_mis_ofertas')
	.then(
		function correcto(response){
			$scope.ofertas = response.data.ofertas;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);
myApp.controller('todasOfertasCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_todas_ofertas')
	.then(
		function correcto(response){
			$scope.ofertas = response.data.ofertas;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);
myApp.controller('misAlumnosCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_todas_ofertas')
	.then(
		function correcto(response){
			$scope.alumnos = response.data.alumnos;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);