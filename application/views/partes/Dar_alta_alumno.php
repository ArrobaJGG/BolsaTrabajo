<form name="crearUnUsuario" >
	<span>correo(nombre usuario)</span><input ng-model="userAng" type="text" name="usuario"><br>
	<span ng-show = "usuarioCreado">{{mensaje}}</span>
	<button ng-click="enviar()">Enviar</button>
</form>
<div>
	<!--<input data-my-Directive type="file" name="file">
		terminar algun dia-->
</div>
