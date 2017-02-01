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
myApp.directive('miEditarPerfil',['$http',function($http){
	return {
        restrict: 'E',
        replace: true,
        scope: {
        	alumno : "="
        },
        require: '?ngModel',
        templateUrl: '/BolsaTrabajo/api/cargar_partes/cargar/editar_perfil_privado',
        link: function(scope, element, attrs){
        	scope.enviar = function(id){
        		var datos = {
					id_login : id,
					perfil: scope.texto
        		};
        		$http.post('/BolsaTrabajo/resumen_profesor_controller/validar/editar_perfil_oculto',JSON.stringify(datos))
        		.then(
        			function correcto(response){
        				console.log(response.data);
        			},
        			function incorrecto(response){
        				console.log(response.data);
        			}
        		);
        	};
        }
     };
}]);
