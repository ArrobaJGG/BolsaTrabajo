<div ng-controller="resumenProfesorCtrl">
    <ul>
        <li><a href="#!/resumen">Resumen</a></li>
        <li>Ofertas
            <ul>
                <li><a href="#!/ver-mis-ofertas">Ver todas mis ofertas</a></li>
                <li><a href="#!/ver-todas-ofertas">Ver todas las ofertas</a></li>
                <li><a href="/BolsaTrabajo/insertar_oferta_controller">Agregar una oferta</a></li>
            </ul>
        </li>
        <li>Alumnos
        	<ul>
        		<li><a href="#!/ver-mis-alumnos">Ver todos mis alumnos</a></li>
        		<li><a href="#!/ver-todos-alumnos">Ver todos los alumnos</a></li>
        	</ul>
        </li>
        <li>
            <a href="/BolsaTrabajo/cambiar_credenciales_controller">Cambiar credenciales</a>
        </li>
    </ul>
    <div>
        <div ng-view></div>
    </div>
</div>