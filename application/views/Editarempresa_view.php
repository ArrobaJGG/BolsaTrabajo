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
				<td><input type="number" name="telefono" /></td>
			</tr>
			<tr>
				<td>telefono2:</td>
				<td><input type="number" name="telefono2" /></td>
			</tr>
			<tr>
				<td>Nombre contacto:</td>
				<td><input type="text" name="ncontacto" /></td>
			</tr>
			<tr>
				<td>Logo:</td>
				<td><input type="file" name="" value="" /></td>
			</tr>

			
			
		</table>
		<input type="submit" name="Enviar" value="Enviar" />
		<button type="reset" name="Cancelar" value="Cancelar"/>Cancelar</button>
		<!--<button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>-->
	</form>
