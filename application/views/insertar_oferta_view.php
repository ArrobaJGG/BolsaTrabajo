<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('Insertar_oferta_controller');
	?>


Titulo: <input type="text" name="" value="" placeholder="Titulo"></br>

Fecha Expiracion: <input type="date" name="" value=""></br>
Lugar: <input type="text" name="" value="" placeholder="Ciudad"></br>
Requisito: <input type="text" name="" value="" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="" value="" placeholder=""></br>
Funciones: <input type="text" name="" value="" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="" value="" placeholder="Complementos..."></br>
Descripcion: <textarea name="Descripcion"></textarea></br>
Familia: <select name="familia">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
				}
				?>
			</select></br>
Etiquetas:<select name="etiqueta" multiple="">
				<?php
				foreach ($etiquetas as $etiqueta) {
					echo '<option value="' . $etiqueta['nombre'] . '">' . $etiqueta['nombre'] . '</option>';
				}
				?>
			</select></br>
 <input type="submit" value="Publicar"/>

	
</body>
</html>