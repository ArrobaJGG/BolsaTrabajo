<div>
    <?php foreach($errores as $error){
        echo $error.'<br>';
    } ?>
</div>
<div class ="divNgView">
	<form name="usu" method="post" action=" <?php echo base_url('/instalacion') ?>">		
		<span>Usuario:</span>
		<input required name="usuario" type = "text" />
		<br>
		<span>Contraseña:</span>
		<input required name="contrasena" type = "text" />
		<br>
		<span>Base datos:</span>
		<input required name="base_datos" type = "text" />
		<br>
		<span>Localizacion base datos:</span>
		<input required name="localizacion" type = "text" />
		<br>
		<button ng-disabled="!usu.$valid" name="enviar" value="enviar">Enviar</button>
	</form>
</div>
