<?php 
$this->load->helper('form');
 ?>
 
<form action="./Editar_oferta_controller" method="post" novalidate enctype="multipart/form-data">


Titulo: <input type="text" name="titulo" value="" placeholder="Titulo" required></br>
Nombre de empresa: <input type="text" name="nombre" value="" placeholder="nombre"></br>
Fecha Expiracion: <input type="date" name="fechae" value=""></br>
Lugar: <input type="text" name="lugar" value="" placeholder="Ciudad"></br>
Telefono a contactar:<input type="number" name="telefono" value=""/></br>
Requisito: <input type="text" name="requisito" value="" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="sueldo" value="" placeholder=""></br>
Funciones: <input type="text" name="funciones" value="" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="ofrece" value="" placeholder="Complementos..."></br>
Resumen: <input type="text" name="resumen" required></br>

Familia: <select name="id_familia" onfocus="saber()">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
					
				}
				?>
			</select>
			
<input type="button"onclick="showHide()" value="Añadir"></br>
Correo: <input type="email" name="correo" value=""/></br>
Horario: <input type="text" name="horario"  value=""/></br>
Oculto: <input type="checkbox"  name="oculto" value=""/><br/>


<input type="submit"name="Actualizar" value="Actualizar"/>
<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	