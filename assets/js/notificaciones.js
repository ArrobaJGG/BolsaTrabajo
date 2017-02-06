/*/
alert('yyy');//*/
angular.module("myDirectivas",['ngAnimate']);
var myApp = angular.module("my-app", ['myDirectivas','ngRoute']);

myApp.config(function($routeProvider) {
    $routeProvider
    .when("/notificaciones", {
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
myApp.controller('notiCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.ir = function(direccion){
		window.location.assign(direccion);
	};
	$scope.remove = function(array, index){
    	array.splice(index, 1);
	};
	$scope.backupBaseDatos = function(){
		window.location.assign('/BolsaTrabajo/backup');
	};
	$scope.backupImagenes =  function(){
		window.location.assign('/BolsaTrabajo/backup/zip');
	};
}]);
myApp.controller('notificacionesCtrl', ['$scope', '$http', function ($scope, $http) {
	$scope.estaCargando = true;
	$scope.estaCargandoNuevasAltas = true;
	
	$scope.actualizarReportes = function(){
		$http.get('/BolsaTrabajo/notificaciones_controller/validar/reportes')
		.then(
			function successCallback(response) {
			    // this callback will be called asynchronously
			    // when the response is available
			    //console.log(response);
			    $scope.reportes = response.data;
			    if($scope.reportes.length ==0){
					$scope.mensajeReportes = "No hay reportes";
				}
			    $scope.estaCargando = false;
		    },
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log('hola');
			    $scope.estaCargando = false;
	  		});
	};
	$scope.actualizarReportes();
	
	$scope.actualizarNuevasAltas = function(){
		$http.get('/BolsaTrabajo/notificaciones_controller/validar/nuevas_altas/10')
		.then(
			function successCallback(response) {
			    // this callback will be called asynchronously
			    // when the response is available
			   // console.log(response);
			    $scope.nuevasAltas = response.data;
			    if($scope.nuevasAltas.length ==0){
					$scope.mensajeNuevasAltas = "No hay nuevas altas";
				}
			    $scope.estaCargandoNuevasAltas = false;
		    },
	     	function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log('hola');
			    $scope.estaCargandoNuevasAltas = true;
	  		});
	};
	$scope.actualizarNuevasAltas();
	
 
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
	$scope.buscar = function(nombre,apellidos){
		$scope.mensaje="cargando";
		$scope.pagina = 0;
		$scope.get_alumnos(nombre,apellidos);
	};
	$scope.pagina = 0;
	$scope.usuarioBorrado = false;
	$scope.numeroPaginas = 0;
	$scope.siguientePagina = function(){
		$scope.pagina++;
		$scope.get_alumnos();
	};
	$scope.anteriorPagina = function(){
		$scope.pagina--;
		$scope.get_alumnos();
	};
	$scope.get_alumnos = function(nombres = undefined,apellido = undefined){
		var aplazado = $scope.pagina*10;
		var datos = {
			numero_alumnos: 10,
			desplazamiento : aplazado,
			nombre : nombres,
			apellido : apellido
		};
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/alumnos/',JSON.stringify(datos))
		.then(
			function successCallback(response){
				//console.log(response.data);
				$scope.alumnos = response.data.alumnos;
				$scope.numeroPaginas = Math.ceil(response.data.numero_lineas/10);
			}
			,function errorCallback(response){
				console.log(response.data);
			}
		);
	};
	$scope.get_alumnos();
}]);
myApp.controller('borrarAlumnoCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function(array,index){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_alumno',
		"id="+$scope.$parent.alumno.id_login,
		{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error){
					$scope.remove(array,index);
					$scope.numeroDePaginas();
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
myApp.controller('darBajaEmpresaCtrl',['$scope','$http',function($scope,$http){
	$scope.pagina = 0;
	$scope.numeroPaginas = 0;
	$scope.usuarioBorrado = false;
	
	$scope.buscar = function(nombre,correo){
		$scope.mensaje="cargando";
		$scope.pagina = 0;
		$scope.get_empresas(nombre,correo);
	};
	
	$scope.siguientePagina = function(){
		$scope.pagina++;
		$scope.get_empresas();
	};
	$scope.anteriorPagina = function(){
		$scope.pagina--;
		$scope.get_empresas();
	};
	$scope.get_empresas = function(nombres = undefined,correo = undefined){
		var aplazado = $scope.pagina*10;
		var datos = {
			numero_alumnos: 10,
			desplazamiento : aplazado,
			nombre : nombres,
			correo : correo
		};
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/empresas'
		,datos)
		.then(
			function successCallback(response){
				console.log(response.data);
				$scope.empresas = response.data.empresas;
				$scope.numeroPaginas = Math.ceil(response.data.numero_lineas/10);
			}
			,function errorCallback(response){
				console.log(response.data);
			}
		);
	}
	$scope.estado = function(estado){
		if(estado == 1){
			return true;
		}
		else{
			return false;
		}
	};
	$scope.get_empresas();
}]);
myApp.controller('borrarEmpresaCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function(array,index){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_empresa',
		"id="+$scope.$parent.empresa.id_login
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error) $scope.remove(array,index);
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
	$scope.pagina = 0;
	$scope.numeroPaginas = 0;
	$scope.usuarioBorrado = false;
	
	$scope.buscar = function(nombre,correo){
		$scope.mensaje="cargando";
		$scope.pagina = 0;
		$scope.get_profesores(nombre,correo);
	};
	
	$scope.siguientePagina = function(){
		$scope.pagina++;
		$scope.get_profesores();
	};
	$scope.anteriorPagina = function(){
		$scope.pagina--;
		$scope.get_profesores();
	};
	$scope.get_profesores = function(nombres = undefined,correo = undefined){
		var aplazado = $scope.pagina*10;
		var datos = {
			numero_alumnos: 10,
			desplazamiento : aplazado,
			nombre : nombres,
			correo : correo
		};
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/profesores',datos)
			.then(
				function successCallback(response){
					$scope.profesores= response.data.profesores;
					$scope.numeroPaginas = Math.ceil(response.data.numero_lineas/10);
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
	}
	$scope.get_profesores();
}]);
myApp.controller('borrarProfesorCtrl',['$scope','$http',function($scope,$http){
	$scope.borrar = function(array,index){
		$scope.mensaje = "cargando";
		$scope.usuarioBorrado = true;
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_profesor'
		,"id="+$scope.$parent.profesor.id_login
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error) $scope.remove(array,index);
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
	$scope.buscar = function(){
		$scope.actualizarIdiomas();		
	};
	$scope.actualizarIdiomas = function(){
		$scope.cargandoIdiomas = true;
		var datos = {nombre:$scope.idiomaAng};
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/get_idiomas',datos)
			.then(
				function successCallback(response){
					$scope.idiomas = response.data;
				}
				,function errorCallback(response){
					console.log(response.data);
				}
			);
	};
	
	$scope.agregarIdioma = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_idioma'
			,"nombre="+$scope.agregarIdiomaAng
			,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				if(!response.data.error){
					$scope.idiomas.push({id_idioma:response.data.id,nombre:$scope.agregarIdiomaAng});
				}
				else{
					$scope.mensaje = response.data.mensaje;
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
	$scope.actualizarIdiomas();
}]);
myApp.controller('idiomaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditor = false;
	$scope.editar = function(){
		$scope.modoEditor = true;
	};
	$scope.enviar = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_idioma',
			"id="+$scope.$parent.idioma.id_idioma
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
	$scope.borrar = function(array,index){
		$scope.numero = "";
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_idioma_borrado'
		,"id="+$scope.$parent.idioma.id_idioma
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					$scope.numero = response.data;
					console.log($scope.numero);
					if(confirm("El numero de alumnos que perderan el idioma seleccionado es: "+$scope.numero+"\n ¿desea continuar?")){
						$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_idioma',
						"id="+$scope.$parent.idioma.id_idioma,
						{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
					.then(
						function successCallback(response){
							$scope.mensaje = response.data.mensaje;
							$scope.error = response.data.error;
							if(response.data.error ==false){
								$scope.remove(array,index);
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
	$scope.categoriaSeleccionada = "!0";
	$scope.actualizar = function(){
		$http.get('/BolsaTrabajo/notificaciones_controller/validar/get_familias_cursos_etiquetas')
		.then(
			function successCallback(response){
				$scope.familias = response.data.familias;
				$scope.cursos = response.data.cursos;
				$scope.etiquetas = response.data.etiquetas;
				$scope.categorias =  response.data.categorias;
			},
			function errorCallback(response) {
			    // called asynchronously if an error occurs
			    // or server returns response with an error status.
			    console.log(response.data);
			    console.log('error');
	  		}
		);
	};
	$scope.actualizar();
	$scope.seleccionar = function(id){
		$scope.familiaSeleccionada = id;
	};
	$scope.seleccionarCategoria = function(id){
		$scope.categoriaSeleccionada = id;
	};
	$scope.estadoAgregando= false;
	$scope.mostrarAgregar = function(){
		$scope.estadoAgregando = true;
	};
	$scope.estadoAgregandoFamilia = false;
	$scope.mostrarAgregarFamilia =  function(){
		$scope.estadoAgregandoFamilia = true;
	};
	$scope.estadoAgregandoCurso = false;
	$scope.mostrarAgregarCurso =  function(){
		$scope.estadoAgregandoCurso = true;
	};
	$scope.agregarCurso= function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_curso'
		,"nombre="+$scope.cursoAng
		+"&id_categoria="+$scope.categoriaCursoAng
		+"&id_familia="+$scope.familiaSeleccionada
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error){
					$scope.cursos.push({
						id_curso: response.data.id,
						nombre:$scope.cursoAng,
						id_categoria:$scope.categoriaCursoAng,
						id_familia:$scope.familiaSeleccionada
					});
					$scope.estadoAgregandoCurso= false;
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
	$scope.agregarFamilia = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_familia'
		,"nombre="+$scope.familiaAng
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error){
					$scope.familias.push({id_familia_laboral : response.data.id,nombre : $scope.familiaAng});
					$scope.estadoAgregandoFamilia = false;
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
	$scope.agregar = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_categoria'
		,"nombre="+$scope.categoriaAng
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error){
					$scope.categorias.push({id_categoria: response.data.id,nombre: $scope.categoriaAng});
					$scope.estadoAgregando = false;
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
	$scope.anadirEtiqueta = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/agregar_etiqueta'
		,"nombre="+$scope.etiquetaAng
		+"&id="+$scope.familiaSeleccionada
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensajes = response.data.mensaje;
				if(!response.data.error){
					$scope.agregarEtiqueta = false;
					$scope.etiquetas.push({
						id_etiqueta : response.data.id,
						nombre:$scope.etiquetaAng,
						id_familia_laboral: $scope.familiaSeleccionada
					});
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
myApp.controller('etiquetaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditarEtiqueta = false;
	$scope.editarEtiqueta = function(){
		$scope.modoEditarEtiqueta = true;
	};
	$scope.enviarEtiqueta = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_etiqueta'
		,"nombre="+$scope.nombreEtiquetaAng
		+"&id="+$scope.$parent.etiqueta.id_etiqueta
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
	$scope.borrarEtiqueta = function(array){
		$scope.numero = "";
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_etiqueta_borrado'
		,"id="+$scope.$parent.etiqueta.id_etiqueta
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					$scope.numero = response.data;
					if(confirm("El numero de alumnos que perderan el idioma seleccionado es: "+$scope.numero.alumno
					+", y el numero de ofertas que lo perderian es: "+$scope.numero.oferta+"\n ¿desea continuar?")){
						$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_etiqueta',
						"id="+$scope.$parent.etiqueta.id_etiqueta,
						{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
					.then(
						function successCallback(response){
							$scope.mensaje = response.data.mensaje;
							$scope.error = response.data.error;
							if(response.data.error ==false){
								var etiquetas = $scope.$parent.$parent.etiquetas;
								for(i=0;i<etiquetas.length;i++){
									if(etiquetas[i].id_etiqueta == $scope.$parent.etiqueta.id_etiqueta){
										$scope.remove(array,i);
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
	$scope.editarCurso =  function(){
		$scope.modoEditarCurso = true;
	};
	$scope.enviar = function(){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_curso'
		,"nombre="+$scope.nombreCursoAng
		+"&id_curso="+$scope.$parent.curso.id_curso
		+"&id_categoria="+$scope.categoriaAng
		+"&id_familia="+$scope.familiaCursoAng
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensajes = response.data;
				if(!response.data.error){
					$scope.modoEditarCurso = false;
					$scope.$parent.curso.id_categoria = $scope.categoriaAng;
					$scope.$parent.curso.id_familia = $scope.familiaCursoAng;	
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
	$scope.borrar = function(array,index){
		$scope.numero = "";
		$scope.mensaje = "";
		$scope.error = false;
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_curso_alumno_borrado'
		,"id="+$scope.$parent.curso.id_curso
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
			.then(
				function successCallback(response){
					if(response.data.error){
						$scope.errorValidacion = true;
					}
					else{
						if(confirm("El numero de alumnos que perderian este curso es: "+response.data.alumno
						+"¿desea continuar?")){
							$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_curso',
							"id="+$scope.$parent.curso.id_curso,
							{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
							.then(
								function successCallback(response){
									if(!response.data.error){
										var cursos = $scope.$parent.$parent.cursos;
										for(i=0;i<cursos.length;i++){
											if(cursos[i].id_curso == $scope.$parent.curso.id_curso){
												$scope.remove(array,i);
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
		+"&id="+$scope.$parent.familia.id_familia_laboral
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
	$scope.borrarFamilia = function($event,array,index){
		$scope.numero = "";
		$scope.mensaje = "";
		$scope.error = false;
		$event.stopPropagation();
		console.log($scope);
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_familia_borrado'
		,"id="+$scope.$parent.familia.id_familia_laboral
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
							if(confirm("El numero de etiquetas que se borrarian por estar asociadas es: "+response.data.etiqueta
							+"¿desea continuar?")){
								$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_familia',
								"id="+$scope.$parent.familia.id_familia_laboral,
								{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
								.then(
									function successCallback(response){
										$scope.mensaje = response.data.mensaje;
										$scope.error = response.data.error;
										if(response.data.error ==false){
											$scope.remove(array,index);
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
		,"id="+$scope.$parent.nueva.id_login
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				$scope.actualizarNuevasAltas();
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
		,"id="+$scope.$parent.nueva.id_login
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
myApp.controller('reporteCtrl',['$scope','$http','$timeout',function($scope,$http,$timeout){
	$scope.eliminarReporte = function(objeto,o){
		console.log(objeto);
		console.log(o);
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_reporte'
		,"id_reporte="+$scope.$parent.reporte.id_reporte
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(response.data.error ==false){
					$scope.remove(objeto,o);
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
	$scope.eliminarEntidad = function($event,id,tipo,id_reporte){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_entidad'
		,"id="+id
		+"&tipo="+tipo
		+"&id_reporte="+id_reporte
		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				$scope.actualizarReportes();
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
myApp.controller('categoriaCtrl',['$scope','$http',function($scope,$http){
	$scope.modoEditarCategoria = false;
	$scope.editar =  function ($event){
		$scope.mensaje = " ";
		$scope.modoEditarCategoria = true;
		$event.stopPropagation();
	};
	$scope.enviar = function($event){
		$http.post('/BolsaTrabajo/notificaciones_controller/validar/editar_categoria',
			"id="+$scope.$parent.categoria.id_categoria
			+"&nombre="+$scope.categoriaAng,
			{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
		.then(
			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				$scope.error = response.data.error;
				if(!response.data.error){
					$scope.modoEditarCategoria = false;
					$scope.$parent.categoria.nombre = $scope.categoriaAng;
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
  	$scope.borrar =  function($event,array,index){
  		$event.stopPropagation();
  		$http.post('/BolsaTrabajo/notificaciones_controller/validar/numero_categoria_borrado',
  		"id="+$scope.$parent.categoria.id_categoria
  		,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
  		.then(
  			function successCallback(response){
				$scope.mensaje = response.data.mensaje;
				if(!response.data.error){
					if(response.data.mensaje!="0"){
						$scope.error = true;
						$scope.mensaje = "Primero ha de borrar o cambiar de categoria a los cursos pertenecientes";
					}
					else{
						$http.post('/BolsaTrabajo/notificaciones_controller/validar/borrar_categoria'
						,"id="+$scope.$parent.categoria.id_categoria
						,{'headers':{'content-type': 'application/x-www-form-urlencoded'}})
						.then(
							function successCallback(response){
								$scope.remove(array,index);
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

