<?php 
$this->load->helper('form');
 ?>

	

<form class="salida" action="./Insertar_oferta_controller" name="insertar" method="post" novalidate enctype="multipart/form-data">
<div id="padre">
	<h1>Insertar una Nueva Oferta</h1>
	<div class="grande">
			<div class="bloque">
				
				<b>Titulo:*</b><input type="text" onkeyup="verificar()"  id="titulo" name="titulo" value="" placeholder="Titulo" required></br>
				<b>Resumen:*</b><textarea id="resumen" type="text" onkeyup="verificar()" id="resumen" name="resumen" placeholder="Resumen" required></textarea><br>				
				<b>Nombre de empresa: </b><input id="nombre" type="text" name="nombre" value="" placeholder="Nombre"></br>
				<b>Fecha Expiracion: </b><input id="fechae" type="date" name="fechae" value="" placeholder="Fecha Expiracion"></br>
				<b>Lugar: </b><input id="lugar" type="text" name="lugar" value="" placeholder="Ciudad"></br>
				<b>Telefono a contactar: </b><input id="telefono" type="number" name="telefono" value="" placeholder="Telefono"/></br>
				<b>Requisito: </b><input id="requisito" type="text" name="requisito" value="" placeholder="Requisitos" placeholder="Requisito"></br>
				
								
			</div>
			<div class="bloque">
				<b>Sueldo: </b><input id="sueldo" type="number" name="sueldo" value="" placeholder="Sueldo"></br>
				<b>Funciones: </b><input id="funciones" type="text" name="funciones" value="" placeholder="Trabajo a realizar"></br>
				<b>Ofrece: </b><input id="ofrece" type="text" name="ofrece" value="" placeholder="Complementos..."></br>	
				<b>Duracion del contrato: </b><input id="duracion" type="text" name="duracion" value="" placeholder="Duracion" /></br>
				<b>Familia: </b><select id="familia" name="id_familia" onfocus="saber()">
								<?php
								foreach ($familias as $familia) {
									echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
									
								}
								?>
						</select></br>
				
				<b>Correo: </b><input type="email" id="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="correo" value="" placeholder="Correo"/></br>
				<b>Horario: </b><input id="horario" type="text" name="horario"  value="" placeholder="Horario"/></br>
				<b>Oculto: </b><input type="checkbox"  name="oculto" value=""/><br/>
				<p><b>Los Campos con * son requeridos</b></p>
			</div>
		</div>
			<div id="botones">
				<input type="submit" class="button" name="Publicar" value="Publicar"/>
				<input type="button" class="button" name="Cancelar" value="Cancelar" onclick="window.location='Resumen_empresa_controller'" />
			</div>
			<?php if (isset($mensaje)) echo $mensaje ?>
					<?php echo validation_errors(); ?>
</div>
</form>	



