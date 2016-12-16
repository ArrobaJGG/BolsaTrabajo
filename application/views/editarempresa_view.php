<?php 
$this->load->helper('form');
 ?>

	
	<?php 
	echo form_open('Editarempresa_controller');
	?>
		<table title="registro">
			<tr>
				<td>Nombre: </td>
				<td><input type="text" name="Nombre" /></td>
			</tr>
			<tr>
				<td>Cif:</td>
				<td><input type="text" name="Cif" /></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type="number" name="Telefono" /></td>
			</tr>
			<tr>
				<td>telefono2:</td>
				<td><input type="number" name="Telefono2" /></td>
			</tr>
			<tr>
				<td>Nombre contacto:</td>
				<td><input type="text" name="Contacto" /></td>
			</tr>
			<tr>
				<td>Logo:</td>
				<td><input type="file" name="Archivo" value="" /></td>
			</tr>

			
			
		</table>
		<input type="submit" name="Actualizar" value="Actulizar" />
		<button type="reset" name="Cancelar" value="Cancelar"/>Cancelar</button>
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
