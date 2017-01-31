
var contador = 1;

var myApp = angular.module("my-app",[]);
			myApp.controller('nuevaoferta',['$scope','$http',function($scope,$http){
			
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
		
		var titulo = $scope.ofertas[contador].titulo;
		var longitud = $scope.ofertas.length;
		console.log(longitud);
		console.log(contador);
		if(longitud <= contador){
			alert("longitud "+longitud+" contador "+contador);
			
		}
				if (typeof titulo != 'undefined'){
					
						var midiv = document.createElement("div");
						var boton = document.createElement("input");
						
						midiv.setAttribute("id","cuadro");
						boton.setAttribute("type" , "button");
						boton.setAttribute("value","Editar Oferta");
						boton.setAttribute("OnClick","location.href=OnClick=http://www.marca.com/");
						
						//console.log($scope.ofertas);
						
						midiv.innerHTML = "<h3>"+$scope.ofertas[contador].titulo+"</h3><p>"+$scope.ofertas[contador].resumen+"</p>";
						boton.innerHTML= 
						
						document.getElementById('cuadro').appendChild(midiv); // Lo pones en "body", si quieres ponerlo dentro de algún id en concreto usas document.getElementById('donde lo quiero poner').appendChild(midiv);
						document.getElementById('cuadro').appendChild(boton);						
						contador++;
					
					
				}
				
				
		
			};
			
		

		}]);
