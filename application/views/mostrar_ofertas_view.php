<?php 
$this->load->helper('form');
 ?>
 
<div id="oferta">
	<h1><?php if ($titulo==null){echo "Oferta Expiro";}else{echo $titulo;} ?></h1></br>
	
	<h2>Oferta:</h2>
	<p><?php if ($resumen==null){echo "";}else{echo $resumen;} ?></p>
	
	<h2>Requisitos: </h2></br>
	<p><?php if ($requisitos==null){echo "";}else{echo $requisitos;}  ?></p></br>
	<?php //TODO cambiar el nombre porque aparece el id ?>
	<p class="curve">Familia Laboral:</p> <p><?php echo $nombre_familia ?></p>
	
	<h2>Contacto: </h2>
	<p class="curve">Empresa: </p><p><?php if ($nombre_empresa==null){echo "";}else{echo $nombre_empresa;} ?> </p>
	<p>Telefono: <?php if ($telefono==null){echo "";}else{echo $telefono;}  ?></p>
	<p>Email: <?php if ($correo==null){echo "";}else{echo $correo;}   ?></p>
	
	<h2>Otros: </h2>
	<p>Horario: <?php if ($horario==null){echo "";}else{echo $horario;}   ?></p>
	<p>Salario: <?php if ($sueldo==null){echo "";}else{echo $sueldo;}   ?></p>
	<p>Lugar: <?php if ($lugar==null){echo "";}else{echo $lugar;} ?></p>
	<p>Fecha Expiracion: <?php  if ($fecha_expiracion=="0000-00-00"){echo "Sin fecha final";}else{ echo $fecha_expiracion;} ?></p>
	<p>Duracion del contrato: </p>
	<input type="button" value="Volver" onclick="window.location='../../Resumen_empresa_controller'">
</div>