<div class="divNgView">
	<div class="titulo">
		<h4>Idiomas</h4>
	</div>
	<div class ="dosPartes">
		<form name="agregarIdiomaForm" class="idiomas agregarIdiomas">
				<div class="titulo">
					<h4>Agregar nuevo idioma</h4>
				</div>
				<span>Nombre:</span><input type="text" name="idioma" ng-keypress="($event.which === 13&&agregarIdiomaAng)?agregarIdioma():0" required ng-model="agregarIdiomaAng">
				<i class="fa fa-plus-circle"ng-show="agregarIdiomaForm.$valid" ng-click="agregarIdioma()">Agregar</i>
				<br><span>{{mensaje}}</span>
		</form>
		<div class="elementoRepetible idiomas">
			<div class="elementoInterno animate-repeat-horizontal"
				<form ng-submit="buscar()"  name="editarIdioma">
					<div class="iconoInterno">
						<i class="fa fa-search" ng-click="buscar()"></i>
					</div>
					<input ng-keypress="($event.which === 13)?buscar():0" type="text" name="nombre" ng-model="idiomaAng">
				</form>
			</div>
			<div class="elementoInterno animate-repeat-horizontal"  ng-repeat="idioma in idiomas" ng-controller="idiomaCtrl">
				<div  ng-show="!modoEditor">
				<div class="iconoInterno">
					<i class="fa fa-times" ng-click="borrar(idiomas,$index)"></i>
				</div>
					<div class="iconoInternoCentro">{{idioma.nombre}}</div>
					<div class="iconoInternoCentro">
						<i class="fa fa-pencil-square-o" ng-click="editar()"></i> 
					</div>
				</div>
				<div class="iconoInternoAbajo" ng-show="modoEditor">
					<form name="editarIdioma">
						<div>
							<input type="text" ng-init="idiom = idioma.nombre" name="nombre" ng-model="idiom">
						</div>
						<div class="iconoInternoCentro">
							<i class="fa fa-paper-plane" ng-click="enviar()"></i>
						</div>
						<span ng-show="error">{{mensaje}}</span>
						<button ng-show="false" ng-click="enviar()">Enviar</button>
					</form>
				
				</div>
				
			</div>
		</div>
		
	</div>
</div>