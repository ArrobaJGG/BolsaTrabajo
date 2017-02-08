angular.module("myDirectivas",['ngAnimate']);
angular.module('my-app', ['myDirectivas'])
.controller('myCtrl', ['$scope','$http', function($scope,$http) {
	$http.get('/BolsaTrabajo/resumen_alumno_controller/traerofertas')
	.then(
		function correcto(response){
			$scope.ofertas = response.data.ofertas;	
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);