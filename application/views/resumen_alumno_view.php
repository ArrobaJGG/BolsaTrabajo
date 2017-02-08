<?php 
$this->load->helper('form');
 ?>
<div ng-controller="myCtrl">

	<div id="tabla">
<<<<<<< HEAD
		<h1>Ofertas Recomendadas</h1>
			<?php  if ($ofertas){?>
				<div id="ofertas">
							<h3><a href='./resumen_alumno_controller<?php echo $ofertas[0]['id_oferta']; ?>'"><?php echo $ofertas[0]['titulo']; ?></a></h3>
							<p><?php  echo $ofertas[0]['resumen']; ?></p>
						
					
							<?php } else{ ?>
								<h3>NO hay ofertas</h3>				
							<?php }?>
							<button class="button"  onclick="window.location.assign('/BolsaTrabajo/editar_perfil_controller')">Ir a editar perfil</button>
				</div>
=======
		
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
			<button onclick="window.location.assign('/BolsaTrabajo/editar_perfil_controller')">Ir a editar perfil</button>
				
>>>>>>> 85daeced83b0c0bf5839f0ef938c9663fbdc637a
	</div>

   	<mi-login></mi-login>

</div>
