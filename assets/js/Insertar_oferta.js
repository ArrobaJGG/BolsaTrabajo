var myApp = angular.module('my-app', []);
      myApp.controller('nuevaetiqueta', ['$scope','$http', function($scope,$http) {
      	
        
	    }
	    
       ]);
       
   
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
