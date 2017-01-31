<div>
	<div ng-repeat="alumno in alumnos">
		Nombre:{{alumno.nombre}}
		<button ng-click = "editarPerfil($event,alumno.id_login)">Editar perfil privado</button>
	</div>
	<mi-editar-perfil alumno=''></mi-editar-perfil>
</div>