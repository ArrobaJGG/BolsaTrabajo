<div style="border-bottom: 3px solid black" ng-repeat="alumno in alumnos" ng-controller="borrarAlumnoCtrl">
	Nombre: {{alumno.nombre}}<br>
	Apellido: {{alumno.apellidos}}<br>
	DNI: {{alumno.dni}}<button ng-click="borrar($event)" value="{{alumno.id_login}}">Eliminar</button>
	<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
</div>