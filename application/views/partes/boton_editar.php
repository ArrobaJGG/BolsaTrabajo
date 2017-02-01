<div>
	<button ng-disabled="!activar" ng-click="hacer()">{{mensajeBoton}}</button>
	<form ng-show="modoEditor" name="editarPerfil">
		<textarea ng-model="texto" name="perfilPrivado">
			
		</textarea>
	</form>
</div>

