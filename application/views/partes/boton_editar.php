<div>
	<i class="fa fa-edit" ng-disabled="!activar" ng-click="hacer($event)">{{mensajeBoton}}</i>
	<form ng-show="modoEditor" name="editarPerfil">
		<textarea ng-model="texto" name="perfilPrivado">
			
		</textarea>
	</form>
</div>

