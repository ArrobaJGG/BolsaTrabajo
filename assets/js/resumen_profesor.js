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
    })
    .when("/ver-todos-alumnos", {
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/mis_alumnos",
    	controller: 'todosAlumnosCtrl'
    });
});
myApp.controller('resumenProfesorCtrl',['$scope','$compile','$timeout',function($scope,$compile,$timeout){
	$scope.editarPerfil = function ($event,id){
		console.log($event.srcElement.parentElement);
		var newDirective = angular.element("<mi-editar-perfil alumno='"+id+"'></mi-editar-perfil>");
		$compile(newDirective)($scope);
		$($event.srcElement.parentElement).append(newDirective);
		$($event.srcElement).removeAttr("ng-click");
		$compile($($event.srcElement))($scope);
		$($event.srcElement).removeAttr("ng-transclude");
		//$($event.srcElement).attr("ng-click","enviar("+id+")");
		$compile($($event.srcElement))($scope);
	};
	$scope.ir = function(direccion){
		window.location.assign(direccion);
	};
}]);
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
	$scope.pagina = 0;
	$scope.siguientePagina = function(){
		$scope.pagina++;
		$scope.get_ofertas();
	};
	$scope.anteriorPagina = function(){
		$scope.pagina--;
		$scope.get_ofertas();
	};
	$scope.get_ofertas = function(){
		var aplazado = $scope.pagina*10;
		var datos = {
			numero_alumnos: 10,
			desplazamiento : aplazado,
		};
		$http.post('/BolsaTrabajo/resumen_profesor_controller/validar/get_todas_ofertas',datos)
		.then(
			function correcto(response){
				$scope.ofertas = response.data.ofertas;
				$scope.numeroPaginas = Math.ceil(response.data.numero_lineas/10);
			},
			function incorrecto(response){
				console.log(response.data);
			}
		);
	};
	$scope.get_ofertas();
}]);
myApp.controller('misAlumnosCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_mis_alumnos')
	.then(
		function correcto(response){
			$scope.alumnos = response.data.alumnos;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);
myApp.controller('todosAlumnosCtrl',['$scope','$http',function($scope,$http){
	$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/get_todos_alumnos')
	.then(
		function correcto(response){
			$scope.alumnos = response.data.alumnos;
		},
		function incorrecto(response){
			console.log(response.data);
		}
	);
}]);
myApp.controller('alumnoCtrl',['$scope','$http',function($scope,$http){
	
}]);
myApp.directive('miEditorPerfil',['$compile','$http',function($compile,$http){
	return{
		restrict: 'E',
	    replace: true,
	    scope: {
	    	alumno : "="
	    },
	    require: '?ngModel',
	    templateUrl : '/BolsaTrabajo/api/cargar_partes/cargar/boton_editar',
	    link: function(scope, element, attrs){
	    	scope.modoEditor = false;
	    	scope.activar= true;
			scope.mensajeBoton = "Editar perfil";	    	
	    	scope.hacer =  function(){
	    		if(scope.modoEditor){
	    			scope.enviar();
	    			scope.modoEditor =  false;
	    			scope.mensajeBoton = "Editar perfil";
	    		}
	    		else{
	    			scope.editar();
	    			scope.modoEditor =  true;
	    			scope.mensajeBoton = "Enviar";
	    		}
	    	};
	    	scope.editar = function($event){
	    		activar= false;
	    		$http.get('/BolsaTrabajo/resumen_profesor_controller/validar/perfil_oculto/'+scope.alumno)
	    		.then(
	    			function correcto(response){
	    				scope.texto = response.data.texto;
	    				scope.activar = true;
	    			}
	    			,function incorrecto(response){
	    				console.log(response.data);
	    				scope.activar = true;
	    			}
	    		);
				
			};
			scope.enviar = function(){
				activar= false;
        		var datos = {
					id_login : scope.alumno,
					perfil: scope.texto
        		};
        		$http.post('/BolsaTrabajo/resumen_profesor_controller/validar/editar_perfil_oculto',JSON.stringify(datos))
        		.then(
        			function correcto(response){
        				scope.activar = true;
        			},
        			function incorrecto(response){
        				console.log(response.data);
        				scope.activar = true;
        			}
        		);
			};
		}
   };
}]);
