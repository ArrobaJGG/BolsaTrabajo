<?php 
$this->load->helper('form');
 ?>

	
	
<form action="./Insertar_oferta_controller" name="insertar" method="post" novalidate enctype="multipart/form-data">

<div id="bloque">
	Titulo:*<input type="text" onkeyup="verificar()"  id="titulo" name="titulo" value="" placeholder="Titulo" required></br>
	Nombre de empresa: <input id="nombre" type="text" name="nombre" value="" placeholder="Nombre"></br>
	Fecha Expiracion: <input id="fechae" type="date" name="fechae" value="" placeholder="Fecha Expiracion"></br>
	Lugar: <input id="lugar" type="text" name="lugar" value="" placeholder="Ciudad"></br>
	Telefono a contactar:<input id="telefono" type="number" name="telefono" value="" placeholder="Telefono"/></br>
	Requisito: <input id="requisito" type="text" name="requisito" value="" placeholder="Requisitos" placeholder="Requisito"></br>
	Sueldo: <input id="sueldo" type="number" name="sueldo" value="" placeholder="Sueldo"></br>
	Funciones: <input id="funciones" type="text" name="funciones" value="" placeholder="Trabajo a realizar"></br>
	Ofrece: <input id="ofrece" type="text" name="ofrece" value="" placeholder="Complementos..."></br>
	
	Duracion del contrato: <input id="duracion" type="text" name="duracion" value="" placeholder="Duracion" /></br>
	Familia: <select id="familia" name="id_familia" onfocus="saber()">
					<?php
					foreach ($familias as $familia) {
						echo '<option value="' . $familia['id_familia_laboral'] . '">' . $familia['nombre'] . '</option>';
						
					}
					?>
			</select></br>
	<!--			
	<input type="button"onclick="showHide()" value="Añadir"></br>
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
	      -->
	Correo: <input type="email" id="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="correo" value="" placeholder="Correo"/></br>
	Horario: <input id="horario" type="text" name="horario"  value="" placeholder="Horario"/></br>
	Oculto: <input type="checkbox"  name="oculto" value=""/><br/>
	Resumen:*<textarea id="resumen" type="text" onkeyup="verificar()" id="resumen" name="resumen" placeholder="Resumen" required></textarea>
	<p>Los Campos con * son requeridos</p>
</div>
<div id="botones">
	<input type="submit"name="Publicar" value="Publicar"/>
	<input type="button" name="Cancelar" value="Cancelar" onclick="window.location='Resumen_empresa_controller'" />
</div>
<?php if (isset($mensaje)) echo $mensaje ?>
		<?php echo validation_errors(); ?>
</form>	
