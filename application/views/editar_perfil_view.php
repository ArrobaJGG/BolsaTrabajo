<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('EditarPerfil_controller');
	?>
  <div ng-controller="UserController">
  	 <form name="userForm" ng-submit="submit($event)" action="./Editarperfil_controller" method="post" novalidate>
		Nombre: <input name="name" type="text" ng-model="user.name"  required />
		<span class="messages" ng-show="userForm.$submitted || userForm.name.$touched">
		<span ng-show="userForm.name.$error.required">El campo es obligatorio.</span>
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
		
		DNI: <input type="text" name="DNI" ng-model="user.apellido" placeholder="dni" required>
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
		
		Familia: <select name="familia">
             	<option value="informatica">Informatica</option>
	            <option value="quimica">Quimica</option>
	            <option value="administracion">Administracion</option>
	            <option value="electronica">Electronica</option>
        		</select></br>
		Idiomas: <select name="Idiomas">
				<option value="Castellano">Castellano</option>
				<option value="Euskera">Euskera</option>
				<option value="Ingles">Ingles</option>
				<option value="Frances">Frances</option>
				<option value="Aleman">Aleman</option>
				</select></br>
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
        <span ng-show="userForm.ano_inicio.$error.max">el año de inicio no puede ser inferior de 1960.</span>
        </span></br>
   
		Año Fin: <input type="number" name="ano_fin" ng-model="ano_fin" min="1980" >
		<span class="messages" ng-show="userForm.$submitted || userForm.ano_fin.$touched">
        <span ng-show="userForm.ano_fin.$error.required">El campo es obligatorio.</span>
        <span ng-show="userForm.ano_fin.$error.max">el año de finalizacion no puede ser inferior de 1980.</span>
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
		
		<input type="submit" value="Enviar"/>
		</form>	
