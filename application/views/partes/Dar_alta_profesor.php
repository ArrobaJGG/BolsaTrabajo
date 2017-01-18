<form name="crearProfesor" >
	<span>Nombre: </span><input type="text" name="nombre" ng-model="nombreAng" required>
		<span ng-show="!crearProfesor.nombre.$valid&&crearProfesor.nombre.$touched">Campo obligatorio</span><br>
	<span>Apellidos: </span><input type="text" name="apellidos" ng-model="apellidosAng" required />
		<span ng-show="!crearProfesor.apellidos.$valid&&crearProfesor.apellidos.$touched">Campo obligatorio</span><br>
	<span>Usuario(correo)</span><input type="email" name="usuario" ng-model="usuarioAng" required/>
		<span ng-show="!crearProfesor.usuario.$valid&&crearProfesor.usuario.$touched">Campo obligatorio</span>
	<br><span>Familia laboral</span>
	<select name="idFamiliaLaboral" ng-model="idAng" required>
		<option ng-repeat="familia in familias" value="{{familia.id_familia_laboral}}">{{familia.nombre}}</option>
	</select>
		<span ng-show="!crearProfesor.idFamiliaLaboral.$valid&&crearProfesor.idFamiliaLaboral.$touched">Campo obligatorio</span>
	<br>
	<span>Esta activo:</span><input type="radio" name="activo" ng-model="activoAng" checked value="1" required>si   <input type="radio" name="activo" ng-model="activoAng" required value="0">no
	<br><button ng-disabled="!crearProfesor.$valid" ng-click="enviar()">Enviar</button>
	<span ng-show="usuarioCreado">{{mensaje}}</span>
</form>