<form action="<?php echo base_url() ?>" method="POST">
	<?php if($error){?>
		<span><?php echo $error ?></span><br>
	<?php } ?>
	<span>Contraseña:</span><input type="password" name="contrasena"><br>
	<span>Repita contraseña</span><input type="password" name="repetirContrasena"><br>
	<button type="submit" name="enviar" value="enviar">Cambiar contraseña</button>
</form>