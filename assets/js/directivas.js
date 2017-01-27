angular.module("myDirectivas")
.directive('upload', ['$http',function($http) {
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
}])
.directive('miBuscador',['$http',function($http){
	return {
        restrict: 'E',
        replace: true,
        scope: {},
        require: '?ngModel',
        templateUrl: '/BolsaTrabajo/api/cargar_partes/cargar/buscador',
        link: function(scope, element, attrs) {
        	scope.tipoSeleccionado = "!";
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
        }
      };
}])
.controller('contenedorBotonesCtrl',['$scope',function($scope){
	$scope.mostrar = false;
	$scope.tipoSeleccionado = "todos";
}])
.controller('contenedorBotonesEtiquetasCtrl',['$scope',function($scope){
	$scope.mostrar = false;
}]);
