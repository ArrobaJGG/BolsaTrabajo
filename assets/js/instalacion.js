angular.module('myDirectivas',['ngAnimate']);
var myApp = angular.module('my-app',['myDirectivas']);
myApp.controller('backupCtrl',['$http','$scope',function($http,$scope){
	$scope.cargando = false;
	$scope.direccion = "./correo";
	$scope.migrate = function($direccion){
		$scope.cargando = true;
		$http.get($direccion)
		.then(
			function success(response){
				window.location.assign($direccion);
			}
			,function error(response){
				
			}
		);
	};
}]);
