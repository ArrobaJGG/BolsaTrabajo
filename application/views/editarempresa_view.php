<?php 
$this->load->helper('form');
 ?>

	
<form class="salida" name="userForm" ng-submit="submit($event)" action="./Editarempresa_controller" method="post" novalidate enctype="multipart/form-data">
  <div id="bloque">
  	<h1>Editar Datos De La Empresa</h1>
		<table id="tabla" title="editar_empresa">
			<div ng-controller="myCtrl" >
				
				
					<tr>
						<td><b>Nombre: *</b></td>
						<td><input type="text" name="nombre" ng-init = "nombre='<?php if ($nombre==NULL){ echo " "; } else {echo $nombre;} ?>'"  ng-model="nombre"  required />
						<span class="messages" ng-show="userForm.$submitted || nombre.$touched"></span>
						<span ng-show="userForm.nombre.$error.required">El campo es obligatorio.</span>
		       		    </td>
		
					</tr>
					<tr>
						<td><b>Cif:</b></td>
						<td><input type="text" name="cif" value="<?php echo $cif; ?>" /></td>
					</tr>
					<tr>
						<td><b>Telefono: *</b></td>
						<td><input type="text" name="telefono" ng-init = "telefono='<?php if ($telefono1==NULL){ echo " "; } else {echo $telefono1;} ?>'"  ng-model="telefono"  required />
						<span class="messages" ng-show="userForm.$submitted || telefono.$touched"></span>
						<span ng-show="userForm.telefono.$error.required">El campo es obligatorio.</span>
		       		    </td>
					</tr>
					<tr>
						<td><b>Telefono2:</b></td>
						<td><input type="number" name="telefono2" value="<?php $telefono2 = (NULL) ? " " :   $telefono2; echo $telefono2 ?>" /></td>
					</tr>
					<tr>
						<td><b>Nombre contacto: *</b></td>
						<td><input type="text"  id="persona_contacto" name="persona_contacto" ng-init = "persona_contacto = '<?php $persona_contacto = (null) ?  " "  : $persona_contacto; echo $persona_contacto ?>'" ng-model="persona_contacto" required  />
							<span class="messages" ng-show="userForm.$submitted || persona_contacto.$touched">
							<span ng-show="userForm.persona_contacto.$error.required">El campo es obligatorio.</span>
						</td>
					</tr>
					<tr>
						<td><b>Logo:</b></td>
						<td><input type="file" name="logo"  accept="image/*" value="/BolsaTrabajo/img/<?php echo $id_login ?>.jpg" onerror="this.src='./img/pordefecto.jpg'"/></td>
						<td><div id="imgempresa">
							<img src="/BolsaTrabajo/img/<?php echo $id_login ?>.jpg"; width="80" height="80" onerror="this.src='./img/pordefecto.jpg'";>
						   
						</div></td>
						
					</tr>
				</div>
			
			</table>
			<div id="boton">
				<input type="submit" class="button" name="Actualizar" value="Actualizar" />
				<input type="button" class="button" name="Cancelar" value="Cancelar" onclick="window.location='Resumen_empresa_controller'" />
				<input type="button" class="button" name="Contraseña" value="Contraseña" onclick="window.location='Cambiar_credenciales_controller'" />
				<?php //TODO ponerlo en rojo ?>
				<p><b><?php if (isset($mensaje)) echo $mensaje ?></b></p>
				<p><b><?php echo validation_errors(); ?></b></p>
			</div>
			
		</div>  	
	</form>
