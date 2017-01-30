<?php
$this -> load -> helper('form');
?>
<div ng-controller="UserController">
	<form name="userForm" ng-submit="submit($event)"  action="./Editar_perfil_controller" method="post" enctype="multipart/form-data" novalidate>
		Nombre: <input name="nombre"  type="text" ng-model="nombre"  ng-init = "nombre='<?php if ($nombre==NULL){ echo " campo vacio "; } else {echo $nombre;} ?>'" required />
		<span class="messages" ng-show="userForm.$submitted || userForm.nombre.$touched">
			<span ng-show="userForm.nombre.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Apellido: <input type="text" name="apellido"  ng-model="apellido" ng-init = "apellido='<?php if ($apellidos==NULL){ echo " campo vacio "; } else {echo $apellidos;} ?>'" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.apellido.$touched">
			<span ng-show="userForm.apellido.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Telefono: <input type="text" name="telefono"  ng-model="telefono" ng-init = "telefono='<?php if ($telefono1==NULL){ echo " campo vacio "; } else {echo $telefono1;} ?>'" min="9" max="13" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.telefono.$touched">
			<span ng-show="userForm.telefono.$error.required">El campo es obligatorio.</span>
			<span ng-show="userForm.telefono.$error.max">el telefono no puede ser inferior de 9.</span>
			<span ng-show="userForm.telefono.$error.max">el telefono no puede exceder de 13.</span>
		</span></br>
		
		DNI: <input type="text" name="dni" ng-model="DNI" ng-init = "DNI='<?php if ($dni==NULL){ echo " campo vacio "; } else {echo $dni;} ?>'" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.DNI.$touched">
			<span ng-show="userForm.dni.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Fecha Nacimiento: <input type="text" name="fecha_nacimiento" ng-model="fecha_nacimiento" ng-init = "fecha_nacimiento='<?php if ($fecha_nacimiento==NULL){ echo " campo vacio "; } else {echo $fecha_nacimiento;} ?>'" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.fecha.$touched">
			<span ng-show="userForm.fecha.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Codigo Postal: <input type="text" name="codigo_postal" ng-model="codigo_postal" ng-init = "codigo_postal='<?php if ($codigo_postal==NULL){ echo " campo vacio "; } else {echo $codigo_postal;} ?>'" required>
		<span class="messages" ng-show="userForm.$submitted || userForm.codigopostal.$touched">
			<span ng-show="userForm.codigopostal.$error.required">El campo es obligatorio.</span>
		</span></br>
		
		Descripcion: <textarea name="resumen" ng-model="resumen" ng-init = "resumen='<?php if ($resumen==NULL){ echo " campo vacio "; } else {echo $resumen;} ?>'"  ng-maxlength="1000" required></textarea>
		<span class="messages" ng-show="userForm.$submitted || userForm.descripcion.$touched">
			<span ng-show="userForm.descripcion.$error.required">El campo es obligatorio.</span>
			<span ng-show="userForm.descripcion.$error.maxlength">La descripcion no puede exceder de 1000 caracteres.</span>
		</span></br>
		<p>Familia:
			<select name="familia">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
				}
				?>
			</select>
		</p>
		
		<p>Idiomas: 
			<select name="idioma">
				<?php
				foreach ($idiomas as $idioma) {
					echo '<option value="' . $idioma['id_idioma'] . '">' . $idioma['nombre'] . '</option>';
				}
				?>
			</select>
		</p>
		<p>Nivel: 
			<select name="nivelleido">
				<?php
				foreach ($niveles as $nivelleido) {
					echo '<option value="' . $nivelleido['id_nivel'] . '">' . $nivelleido['titulacion'] . ' ' . $nivelleido['equivalencia'] . ' ' . $nivelleido['tipo'] . '</option>';
				}
				?>
			</select>
			<select name="nivelescrito">
				<?php
				foreach ($nivelesescritos as $nivelescrito) {
					echo '<option value="' . $nivelescrito['id_nivel'] . '">' . $nivelescrito['titulacion'] . ' ' . $nivelescrito['equivalencia'] . ' ' . $nivelescrito['tipo'] . '</option>';
				}
				?>
			</select>
		
			<select name="nivelhablado">
				<?php
				foreach ($niveleshablados as $nivelhablado) {
					echo '<option value="' . $nivelhablado['id_nivel'] . '">' . $nivelhablado['titulacion'] . ' ' . $nivelhablado['equivalencia'] . ' ' . $nivelhablado['tipo'] . '</option>';
				}
				?>
			</select>
			<input type="checkbox" name="titulado" value="titulado"> titulado
			</p>
		<p>Curso: 
			<select name="curso">
				<?php
				foreach ($alumnos_cursos as $alumno_curso) {
					echo '<option value="' . $alumno_curso['id_curso'] . '">'. ' ' . $alumno_curso['nombre'] . '</option>';
				}
				?>
				
			</select>
			
		</p>
	</br>
	Año Inicio: <input type="text" name="fecha_inicio" ng-model="fecha_inicio" ng-init = "fecha_inicio='<?php if ($cursos['fecha_inicio']==NULL){ echo " campo vacio "; } else {echo $cursos['fecha_inicio'];} ?>'"/>
		<span class="messages" ng-show="userForm.$submitted || userForm.ano_inicio.$touched">
		<span ng-show="userForm.ano_inicio.$error.required">El campo es obligatorio.</span>
		<span ng-show="userForm.ano_inicio.$error.min">el año de inicio no puede ser inferior de 1960.</span>
	</span></br>
	
	Año Fin: <input type="text" name="fecha_final" ng-model="fecha_final" ng-init = "fecha_final='<?php if ($cursos['fecha_final']==NULL){ echo " campo vacio "; } else {echo $cursos['fecha_final'];} ?>'" >
	<span class="messages" ng-show="userForm.$submitted || userForm.ano_fin.$touched">
		<span ng-show="userForm.ano_fin.$error.required">El campo es obligatorio.</span>
		<span ng-show="userForm.ano_fin.$error.min">el año de finalizacion no puede ser inferior de 1980.</span>
	</span></br>
	
	Experiencia: <textarea name="experiencia" ng-model="experiencia" ng-init = "experiencia='<?php if ($experiencia==NULL){ echo " campo vacio "; } else {echo $experiencia;} ?>'" ng-maxlength="1000" ></textarea>
	<span class="messages" ng-show="userForm.$submitted || userForm.experiencia.$touched">
		<span ng-show="userForm.experiencia.$error.required">El campo es obligatorio.</span>
		<span ng-show="userForm.ano_inicio.$error.maxlength">el año de inicio no puede ser inferior de 1960.</span>
	</span></br>
	
	Foto: <input type="file" name="logo" accept="image/*" value="http://localhost/BolsaTrabajo/img/<?php echo $id_login ?>.jpg" onerror="this.src='./img/pordefecto.jpg'"/></td>
				<td><div id="imgalumno">
					<img src="http://localhost/BolsaTrabajo/img/imgr/<?php echo $id_login ?>.jpg"; width="35" height="35" onerror="this.src='./img/pordefecto.jpg'";>
				   
				</div></td></br>
<input type="submit" value="Enviar" name="Enviar"/>
	<p><?php if(isset($mensaje)) echo $mensaje; ?></p>
	<?php echo validation_errors(); ?><!--mostrar los errores de validación-->
</form>	
</div>