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
    })
    .when("/administrar-idiomas",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/idiomas",
    	controller : 'idiomasCtrl'
    })
    .when("/administrar-cursos-familias-etiquetas",{
    	templateUrl : "/BolsaTrabajo/api/cargar_partes/cargar/cursos_familias_etiquetas",
    	controller : 'cursosFamiliasEtiquetasCtrl'
    }
    );
});
myApp.controller('notificacionesCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.estaCargando = true;
	$scope.estaCargandoNuevasAltas = true;
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/reportes')
		.then(
			function successCallback(response) {
			    // this callback will be called asynchronously
			    // when the response is available
			    //console.log(response);
			    $scope.reportes = response.data;
			    $scope.estaCargando = false;
		    },
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log('hola');
			    $scope.estaCargando = false;
	  		});
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/nuevas_altas/10')
		.then(
			function successCallback(response) {
			    // this callback will be called asynchronously
			    // when the response is available
			   // console.log(response);
			    $scope.nuevasAltas = response.data;
			    $scope.estaCargandoNuevasAltas = false;
		    },
	     	function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log('hola');
			    $scope.estaCargandoNuevasAltas = true;
	  		});
 
}]);
myApp.controller('darAltaUnAlumnoCtrl',['$scope','$http',function ($scope,$http){
	$scope.usuarioCreado = false;
	$scope.mensaje = "prueba";
	//*
  	$scope.enviar = function(){
	  	$scope.mensaje = "cargando";
	  	$scope.usuarioCreado = true;
		$http.post('/BolsaTrabajo/registro_controller/validarse/registrar_alumno',"usuario="+$scope.userAng,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
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
		$http.post('/BolsaTrabajo/registro_controller/validarse/registrar_empresa',
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
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/alumnos/10')
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
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_alumno',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
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
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/empresas/10')
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
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_empresa',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error) $event.target.parentElement.remove();
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
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/cargar_familias')
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
		$http.post('/BolsaTrabajo/registro_controller/validarse/crear_profesor',
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
	
	$http.get('/BolsaTrabajo/notificaciones_controller/validar/profesores/10')
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
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_profesor',"id="+$event.target.value,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
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
myApp.controller('idiomasCtrl',['$scope','$http',function($scope,$http){
	actualizarIdiomas();
	function actualizarIdiomas(){
		$scope.cargandoIdiomas = true;
		$http.get('/BolsaTrabajo/notificaciones_controller/validar/get_idiomas')
			.then(
				function successCallback(response){
					$scope.idiomas = response.data;
				}
				,function errorCallback(response){
					console.log(response.data);
				}
			);
	}
	
	$scope.agregarIdioma = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_idioma'
			,"nombre="+$scope.idiomaAng
			,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data;
				actualizarIdiomas();
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
myApp.controller('idiomaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditor = false;
	$scope.editar = function(){
		$scope.modoEditor = true;
	};
	$scope.enviar = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_idioma',
			"id="+$event.target.value
			+"&nombre="+$scope.idiom,
			{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				$scope.error = response.data.error;
				if(response.data.error ==false){
					$scope.modoEditor = false;
					$scope.$parent.idioma.nombre = $scope.idiom;
				}
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
  		);
  		
		//$scope.modoEditor = false;
	};
	$scope.borrar = function($event){
		$scope.numero = "";
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_idioma_borrado'
		,"id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					$scope.numero = response.data;
					console.log($scope.numero);
					if(confirm("El numero de alumnos que perderan el idioma seleccionado es: "+$scope.numero+"\n ¿desea continuar?")){
						$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_idioma',
						"id="+$event.target.value,
						{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
					.then(
						function successCallback(response){
							$scope.mensaje = response.data.mensaje;
							$scope.error = response.data.error;
							if(response.data.error ==false){
								$event.target.parentElement.parentElement.parentElement.remove();
							}
						},
						function errorCallback(response) {
						    // called asynchronously if an error occurs
						    // or server returns response with an error status.
						    console.log(response.data);
						    console.log('error');
				  		}
			  		);
					}
				},
				function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    console.log(response.data);
				    console.log('error');
		  		}
			);
			console.log($scope.numero);
		
		
	};
}]);
myApp.controller('cursosFamiliasEtiquetasCtrl',['$scope','$http',function($scope,$http){
	$scope.familiaSeleccionada= 0;
	actualizar();
	$scope.seleccionar = function(id){
		$scope.familiaSeleccionada = id;
	};
	
	
	$scope.anadirEtiqueta = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_etiqueta'
		,"nombre="+$scope.etiquetaAng
		+"&id="+$scope.familiaSeleccionada
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensajes = response.data;
				actualizar();
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	function actualizar(){
		$http.get('/BolsaTrabajo/notificaciones_controller/validar/get_familias_cursos_etiquetas')
		.then(
			function successCallback(response){
				$scope.familias = response.data.familias;
				$scope.cursos = response.data.cursos;
				$scope.etiquetas = response.data.etiquetas;
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	}
}]);
myApp.controller('etiquetaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditarEtiqueta = false;
	$scope.editarEtiqueta = function(){
		$scope.modoEditarEtiqueta = true;
	};
	$scope.enviarEtiqueta = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_etiqueta'
		,"nombre="+$scope.nombreEtiquetaAng
		+"&id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensajes = response.data;
				$scope.modoEditarEtiqueta = false;
				$scope.$parent.etiqueta.nombre = $scope.nombreEtiquetaAng;
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	$scope.borrarEtiqueta = function($event){
		$scope.numero = "";
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_etiqueta_borrado'
		,"id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					$scope.numero = response.data;
					if(confirm("El numero de alumnos que perderan el idioma seleccionado es: "+$scope.numero.alumno
					+", y el numero de ofertas que lo perderian es: "+$scope.numero.oferta+"\n ¿desea continuar?")){
						$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_etiqueta',
						"id="+$event.target.value,
						{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
					.then(
						function successCallback(response){
							$scope.mensaje = response.data.mensaje;
							$scope.error = response.data.error;
							if(response.data.error ==false){
								$event.target.parentElement.parentElement.remove();
							}
						},
						function errorCallback(response) {
						    // called asynchronously if an error occurs
						    // or server returns response with an error status.
						    console.log(response.data);
						    console.log('error');
				  		}
			  		);
					}
				},
				function errorCallback(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    console.log(response.data);
				    console.log('error');
		  		}
			);
			console.log($scope.numero);
	};
}]);
myApp.controller('cursoCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditarCurso = false;
	
}]);
myApp.controller('familiaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditarFamilia = false;
	$scope.errorValidacion = false;
	$scope.editarFamilia = function($event){
		$scope.modoEditarFamilia = true;
		$event.stopPropagation();
	};
	$scope.enviarFamilia = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_familia'
		,"nombre="+$scope.nombreFamiliaAng
		+"&id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensajes = response.data;
				$scope.modoEditarFamilia = false;
				$scope.$parent.familia.nombre = $scope.nombreFamiliaAng;
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	$scope.borrarFamilia = function($event){
		$scope.numero = "";
		$scope.mensaje = "";
		$scope.error = false;
		$event.stopPropagation();
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_familia_borrado'
		,"id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					if(response.data.error){
						$scope.errorValidacion = true;
					}
					else{
						if(response.data.oferta!="0"){
							$scope.mensaje = "Debe borrar las ofertas pertenecientes a esta familia laboral antes de realizar esta operacion.";
							$scope.error = true;
						}
						if(response.data.profesor != "0"){
							$scope.mensaje +="\nDebe borrar o cambiar de familia laboral a los profesores de esta familia laboral.";
							$scope.error = true;
						}
						if(response.data.curso != "0"){
							$scope.mensaje +="\nDebe borrar o cambiar de familia laboral a los cursos bajo esta familia";
							$scope.error = true;
						}
						if(!$scope.error){
							if(confirm("El numero de etiquetas que se borrarian por estar asociadas es: "+$scope.numero.etiqueta
							+"¿desea continuar?")){
								$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_familia',
								"id="+$event.target.value,
								{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
								.then(
									function successCallback(response){
										$scope.mensaje = response.data.mensaje;
										$scope.error = response.data.error;
										if(response.data.error ==false){
											$event.target.parentElement.parentElement.remove();
										}
									},
									function errorCallback(response) {
									    // called asynchronously if an error occurs
									    // or server returns response with an error status.
									    console.log(response.data);
									    console.log('error');
							  		}
					  			);
							}
						}
					}
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
myApp.controller('nuevaAltaCtrl',['$scope','$http',function($scope,$http){
	$scope.validarEmpresa = function($event){
		$scope.mensaje = "Cargando...";
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/validar_empresa'
		,"id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	$scope.borrarEmpresa = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_empresa'
		,"id="+$event.target.value
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(response.data.error ==false){
					$event.target.parentElement.remove();
				}
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
myApp.controller('reporteCtrl',['$scope','$http',function($scope,$http){
	$scope.eliminarReporte = function($event,$id){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_reporte'
		,"id="+$id
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(response.data.error ==false){
					$event.target.parentElement.remove();
				}
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	$scope.eliminarEntidad = function($event,id,tipo){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_entidad'
		,"id="+id
		+"&tipo="+tipo)
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(response.data.error ==false){
					$event.target.parentElement.remove();
				}
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

