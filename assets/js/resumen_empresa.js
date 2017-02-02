
var contador = 1;

var myApp = angular.module("my-app",[]);
			myApp.controller('nuevaoferta',['$scope','$http',function($scope,$http){
			
			var indice = 0;
			$http.get('/BolsaTrabajo/Resumen_empresa_controller/traerofertas')
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
						
						midiv.setAttribute("class","cuadro");
						
						boton.setAttribute("value","Editar Oferta");
						
						boton.setAttribute("onclick", "window.location='./Editar_oferta_controller/index/"+$scope.ofertas[contador].id_oferta+"'");
						
						
						
						midiv.innerHTML = "<h3><a href='/BolsaTrabajo/Mostrar_ofertas_controller/index/"+$scope.ofertas[contador].id_oferta+"'>"+$scope.ofertas[contador].titulo+"</a></h3><p>"+$scope.ofertas[contador].resumen+"</p>";
						boton.innerHTML= "Editar Oferta";
						midiv.appendChild(boton);
						document.getElementById('mediano').appendChild(midiv); // Lo pones en "body", si quieres ponerlo dentro de algún id en concreto usas document.getElementById('donde lo quiero poner').appendChild(midiv);
												
						contador++;
					
					
				}
				
				
		
			};
		
		
				

		}]);
