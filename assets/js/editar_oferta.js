function comprobar(){
		var todo_correcto = true;
		
		titulo = document.getElementByName("titulo").value;

			if( titulo == null || titulo.length == 0 || /^\s+$/.test(titulo) ) {
	  			todo_correcto = false;
			}
			console.log(titulo);
						
		resumen = document.getElementByName("resumen").value;
			
			if( resumen == null || resumen.length == 0 || /^\s+$/.test(resumen) ) {
	  			todo_correcto = false;
			}
		
		if(!todo_correcto){
		alert('Algunos campos no están correctos, vuelva a revisarlos');
		}
		
		return todo_correcto;
		

}
