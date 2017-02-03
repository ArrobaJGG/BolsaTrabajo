var myApp = angular.module('my-app', []);
      myApp.controller('nuevaetiqueta', ['$scope','$http', function($scope,$http) {
      	
        
	    }
	    
       ]);



function quitar(){
	document.oferta.Actualizar.disabled = true;
}
window.onload = quitar;
function comprobar(){
		var todo_correcto = true;
		
		var titulo = document.getElementByName("titulo").value;

			if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo) ) {
	  			todo_correcto = false;
			}
			console.log(titulo);
						
		var resumen = document.getElementByName("resumen").value;
			
			if( resumen == null || resumen.length == 0 || /^\s+$/.test(resumen) ) {
	  			todo_correcto = false;
			}
		
		if(!todo_correcto){
		alert('Algunos campos no están correctos, vuelva a revisarlos');
		
		}
		
		return todo_correcto;
		

}
