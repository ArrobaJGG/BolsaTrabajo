<?php 
$this->load->helper('form');
 ?>
<div ng-controller="myCtrl">
<<<<<<< HEAD
	<div id="tabla">
		
		<h1>Ofertas</h1>
			<?php  if ($ofertas){?>
				<div id="ofertas">
					<h3><a href='./resumen_alumno_controller<?php echo $ofertas[0]['id_oferta']; ?>'"><?php echo $ofertas[0]['titulo']; ?></a></h3>
				<p><?php  echo $ofertas[0]['resumen']; ?></p>
				
			
			<?php } else{ ?>
				<h3>NO hay ofertas</h3>				
			<?php }?>
			<button onclick="window.location.assign('/BolsaTrabajo/editar_perfil_controller')">Ir a editar perfil</button>
				</div>
	</div>
=======
	<div id="tabla">		
		<h1>Ofertas</h1>
			<?php  if ($ofertas){?>
				<div id="ofertas">
							<h3><a href='./resumen_alumno_controller<?php echo $ofertas[0]['id_oferta']; ?>'"><?php echo $ofertas[0]['titulo']; ?></a></h3>
							<p><?php  echo $ofertas[0]['resumen']; ?></p>
							
						
							<?php } else{ ?>
								<h3>NO hay ofertas</h3>				
							<?php }?>
						<input type="submit" value="Ir a editar perfil" ng-click="window.location.assign('/BolsaTrabajo/application/controllers/editar_perfil_controller')"/>
				</div>
   	</div>
   	<mi-login></mi-login>
>>>>>>> 196b1c661ec13eecd3cded281ff606ec7a4f89bb
</div>
