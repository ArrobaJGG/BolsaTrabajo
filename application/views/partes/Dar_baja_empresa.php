<div style="border-bottom: 3px solid black"ng-repeat="empresa in empresas" ng-controller="borrarEmpresaCtrl">
	Nombre empresa: {{empresa.nombre}}<br>
	Correo: {{empresa.correo}}<br>
	Estado: <span ng-show="estado(empresa.estado)">Validado</span><span ng-show="!estado(empresa.estado)">No validado</span><button ng-click="borrar($event)" value="{{empresa.id_login}}">Eliminar</button>
	<span ng-show="usuarioBorrado"><br>{{mensaje}}</span>
</div>
