<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('Insertar_oferta_controller');
	?>


Titulo: <input type="text" name="titulo" value="" placeholder="Titulo" required></br>

Fecha Expiracion: <input type="date" name="fechae" value=""></br>
Lugar: <input type="text" name="lugar" value="" placeholder="Ciudad"></br>
Telefono:<input type="number" name="telefono" value=""/>
Requisito: <input type="text" name="requisito" value="" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="sueldo" value="" placeholder=""></br>
Funciones: <input type="text" name="funciones" value="" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="ofrece" value="" placeholder="Complementos..."></br>
Resumen: <textarea name="Resumen" required></textarea></br>

Familia: <select name="familia" onfocus="saber()">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
					
				}
				?>
			</select>
			
			<button onclick="showHide()" >Añadir</button></br>

<div id="etiquetas" style="display:none">
	
		Etiquetas:<select name="etiqueta" multiple="">
						<?php
						foreach ($etiquetas as $etiqueta) {
							echo '<option value="' . $etiqueta['nombre'] . '">' . $etiqueta['nombre'] . '</option>';
						}
						?>
				</select></br>
</div>


<input type="submit" value="Publicar"/>
<input type="button" onclick="hola()"value="clica" />
	
</body>
</html>