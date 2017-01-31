
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
		
	 $scope.redirect = function($event){
	 	console.log("hola juan");
			$event.preventDefault();	window.location.assing = "http://www.marca.com/";
			};
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
						var boton = document.createElement("button");
						
						midiv.setAttribute("id","cuadro");
						
						boton.setAttribute("value","Editar Oferta");
						
						boton.setAttribute("onclick", "window.location='./Editar_oferta_controller/index/contador'");
						
						
						
						midiv.innerHTML = "<h3>"+$scope.ofertas[contador].titulo+"</h3><p>"+$scope.ofertas[contador].resumen+"</p>";
						boton.innerHTML= "Editar Oferta";
						
						document.getElementById('cuadro').appendChild(midiv); // Lo pones en "body", si quieres ponerlo dentro de algún id en concreto usas document.getElementById('donde lo quiero poner').appendChild(midiv);
						document.getElementById('cuadro').appendChild(boton);						
						contador++;
					
					
				}
				
				
		
			};
			
					
			
			
			
		

		}]);
