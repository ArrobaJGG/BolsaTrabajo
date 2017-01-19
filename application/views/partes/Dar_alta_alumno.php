<form name="crearUnUsuario" >
	<span>correo(nombre usuario)</span><input ng-model="userAng" type="text" name="usuario"><br>
	<span ng-show = "usuarioCreado">{{mensaje}}</span>
	<button ng-click="enviar()">Enviar</button>
</form>
<upload style="width: 100px;height: 100px;background-color: blue" to="./registro_controller/crear/alumno" ng-model="object.id"></upload>
