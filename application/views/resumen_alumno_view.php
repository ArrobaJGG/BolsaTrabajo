<?php 
$this->load->helper('form');
 ?>
<div ng-controller="ofertaempresa">
	<div id="tabla">
		
		<h1>Ofertas</h1>
			<?php  if ($ofertas){?>
				<div id="ofertas">
					<h3><a href='./resumen_alumno_controller<?php echo $ofertas[0]['id_oferta']; ?>'"><?php echo $ofertas[0]['titulo']; ?></a></h3>
				<p><?php  echo $ofertas[0]['resumen']; ?></p>
				
			
			<?php } else{ ?>
				<h3>NO hay ofertas</h3>				
			<?php }?>
			
				</div>
</div>
