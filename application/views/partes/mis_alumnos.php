<div>
	<div ng-controller="alumnoCtrl" ng-repeat="alumno in alumnos">
		Nombre:{{alumno.nombre}}
		<mi-editor-perfil alumno = "alumno.id_login"></mi-editor-perfil>
	</div>
</div>