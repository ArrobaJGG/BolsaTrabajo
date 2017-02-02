<?php 
$this->load->helper('form');
 ?>

	
	
<div id="grande" ng-controller="nuevaoferta">
	<div id="mediano">
		<div class="cuadro" >
			
			<h1>Ofertas: </h1>
			<?php if($ofertas){ ?>
			<div id="oferta">
				
				<h3> <a href='./Mostrar_ofertas_controller/index/<?php echo $ofertas[0]['id_oferta']; ?>'"><?php echo $ofertas[0]['titulo']; ?></a></h3>
				<p><?php  echo $ofertas[0]['resumen']; ?></p>
										<!--index/<?php echo $ofertas[0]['id_oferta']; ?>'-->
				<input type="button" value="Editar Oferta" onclick="window.location='./Editar_oferta_controller/index/<?php echo $ofertas[0]['id_oferta']; ?>'" />
				
			
			<?php } else{ ?>
				<h3>NO hay ofertas</h3>
				<p href="./Insertar_oferta_controller">Insertar Nueva Oferta</p>
				
			<?php }?>
			</div>
			
		</div>
	</div>
	<div id="botones">
		
		<input type="button" value="Ver Mas" ng-click="vermas()">
		<input type="button"  value="Instertar Oferta" onclick="window.location='Insertar_oferta_controller';" >
	
	</div>
</div>
	
	
	