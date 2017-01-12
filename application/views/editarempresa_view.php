<?php 
$this->load->helper('form');
 ?>

	
<form name="userForm" ng-submit="submit($event)" action="./Editarempresa_controller" method="post" novalidate enctype="multipart/form-data">
    	
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
				<td><input type="text" name="telefono" ng-init = "telefono='<?php echo $telefono1; ?>'"  ng-model="telefono"  required />
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
				<td><input type="text" name="persona_contacto" ng-init = "persona_contacto = '<?php echo $persona_contacto; ?>'" ng-model="persona_contacto" required  />
					<span class="messages" ng-show="userForm.$submitted || persona_contacto.$touched">
					<span ng-show="userForm.persona_contacto.$error.required">El campo es obligatorio.</span>
				</td>
			</tr>
			<tr>
				<td>Logo:</td>
				<td><input type="file" name="logo"  accept="image/*" /></td>
				<td><div id="imgempresa">
					<img src="http://localhost/BolsaTrabajo/img/<?php echo $id_login ?>.jpg"; width="35" height="35" onerror="this.src='./img/pordefecto.jpg'";>
				   
				</div></td>
				
			</tr>
</div>
		
		</table>
		<input type="submit" name="Actualizar" value="Actualizar" />
		<input type="reset" name="Cancelar" value="Cancelar"/>
		<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
