<?php 
$this->load->helper('form');
 ?>
 
<form action="<?php echo base_url("../../Editar_oferta_controller/actualiza/$id_oferta")?>" name"oferta" method="post"  novalidate enctype="multipart/form-data">
	<div id="padre">
		<h1>Editar Una Oferta</h1>
			<div id="bloque">
						<b>Titulo: </b><input type="text" name="titulo" value="<?php if ($titulo==null){echo "";}else{echo $titulo;} ?>" placeholder="Titulo" required></br>
						<b>Nombre de empresa: </b><input type="text" name="nombre" value="<?php if ($nombre_empresa==null){echo "";}else{echo $nombre_empresa;} ?>" placeholder="nombre"></br>
						<b>Fecha Expiracion: </b><input type="date" name="fechae" value="<?php  if ($fecha_expiracion==null){echo "";}else{ echo $fecha_expiracion;} ?>"></br>
						<b>Lugar: </b><input type="text" name="lugar" value="<?php if ($lugar==null){echo "";}else{echo $lugar;} ?>" placeholder="Ciudad"></br>
						<b>Telefono a contactar: </b><input type="number" name="telefono" value="<?php if ($telefono==null){echo "";}else{echo $telefono;}  ?>" placeholder="Telefono De Contacto "/></br>
						<b>Requisito: </b><input type="text" name="requisito" value="<?php if ($requisitos==null){echo "";}else{echo $requisitos;}  ?>" placeholder="Requisitos"></br>
						<b>Sueldo: </b><input type="number" name="sueldo" value="<?php if ($sueldo==null){echo "";}else{echo $sueldo;}   ?>" placeholder="Sueldo"></br>
						<b>Funciones: </b><input type="text" name="funciones" value="<?php if ($funciones==null){echo "";}else{echo $funciones;}  ?>" placeholder="Trabajo a realizar"></br>
						<b>Ofrece: </b><input type="text" name="ofrece" value="<?php if ($ofrece==null){echo "";}else{echo $ofrece;}  ?>" placeholder="Complementos..."></br>
						<b>Resumen: </b><input type="text" name="resumen" value="<?php if ($resumen==null){echo "";}else{echo $resumen;}   ?>" required></br>
						<b>Duracion del contrato: </b><input type="text" name="duracion" value="<?php if ($duracion==null){echo "";}else{echo $duracion;}   ?>" placeholder="Duracion" /></br>
						<b>Familia: </b><select name="id_familia"> <!--onfocus="saber()">-->
										<?php
										foreach ($familias as $familia) {
											echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
											
										}
										?>
						</select></br>
									
						<!--<input type="button"onclick="showHide()" value="Añadir"></br>-->
						<b>Correo: </b><input type="email" name="correo" value="<?php if ($correo==null){echo "";}else{echo $correo;}   ?>" placeholder="Correo"/></br>
						<b>Horario: </b><input type="text" name="horario"  value="<?php if ($horario==null){echo "";}else{echo $horario;}   ?>" placeholder="Horario"/></br>
						<b>Oculto: </b><input type="checkbox"  name="oculto" value=""/><br/>
			
			</div>
			<div id="botones">
				<input type="submit" class="button" name="Actualizar" value="Actualizar" />
				<input type="button" class="button" name="Cancelar" value="Cancelar" onclick="window.location='../../Resumen_empresa_controller'" />
			</div>
	</div>
		<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	