<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('Insertaroferta_controller');
	?>


Titulo: <input type="text" name="" value="" placeholder="Titulo"></br>
Familia: <select name="familia">
             	<option value="informatica">Informatica</option>
	            <option value="quimica">Quimica</option>
	            <option value="administracion">Administracion</option>
	            <option value="electronica">Electronica</option>
        </select></br>
Fecha Expiracion: <input type="date" name="" value=""></br>
Lugar: <input type="text" name="" value="" placeholder="Ciudad"></br>
Requisito: <input type="text" name="" value="" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="" value="" placeholder=""></br>
Funciones: <input type="text" name="" value="" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="" value="" placeholder="Complementos..."></br>
Descripcion: <textarea name="Descripcion"></textarea></br>
Etiquetas: <select name="familia">
             	<option value="css">CSS</option>
	            <option value="Java">Java</option>
	            <option value="Pythom">Phytom</option>
	            <option value="Javascript">Javascript</option>
        </select></br>
 <input type="submit" value="Publicar"/>

	
</body>
</html>