<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('Login_controller');
	?>
		<table title="login">
			<tr>
				<td>Usuario: </td>
				<td><input type="text" name="usuario" /></td>
			</tr>
			<tr>
				<td>Contraseña: </td>
				<td><input type="password" name="contrasena" /></td>
			</tr>
			 
		</table>
		<h2><?php if(isset($mensaje)) echo $mensaje; ?></h2>
        <?php echo validation_errors(); ?><!--mostrar los errores de validación-->
		<input type="submit" name="Enviar" value="Enviar" />
	</form>

