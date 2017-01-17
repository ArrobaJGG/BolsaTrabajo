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
    })
    .when("/dar-alta-empresa",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_alta_empresa",
    	controller : 'darAltaUnaEmpresaCtrl'
    })
    .when("/dar-baja-alumno",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_baja_alumno",
    	controller : 'darBajaAlumno'
    }).
    when("/dar-baja-empresa",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_baja_empresa",
    	controller : 'darBajaEmpresa'
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
}]);
myApp.controller('darAltaUnaEmpresaCtrl',['$scope','$http',function ($scope,$http){
	$scope.usuarioCreado = false;
	$scope.mensaje = "prueba";
	//*
  	$scope.enviar = function(){
	  	$scope.mensaje = "cargando";
	  	$scope.usuarioCreado = true;
		$http.post('/BolsaTrabajo/registro_controller/registrar_empresa',
		"usuario="+$scope.userAng+"&nombre="+$scope.nombreEmpresa,
		{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
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
	};
}]);
myApp.controller('darBajaAlumno',['$scope','$http',function($scope,$http){
	$scope.usuarioBorrado = false;
	$http.get('/BolsaTrabajo/notificaciones_controller/alumnos/10')
		.then(
			function successCallback(response){
				console.log(response.data);
				$scope.alumnos = response.data;
			}
			,function errorCallback(response){
				console.log(response.data);
			}
		);
}]);
myApp.controller('borrarAlumnoCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function($event){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/borrar_alumno',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data;
				if(response.data = "Alumno borrado correctamente") $event.target.parentElement.remove();
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
myApp.controller('darBajaEmpresa',['$scope','$http',function($scope,$http){
	$scope.usuarioBorrado = false;
	$http.get('/BolsaTrabajo/notificaciones_controller/empresas/10')
		.then(
			function successCallback(response){
				console.log(response.data);
				$scope.empresas = response.data;
			}
			,function errorCallback(response){
				console.log(response.data);
			}
		);
	$scope.estado = function(estado){
		if(estado == 1){
			return true;
		}
		else{
			return false;
		}
	};
}]);
myApp.controller('borrarEmpresaCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function($event){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/borrar_empresa',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data;
				if(response.data = "Alumno borrado correctamente") $event.target.parentElement.remove();
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
