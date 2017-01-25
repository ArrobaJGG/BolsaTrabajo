<form name="crearUnUsuario" >
	<span>Nombre empresa</span><input type="text" name="nombre" ng-model="nombreEmpresa" required><br/>
	<span>correo(nombre usuario)</span><input ng-model="userAng" type="email" name="usuario" required><br>
	<span ng-show = "usuarioCreado">{{mensaje}}</span>
	<button ng-disabled="!crearUnUsuario.$valid" ng-click="enviar()">Enviar</button>
</form>