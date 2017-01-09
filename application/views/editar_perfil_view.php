<?php 
$this->load->helper('form');
 ?>
 <?php
 $mysqli = new mysqli('localhost', 'bolsa', 'trabajo', 'bolsa_trabajo');
 ?>
  <div ng-controller="UserController">
  	 <form name="userForm" ng-submit="submit($event)" action="./Editar_perfil_controller" method="post" novalidate>
		Nombre: <input name="nombre" type="text" ng-model="user.nombre"  required />
		<span class="messages" ng-show="userForm.$submitted || userForm.nombre.$touched">
		<span ng-show="userForm.nombre.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Apellido: <input type="text" name="apellido" ng-model="user.apellido" placeholder="apellido" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.apellido.$touched">
		<span ng-show="userForm.apellido.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Telefono: <input type="text" name="telefono" ng-model="user.telefono" placeholder="telefono"  min="9" max="13" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.telefono.$touched">
        <span ng-show="userForm.telefono.$error.required">El campo es obligatorio.</span>
        <span ng-show="userForm.telefono.$error.max">el telefono no puede ser inferior de 9.</span>
        <span ng-show="userForm.telefono.$error.max">el telefono no puede exceder de 13.</span>
  		</span></br>
		
		DNI: <input type="text" name="DNI" ng-model="user.dni" placeholder="dni" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.dni.$touched">
        <span ng-show="userForm.dni.$error.required">El campo es obligatorio.</span>
        </span></br>
		
		Fecha Nacimiento: <input type="date" name="fecha" ng-model="user.fecha" placeholder="fecha nacimiento" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.fecha.$touched">
        <span ng-show="userForm.fecha.$error.required">El campo es obligatorio.</span>
        </span></br>
		
		Codigo Postal: <input type="text" name="codigopostal" ng-model="user.codigopostal" placeholder="38587" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.codigopostal.$touched">
        <span ng-show="userForm.codigopostal.$error.required">El campo es obligatorio.</span>
        </span></br>
		
		Descripcion: <textarea name="descripcion" ng-model="user.descripcion" ng-maxlength="1000" placeholder="introduce aqui..."  ng-maxlength="1000" required></textarea>
		<span class="messages" ng-show="userForm.$submitted || userForm.descripcion.$touched">
		<span ng-show="userForm.descripcion.$error.required">El campo es obligatorio.</span>
		<span ng-show="userForm.descripcion.$error.maxlength">La descripcion no puede exceder de 1000 caracteres.</span>
		</span></br>
		<p>Familia:
		 <select>
        <?php
		$query = $mysqli -> query ("SELECT * FROM familia_laboral");
		while ($valores = mysqli_fetch_array($query)) {
		echo '<option value="'.$valores[id_familia_laboral].'">'.$valores[nombre].'</option>';
		}
		?>
		</select>
		</p>
	
		<p>Idiomas: 
			<select>
			<?php
			$query = $mysqli -> query ("SELECT * FROM idioma");
			while ($valores = mysqli_fetch_array($query)) {
			echo '<option value="'.$valores[id_idioma].'">'.$valores[nombre].'</option>';
			}
			?>
			</select>
		</p>
		Nivel: <select name="nivel">
				<option value="Alto">Alto</option>
				<option value="Medio">Medio</option>
				<option value="Bajo">Bajo</option>
				</select></br>
		Curso: <select name="Curso">
				<option value="Desarrollo_web">Desarrollo Web</option>
				<option value="Finanzas">Finanzas</option>
				<option value="Quimica">Quimica</option>
				<option value="Electronica">Electronica</option>
				</select></br>
		
		Año Inicio: <input type="number" name="ano_inicio" ng-model="ano_incio"  min="1960" >
		<span class="messages" ng-show="userForm.$submitted || userForm.ano_inicio.$touched">
        <span ng-show="userForm.ano_inicio.$error.required">El campo es obligatorio.</span>
        <span ng-show="userForm.ano_inicio.$error.min">el año de inicio no puede ser inferior de 1960.</span>
        </span></br>
   
		Año Fin: <input type="number" name="ano_fin" ng-model="ano_fin" min="1980" >
		<span class="messages" ng-show="userForm.$submitted || userForm.ano_fin.$touched">
        <span ng-show="userForm.ano_fin.$error.required">El campo es obligatorio.</span>
        <span ng-show="userForm.ano_fin.$error.min">el año de finalizacion no puede ser inferior de 1980.</span>
        </span></br>
		
		Experiencia: <textarea name="experiencia" ng-model="experiencia" ng-maxlength="1000" placeholder="experiencia..."></textarea>
		<span class="messages" ng-show="userForm.$submitted || userForm.experiencia.$touched">
        <span ng-show="userForm.experiencia.$error.required">El campo es obligatorio.</span>
        <span ng-show="userForm.ano_inicio.$error.maxlength">el año de inicio no puede ser inferior de 1960.</span>
  		</span></br>
		
		Foto: <input type="file" name="foto" ng-model="foto" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.foto.$touched">
        <span ng-show="userForm.foto.$error.required">El campo es obligatorio.</span>
        </span></br>
		
		<p><?php if(isset($mensaje)) echo $mensaje ?></p>
        <?php echo validation_errors(); ?><!--mostrar los errores de validación-->
		<input type="submit" value="Enviar"/>
		</form>	
