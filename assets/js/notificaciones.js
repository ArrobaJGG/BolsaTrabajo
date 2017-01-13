/*/

alert('yyy');//*/
var myApp = angular.module("my-app", ['ngRoute']);

  myApp.config(function($routeProvider) {
    $routeProvider
    .when("/prueba", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/notificaciones",
    	controller: 'notificacionesCtrl'
    })
    .when("/dar-alta-alumno",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_alta_alumno",
    	controller: 'darAltaUnAlumnoCtrl'		
    });
});
myApp.controller('notificacionesCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.estaCargando = true;
	$http.get('/BolsaTrabajo/notificaciones_controller/reportes')
		.then(
			function successCallback(response) {
			    // this callback will be called asynchronously
			    // when the response is available
			    console.log(response);
			    $scope.reportes = response.data;
		    },
	     	function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log('hola');
	  		}).
	  		finally( function(){
	  			$scope.estaCargando = false;
	  		});
 
}]);
myApp.controller('darAltaUnAlumnoCtrl',['$scope','$http',function ($scope,$http){
	$scope.usuarioCreado = false;
	$scope.mensaje = "prueba";
	//*
  	$scope.enviar = function(){
	  	$scope.mensaje = "cargando";
	  	$scope.usuarioCreado = true;
		$http.post('/BolsaTrabajo/registro_controller/registrar_alumno',"usuario="+$scope.userAng,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				if(response.data == "salir") window.location.assign("login_controller" );
				$scope.mensaje = response.data;
			},
			function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    console.log(response.data);
				    console.log('error');
	  		}
  		);
	};//*/
	$scope.enviarCsv = function(){
		$http.post('/BolsaTrabajo/registro_controller/registrar_alumno_csv',"correos="+$scope.correos,{'headers':{'content-type': 'multipart/form-data'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data;
			},
			function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    console.log(response.data);
				    console.log('error');
	  		}
  		);
	};
	
}]);
//*/
