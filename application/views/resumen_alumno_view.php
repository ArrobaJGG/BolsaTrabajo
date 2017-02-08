<?php 
$this->load->helper('form');
 ?>
<div ng-controller="myCtrl">

	<div id="tabla">
<<<<<<< HEAD
		
=======

>>>>>>> 63c4af5dbc92c646deee8797d2c2ab970b3bb82e
		<h1>Ofertas</h1>
			<?php  if ($ofertas){
				foreach ($ofertas as $oferta){?>
				<div id="ofertas">
					<h3><a href='./mostrar_ofertas_controller/index/<?php echo $oferta['id_oferta']; ?>'"><?php echo $oferta['titulo']; ?></a></h3>
				<p><?php  echo $oferta['resumen']; ?></p>
				</div>
			
			<?php }} else{ ?>
				<h3>NO hay ofertas</h3>				
			<?php }?>
			<button class="button"   onclick="window.location.assign('/BolsaTrabajo/editar_perfil_controller')">Ir a editar perfil</button>
				

	</div>

   	<mi-login></mi-login>

</div>
