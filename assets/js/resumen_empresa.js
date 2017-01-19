
var contador = 0;

var myApp = angular.module("my-app",[]);
			myApp.controller('nuevaoferta',['$scope','$http',function($scope,$http){
			//$scope.usuarioBorrado = false;
			var indice = 0;
			$http.get('/BolsaTrabajo/Resumenempresa_controller/traerofertas')
				.then(
					function successCallback(response){
						console.log(response.data);
						$scope.ofertas = response.data;
					}
					,function errorCallback(response){
						console.log(response.data);
					}
					
				);
		
	
	$scope.vermas =		function () {
		var midiv = document.createElement("div");
		midiv.setAttribute("id","cuadro");
		midiv.setAttribute("otros_atributos","otros");
		console.log($scope.ofertas);
		midiv.innerHTML = "<h3>"+$scope.ofertas[indice].titulo+"</h3> <p>hola parrafos</p>";
		document.getElementById('cuadro').appendChild(midiv); // Lo pones en "body", si quieres ponerlo dentro de algún id en concreto usas document.getElementById('donde lo quiero poner').appendChild(midiv);
		indice++;
};
  

		}]);
