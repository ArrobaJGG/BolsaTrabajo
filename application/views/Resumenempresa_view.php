<?php 
$this->load->helper('form');
 ?>

	
	
<div ng-controller="nuevaoferta">
	<div id="cuadro" >
		<h1>Ofertas: </h1>
		<?php if($ofertas){ ?>
		<div id="oferta">
			
			<h3><?php echo $ofertas[0]['titulo']; ?></h3>
			<p><?php  echo $ofertas[0]['resumen']; ?></p>
			<input type="button" value="Editar Oferta" onclick="window.location='./Editar_oferta_controller/index/<?php echo $ofertas[0]['id_oferta']; ?>'" />
			
		</div>
		<?php } else{ ?>
			<h3>NO hay ofertas</h3>
			
		<?php }?>
		
		
	</div>
	<input type="button" value="Ver Mas" ng-click="vermas()">
</div>
	
	
	