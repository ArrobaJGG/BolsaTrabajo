<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('EditarPerfil_controller');
	?>

Nombre: <input type="text" name="nombre" value="" placeholder="nombre"></br>
Apellido: <input type="text" name="apellido" value="" placeholder="apellido"></br>
Telefono: <input type="text" name="telefono" value="" placeholder="telefono"></br>
DNI: <input type="text" name="" value="" placeholder="dni"></br>
Fecha Nacimiento: <input type="date" name="" value="" placeholder="fecha nacimiento"></br>
Codigo Postal: <input type="text" name="" value="" placeholder="38587"></br>
Descripcion: <textarea name="Descripcion" placeholder="introduce aqui..."></textarea></br>
Familia: <select name="familia">
             	<option value=informatica>Informatica</option>
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
Año Inicio: <input type="number" name="ano_inicio" value="" min="1960" max="2016"></br>
Año Fin: <input type="number" name="ano_fin" value="" min="1980" max="2017"></br>
Expiriencia: <textarea name="Expiriencia" placeholder="experiencia..."></textarea></br>
Foto: <input type="file" name="" value=""></br>
<input type="submit" value="Enviar"/>
</form>	
