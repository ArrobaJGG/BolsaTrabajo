<?php 
$this->load->helper('form');
 ?>

	
	<?php
	echo validation_errors(); 
	?>
	<form id="formulario" ng-submit="validar($event)"name="formulario" ng-controller = "formulario_ctrl" action="./Registro_controller" novalidate="" method="post" accept-charset="utf-8">
			<h1>Registro</h1>
			<table id="registro" title="Registro">
				<tr>
					<td><b>Nombre empresa:</b> </td>
					<td>
						<input ng-model="usuario.nombre_empresa" pattern=".{3,45}"  type="text" name="nombre_empresa" id="nombre_empresa" required/>
						<?php if(isset($correo_invalido)) echo "<span>$correo_invalido</span><br/>" ?>
						<span ng-show="!formulario.nombre_empresa.$valid && formulario.nombre_empresa.$touched">Nombre incorrecto</span>
					</td>
				</tr>
				<tr>
					<td><b>Correo: </b></td>
					<td>
						<input ng-model="usuario.correo" pattern=".{3,45}"  type="email" name="usuario" id="usuario" required/>
						<span  ng-show="!formulario.usuario.$valid && formulario.usuario.$touched">Usuario incorrecto</span>
					</td>
				</tr>
				<tr>
					<td><b>Contraseña</b></td>
					<td>
						<input class = "confirmar" ng-model="usuario.contrasena1"  pattern=".{3,45}"  type="password" id="contrasena" name="contrasena" required />
						<span ng-show="!formulario.contrasena.$valid && formulario.contrasena.$touched">Contraseña incorrecta</span>
					</td>
				</tr>
				<tr>
					<td><b>Confirmar</b></td>
					<td>
						<input class="confirmar" ng-model="usuario.contrasena2" pattern=".{3,45}"  type="password" id="contrasenaC" name="contrasenaC" required/>
						<span ng-show="!contrasenas_iguales() && formulario.contrasenaC.$touched">Contraseñas no iguales</span>
					</td>
				</tr>
			</table>
			<div id="botones">
				<input type="submit"  class="button" id="Enviar" name="Enviar" value="Enviar" />
				<button type="reset" class="button"  name="Cancelar" value="Cancelar" onclick="window.location='login_controller'"/>Cancelar</button>
			</div>
		
	</form>
