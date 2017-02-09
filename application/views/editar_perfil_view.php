<?php
$this -> load -> helper('form');
?>
<div id="grande"  ng-controller="UserController">
	<h1>Editar Perfil</h1>
		<div id="padre">
			
				<div class="bloque">

<form name="userForm" ng-submit="submit($event)"  action="./Editar_perfil_controller" method="post" enctype="multipart/form-data" novalidate>
					Nombre: <input name="nombre"  type="text" ng-model="nombre"  ng-init = "nombre='<?php if ($nombre==NULL){ echo " Campo Vacio "; } else {echo $nombre;} ?>'" required />
					<span class="messages" ng-show="userForm.$submitted || userForm.nombre.$touched">
						<span ng-show="userForm.nombre.$error.required">El campo es obligatorio.</span>
					</span></br>
					
					Apellido: <input type="text" name="apellido"  ng-model="apellido" ng-init = "apellido='<?php if ($apellidos==NULL){ echo " Campo Vacio "; } else {echo $apellidos;} ?>'" required>
					<span class="messages" ng-show="userForm.$submitted || userForm.apellido.$touched">
						<span ng-show="userForm.apellido.$error.required">El campo es obligatorio.</span>
					</span></br>
					
					Telefono: <input type="text" name="telefono"  ng-model="telefono" ng-init = "telefono='<?php if ($telefono1==NULL){ echo " Campo Vacio "; } else {echo $telefono1;} ?>'" min="9" max="13" required>
					<span class="messages" ng-show="userForm.$submitted || userForm.telefono.$touched">
						<span ng-show="userForm.telefono.$error.required">El campo es obligatorio.</span>
						<span ng-show="userForm.telefono.$error.max">el telefono no puede ser inferior de 9.</span>
						<span ng-show="userForm.telefono.$error.max">el telefono no puede exceder de 13.</span>
					</span></br>
					
					DNI: <input type="text" name="dni" ng-model="DNI" ng-init = "DNI='<?php if ($dni==NULL){ echo " Campo Vacio "; } else {echo $dni;} ?>'" required>
					<span class="messages" ng-show="userForm.$submitted || userForm.DNI.$touched">
						<span ng-show="userForm.dni.$error.required">El campo es obligatorio.</span>
					</span></br>
					
					Fecha Nacimiento: <input type="text" name="fecha_nacimiento" ng-model="fecha_nacimiento" ng-init = "fecha_nacimiento='<?php if ($fecha_nacimiento==NULL){ echo " Campo Vacio  "; } else {echo $fecha_nacimiento;} ?>'" required>
					<span class="messages" ng-show="userForm.$submitted || userForm.fecha.$touched">
						<span ng-show="userForm.fecha.$error.required">El campo es obligatorio.</span>
					</span></br>
					
					Codigo Postal: <input type="text" name="codigo_postal" ng-model="codigo_postal" ng-init = "codigo_postal='<?php if ($codigo_postal==NULL){ echo " Campo Vacio  "; } else {echo $codigo_postal;} ?>'" required>
					<span class="messages" ng-show="userForm.$submitted || userForm.codigopostal.$touched">
						<span ng-show="userForm.codigopostal.$error.required">El campo es obligatorio.</span>
					</span></br>
					
					Descripcion: <textarea name="resumen" ng-model="resumen" ng-init = "resumen='<?php if ($resumen==NULL){ echo " Campo Vacio  "; } else {echo $resumen;} ?>'"  ng-maxlength="1000" required></textarea>
					<span class="messages" ng-show="userForm.$submitted || userForm.descripcion.$touched">
						<span ng-show="userForm.descripcion.$error.required">El campo es obligatorio.</span>
						<span ng-show="userForm.descripcion.$error.maxlength">La descripcion no puede exceder de 1000 caracteres.</span>
					</span></br>
															
					<div class="bloque">
						Curso: <select name="curso" >
							 <option value="0">elija curso</option>
							<?php
							foreach ($alumnos_cursos as $alumno_curso) {?>
								<option <?php if($curso_alumno==$alumno_curso['id_curso'])echo "selected"; ?> value=" <?php echo $alumno_curso['id_curso']; ?>"> <?php echo $alumno_curso['nombre']; ?> </option>a;
							<?php  }
							?>
							
						</select></br>	
				Año Inicio: <input type="text" name="fecha_inicio" ng-model="fecha_inicio" ng-init = "fecha_inicio='<?php if ($cursos['fecha_inicio']==NULL){ echo " Campo Vacio  "; } else {echo $cursos['fecha_inicio'];} ?>'"/>
					<span class="messages" ng-show="userForm.$submitted || userForm.ano_inicio.$touched">
					<span ng-show="userForm.ano_inicio.$error.required">El campo es obligatorio.</span>
					<span ng-show="userForm.ano_inicio.$error.min">el año de inicio no puede ser inferior de 1960.</span>
				</span>
				
				Año Fin: <input type="text" name="fecha_final" ng-model="fecha_final" ng-init = "fecha_final='<?php if ($cursos['fecha_final']==NULL){ echo " Campo Vacio  "; } else {echo $cursos['fecha_final'];} ?>'" >
				<span class="messages" ng-show="userForm.$submitted || userForm.ano_fin.$touched">
					<span ng-show="userForm.ano_fin.$error.required">El campo es obligatorio.</span>
					<span ng-show="userForm.ano_fin.$error.min">el año de finalizacion no puede ser inferior de 1980.</span>
				</span>
				
				Experiencia: <textarea name="experiencia" ng-model="experiencia" ng-init = "experiencia='<?php if ($experiencia==NULL){ echo " Campo Vacio  "; } else {echo $experiencia;} ?>'" ng-maxlength="1000" ></textarea>
				<span class="messages" ng-show="userForm.$submitted || userForm.experiencia.$touched">
					<span ng-show="userForm.experiencia.$error.required">El campo es obligatorio.</span>
					<span ng-show="userForm.ano_inicio.$error.maxlength">el año de inicio no puede ser inferior de 1960.</span>
				</span>
				
				Foto: <input type="file" id="botonfoto" name="logo" accept="image/*" value="/BolsaTrabajo/img/imgr/<?php echo $id_login ?>.jpg" onerror="this.src='./img/pordefecto.jpg'"/>
							<div id="imgalumno">
								<div>
								<img src="/BolsaTrabajo/img/<?php echo $id_login ?>.jpg"; width="80" height="80"  onerror="this.src='./img/pordefecto.jpg'";>							   
								</div>
							</div>
				</div>
		</div>
</div>
<div id="botones">
		<input type="submit"  class="button"   value="Enviar" name="Enviar"/>
		<input type="button" class="button" name="Cancelar" value="Cancelar" onclick="window.location='Resumen_alumno_controller'" />
		<p><?php if(isset($mensaje)) echo $mensaje; ?></p>
		<?php echo validation_errors(); ?><!--mostrar los errores de validación-->
</div>
<mi-login></mi-login>
</form>
