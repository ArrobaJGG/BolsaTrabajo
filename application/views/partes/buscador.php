<div class="contenedorBuscador">
	<div class="texto">
		<input class="inputTexto" type="text">
	</div>
	<div ng-controller="contenedorBotonesCtrl"  class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div ng-click="$parent.seleccionado = tipo" class="elemento" ng-repeat="tipo in tipos">
				{{tipo}}	
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div class="elemento" ng-click="$parent.seleccionado = familia.nombre" ng-repeat="familia in familias">
				{{familia.nombre}}
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div  class="mostrarLista">
			<div class="elemento" ng-click="$parent.seleccionado = categoria.nombre" ng-repeat="categoria in categorias">
				{{categoria.nombre}}
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div class="elemento" ng-click="$parent.seleccionado = curso.nombre" ng-repeat="curso in cursos">
				{{curso.nombre}}
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesEtiquetasCtrl" class="contenedorBotonesEtiqueta">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarListaEtiqueta">
			<div class="elemento" ng-click="$parent.seleccionado = etiqueta.nombre" ng-repeat="etiqueta in etiquetas">
				{{etiqueta.nombre}}
			</div>
		</div>
	</div>
</div>