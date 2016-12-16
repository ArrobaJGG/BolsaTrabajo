var app = angular.module("my-app",[]);
app.controller("formulario",['$scope',function($scope){
	$scope.validar = function($event){
		var contrasena1 = $scope.usuario.contrasena1;
		var contrasena2 = $scope.usuario.contrasena2;
		alert("hooolalaaa");
		if(contrasena1!=contrasena2){
			$event.preventDefault();
			alert("adios");
		}
	} ;
}]);
