<div ng-controller="notiCtrl">
	<div class="navegador">
		<div class="contenedor" ng-click="ir('#!/notificaciones')">
		    <div class="selector seleccionableNav">Notificaciones</div>
	    </div>
		<div class="contenedor">
		    <div class="selector">Dar alta</div>
			<div class="contenedorElementos">
				<a href="#!/dar-alta-alumno"><div class="elemento">Alumno</div></a>
				<a href="#!/dar-alta-empresa"><div class="elemento">Empresa</div></a>
				<a href="#!/dar-alta-profesor"><div class="elemento">Profesor</div></a>
			</div>
		</div>
		<div class="contenedor">
		    <div class="selector">Dar baja</div>
		    <div class="contenedorElementos">
    			<a href="#!/dar-baja-alumno"><div class="elemento">Alumno</div></a>
    			<a href="#!/dar-baja-empresa"><div class="elemento">Empresa</div></a>
    			<a href="#!/dar-baja-profesor"><div class="elemento">Profesor</div></a>
			</div>
		</div>
		<div class="contenedor">
			<div class="selector">Herramientas administrativas</div>
			<div class="contenedorElementos">
    			<a href="#!/administrar-idiomas"><div class="elemento">Idiomas</div></a>
    			<a href="#!/administrar-cursos-familias-etiquetas"><div class="elemento">Cursos, familias y etiquetas</div></a>
			</div>
		</div>
		<div class="contenedor" ng-click="backup()">
			<div class="selector">Backup</div>
			<div class="contenedorElementos">
				<div class="elemento seleccionableNav" ng-click="backupBaseDatos()">Backup base datos</div>
				<div class="elemento seleccionableNav" ng-click="backupImagenes()">Backup imagenes </div>
			</div>
		</div>	
	</div>
	<mi-login></mi-login>
	<div>
		<div ng-view></div>
	</div>
</div>