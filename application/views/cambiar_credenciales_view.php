<div ng-controller="cambiarCredencialesCtrl">
    <!--TODO algun dia enviar correo para comprobar y eso<form method="post" action="<?php echo base_url('cambiar_credenciales_controller/cambiar_contrasena'); ?>" name="cambiarUsuario">
        <span>Cambiar nombre usuario(correo)</span>
        <input name="usuario" ng-model="usuario" ng-init="usuario='<?php echo $correo;  ?> '" required type="email"><button ng-disabled="!cambiarUsuario.$valid" type="submit">Cambiar nombre usuario</button>
    </form>-->
    <form method="post" action="<?php echo base_url('cambiar_credenciales_controller/cambiar_contrasena'); ?>" name="cambiarContrasena">
    	<div id="bloque">
    		<div id="contenido">
		        <span>Nueva contraseña</span>
		        <input ng-model="contrasena"required type="password" name="contrasena">
		        <br>
		        <span>Repita nueva contraseña</span>
		        <input ng-model="contrasenaRepetida" required type="password" name="contrasenaRepetida">
		        <button ng-disabled="!validarContrasenas()" type="submit">Cambiar contraseña</button>
	        </div>
        </div>
    </form>
</div>