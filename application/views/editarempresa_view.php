<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('editarempresa_controller');
	?>
		<table title="editar_empresa">
			<div ng-controller="UserController">
				<form name="userForm" novalidate>
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="nombre" ng-model="nombre" value="<?php echo $nombre; ?>" required />
				<span class="messages" ng-show="userform.$submitted || userform.Nombre.$touched">
				<span ng-show="userForm.Nombre.$error.required">El campo es obligatorio.</span>
       		    </td>

			</tr>
			<tr>
				<td>Cif:</td>
				<td><input type="text" name="cif" value="<?php echo $cif; ?>" /></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type="number" name="telefono" ng-model="telefono" value="<?php echo $telefono1; ?>" />
			</tr>
			<tr>
				<td>telefono2:</td>
				<td><input type="number" name="telefono2" value="<?php echo $telefono2; ?>" /></td>
			</tr>
			<tr>
				<td>Nombre contacto:</td>
				<td><input type="text" name="contacto" value="<?php echo $persona_contacto; ?>" /></td>
			</tr>
			<tr>
				<td>Logo:</td>
				<td><input type="file" name="archivo" value="" /></td>
			</tr>
			Datos: {{nombre + cif + telefono + telefono2 + contacto + archivo}}
			<script>
				var pre = angular.module('pre', []);
				app.controller('myCtrl', function($scope) {
				    $scope.nombre = " ";
				    $scope.telefono = " ";
				    $scope.telefono2= " ";
				    $scope.contacto=" ";
				    $scope.archivo=" ";
				});
					
			</script>
	



		
		</table>
		<input type="submit" name="Actualizar" value="Actualizar" />
		<input type="reset" name="Cancelar" value="Cancelar"/>
		<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
