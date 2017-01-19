<?php 
$this->load->helper('form');
 ?>

	
	

	<div id="cuadro" ng-controller="nuevaoferta">
		<h1>Ofertas: </h1>
		<?php if($ofertas){ ?>
		<div id="oferta">
			<?php var_dump($ofertas)?>
			<h3><?php echo $ofertas[0]['titulo']; ?></h3>
			<p><?php  echo $ofertas[0]['resumen']; ?></p>
			
		</div>
		<?php } else{ ?>
			<h3>NO hay ofertas</h3>
			
		<?php }?>
		<input type="button" value="Ver Mas" ng-click="vermas()">
		
	</div>
	
	