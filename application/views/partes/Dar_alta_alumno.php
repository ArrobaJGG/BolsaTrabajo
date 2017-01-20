<form name="crearUnUsuario" >
	<span>correo(nombre usuario)</span><input ng-model="userAng" type="text" name="usuario" required><br>
	<span ng-show = "usuarioCreado">{{mensaje}}</span>
	<button ng-disabled="!crearUnUsuario.$valid" ng-click="enviar()">Enviar</button>
</form>
<upload objeto-upload="archivoSubidos" style="width: 100px;height: 100px;background-color: blue" to="./registro_controller/crear/alumno" ng-model="archivoSubido"></upload>
<div ng-if="archivoSubidos">
	<div ng-repeat="(correo,mensaje) in archivoSubidos.mensajes">
		Correo: {{correo}}<br>
		Mensaje:{{mensaje}}
	</div>
	<div ng-show="archivoSubidos.cargando">Cargando...</div>
</div>
