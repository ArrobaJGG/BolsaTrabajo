<?php 
$this->load->helper('form');
 ?>

	
	  <div ng-controller="UserController">
   		 <form name="userForm" ng-submit="submit($event)" action="./Login_controller" method="post" novalidate>
    		<div id="bloque">
    			
	    			<h1>Inicia Sesion</h1>
	    		<div id="contenedor">
	    			<div id="contenido">
	    				<div class="hijo">
			  				<label for="email"><b>Email:</b></label>
				     		    <input name="email" type="email" ng-model="user.email"  required />
					      			<span class="messages" ng-show="userForm.$submitted || userForm.email.$touched">
						        	<span ng-show="userForm.email.$error.required">El campo es obligatorio.</span>
							      	<span ng-show="userForm.email.$error.email">Formato de email incorrecto.</span>
							      	</span></br>
						
							<label for="password:"><b>Contraseña:</b></label>
								<input type="password" name="contrasena"  ng-model="user.contrasena"  ng-minlength="3" ng-maxlength="45" required/>
			      					<span class="messages" ng-show="userForm.$submitted || userForm.contrasena.$touched">
			      						<span ng-show="userForm.contrasena.$error.required">El campo es obligatorio.</span>
			      						<span ng-show="userForm.contrasena.$error.minlength">La contraseña no puede ser menor de 03.</span>
			        					<span ng-show="userForm.contrasena.$error.maxlength">La contraseña no puede exceder de 45.</span></td>
			        				</span>
		        		</div>
						 
					
					
					<div class="hijo">
						<div id="reg" class="nueva">
				        		<h2>¿Eres una Empresa?</h2>
				        		<h3>Registrarse</h3>				
							</div>
						</div>
					</div>
				</div>
				
				<p><?php if(isset($mensaje)) echo $mensaje ?></p>
		        <?php echo validation_errors(); ?><!--mostrar los errores de validación-->
				<div id="botones">
					<input class="button" type="submit" name="Enviar" value="Entrar" />
				</div>
		</div>
	</form>
	</div>

