<form action="<?php echo base_url('./'.$hash) ?>" method="POST">
	<div id="bloque">
		<div id="contenido">
			<?php if($error){?>
				<span><?php echo $error ?></span><br>
			<?php } ?>
			<span>Contraseña:</span><input type="password" name="contrasena"><br>
			<span>Repita contraseña</span><input type="password" name="repetirContrasena"><br>
			<button type="submit" name="enviar" value="enviar">Cambiar contraseña</button>
		</div>
	</div>
</form>
