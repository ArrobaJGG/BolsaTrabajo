<div ng-controller="resumenProfesorCtrl">
    <ul>
        <li><a href="#!/resumen">Resumen</a></li>
        <li>Ofertas
            <ul>
                <li><a href="#!/ver-mis-ofertas">Ver todas mis ofertas</a></li>
                <li><a href="#!/ver-todas-ofertas">Ver todas las ofertas</a></li>
            </ul>
        </li>
        <li>Alumnos
        	<ul>
        		<li><a href="#!/ver-mis-alumnos">Ver todos mis alumnos</a></li>
        		<li><a href="#!/ver-todos-alumnos">Ver todos los alumnos</a></li>
        	</ul>
        </li>
    </ul>
    <div>
        <div ng-view></div>
    </div>
</div>