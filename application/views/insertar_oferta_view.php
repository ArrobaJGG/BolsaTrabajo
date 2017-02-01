<?php 
$this->load->helper('form');
 ?>

	<!--
	<?php 
	echo form_open('Insertar_oferta_controller');
	?>-->
	
<form action="./Insertar_oferta_controller" method="post" novalidate enctype="multipart/form-data">


Titulo: <input type="text" name="titulo" value="" placeholder="Titulo" required></br>
Nombre de empresa: <input type="text" name="nombre" value="" placeholder="nombre"></br>
Fecha Expiracion: <input type="date" name="fechae" value=""></br>
Lugar: <input type="text" name="lugar" value="" placeholder="Ciudad"></br>
Telefono a contactar:<input type="number" name="telefono" value=""/></br>
Requisito: <input type="text" name="requisito" value="" placeholder="Requisitos"></br>
Sueldo: <input type="number" name="sueldo" value="" placeholder=""></br>
Funciones: <input type="text" name="funciones" value="" placeholder="Trabajo a realizar"></br>
Ofrece: <input type="text" name="ofrece" value="" placeholder="Complementos..."></br>
Resumen: <input type="text" name="resumen" required></br>

Familia: <select name="id_familia" onfocus="saber()">
				<?php
				foreach ($familias as $familia) {
					echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
					
				}
				?>
			</select>
			
<input type="button"onclick="showHide()" value="Añadir"></br>
<!--
<div id="etiquetas" style="display:none">
	
		Etiquetas:<select name="etiqueta" multiple="">
						<?php
						foreach ($etiquetas as $etiqueta) {
							echo '<option value="' . $etiqueta['nombre'] . '">' . $etiqueta['nombre'] . '</option>';
						}
						?>
				</select></br>
</div>-->
<div style="border:1px solid" id="etiquetas">
			<h3>Etiquetas</h3>       
            <div ng-controller="etiquetaCtrl" ng-repeat = "etiqueta in etiquetas | filter: {id_familia_laboral : familiaSeleccionada}">
            	<span ng-show="!modoEditarEtiqueta">
            		<span>{{etiqueta.nombre}}</span><button ng-click="editarEtiqueta()" >Editar</button> <button ng-click="borrarEtiqueta($event)" value="{{etiqueta.id_etiqueta}}">borrar</button>
            	</span>
            	<span ng-show="modoEditarEtiqueta">
            		<input type="text" ng-init="nombreEtiquetaAng=etiqueta.nombre" ng-model = "nombreEtiquetaAng"> <button value="{{etiqueta.id_etiqueta}}" ng-click="enviarEtiqueta($event)">Enviar</button>
            	</span>
            </div>
            <div ng-show="familiaSeleccionada" id="anadirEtiqueta">
                <span>Nueva etiqueta en la familia laboral <span ng-repeat="familia in familias | filter: {id_familia_laboral : familiaSeleccionada}">{{familia.nombre}}</span></span><br>
                <input type="text" ng-model="etiquetaAng" /><button ng-click="anadirEtiqueta()">Añadir</button>
            </div>
       </div>
Correo: <input type="email" name="correo" value=""/></br>
Horario: <input type="text" name="horario"  value=""/></br>
Oculto: <input type="checkbox"  name="oculto" value=""/><br/>



<input type="submit"name="Publicar" value="Publicar"/>
<input type="button" name="Cancelar" value="Cancelar" onclick="window.location='Resumenempresa_controller'" />
<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	
