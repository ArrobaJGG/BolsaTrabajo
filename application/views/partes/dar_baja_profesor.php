<div style="border-bottom: 3px solid black"ng-repeat="profesor in profesores" ng-controller="borrarProfesorCtrl">
	Nombre profesor: {{profesor.nombre}}<br>
	Correo: {{profesor.correo}}<br>
	Activo: <span ng-show="estado(profesor.activo)">Si</span><span ng-show="!estado(profesor.activo)">No</span><br>
	Estado: <span ng-show="estado(profesor.estado)">Validado</span><span ng-show="!estado(profesor.estado)">No validado</span><button ng-click="borrar($event)" value="{{profesor.id_login}}">Eliminar</button>
	<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
</div>
