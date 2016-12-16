//alert("holla!!");
$(function(){
	$('#Enviar').click(function(event){
		var contrasenas = $('.confirmar');
		if(contrasenas[0].value!=contrasenas[1].value){
			event.preventDefault();	
		}
		var usuario = $("#usuario").val();
		if(!validateEmail($('#usuario').val())){
			$('#registro').prepend("<p>correo invalido</p>");
			event.preventDefault();
		}
	});
});
 function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}