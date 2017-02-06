<div ng-controller="resumenProfesorCtrl">
    <div class="navegador">
        <div class="contenedor" ng-click="ir('#!/resumen')">
            <div class="selector seleccionableNav">Resumen</div>
        </div>
        <div class="contenedor">
            <div class="selector">Ofertas</div>
            <div class="contenedorElementos">
                <a href="#!/ver-mis-ofertas"><div class="elemento">Ver todas mis ofertas</div></a>
                <a href="#!/ver-todas-ofertas"><div class="elemento">Ver todas las ofertas</div></a>
                <a href="/BolsaTrabajo/insertar_oferta_controller"><div class="elemento">Agregar una oferta</div></a>
            </div>
        </div>
        <div class="contenedor">
            <div class="selector">Alumnos</div>
        	<div class="contenedorElementos">
        		<a href="#!/ver-mis-alumnos"><div class="elemento">Ver todos mis alumnos</div></a>
        		<a href="#!/ver-todos-alumnos"><div class="elemento">Ver todos los alumnos</div></a>
        	</div>
        </div>
        <div class="contenedor seleccionableNav">
            <a href="/BolsaTrabajo/cambiar_credenciales_controller"><div class="selector seleccionableNav">Cambiar credenciales</div></a>
        </div>
    </div>
    <div>
        <div ng-view></div>
    </div>
</div>