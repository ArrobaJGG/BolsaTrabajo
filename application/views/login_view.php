<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('login_controller');
	?>
		<table title="login">
			<tr>
				<td>Usuario: </td>
				<td><input type="text" name="usuario" /></td>
			</tr>
			<tr>
				<td>Contraseña</td>
				<td><input type="password" name="password" /></td>
			</tr>
		</table>
		<input type="submit" name="Enviar" value="Enviar" />
	</form>

