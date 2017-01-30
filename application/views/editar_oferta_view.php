<?php 
$this->load->helper('form');
 ?>
 
<form action="<?php echo base_url("../../Editar_oferta_controller/actualiza/$id_oferta")?>" method="post" novalidate enctype="multipart/form-data">


Titulo: <input type="text" name="titulo" value="<?php if ($titulo==null){echo "";}else{echo $titulo;} ?>" placeholder="Titulo" required></br>
Nombre de empresa: <input type="text" name="nombre" value="<?php if ($nombre_empresa==null){echo "";}else{echo $nombre_empresa;} ?>" placeholder="nombre"></br>
Fecha Expiracion: <input type="date" name="fechae" value="<?php echo $fecha_expiracion; ?>"></br>
Lugar: <input type="text" name="lugar" value="<?php echo $lugar ?>" placeholder="Ciudad"></br>
Telefono a contactar:<input type="number" name="telefono" value="<?php echo $telefono ?>"/></br>
Requisito: <input type="text" name="requisito" value="<?php echo $requisitos ?>" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="sueldo" value="<?php $sueldo ?>" placeholder=""></br>
Funciones: <input type="text" name="funciones" value="<?php echo $funciones ?>" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="ofrece" value="<?php $ofrece ?>" placeholder="Complementos..."></br>
Resumen: <input type="text" name="resumen" value="<?php echo $resumen ?>" required></br>

Familia: <select name="id_familia"> onfocus="saber()">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
					
				}
				?>
			</select>
			
<input type="button"onclick="showHide()" value="Añadir"></br>
Correo: <input type="email" name="correo" value="<?php echo $correo ?>"/></br>
Horario: <input type="text" name="horario"  value="<?php $horario ?>"/></br>
Oculto: <input type="checkbox"  name="oculto" value=""/><br/>


<input type="submit"name="Actualizar" value="Actualizar"/>
<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	