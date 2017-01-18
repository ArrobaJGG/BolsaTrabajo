<?php 
$this->load->helper('form');
 ?>

	
	

	<div id="cuadro">
		<h1>Ofertas: </h1>
		<?php if($ofertas){ ?>
		<div id="oferta">
			<h3><?php echo $ofertas->titulo; ?></h3>
			<p><?php  echo $ofertas->resumen; ?></p>
			
		</div>
		<?php } else{ ?>
			<h3>NO hay ofertas</h3>
			
		<?php }?>
		<input type="button" value="Ver Mas" onclick="vermas()">
		
	</div>
	