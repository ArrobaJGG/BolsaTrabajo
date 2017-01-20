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
    	controller : 'darBajaAlumnoCtrl'
    }).
    when("/dar-baja-empresa",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_baja_empresa",
    	controller : 'darBajaEmpresaCtrl'
    }).
    when("/dar-alta-profesor",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_alta_profesor",
    	controller : 'darAltaProfesorCtrl'
    })
    .when("/dar-baja-profesor",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/dar_baja_profesor",
    	controller : 'darBajaProfesorCtrl'
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
myApp.controller('darBajaAlumnoCtrl',['$scope','$http',function($scope,$http){
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
myApp.controller('darBajaEmpresaCtrl',['$scope','$http',function($scope,$http){
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
myApp.controller('darAltaProfesorCtrl',['$scope','$http',function($scope,$http){
	$scope.mensaje = "prueba";
	$scope.activoAng = "1";
	$scope.usuarioCreado = false;
	$http.get('/BolsaTrabajo/notificaciones_controller/cargar_familias')
	.then(
		function successCallback(response){
			$scope.familias = response.data;
			console.log(response.data);
		},
		function errorCallback(response){
			console.log(response.data);
		}
	);
	$scope.enviar = function(){
		console.log($scope);
		$scope.mensaje = "cargando...";
		$scope.usuarioCreado = true;
		$http.post('/BolsaTrabajo/registro_controller/crear_profesor',
			"nombre="+$scope.nombreAng
			+"&apellidos="+$scope.apellidosAng
			+"&id_familia_laboral="+$scope.idAng
			+"&activo="+$scope.activoAng
			+"&usuario="+$scope.usuarioAng,
		{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data;
			},
			function errorCallback(response){
				console.log(response.data);
			}
		);
	};
}]);
myApp.controller('darBajaProfesorCtrl',['$scope','$http',function($scope,$http){
	$scope.usuarioBorrado = false;
	
	$http.get('/BolsaTrabajo/notificaciones_controller/profesores/10')
		.then(
			function successCallback(response){
				$scope.profesores = response.data;
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
myApp.controller('borrarProfesorCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function($event){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/borrar_profesor',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
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
myApp.directive('upload', ['$http',function($http) {
    return {
        restrict: 'E',
        replace: true,
        scope: {
        	upload : "=objetoUpload"
        },
        require: '?ngModel',
        template: '<div class="asset-upload">subir archivo csv</div>',
        link: function(scope, element, attrs, ngModel) {
            // Code goes here
            element.on('dragover', function(e) {
			    e.preventDefault();
			    e.stopPropagation();
			    console.log(e);
			});
			element.on('dragenter', function(e) {
			    e.preventDefault();
			    e.stopPropagation();
			});
			element.on('drop', function(e) {
				console.log(scope.objetoUpload);
			    e.preventDefault();
			    e.stopPropagation();
			    console.log(e.dataTransfer.files);
			    if (e.dataTransfer){
			        if (e.dataTransfer.files.length > 0) {
			        	var comprobar = new RegExp("(.*?)\.(csv)");
			        	if(comprobar.test(e.dataTransfer.files[0].name)){
			        		scope.upload = {};
			        		upload(e.dataTransfer.files,function(up){
		        				scope.upload.mensajes =  up;
		        				scope.upload.cargando = false;
			        		});
			        		scope.upload.cargando = true;
			            }
			            else{
			            	console.log(comprobar.test(e.dataTransfer.files[0].name));
			            }
			        }
			    }
			    return false;
			});
			function upload(files,callback) {
			    var data = new FormData();
			    data.append("files",files[0]);
				console.log(data.getAll(data));
			    $http({
			        method: 'POST',
			        url: attrs.to,
			        data: data,
			        withCredentials: true,
			        headers: {'Content-Type': undefined },
			        transformRequest: angular.identity
			    }).then(function(response) {
			     	callback(response.data);
			    },function(response) {
			      	callback(response.data);
			    });
			};
			
        }
    };
}]);

