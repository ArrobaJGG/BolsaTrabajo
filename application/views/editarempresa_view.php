<?php 
$this->load->helper('form');
 ?>

	
<form name="userForm" ng-submit="submit($event)" action="./Editarempresa_controller" method="post" novalidate>
    	
		<table title="editar_empresa">
			<div ng-controller="myCtrl" >
				
				
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="nombre" ng-init = "nombre='<?php echo $nombre; ?>'"  ng-model="nombre"  required />
				<span class="messages" ng-show="userForm.$submitted || nombre.$touched"></span>
				<span ng-show="userForm.nombre.$error.required">El campo es obligatorio.</span>
       		    </td>

			</tr>
			<tr>
				<td>Cif:</td>
				<td><input type="text" name="cif" value="<?php echo $cif; ?>" /></td>
			</tr>
			<tr>
				<td>telefono: </td>
				<td><input type="number" name="telefono" ng-init = "telefono='<?php echo $telefono1; ?>'"  ng-model="telefono"  required />
				<span class="messages" ng-show="userForm.$submitted || telefono.$touched"></span>
				<span ng-show="userForm.telefono.$error.required">El campo es obligatorio.</span>
       		    </td>
			</tr>
			<tr>
				<td>telefono2:</td>
				<td><input type="number" name="telefono2" value="<?php echo $telefono2; ?>" /></td>
			</tr>
			<tr>
				<td>Nombre contacto:</td>
				<td><input type="text" name="contacto" ng-init ="contacto =<?php echo $persona_contacto; ?>" required  />
					<span class="messages" ng-show="userform.$submitted || userform.contacto.$touched">
					<span ng-show="userForm.contacto.$error.required">El campo es obligatorio.</span>
				</td>
			</tr>
			<tr>
				<td>Logo:</td>
				<td><input type="file" name="archivo" value="" /></td>
			</tr>
</div>
		
		</table>
		<input type="submit" name="Actualizar" value="Actualizar" />
		<input type="reset" name="Cancelar" value="Cancelar"/>
		<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
