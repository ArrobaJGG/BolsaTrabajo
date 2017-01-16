<?php 
$this->load->helper('form');
 ?>

	
	<?php
	echo validation_errors(); 
	?>
	<form id="formulario" ng-submit="validar($event)"name="formulario" ng-controller = "formulario_ctrl" action="./Registro_controller" novalidate="" method="post" accept-charset="utf-8">
		<table id="registro" title="Registro">
			<tr>
				<td>Nombre empresa: </td>
				<td>
					<input ng-model="usuario.nombre_empresa" pattern=".{3,45}"  type="text" name="nombre_empresa" id="nombre_empresa" required/>
					<?php if(isset($correo_invalido)) echo "<span>$correo_invalido</span><br/>" ?>
					<span ng-show="!formulario.nombre_empresa.$valid && formulario.nombre_empresa.$touched">Nombre incorrecto</span>
				</td>
			</tr>
			<tr>
				<td>Usuario: </td>
				<td>
					<input ng-model="usuario.correo" pattern=".{3,45}"  type="email" name="usuario" id="usuario" required/>
					<span  ng-show="!formulario.usuario.$valid && formulario.usuario.$touched">Usuario incorrecto</span>
				</td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td>
					<input class = "confirmar" ng-model="usuario.contrasena1"  pattern=".{3,45}"  type="password" id="contrasena" name="contrasena" required />
					<span ng-show="!formulario.contrasena.$valid && formulario.contrasena.$touched">Contraseña incorrecta</span>
				</td>
			</tr>
			<tr>
				<td>Confirmar</td>
				<td>
					<input class="confirmar" ng-model="usuario.contrasena2" pattern=".{3,45}"  type="password" id="contrasenaC" name="contrasenaC" required/>
					<span ng-show="!contrasenas_iguales() && formulario.contrasenaC.$touched">Contraseñas no iguales</span>
				</td>
			</tr>
		</table>
		<input type="submit" id="Enviar" name="Enviar" value="Enviar" />
		<button type="reset" name="Cancelar" value="Cancelar"/>Cancelar</button>
	
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
