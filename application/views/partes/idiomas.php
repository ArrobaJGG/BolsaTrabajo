<div>
	<div id="listaIdiomas">
		<div style="border-bottom: 3px solid black" ng-repeat="idioma in idiomas" ng-controller="idiomaCtrl">
			<span  ng-show="!modoEditor">
				<span>{{idioma.nombre}}<button ng-click="editar()">Editar</button> <button value = "{{idioma.id_idioma}}" ng-click="borrar($event)">Borrar</button></span>
			</span>
			<span ng-show="modoEditor">
				<form name="editarIdioma">
					<input type="text" ng-init="idiom = idioma.nombre" name="nombre" ng-model="idiom">
					<button value = "{{idioma.id_idioma}}" ng-click="enviar($event)">Enviar</button>
					<span ng-show="error">{{mensaje}}</span>
				</form>
			</span>
		</div>
	</div>
	<div id="agregarNuevoIdioma">
		<span>Agregar nuevo idioma</span><br>
		<span>Nombre:</span><input type="text" name="idioma" ng-model="idiomaAng"><br>
		<button ng-click="agregarIdioma()">Agregar</button>
		<span>{{mensaje}}</span>
	</div>
</div>