<?php 
$this->load->helper('form');
 ?>

	
	  <div ng-controller="UserController">
   		 <form name="userForm" novalidate>
    	
  				<label for="email">Email</label>
     		    <input name="email" type="email" ng-model="user.email" ng-model-options="{ updateOn: 'blur' }" required />
      			<span class="messages" ng-show="userForm.$submitted || userForm.email.$touched">
        		<span ng-show="userForm.email.$error.required">El campo es obligatorio.</span>
       		    <span ng-show="userForm.email.$error.email">Formato de email incorrecto.</span>
      			</span>
		     
			</br>
			<tr>
				<label for="pasword:">Contraseña:</label>
				<input type="password" name="contrasena"  ng-model="user.contrasena" ng-model-options="{ updateOn: 'blur' }" required/>
      			<span class="messages" ng-show="userForm.$submitted || userForm.contrasena.$touched">
      			<span ng-show="userForm.contrasena.$error.required">El campo es obligatorio.</span>
        		<span ng-show="userForm.contrasena.$error.contrasena">Formato de contraseña incorrecto.</span></td>
			</tr>
			
			 
		</table>
		<p><?php if(isset($mensaje)) echo $mensaje ?></p>
        <?php echo validation_errors(); ?><!--mostrar los errores de validación-->
		<input type="submit" name="Enviar" ng-click="submit()" value="Enviar" />
	</form>
	
	</div>

