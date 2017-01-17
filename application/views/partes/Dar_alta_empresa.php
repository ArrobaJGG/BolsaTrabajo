<form name="crearUnUsuario" >
	<span>Nombre empresa</span><input type="text" name="nombre" ng-model="nombreEmpresa"><br/>
	<span>correo(nombre usuario)</span><input ng-model="userAng" type="text" name="usuario"><br>
	<span ng-show = "usuarioCreado">{{mensaje}}</span>
	<button ng-click="enviar()">Enviar</button>
</form>