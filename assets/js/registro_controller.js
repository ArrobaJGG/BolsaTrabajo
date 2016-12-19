var app = angular.module("my-app",[]);
app.controller("formulario_ctrl",['$scope','$document',function($scope,$document){
	var error = false;
	$scope.contrasenas_iguales = function(){
		var iguales = false;
		if($scope.formulario.contrasena.$valid && $scope.formulario.contrasenaC.$valid){
			var contrasena1 = $scope.usuario.contrasena1;
			var contrasena2 = $scope.usuario.contrasena2;
			if(contrasena1 == contrasena2){
				return true;
			}
		}
		return false;
	};
	$scope.validar = function($event){
		error = true;
		if($scope.formulario.usuario.$valid&&$scope.formulario.contrasena.$valid&&$scope.contrasenas_iguales()){
			error = false;
		}
		
		if(error) $event.preventDefault();
	} ;
}]);
