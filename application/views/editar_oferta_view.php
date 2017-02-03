<?php 
$this->load->helper('form');
 ?>
 
<form action="<?php echo base_url("../../Editar_oferta_controller/actualiza/$id_oferta")?>" name"oferta" method="post"  novalidate enctype="multipart/form-data">


Titulo: <input type="text" name="titulo" value="<?php if ($titulo==null){echo "";}else{echo $titulo;} ?>" placeholder="Titulo" required></br>
Nombre de empresa: <input type="text" name="nombre" value="<?php if ($nombre_empresa==null){echo "";}else{echo $nombre_empresa;} ?>" placeholder="nombre"></br>
Fecha Expiracion: <input type="date" name="fechae" value="<?php  if ($fecha_expiracion==null){echo "";}else{ echo $fecha_expiracion;} ?>"></br>
Lugar: <input type="text" name="lugar" value="<?php if ($lugar==null){echo "";}else{echo $lugar;} ?>" placeholder="Ciudad"></br>
Telefono a contactar:<input type="number" name="telefono" value="<?php if ($telefono==null){echo "";}else{echo $telefono;}  ?>" placeholder="Telefono De Contacto "/></br>
Requisito: <input type="text" name="requisito" value="<?php if ($requisitos==null){echo "";}else{echo $requisitos;}  ?>" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="sueldo" value="<?php if ($sueldo==null){echo "";}else{echo $sueldo;}   ?>" placeholder="Sueldo"></br>
Funciones: <input type="text" name="funciones" value="<?php if ($funciones==null){echo "";}else{echo $funciones;}  ?>" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="ofrece" value="<?php if ($ofrece==null){echo "";}else{echo $ofrece;}  ?>" placeholder="Complementos..."></br>
Resumen: <input type="text" name="resumen" value="<?php if ($resumen==null){echo "";}else{echo $resumen;}   ?>" required></br>
Duracion del contrato: <input type="text" name="duracion" value="<?php if ($duracion==null){echo "";}else{echo $duracion;}   ?>" placeholder="Duracion" /></br>
Familia: <select name="id_familia"> <!--onfocus="saber()">-->
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
					
				}
				?>
			</select>
			
<!--<input type="button"onclick="showHide()" value="Añadir"></br>-->
Correo: <input type="email" name="correo" value="<?php if ($correo==null){echo "";}else{echo $correo;}   ?>" placeholder="Correo"/></br>
Horario: <input type="text" name="horario"  value="<?php if ($horario==null){echo "";}else{echo $horario;}   ?>" placeholder="Horario"/></br>
Oculto: <input type="checkbox"  name="oculto" value=""/><br/>


<input type="submit" name="Actualizar" value="Actualizar" />
<input type="button" name="Cancelar" value="Cancelar" onclick="window.location='../../Resumen_empresa_controller'" />
<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	