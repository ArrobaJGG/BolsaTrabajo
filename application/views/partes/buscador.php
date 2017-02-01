<div class="contenedorBuscador">
	<div class="texto">
		<input class="inputTexto" type="text">
		<button class="buscar" ng-click="enviar()">Buscar</button>
		{{buscador}}
	</div>
	<div ng-controller="contenedorBotonesCtrl"  class="contenedorBotones">
		<div class="selector" >
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div ng-controller="elementoCtrl" ng-click="seleccionarTipo()" class="elemento" ng-repeat="tipo in tipos">
				{{tipo}}	
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div ng-controller="elementoCtrl" class="elemento" ng-click="seleccionarFamilia()" ng-repeat="familia in familias">
				{{familia.nombre}}
			</div>
		</div>
	</div>
	<div ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div  class="mostrarLista">
			<div ng-controller="elementoCtrl" class="elemento" ng-click="seleccionarCategoria()" ng-repeat="categoria in categorias">
				{{categoria.nombre}}
			</div>
		</div>
	</div>
	<div ng-show="cursosFiltrados.length>0" ng-controller="contenedorBotonesCtrl" class="contenedorBotones">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarLista">
			<div ng-controller="elementoCtrl" class="elemento" ng-click="seleccionarCurso()" ng-repeat="curso in $parent.cursosFiltrados = (cursos |filter :{id_familia : buscador.id_familia,id_categoria : buscador.id_categoria})">
				{{curso.nombre}}
			</div>
		</div>
	</div>
	<div ng-show="etiquetasFiltradas.length>0" ng-controller="contenedorBotonesEtiquetasCtrl" class="contenedorBotonesEtiqueta">
		<div class="selector">
			{{seleccionado}}
		</div>
		<div class="mostrarListaEtiqueta">
			<div class="elemento" ng-click="$parent.seleccionado = etiqueta.nombre" ng-repeat="etiqueta in etiquetasFiltradas = (etiquetas |filter :{id_familia_laboral : buscador.id_familia})">
				{{etiqueta.nombre}}
			</div>
		</div>
	</div>
</div>