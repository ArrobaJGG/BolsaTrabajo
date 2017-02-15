		
var contador = 1;
angular.module("myDirectivas",['ngAnimate']);
var myApp = angular.module("my-app",['myDirectivas']);
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
						var borrar = document.createElement("button");
						var oferta = document.createElement("button");
						
						midiv.setAttribute("class","cuadro");
						midiv.setAttribute("id", "nueva");
						
						
						boton.setAttribute("value","Editar Oferta");
						boton.setAttribute("class", "button");
						
						borrar.setAttribute("value", "Borrar Oferta");
						borrar.setAttribute("class", "button");
						
						
						oferta.setAttribute("class", "button");
						oferta.setAttribute("value", "Ver Oferta");
						
						
						boton.setAttribute("onclick", "window.location='./Editar_oferta_controller/index/"+$scope.ofertas[contador].id_oferta+"'");
						borrar.setAttribute("onclick","window.location='./Resumen_empresa_controller/borraroferta/"+$scope.ofertas[contador].id_oferta+"'");
						oferta.setAttribute("onclick","window.location='./Mostrar_ofertas_controller/index/"+$scope.ofertas[contador].id_oferta+"'");
						
						midiv.innerHTML = "<h3><a href='/BolsaTrabajo/Mostrar_ofertas_controller/index/"+$scope.ofertas[contador].id_oferta+"'>"+$scope.ofertas[contador].titulo+"</a></h3><p>"+$scope.ofertas[contador].resumen+"</p>";
						boton.innerHTML= "Editar Oferta";
						borrar.innerHTML= "Borrar Oferta";
						oferta.innerHTML= "Ver Oferta";
						
						midiv.appendChild(boton);
						midiv.appendChild(borrar);
						midiv.appendChild(oferta);
						document.getElementById('mediano').appendChild(midiv); // Lo pones en "body", si quieres ponerlo dentro de algún id en concreto usas document.getElementById('donde lo quiero poner').appendChild(midiv);
												
						contador++;
					
					
				}
				
				
		
			};
		
		
				

		}]);
