var myApp = angular.module('my-app', []);
      myApp.controller('nuevaetiqueta', ['$scope','$http', function($scope,$http) {
      	
        
	    }
	    
       ]);
       
 var correcto = false;  
function showHide(){
 //create an object reference to the div containing images
  var oImageDiv=document.getElementById('etiquetas'); 
  //set display to inline if currently none, otherwise to none o
  oImageDiv.style.display=(oImageDiv.style.display=='none')?'inline':'none'; 
}       

function saber(){
	var valor = document.getElementByName("familia").value;
	alert(valor);
}
function quitar(){
	document.insertar.Publicar.disabled = true;
}
window.onload = quitar;

function verificar(){
	var titulo =document.getElementById("titulo").value;
	titulo = titulo.length;
	var resumen=document.getElementById("resumen").value;
	resumen = resumen.length;
	var telefono = document.getElementById("telefono").value;
	var sueldo = document.getElementById("sueldo").value;
		
		if (titulo>=3 && resumen>=3) {
			document.insertar.Publicar.disabled = false;
			
		}
		
	
}

