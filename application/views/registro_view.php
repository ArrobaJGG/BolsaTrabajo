<?php 
$this->load->helper('form');
 ?>

	
	<?php
	echo validation_errors(); 
	echo form_open('Registro_controller');
	?>
		<table title="Registro">
			<tr>
				<td>Usuario: </td>
				<td><input type="text" name="usuario" /></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="contrasena" /></td>
			</tr>
			<tr>
				<td>Confirmar</td>
				<td><input type="password" name="contrasenaC" /></td>
			</tr>
		</table>
		<input type="submit" name="Enviar" value="Enviar" />
		<button type="reset" name="Cancelar" value="Cancelar"/>Cancelar</button>
	
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
