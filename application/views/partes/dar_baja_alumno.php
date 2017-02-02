<div class="divNgView" style="border: 1px solid black">
	<div class="elementoRepetible">
		<div  ng-repeat="alumno in alumnos" ng-controller="borrarAlumnoCtrl">
			Nombre: {{alumno.nombre}}<br>
			Apellido: {{alumno.apellidos}}<br>
			DNI: {{alumno.dni}}<button ng-click="borrar($event)" value="{{alumno.id_login}}">Eliminar</button>
			<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
		</div>
	</div>
	<div class="compartimento" ng-show="alumnos.length==0">
		<div class="titulo">No hay alumnos</div>
		<img src="/BolsaTrabajo/assets/imgs/tumbleweed.gif">
	</div>
</div>