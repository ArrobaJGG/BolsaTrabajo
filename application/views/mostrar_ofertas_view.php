<?php 
$this->load->helper('form');
 ?>
 <div id="titulo">
 	<h1>Oferta De Trabajo</h1>
 </div>
 
<div id="oferta">
	
	<h1><?php if ($titulo==null){echo "Oferta Expiro";}else{echo $titulo;} ?></h1></br>
	
	<h2>Oferta:</h2>
	<p><?php if ($resumen==null){echo "";}else{echo $resumen;} ?></p>
	
	<h2>Requisitos: </h2></br>
	<p><?php if ($requisitos==null){echo "";}else{echo $requisitos;}  ?></p></br>
	<?php //TODO cambiar el nombre porque aparece el id ?>
	<p><b class="curve">Familia Laboral:</b> <?php echo $nombre_familia ?></p>
	
	<h2>Contacto: </h2>
	<p><b class="curve">Empresa: </b><?php if ($nombre_empresa==null){echo "";}else{echo $nombre_empresa;} ?> </p>
	<p><b class="curve">Telefono:</b> <?php if ($telefono==null){echo "";}else{echo $telefono;}  ?></p>
	<p><b class="curve">Email: </b><?php if ($correo==null){echo "";}else{echo $correo;}   ?></p>
	
	<h2>Otros: </h2>
	<p><b class="curve">Horario: </b><?php if ($horario==null){echo "";}else{echo $horario;}   ?></p>
	<p><b class="curve">Salario:</b> <?php if ($sueldo==null){echo "";}else{echo $sueldo;}   ?></p>
	<p><b class="curve">Lugar: </b><?php if ($lugar==null){echo "";}else{echo $lugar;} ?></p>
	<p><b class="curve">Fecha Expiracion:</b> <?php  if ($fecha_expiracion=="0000-00-00"){echo "Sin fecha final";}else{ echo $fecha_expiracion;} ?></p>
	<p><b class="curve">Duracion del contrato: </b><?php if ($duracion==null){echo "";}else{echo $duracion;}   ?></p>
	<div id="boton" id="boton">
		<input type="button"  class="button" value="Volver" onclick="window.location='../../<?php echo $volver; ?>'">
		<?php if ($esmia>0) {?>
			<input type="button" class="button" value="Editar Oferta" onclick="window.location='../../Editar_oferta_controller/index/<?php echo $id_oferta?>'"/>
			<input type="button" class="button" value="Borrar Oferta"  onclick="window.location='../../Resumen_empresa_controller/borraroferta/<?php echo $id_oferta?>'">
			<input type="button" class="button" value="Ver Apuntados"  onclick="window.location.assign('/BolsaTrabajo/ofertas_controller/apuntados/<?php echo $id_oferta?>')">
		<?php }
        if($botonAgregarse) {?>
            <input type="button" class="button" value="Apuntarse"  onclick="window.location.assign('/BolsaTrabajo/resumen_alumno_controller/agregar_oferta/<?php echo $id_oferta?>')">
            <?php } ?>
		
	</div>
</div>