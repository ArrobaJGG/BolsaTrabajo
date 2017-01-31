var myApp = angular.module('my-app',[]);
myApp.controller('cambiarCredencialesCtrl',['$scope',function($scope){
	$scope.validarContrasenas = function(){
		var contrasena1,contrasena2;
		console.log($scope.contrasenaRepetida);
		contrasena1 = $scope.contrasena;
		contrasena2 = $scope.contrasenaRepetida;
		if(contrasena1){
			if(contrasena1 == contrasena2 && contrasena1.length >=4){
				return true;
			}
			else{
				return false;
			}
		}
		return false;
	};
}]);
