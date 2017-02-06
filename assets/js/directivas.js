angular.module("myDirectivas")
.directive('upload', ['$http',function($http) {
    return {
        restrict: 'E',
        replace: true,
        scope: {
        	upload : "=objetoUpload"
        },
        require: '?ngModel',
        templateUrl: '/BolsaTrabajo/api/cargar_partes/cargar/subir_csv',
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
}])
.directive('miBuscador',['$http',function($http){
	return {
        restrict: 'E',
        replace: false,
        scope: {},
        require: '?ngModel',
        templateUrl: '/BolsaTrabajo/api/cargar_partes/cargar/buscador',
        link: function(scope, element, attrs) {
        	scope.buscador = {
        		tipo: "",
        		id_familia : "",
        		id_categoria : "",
        		id_curso : ""
        	};
        	
        	scope.tipoSeleccionado = "";
        	$http.get('/BolsaTrabajo/Buscador_controller/validar/get_datos')
        	.then(
        		function correcto(response){
        			scope.tipos = response.data.tipos;
        			scope.familias = response.data.familias;
        			scope.categorias =  response.data.categorias;
        			scope.cursos = response.data.cursos;
        			scope.etiquetas = response.data.etiquetas;
        		},
        		function fallo(response){
        			console.log(response.data);
        		}
        	);
        	
        	scope.enviar = function(){
        		$http.post('/BolsaTrabajo/Buscador_controller/validar/buscador'
        		,JSON.stringify({datos : scope.buscador}))
	        	.then(
	        		function correcto(response){
	        			console.log(response.data);
	        		},
	        		function fallo(response){
	        			console.log(response.data);
	        		}
	        	);
        	};
        }
      };
}])
.controller('elementoCtrl',['$scope','$timeout',function($scope,$timeout){
	$scope.mostrar = false;
	$scope.seleccionarTipo =  function(){
		$scope.$parent.$parent.seleccionado = $scope.$parent.tipo;
		$scope.$parent.$parent.$parent.buscador.tipo = $scope.tipo;
	};
	$scope.seleccionarFamilia =  function(){
		if($scope.$parent.$parent.seleccionado != $scope.familia.nombre){
			$scope.buscador.id_curso = "";
			$scope.$parent.$parent.seleccionado = $scope.familia.nombre;
			$scope.$parent.$parent.$parent.buscador.id_familia = $scope.familia.id_familia_laboral;
			$timeout(function(){
	    		if($scope.cursosFiltrados.length ==0){
					$scope.buscador.id_curso = "";
				}
	    	},0,true);
		}
	};
	$scope.seleccionarCategoria =  function(){
		if($scope.$parent.$parent.seleccionado != $scope.categoria.nombre){
			$scope.buscador.id_curso = "";
			$scope.$parent.$parent.seleccionado = $scope.categoria.nombre;
			$scope.$parent.$parent.$parent.buscador.id_categoria = $scope.categoria.id_categoria;
			$timeout(function(){
        		if($scope.cursosFiltrados.length ==0){
					$scope.buscador.id_curso = "! ";
				}
    		},0,true);
		}
	};
	$scope.seleccionarCurso = function(){
		$scope.$parent.$parent.seleccionado = $scope.curso.nombre;
		$scope.$parent.$parent.$parent.buscador.id_curso = $scope.curso.id_curso;
	};
	
}])
.controller('contenedorBotonesEtiquetasCtrl',['$scope',function($scope){
	$scope.mostrar = false;
}])
.controller('contenedorBotonesCtrl',['$scope',function($scope){
	$scope.mostrar = false;
	$scope.seleccionado = "todos";
}]);

